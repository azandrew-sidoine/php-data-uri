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

namespace Drewlabs\DataURI\Contracts;

interface DataURI
{
    /**
     * Returns the writable content.
     *
     * @return string
     */
    public function getRawData();

    /**
     * Returns the writable content.
     *
     * Add this method to make the class symfony
     * {@see \Symfony\Component\HttpFoundation\File\File} class implementation compliant
     *
     * @return string
     */
    public function getContent();

    /**
     * Set the data content file extension.
     *
     * @param string $extension
     *
     * @return self
     */
    public function setExtension($extension);

    /**
     * Return the file extension of the data content.
     *
     * @return string
     */
    public function getExtension();

    /**
     * Return the data mimetype.
     *
     * @return string
     */
    public function getMimeType();

    /**
     * Returns the paramters binded to the data URI scheme.
     *
     * @return array
     */
    public function getParameters();

    /**
     * Data is binary data.
     *
     * @return bool
     */
    public function isBinary();

    /**
     * Add a custom parameters to the DataURi.
     *
     * @param string $paramName
     * @param string $value
     *
     * @return self
     */
    public function addParameters($paramName, $value);
}
