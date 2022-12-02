<?php

namespace App\Service;

use App\Entity\CarBrand;
use Doctrine\ORM\EntityManagerInterface;
use GraphQL\Error\Error;

class MutationService 
{
    public function __construct(
        private EntityManagerInterface $manager
    ) {}

    public function createCarBrand(array $carBrandDetails): CarBrand 
    {
        $carbrand = new CarBrand(
            $carBrandDetails['brand_name'],
            $carBrandDetails['year'], 

        );

        $this->manager->persist($carbrand);
        $this->manager->flush();

        return $carbrand;
    }
  
    public function updateCarBrand(int $carBrandId, array $carBrandDetails): CarBrand
    {
        $brandToUpdate = $this->manager->getRepository(CarBrand::class)->find($carBrandId);
        $brandToUpdate->setbrandname($carBrandDetails['brand_name']);
        $brandToUpdate->setyear($carBrandDetails['year']);
        
        $this->manager->persist($brandToUpdate);
        $this->manager->flush();
        
        return $brandToUpdate;
    }

    public function deleteCarBrand(int $carBrandId)
    {   
        $carBrandToRemove = $this->manager->getRepository(CarBrand::class)->find($carBrandId);
        if (is_null($carBrandToRemove)) {
            throw new Error("No car with this id: $carBrandId");
        }
        $this->manager->remove($carBrandToRemove);
        $this->manager->flush();

        return null;
    }
}   
