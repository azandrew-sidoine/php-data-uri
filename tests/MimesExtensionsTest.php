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

use Drewlabs\DataURI\MimesExtensions;
use PHPUnit\Framework\TestCase;

class MimesExtensionsTest extends TestCase
{
    public function testExtensionFromMimeType()
    {
        $mapper = new MimesExtensions();

        $extension = $mapper->getExtension('application/vnd.openxmlformats-officedocument.wordprocessingml');

        $this->assertSame('docx', $extension, 'Expect extension to equals .docx');
    }

    public function testMimeTypeFromExtension()
    {
        $mapper = new MimesExtensions();

        $extension = $mapper->getMimeType('xml');

        $this->assertSame('application/xml', $extension, 'Expect mime type be application/xml');
    }
}
