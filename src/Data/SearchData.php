<?php

namespace App\Data;

use App\Entity\SecondHandCar;
use App\Repository\SecondHandCarRepository;

class SearchData
{
    /**
     * @var null/integer
     */
    public $kmMin;

    /**
     * @var null/integer
     */
    public $kmMax;

    /**
     * @var null/integer
     */
    public $priceMin;

    /**
     * @var null/integer
     */
    public $priceMax;

    /**
     * @var null/integer
     */
    public $yearMin;

    /**
     * @var null/integer
     */
    public $yearMax;

}