<?php

declare(strict_types=1);

namespace Booking\House\Infrastructure\Database\Doctrine;

use Booking\House\Domain\House;
use Booking\House\Domain\HouseRepositoryInterface;
use Booking\Shared\Domain\HouseId;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

final class DoctrineHouseRepository extends ServiceEntityRepository implements HouseRepositoryInterface
{
    
    public function create(House $house): House
    {
       $this->getEntityManager()->persist($house);
       $this->getEntityManager()->flush();
       
       return $house;
    }
    
    public function getById(HouseId $id): House
    {
    
    }
}