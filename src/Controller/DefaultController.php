<?php

namespace App\Controller;

use App\Adapter\CsvAdapter;
use App\Adapter\JsonAdapter;
use App\DTO\TestTakerDTO;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class DefaultController
 * @package App\Controller
 */
class DefaultController extends AbstractController
{
    /**
     * @var JsonAdapter
     */
    private $jsonAdapter;
    /**
     * @var TestTakerDTO
     */
    private $testTakerDTO;
    /**
     * @var SerializerInterface
     */
    private $serializer;
    /**
     * @var CsvAdapter
     */
    private $csvAdapter;

    /**
     * DefaultController constructor.
     * @param JsonAdapter $jsonAdapter
     * @param TestTakerDTO $testTakerDTO
     * @param SerializerInterface $serializer
     * @param CsvAdapter $csvAdapter
     */
    public function __construct(JsonAdapter $jsonAdapter, TestTakerDTO $testTakerDTO, SerializerInterface $serializer, CsvAdapter $csvAdapter)
    {

        $this->jsonAdapter = $jsonAdapter;
        $this->testTakerDTO = $testTakerDTO;
        $this->serializer = $serializer;
        $this->csvAdapter = $csvAdapter;
    }

    /**
     * @throws \Exception
     * @Route("/index_json", name="json_resource")
     */
    public function jsonResourceAction(): Response
    {
        $data = $this->jsonAdapter->loadData();
        return new Response(
            $this->serializer->serialize($this->testTakerDTO->transformData($data), 'json')
        );
    }


    /**
     * @throws \Exception
     * @Route("/index_csv", name="csv_resource")
     */
    public function csvResourceAction()
    {

        $data = $this->csvAdapter->loadData();
        return new Response(
            $this->serializer->serialize($this->testTakerDTO->transformData($data), 'json')
        );
    }
}