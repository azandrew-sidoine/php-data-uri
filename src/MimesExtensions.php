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

class MimesExtensions
{
    /**
     * List of commonly used mimes extensions.
     *
     * @var array<array<string,string>>
     */
    const VALUES = [
        [
            'extension' => '.aac',
            'mime' => 'audio/aac',
        ],
        [
            'extension' => '.abw',
            'mime' => 'application/x-abiword',
        ],
        [
            'extension' => '.arc',
            'mime' => 'application/x-freearc',
        ],
        [
            'extension' => '.avi',
            'mime' => 'video/x-msvideo',
        ],
        [
            'extension' => '.azw',
            'mime' => 'application/vnd.amazon.ebook',
        ],
        [
            'extension' => '.bin',
            'mime' => 'application/octet-stream',
        ],
        [
            'extension' => '.bmp',
            'mime' => 'image/bmp',
        ],
        [
            'extension' => '.bz',
            'mime' => 'application/x-bzip',
        ],
        [
            'extension' => '.bz2',
            'mime' => 'application/x-bzip2',
        ],
        [
            'extension' => '.csh',
            'mime' => 'application/x-csh',
        ],
        [
            'extension' => '.css',
            'mime' => 'text/css',
        ],
        [
            'extension' => '.csv',
            'mime' => 'text/csv',
        ],
        [
            'extension' => '.doc',
            'mime' => 'application/msword',
        ],
        [
            'extension' => '.docx',
            'mime' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ],
        [
            'extension' => '.docx',
            'mime' => 'application/vndopenxmlformats-officedocumentwordprocessingmldocument',
        ],
        [
            'extension' => '.eot',
            'mime' => 'application/vnd.ms-fontobject',
        ],
        [
            'extension' => '.epub',
            'mime' => 'application/epub+zip',
        ],
        [
            'extension' => '.gz',
            'mime' => 'application/gzip',
        ],
        [
            'extension' => '.gif',
            'mime' => 'image/gif',
        ],
        [
            'extension' => '.html',
            'mime' => 'text/html',
        ],
        [
            'extension' => '.htm',
            'mime' => 'text/html',
        ],
        [
            'extension' => '.ico',
            'mime' => 'image/vnd.microsoft.icon',
        ],
        [
            'extension' => '.ics',
            'mime' => 'text/calendar',
        ],
        [
            'extension' => '.jar',
            'mime' => 'application/java-archive',
        ],
        [
            'extension' => '.jpg',
            'mime' => 'image/jpg',
        ],
        [
            'extension' => '.jpeg',
            'mime' => 'image/jpeg',
        ],
        [
            'extension' => '.js',
            'mime' => 'text/javascript',
        ],
        [
            'extension' => '.json',
            'mime' => 'application/json',
        ],
        [
            'extension' => '.jsonld',
            'mime' => 'application/ld+json',
        ],
        [
            'extension' => 'midi',
            'mime' => 'audio/x-midi',
        ],
        [
            'extension' => '.mid',
            'mime' => 'audio/midi',
        ],
        [
            'extension' => '.mjs',
            'mime' => 'text/javascript',
        ],
        [
            'extension' => '.mp3',
            'mime' => 'audio/mpeg',
        ],
        [
            'extension' => '.mpeg',
            'mime' => 'video/mpeg',
        ],
        [
            'extension' => '.mpkg',
            'mime' => 'application/vnd.apple.installer+xml',
        ],
        [
            'extension' => '.odp',
            'mime' => 'application/vnd.oasis.opendocument.presentation',
        ],
        [
            'extension' => '.ods',
            'mime' => 'application/vnd.oasis.opendocument.spreadsheet',
        ],
        [
            'extension' => '.odt',
            'mime' => 'application/vnd.oasis.opendocument.text',
        ],
        [
            'extension' => '.oga',
            'mime' => 'audio/ogg',
        ],
        [
            'extension' => '.ogv',
            'mime' => 'video/ogg',
        ],
        [
            'extension' => '.ogx',
            'mime' => 'application/ogg',
        ],
        [
            'extension' => '.opus',
            'mime' => 'audio/opus',
        ],
        [
            'extension' => '.otf',
            'mime' => 'font/otf',
        ],
        [
            'extension' => '.png',
            'mime' => 'image/png',
        ],
        [
            'extension' => '.pdf',
            'mime' => 'application/pdf',
        ],
        [
            'extension' => '.php',
            'mime' => 'application/x-httpd-php',
        ],
        [
            'extension' => '.ppt',
            'mime' => 'application/vnd.ms-powerpoint',
        ],
        [
            'extension' => '.pptx',
            'mime' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
        ],
        [
            'extension' => '.pptx',
            'mime' => 'application/vndopenxmlformats-officedocumentpresentationmlpresentation',
        ],
        [
            'extension' => '.rar',
            'mime' => 'application/vnd.rar',
        ],
        [
            'extension' => '.rtf',
            'mime' => 'application/rtf',
        ],
        [
            'extension' => '.sh',
            'mime' => 'application/x-sh',
        ],
        [
            'extension' => '.svg',
            'mime' => 'image/svg+xml',
        ],
        [
            'extension' => '.swf',
            'mime' => 'application/x-shockwave-flash',
        ],
        [
            'extension' => '.tar',
            'mime' => 'application/x-tar',
        ],
        [
            'extension' => '.tiff',
            'mime' => 'image/tiff',
        ],
        [
            'extension' => '.tif',
            'mime' => 'image/tiff',
        ],
        [
            'extension' => '.ts',
            'mime' => 'video/mp2t',
        ],
        [
            'extension' => '.ttf',
            'mime' => 'font/ttf',
        ],
        [
            'extension' => '.txt',
            'mime' => 'text/plain',
        ],
        [
            'extension' => '.vsd',
            'mime' => 'application/vnd.visio',
        ],
        [
            'extension' => '.wav',
            'mime' => 'audio/wav',
        ],
        [
            'extension' => '.weba',
            'mime' => 'audio/webm',
        ],
        [
            'extension' => '.webm',
            'mime' => 'video/webm',
        ],
        [
            'extension' => '.webp',
            'mime' => 'image/webp',
        ],
        [
            'extension' => '.woff',
            'mime' => 'font/woff',
        ],
        [
            'extension' => '.woff2',
            'mime' => 'font/woff2',
        ],
        [
            'extension' => '.xhtml',
            'mime' => 'application/xhtml+xml',
        ],
        [
            'extension' => '.xls',
            'mime' => 'application/vnd.ms-excel',
        ],
        [
            'extension' => '.xlsx',
            'mime' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ],
        [
            'extension' => '.xlsx',
            'mime' => 'application/vndopenxmlformats-officedocumentspreadsheetmlsheet',
        ],
        [
            'extension' => '.xml',
            'mime' => 'application/xml',
        ],
        [
            'extension' => '.xml',
            'mime' => 'text/xml',
        ],
        [
            'extension' => '.xul',
            'mime' => 'application/vnd.mozilla.xul+xml',
        ],
        [
            'extension' => '.zip',
            'mime' => 'application/zip',
        ],
        [
            'extension' => '.3gp',
            'mime' => 'video/3gpp',
        ],
        [
            'extension' => '.3g2',
            'mime' => 'video/3gpp2',
        ],
        [
            'extension' => '.7z',
            'mime' => 'application/x-7z-compressed',
        ],
    ];

    /**
     * Get a file extension from the provide mime type parameter.
     *
     * @param mixed $mime
     *
     * @return string|null
     */
    public static function getExtension(string $mime)
    {
        $columns = array_column(static::VALUES, 'mime');
        $extenstion = array_search($mime, $columns, true);
        $extenstion = static::search($columns, static function ($value) use ($mime) {
            return '' !== $mime && false !== mb_strpos($value, $mime);
        });
        if ($extenstion) {
            return ltrim(static::VALUES[$extenstion]['extension'], '.');
        }

        return null;
    }

    /**
     * Get a file mime type from the provided extension parameter.
     *
     * @return string|null
     */
    public static function getMimeType(string $extenstion)
    {
        $columns = array_column(static::VALUES, 'extension');
        $extenstion = '.' === substr($extenstion, 0, \strlen('.')) ? ($extenstion) : ('.'.$extenstion);
        $mime = array_search($extenstion, $columns, true);
        if ($mime) {
            return trim(static::VALUES[$mime]['mime']);
        }

        return null;
    }

    /**
     * Call search callabck on the list passed as parameter
     * 
     * @param array $list 
     * @param callable $callack 
     * @return string|int|false 
     */
    private static function search(array $list, callable $callack)
    {
        foreach ($list as $key => $v) {
            if ($callack($v)) {
                return $key;
            }
        }

        return false;
    }
}
