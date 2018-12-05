<?php

namespace App\Adapter;

use App\Exception\LoadFileException;
use Symfony\Component\Finder\Finder;

/**
 * Class AbstractAdapter
 * @package App\Adapter
 */
abstract class AbstractAdapter implements AdapterInterface
{

    /**
     * Determine what file format to use
     * @return string
     */
    abstract function getFormat(): string;

    /**
     * @return array
     */
    abstract public function loadData(): array;

    /**
     * Getting file with data
     * I assume that we can use only one file
     * @return mixed
     * @throws \Exception
     */
    protected function getDataFile(): string
    {
        $finder = new Finder();
        $finder->in(getenv('DATA_SOURCE_DIR'));
        $finder->files()->name('*.' . $this->getFormat());

        if ($finder->count() > 1) {
            throw new LoadFileException("To many files with json extension");
        }

        if ($finder->count() === 0) {
            throw new LoadFileException("There is no json files");
        }
        foreach ($finder as $file) {
            $result = $file->getContents();
        }

        return $result;
    }
}