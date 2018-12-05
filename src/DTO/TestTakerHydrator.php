<?php

namespace App\DTO;

use App\Model\TestTaker;

/**
 * Class TestTakerHydrator
 * @package App\DTO
 */
class TestTakerHydrator
{
    /**
     * @param TestTaker $model
     * @param $row
     */
    public function hydrate(TestTaker $model, $row): void
    {
        $model->setLogin($row['login']);
        $model->setPassword($row['password']);
        $model->setTitle($row['title']);
        $model->setLastname($row['lastname']);
        $model->setFirstname($row['firstname']);
        $model->setGender($row['gender']);
        $model->setEmail($row['email']);
        $model->setPicture($row['picture']);
        $model->setAddress($row['address']);
    }
}