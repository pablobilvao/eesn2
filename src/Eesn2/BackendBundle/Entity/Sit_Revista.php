<?php

namespace Eesn2\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sit_Revista
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Eesn2\BackendBundle\Entity\Sit_RevistaRepository")
 */
class Sit_Revista
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
     * @ORM\OneToOne(targetEntity="Docentes")
     *
     * @ORM\JoinColumn(name="id_docente", referencedColumnName="id")
     */
    private $idDocente;

    /**
     * @var integer
     *
     * @ORM\Column(name="antiguedad", type="integer")
     */
    private $antiguedad;

    /**
     * @var string
     *
     * @ORM\Column(name="situacion_revista", type="string", length=255)
     */
    private $situacionRevista;

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
     * Set idDocente
     *
     * @param integer $idDocente
     * @return Sit_Revista
     */
    public function setIdDocente($idDocente)
    {
        $this->idDocente = $idDocente;
    
        return $this;
    }

    /**
     * Get idDocente
     *
     * @return integer 
     */
    public function getIdDocente()
    {
        return $this->idDocente;
    }

    /**
     * Set antiguedad
     *
     * @param integer $antiguedad
     * @return Sit_Revista
     */
    public function setAntiguedad($antiguedad)
    {
        $this->antiguedad = $antiguedad;
    
        return $this;
    }

    /**
     * Get antiguedad
     *
     * @return integer 
     */
    public function getAntiguedad()
    {
        return $this->antiguedad;
    }

    /**
     * Set situacionRevista
     *
     * @param string $situacionRevista
     * @return Sit_Revista
     */
    public function setSituacionRevista($situacionRevista)
    {
        $this->situacionRevista = $situacionRevista;
    
        return $this;
    }

    /**
     * Get situacionRevista
     *
     * @return string 
     */
    public function getSituacionRevista()
    {
        return $this->situacionRevista;
    }
}
