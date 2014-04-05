<?php

namespace Eesn2\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Segundo_Trimestre
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Eesn2\BackendBundle\Entity\Segundo_TrimestreRepository")
 */
class Segundo_Trimestre
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
     * @var float
     *
     * @ORM\Column(name="nota_a", type="float")
     */
    private $notaA;

    /**
     * @var float
     *
     * @ORM\Column(name="nota_b", type="float")
     */
    private $notaB;

    /**
     * @var float
     *
     * @ORM\Column(name="nota_c", type="float")
     */
    private $notaC;

    /**
     * @var float
     *
     * @ORM\Column(name="nota_d", type="float")
     */
    private $notaD;

    /**
     * @var float
     *
     * @ORM\Column(name="promedio", type="float")
     */
    private $promedio;

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
     * Set notaA
     *
     * @param float $notaA
     * @return Segundo_Trimestre
     */
    public function setNotaA($notaA)
    {
        $this->notaA = $notaA;
    
        return $this;
    }

    /**
     * Get notaA
     *
     * @return float 
     */
    public function getNotaA()
    {
        return $this->notaA;
    }

    /**
     * Set notaB
     *
     * @param float $notaB
     * @return Segundo_Trimestre
     */
    public function setNotaB($notaB)
    {
        $this->notaB = $notaB;
    
        return $this;
    }

    /**
     * Get notaB
     *
     * @return float 
     */
    public function getNotaB()
    {
        return $this->notaB;
    }

    /**
     * Set notaC
     *
     * @param float $notaC
     * @return Segundo_Trimestre
     */
    public function setNotaC($notaC)
    {
        $this->notaC = $notaC;
    
        return $this;
    }

    /**
     * Get notaC
     *
     * @return float 
     */
    public function getNotaC()
    {
        return $this->notaC;
    }

    /**
     * Set notaD
     *
     * @param float $notaD
     * @return Segundo_Trimestre
     */
    public function setNotaD($notaD)
    {
        $this->notaD = $notaD;
    
        return $this;
    }

    /**
     * Get notaD
     *
     * @return float 
     */
    public function getNotaD()
    {
        return $this->notaD;
    }

    /**
     * Set promedio
     *
     * @param float $promedio
     * @return Segundo_Trimestre
     */
    public function setPromedio($promedio)
    {
        $this->promedio = $promedio;
    
        return $this;
    }

    /**
     * Get promedio
     *
     * @return float 
     */
    public function getPromedio()
    {
        return $this->promedio;
    }
}
