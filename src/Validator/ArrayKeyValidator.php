<?php

namespace App\Validator;

use App\Exception\DataCorruptException;

/**
 * Class ArrayKeyValidator
 * @package App\Validator
 */
class ArrayKeyValidator
{

    /**
     * @param array $row
     * @param string $modelClass
     * @return bool
     * @throws \ReflectionException
     */
    public function validate(array $row, string $modelClass)
    {
        array_map(function ($property) use ($row){
            if (!array_key_exists($property->getName(), $row)) {
                throw new DataCorruptException(sprintf('Klucz %s jest nieprawidłowy', $property->getName()));
            };
        }, $this->getClassProperties($modelClass));

        return true;
    }

    /**
     * @param string $modelClass
     * @return \ReflectionProperty[]
     * @throws \ReflectionException
     */
    private function getClassProperties(string $modelClass):array
    {
        $reflection = new \ReflectionClass($modelClass);
        return $reflection->getProperties();
    }
}