<?php

namespace Eesn2\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Normas
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Eesn2\BackendBundle\Entity\NormasRepository")
 */
class Normas
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
     * @ORM\Column(name="norma_legal", type="string", length=255)
     */
    private $normaLegal;

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
     * Set normaLegal
     *
     * @param string $normaLegal
     * @return Normas_Legales
     */
    public function setNormaLegal($normaLegal)
    {
        $this->normaLegal = $normaLegal;
    
        return $this;
    }

    /**
     * Get normaLegal
     *
     * @return string 
     */
    public function getNormaLegal()
    {
        return $this->normaLegal;
    }
}
