<?php

namespace App\Tests\Adapter;


use App\Adapter\CsvAdapter;
use App\Adapter\CsvParser;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Filesystem\Filesystem;

class CsvAdapterTest extends TestCase
{

    /**
     * @throws \Exception
     * @test
     */
    public function loadDataTest()
    {
        /** @var CsvParser|MockObject $parser */
        $parser = $this->createMock(CsvParser::class);
        $parser->method('parse')->willReturn([
            0 => [
                "login" => "login_field",
                "password" => "password_field",
                "title" => "title_field",
                "lastname" => "lastname_field",
                "firstname" => "firstname_field",
                "gender" => "gender_field",
                "email" => "email_field",
                "picture" => "picture_field",
                "address" => "address_field",
            ]
        ]);
        $adapter = new CsvAdapter($parser);
        $fileSystem = new Filesystem();
        $fileSystem->mkdir(getenv('DATA_SOURCE_DIR'));
        $fileSystem->touch(getenv('DATA_SOURCE_DIR') . "/test_01.csv");
        $fileSystem->dumpFile(getenv('DATA_SOURCE_DIR') . "/test_01.csv",
            "login,password,title,lastname,firstname,gender,email,picture,address\nfosterabigail,P7ghvUQJNr6myOEP,mrs,foster,abigail,female,abigail.foster60@example.com,https://api.randomuser.me/0.2/portraits/women/10.jpg,1851 saddle dr anna 69319");
        $result = $adapter->loadData();
        $this->assertEquals(1, count($result));
    }
}