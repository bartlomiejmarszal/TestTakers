<?php

namespace App\DTO;

use App\Adapter\JsonAdapter;
use App\Model\TestTaker;
use App\Validator\ArrayKeyValidator;

/**
 * Data Transfer Object to get dta from data source and preview it in response
 * Class TestTakerDTO
 * @package App\DTO
 */
class TestTakerDTO
{
    /**
     * @var JsonAdapter
     */
    private $jsonAdapter;

    /**
     * @var ArrayKeyValidator
     */
    private $arrayKeyValidator;
    /**
     * @var TestTakerHydrator
     */
    private $hydrator;

    /**
     * TestTakerDTO constructor.
     * @param JsonAdapter $jsonAdapter
     * @param ArrayKeyValidator $arrayKeyValidator
     * @param TestTakerHydrator $hydrator
     */
    public function __construct(JsonAdapter $jsonAdapter, ArrayKeyValidator $arrayKeyValidator, TestTakerHydrator $hydrator)
    {
        $this->jsonAdapter = $jsonAdapter;
        $this->arrayKeyValidator = $arrayKeyValidator;
        $this->hydrator = $hydrator;
    }

    /**
     * @param array $data
     * @return array
     * @throws \ReflectionException
     */
    public function transformData(array $data): array
    {
        $result = [];
        foreach ($data as $row) {
            $this->arrayKeyValidator->validate($row, TestTaker::class);
            $model = new TestTaker();
            $this->hydrator->hydrate($model, $row);
            $result[] = $model;
        }

        return $result;
    }
}