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
}  
//     public function updateCar(int $carId, array $carDetails): Car
//     {
//         $carToUpdate = $this->manager->getRepository(Car::class)->find($carId);
//         $carToUpdate->setbrand($carDetails['brand']);
//         $carToUpdate->setmodel($carDetails['model']);
//         $carToUpdate->setyear($carDetails['year']);
//         $carToUpdate->setcolor($carDetails['color']);
        
//         $this->manager->persist($carToUpdate);
//         $this->manager->flush();
        
//         return $carToUpdate;
//     }

//     public function deleteCar(int $carId)
//     {   
//         $carToRemove = $this->manager->getRepository(Car::class)->find($carId);
//         if (is_null($carToRemove)) {
//             throw new Error("No car with this id: $carId");
//         }
//         $this->manager->remove($carToRemove);
//         $this->manager->flush();

//         return null;
//     }
// }   
