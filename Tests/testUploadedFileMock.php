<?php
use Symfony\Component\HttpFoundation\File\UploadedFile;

class testUploadedFileMock extends \PHPUnit_Framework_TestCase
{
    public function testUploadedFileMock()
    {
        $file = $this->getMockBuilder('Symfony\Component\HttpFoundation\File\UploadedFile')
            ->disableOriginalConstructor()
            ->getMock();
        $file->expects($this->once())
            ->method('getMimeType')
            ->will($this->returnValue($mime = 'mime/type'));

        $service = new MySuperClass;
        $this->assertEquals($mime, $service->processUploadedFile($file));
    }
}

class MySuperClass
{
    public function processUploadedFile(UploadedFile $file)
    {
        return $file->getMimeType();
    }
}
