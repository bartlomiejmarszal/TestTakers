<?php

namespace App\Adapter;

/**
 * Class CsvParser
 * @package App\Adapter
 */
class CsvParser
{

    /**
     * @param array $data
     * @return array
     */
    public function parse(array $data)
    {
        $result = [];
        $header = $data[0];
        array_shift($data);
        $i = 0;
        foreach ($data as $row) {
            foreach ($header as $key => $head) {
                $result[$i][$head] = $row[$key];
            }
            $i++;
        }

        return $result;
    }
}