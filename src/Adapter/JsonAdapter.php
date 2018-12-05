<?php

namespace App\Adapter;

/**
 * Class JsonAdapter
 * @package App\Adapter
 */
class JsonAdapter extends AbstractAdapter
{

    const FORMAT = 'json';

    /**
     * @return array
     * @throws \Exception
     */
    public function loadData(): array
    {
        $data = $this->getDataFile();
        $decodedData = json_decode($data, true);
        return $decodedData;
    }

    /**
     * @return string
     */
    function getFormat(): string
    {
        return self::FORMAT;
    }
}