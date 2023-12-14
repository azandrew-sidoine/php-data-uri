<?php

declare(strict_types=1);

/*
 * This file is part of the drewlabs namespace.
 *
 * (c) Sidoine Azandrew <azandrewdevelopper@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drewlabs\DataURI;

class Parser
{
    /**
     * Regular expression matching a dataURI scheme.
     *
     * offset #1 MimeType
     * offset #2 Parameters
     * offset #3 Datas
     */
    public const REGEXP = '/data:([a-zA-Z-\/+.]*)([a-zA-Z0-9-_;=.+]+)?,(.*)/';

    /**
     * Parse a data URI and return a DataUri\Data.
     *
     * @param string $uri    A data URI
     * @param int    $len
     * @param bool   $strict
     *
     * @throws InvalidDataException
     * @throws \InvalidArgumentException
     *
     * @return DataURI
     */
    public static function parse($uri, $len = DataURI::TAGLEN, $strict = false)
    {
        $dataParams = $matches = [];
        if (!preg_match(self::REGEXP, $uri, $matches)) {
            throw new \InvalidArgumentException('Could not parse the URL scheme');
        }
        $base64 = false;
        $mimeType = $matches[1] ?: null;
        $params = $matches[2];
        $rawData = $matches[3];
        if ('' !== $params) {
            foreach (explode(';', $params) as $param) {
                if (strstr($param, '=')) {
                    $param = explode('=', $param);
                    $dataParams[array_shift($param)] = array_pop($param);
                } elseif (DataURI::BASE_64 === $param) {
                    $base64 = true;
                }
            }
        }
        if ($base64 && !$rawData = base64_decode($rawData, $strict)) {
            throw new \InvalidArgumentException('base64 decoding failed');
        }
        if (!$base64) {
            $rawData = rawurldecode($rawData);
        }
        $dataURI = new DataURI($rawData, $mimeType, $dataParams, $strict, $len);
        if ($base64) {
            $dataURI = $dataURI->asBinary();
        }

        return $dataURI->setExtension(MimesExtensions::getExtension($dataURI->getMimeType()));
    }
}
