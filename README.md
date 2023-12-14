# Library documentation

Data URI package provide an interface for working creating file from data uri string or converting files to data uri string.
It provide an object that serves as bridge for converting from raw string or from files.

## Usage

They data URI object provide method for creating object from file path or HTTP url

- Creating from path

```php
// We assume file exists at path specified below
$path = __DIR__ . 'storage/file.txt';
$object = \Drewlabs\DataURI\DataURI::create($path);

// Converting $object to data uri string
$uri = $object->__toString();
// or using type casting
$uri = (string)$object;
```

- Creating from HTTP URL

```php
$url = 'https://i.picsum.photos/id/237/200/300.jpg?hmac=TmmQSbShHz9CdQm0NkEjx1Dyh_Y984R9LpNrpvH2D_U';
$object = \Drewlabs\DataURI\DataURI::createFromURL($url);

// Converting $object to data uri string
$uri = $object->__toString();
// or using type casting
$uri = (string)$object;
```

- Creating from uri string

The package comes handy with a parser class for converting uri string to binary or text files that can be wrtten to storage.

```php
$uri = 'data:application/vnd.openxmlformats-officedocument.wordprocessingml.document;base64,UEsDBBQABgAIAAAAIQCQyAt3kAEAADEHAAATAAgCW0NvbnRlbnRfVHlwZXNdLnhtbCCiBAIooAACAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAC0lUlrwzAQhe+F/geja4mV9FBKiZNDl2MbaAu9KtI4EdWGNNn...';

$parser = new \Drewlabs\DataURI\Parser();
$object = $parser->parse($uri); // Creates instance of \Drewlabs\DataURI\DataURI
```

## API

- getContent()

Returns the internal binary content encoded in the {@see \Drewlabs\DataURI\DataURI} object.

- getMimeType()

Returns the file mimeType. Currently commonly used web mime types are supported

- isBinary()

Returns true if the uri information is a binary content.

- getExtension()

Guess extension of the file using the mime type.
