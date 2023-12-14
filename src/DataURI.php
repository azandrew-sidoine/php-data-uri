<?php

declare(strict_types=1);

/*
 * This file is part of the Drewlabs package.
 *
 * (c) Sidoine Azandrew <azandrewdevelopper@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drewlabs\DataURI;

use Drewlabs\DataURI\Contracts\DataURI as ContractsData;
use Drewlabs\DataURI\Exceptions\FileNotFoundException;
use Drewlabs\DataURI\Exceptions\TooLongDataException;

class DataURI implements ContractsData
{
    /**
     * LITLEN limits
     */
    const LITLEN = 0;

    /**
     * The ATTSPLEN (2100) limits the sum of all
     * lengths of all attribute value specifications which appear in a tag.
     */
    const ATTSPLEN = 1;

    /**
     * The TAGLEN (2100) limits the overall length of a tag.
     */
    const TAGLEN = 2;

    /**
     * ATTS_TAG_LIMIT is the length limit allowed for TAGLEN & ATTSPLEN DataURi.
     */
    const ATTS_TAG_LIMIT = 2100;

    /**
     * LIT_LIMIT is the length limit allowed for LITLEN DataURi.
     */
    const LIT_LIMIT = 1024;

    /**
     * Extension indicating that the data URI is base64 encoded.
     */
    const BASE_64 = 'base64';

    /**
     * @var string
     */
    private $data;

    /**
     * @var string
     */
    private $mimeType;

    /**
     * @var string
     */
    private $extension;

    /**
     * Parameters provided in DataURI.
     *
     * @var array
     */
    private $parameters;

    /**
     * @var bool
     */
    private $isBinary = false;

    /**
     * A DataURI Object which by default has a 'text/plain'
     * media type and a 'charset=US-ASCII' as optional parameter.
     *
     * @param string $data       Data to include as "immediate" data
     * @param string $mimeType   Mime type of media
     * @param array  $parameters Array of optional parameters
     * @param bool   $strict     Check length of data
     * @param int    $mode Define Length of data
     */
    public function __construct(
        $data,
        $mimeType = null,
        array $parameters = [],
        $strict = false,
        $mode = self::TAGLEN
    ) {
        $this->data = $data;
        $this->mimeType = $mimeType;
        $this->parameters = $parameters;
        $this->buildAttributes($mode, $strict);
    }

    /**
     * String dumper of the current class.
     *
     * @return string
     */
    public function __toString()
    {
        $parameters = '';
        if (0 !== \count($params = $this->getParameters())) {
            foreach ($params as $paramName => $paramValue) {
                $parameters .= sprintf(';%s=%s', $paramName, $paramValue);
            }
        }
    
        // Build the base64 and data parts
        $base64 = $this->isBinary() ? sprintf(';%s', self::BASE_64) : '';
        $data = $this->isBinary()?base64_encode($this->getContent()) : rawurlencode($this->getContent());

        return sprintf(
            'data:%s%s%s,%s',
            $this->getMimeType(),
            $parameters,
            $base64,
            $data
        );
    }

    public function getRawData()
    {
        return $this->data;
    }

    public function getContent()
    {
        return $this->data;
    }

    public function getMimeType()
    {
        return $this->mimeType;
    }

    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    public function getExtension()
    {
        return $this->extension;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    public function isBinary()
    {
        return $this->isBinary;
    }

    public function addParameters($name, $value)
    {
        $this->parameters[$name] = $value;

        return $this;
    }

    // region Miscellanous
    public function asBinary()
    {
        $this->isBinary = true;

        return $this;
    }

    /**
     * Get a new instance of DataUri\Data from a file.
     *
     * @param string $source     Path to the located file
     * @param bool   $strict     Use strict mode
     * @param int    $mode The length mode
     *
     * @throws FileNotFoundException
     *
     * @return DataURI
     */
    public static function create($source, $strict = false, $mode = self::TAGLEN)
    {
        if (!$source instanceof \SplFileInfo) {
            if (!is_file($source)) {
                throw new FileNotFoundException($source);
            }
            $source = new \SplFileInfo($source);
        }

        return new static(
            file_get_contents($source->getPathname()),
            static::gessMimeType($source),
            [],
            $strict,
            $mode
        );
    }

    /**
     * Create an instance of the {self} class from a user provided url.
     *
     * @param string $url        Path to the remote file
     * @param bool   $strict     Use strict mode
     * @param int    $lengthMode The length mode
     *
     * @throws FileNotFoundException
     *
     * @return static
     */
    public static function createFromURL($url, $strict = false, $lengthMode = self::TAGLEN)
    {
        if (!\extension_loaded('curl')) {
            throw new \RuntimeException('This method requires the CURL extension.');
        }
        $curl = curl_init($url);
        try {
            curl_setopt($curl, \CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, \CURLOPT_FOLLOWLOCATION, true);
            $content = curl_exec($curl);
            if (200 !== curl_getinfo($curl, \CURLINFO_RESPONSE_CODE)) {
                curl_reset($curl);
                throw new FileNotFoundException(sprintf('%s file does not exist or the remote server does not respond', $url));
            }
            $mimeType = curl_getinfo($curl, \CURLINFO_CONTENT_TYPE);
            curl_reset($curl);
            return new static($content, $mimeType, [], $strict, $lengthMode);
        } finally {
            // We close the curl handle is is resource and is set
            if ((null !== $curl) && (is_resource($curl) || (class_exists(\CurlHandle::class) && $curl instanceof \CurlHandle))) {
                curl_close($curl);
            }
        }
    }

    /**
     * @param int  $mode        Max allowed data length
     * @param bool $strict      Check data length
     *
     * @throws TooLongDataException
     *
     * @return static
     */
    private function buildAttributes($mode, $strict)
    {
        if ($strict && self::LITLEN === $mode && \strlen($this->data) > self::LIT_LIMIT) {
            throw new TooLongDataException('Too long data', \strlen($this->data));
        } elseif ($strict && \strlen($this->data) > self::ATTS_TAG_LIMIT) {
            throw new TooLongDataException('Too long data', \strlen($this->data));
        }
        if (null === $this->mimeType) {
            $this->mimeType = 'text/plain';
            $this->addParameters('charset', 'US-ASCII');
        }
        $this->isBinary = 0 !== strpos($this->mimeType, 'text/');

        return $this;
    }

    private static function gessMimeType(\SplFileInfo $value)
    {
        if (method_exists($value, 'getMimeType')) {
            return call_user_func([$value, 'getMimeType']);
        }
        return MimesExtensions::getMimeType($value->getExtension());
    }

    // endregion Miscellanous
}
