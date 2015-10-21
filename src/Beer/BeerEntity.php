<?php

namespace App\Beer;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class BeerEntity
 * @package App\Beer
 *
 * @ORM\Entity
 * @ORM\Table(name = "testing")
 */
class BeerEntity
{
    /**
     * @ORM\Id @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


}