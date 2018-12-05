<?php

namespace App\Tests\Adapter;


use App\Adapter\JsonAdapter;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Filesystem\Filesystem;

class JsonAdapterTest extends TestCase
{

    /**
     * @test
     */
    public function loadDataWithOneFileTest()
    {
        $jsonAdapter = new JsonAdapter();
        $fileSystem = new Filesystem();
        $fileSystem->mkdir(getenv('DATA_SOURCE_DIR'));
        $fileSystem->touch(getenv('DATA_SOURCE_DIR') . "/test_01.json");
        $fileSystem->dumpFile(getenv('DATA_SOURCE_DIR') . "/test_01.json", "[{\"key\": \"value\"}]");
        $result = $jsonAdapter->loadData();
        $this->assertEquals(1, count($result));
    }

    /**
     * @expectedException App\Exception\LoadFileException
     * @test
     */
    public function loadDataMoreThenOneFileTest()
    {
        $jsonAdapter = new JsonAdapter();
        $fileSystem = new Filesystem();
        $fileSystem->mkdir(getenv('DATA_SOURCE_DIR'));
        $fileSystem->touch(getenv('DATA_SOURCE_DIR') . "/test_01.json");
        $fileSystem->touch(getenv('DATA_SOURCE_DIR') . "/test_02.json");
        $jsonAdapter->loadData();
    }

    /**
     * @expectedException App\Exception\LoadFileException
     * @test
     */
    public function loadDataNoFilesTest()
    {
        $jsonAdapter = new JsonAdapter();
        $fileSystem = new Filesystem();
        $fileSystem->mkdir(getenv('DATA_SOURCE_DIR'));
        $jsonAdapter->loadData();
    }

    /**
     * @after
     */
    public function cleanFiles()
    {
        $fileSystem = new Filesystem();
        $fileSystem->remove(getenv('DATA_SOURCE_DIR') . "/");
    }
}