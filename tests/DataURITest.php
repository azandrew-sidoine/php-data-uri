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

use Drewlabs\DataURI\Contracts\DataURI;
use PHPUnit\Framework\TestCase;

class DataURITest extends TestCase
{
    /**
     * @test testCreateDataURIObject
     *
     * @return void
     */
    public function testDataURIParserParse()
    {
        $parser = new \Drewlabs\DataURI\Parser();
        $dataURIObject = $parser->parse($this->getExcelEncodedData());
        $this->assertInstanceOf(DataURI::class, $dataURIObject, 'Expect created object to be an instance of \Drewlabs\DataURI\Data  class');
    }

    /**
     * @test
     *
     * @return void
     */
    public function testDataMimeTypeMatches()
    {
        $parser = new \Drewlabs\DataURI\Parser();
        $dataURIObject = $parser->parse($this->getMsWordData());
        $this->assertEquals('application/vnd.openxmlformats-officedocument.wordprocessingml.document', $dataURIObject->getMimeType(), 'Expect created data object mimetype to equals application/vndopenxmlformats-officedocumentwordprocessingmldocument');
    }

    /**
     * @test
     *
     * @return void
     */
    public function testDataIsBinaryMethodToBeTrue()
    {
        $parser = new \Drewlabs\DataURI\Parser();
        $dataURIObject = $parser->parse($this->getMsWordData());
        $this->assertTrue($dataURIObject->isBinary(), 'Expect data content to be base64 encoded');
    }

    /**
     * @test
     *
     * @return void
     */
    public function testGetExtensionMethod()
    {
        $parser = new \Drewlabs\DataURI\Parser();
        $dataURIObject = $parser->parse($this->getMsWordData());
        $this->assertEquals('docx', $dataURIObject->getExtension(), 'Expect data extension to be .docx encoded');
    }

    /**
     * @test
     *
     * @return void
     */
    public function testNonDataURIBase64EncodedString()
    {
        $parser = new \Drewlabs\DataURI\Parser();
        $this->expectException(InvalidArgumentException::class);
        $parser->parse($this->getBase64Data());
    }

    private function getExcelEncodedData()
    {
        return require __DIR__.'/constants/msexcel.php';
    }

    private function getMsWordData()
    {
        return require __DIR__.'/constants/msword.php';
    }

    private function getBase64Data()
    {
        return require __DIR__.'/constants/base64str.php';
    }
}
