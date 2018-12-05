<?php
/**
 * Created by PhpStorm.
 * User: bmarszal
 * Date: 05/12/2018
 * Time: 10:29
 */

namespace App\Tests\Validator;


use App\Model\TestTaker;
use App\Validator\ArrayKeyValidator;
use PHPUnit\Framework\TestCase;

class ArrayKeyValidatorTest extends TestCase
{
    /**
     * @test
     */
    public function vailidateTest()
    {
        $arrayKeyValidator = new ArrayKeyValidator();
        $corretnRow = [
            "login" => "login_example",
            "password" => "password_example",
            "title" => "title_example",
            "lastname" => "lastname_example",
            "firstname" => "firstname_example",
            "gender" => "gender_example",
            "email" => "email_example",
            "picture" => "picture_example",
            "address" => "address_example",
        ];
        $result = $arrayKeyValidator->validate($corretnRow, TestTaker::class);
        $this->assertTrue($result);
    }

    /**
     * @test
     * @expectedException App\Exception\DataCorruptException
     */
    public function notValidRowTest()
    {
        $arrayKeyValidator = new ArrayKeyValidator();
        $corretnRow = [
            "logina" => "login_example",
            "password" => "password_example",
            "title" => "title_example",
            "lastname" => "lastname_example",
            "firstname" => "firstname_example",
            "gender" => "gender_example",
            "email" => "email_example",
            "picture" => "picture_example",
            "address" => "address_example",
        ];
        $arrayKeyValidator->validate($corretnRow, TestTaker::class);
    }
}