<?php
namespace App\Beer;

use Doctrine\ORM\EntityManager;

class BeerService
{
    public $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function hello()
    {
        return 'silex is sex!';
    }
}