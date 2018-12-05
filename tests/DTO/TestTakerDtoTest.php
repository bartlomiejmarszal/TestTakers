<?php

namespace App\Tests\DTO;


use App\Adapter\JsonAdapter;
use App\DTO\TestTakerDTO;
use App\DTO\TestTakerHydrator;
use App\Validator\ArrayKeyValidator;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * Class TestTakerDtoTest
 * @package App\Tests\DTO
 */
class TestTakerDtoTest extends TestCase
{

    /**
     * @throws \Exception
     * @test
     */
    public function testTransformData()
    {
        $dataArrayFromJson = [];
        $dataArrayFromJson[] = [
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
        /** @var JsonAdapter|MockObject $adapter */
        $adapter = $this->createMock(JsonAdapter::class);
        /** @var ArrayKeyValidator $arrayKeyValidator */
        $arrayKeyValidator = $this->createMock(ArrayKeyValidator::class);
        /** @var TestTakerHydrator $hydrator */
        $hydrator = new TestTakerHydrator();

        $adapter->method('loadData')->willReturn($dataArrayFromJson);
        $dto = new TestTakerDTO($adapter, $arrayKeyValidator, $hydrator);
        $result = $dto->transformData($dataArrayFromJson);
        $this->assertEquals('login_example', $result[0]->getLogin());
    }
}