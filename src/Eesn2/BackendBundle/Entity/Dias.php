<?php

namespace Eesn2\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dias
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Dias
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="dia", type="string", length=2)
     */
    private $dia;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dia
     *
     * @param string $dia
     * @return Dias
     */
    public function setDia($dia)
    {
        $this->dia = $dia;
    
        return $this;
    }

    /**
     * Get dia
     *
     * @return string 
     */
    public function getDia()
    {
        return $this->dia;
    }
}
