<?php
namespace App\Beer;

use Doctrine\ORM\EntityManager;

class BeerService
{
    public $em;

    public $entity = 'App\\Beer\\BeerEntity';

    /**
     * @return \Doctrine\ORM\EntityRepository
     */
    public function __invoke()
    {
        //return $this->em->getRepository($this->entity);
    }

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function hello()
    {
        return 'silex is sex!';
    }

    public function fetchAll()
    {
        return $this->em->getRepository($this->entity)->findAll();
    }
}