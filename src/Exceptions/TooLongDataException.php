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

namespace Drewlabs\DataURI\Exceptions;

class TooLongDataException extends \Exception
{
    /**
     * @var int
     */
    private $length;

    /**
     * Create Too Long Data Exception class.
     *
     * @param mixed $message
     * @param mixed $length
     */
    public function __construct($message, $length)
    {
        parent::__construct($message);
        $this->length = $length;
    }

    /**
     * {@link $length} property getter.
     *
     * Returns the maximum supported data length
     *
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }
}
