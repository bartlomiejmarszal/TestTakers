<?php

namespace App\Adapter;

interface AdapterInterface
{
    /**
     * @return array
     */
    public function loadData(): array;
}