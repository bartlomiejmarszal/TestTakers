<?php
namespace App\Adapter;

/**
 * Class CsvAdapter
 * @package App\Adapter
 */
class CsvAdapter extends AbstractAdapter
{
    /**
     * @var CsvParser
     */
    private $csvParser;

    /**
     * CsvAdapter constructor.
     * @param CsvParser $csvParser
     */
    public function __construct(CsvParser $csvParser)
    {
        $this->csvParser = $csvParser;
    }

    const FORMAT = 'csv';

    /**
     * @return array
     * @throws \Exception
     */
    public function loadData(): array
    {
        $result =[];
        $data = $this->getDataFile();
        $decodedData = str_getcsv($data, "\n");
        foreach ($decodedData as $row) {
            $result[] = str_getcsv($row, ',');
        }
        $result = $this->csvParser->parse($result);
        return $result;
    }

    /**
     * @return string
     */
    function getFormat(): string
    {
        return self::FORMAT;
    }
}