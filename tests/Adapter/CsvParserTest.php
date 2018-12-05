<?php

namespace App\Tests\Adapter;


use App\Adapter\CsvParser;
use PHPUnit\Framework\TestCase;

class CsvParserTest extends TestCase
{
    /**
     * @test
     */
    public function parseTest()
    {
        $parser = new CsvParser();
        $data = [];
        $data[0][] = "login";
        $data[0][] = "password";
        $data[0][] = "title";
        $data[0][] = "lastname";
        $data[0][] = "firstname";
        $data[0][] = "gender";
        $data[0][] = "email";
        $data[0][] = "picture";
        $data[0][] = "address";
        $data[1][] = "login_field";
        $data[1][] = "password_field";
        $data[1][] = "title_field";
        $data[1][] = "lastname_field";
        $data[1][] = "firstname_field";
        $data[1][] = "gender_field";
        $data[1][] = "email_field";
        $data[1][] = "picture_field";
        $data[1][] = "address_field";

        $result = $parser->parse($data);
        $this->assertEquals('login_field', $result[0]['login']);
        $this->assertEquals(1, count($result));
        $this->assertEquals(9, count($result[0]));
    }
}