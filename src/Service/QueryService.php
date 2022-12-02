<?php

namespace App\Service;

use App\Entity\CarBrand;
use App\Repository\CarBrandRepository;
use GraphQL\Error\Error;


class QueryService 
{
    public function __construct(
        private CarBrandRepository $CarBrandRepository,
    ) {}

    #send query to db, returns object finded by id
    public function findCarBrand(int $carBrandId): ?CarBrand 
    {
        $brand = $this->CarBrandRepository->find($carBrandId);

        #exception in case when there is no id in db
        if (is_null($brand)) {
            throw new Error("No car with this id: $carBrandId");
        }

        return $brand;
    }

    #qyery for all objects, returns all objects in db
    public function getAllCarBrands(): array 
    {
        return $this->CarBrandRepository->findAll();
    }


    }
