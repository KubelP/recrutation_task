<?php

namespace App\Service;

use App\Entity\CarBrand;
use App\Repository\CarBrandRepository;


class QueryService 
{
    public function __construct(
        private CarBrandRepository $CarBrandRepository,
    ) {}

    public function findCarBrand(int $carId): ?CarBrand 
    {
        return $this->CarBrandRepository->find($carId);
    }

    public function getAllCarBrands(): array 
    {
        return $this->CarBrandRepository->findAll();
    }


    }
