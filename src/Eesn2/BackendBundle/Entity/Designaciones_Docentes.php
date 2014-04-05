<?php

namespace Eesn2\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Designaciones_Docentes
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Eesn2\BackendBundle\Entity\Designaciones_DocentesRepository")
 */
class Designaciones_Docentes
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
     * @ORM\Column(name="cant_dias", type="integer")
     */
    private $cantDias;

    /**
     * @var string
     *
     * @ORM\Column(name="nro_acta_adj", type="string", length=255)
     */
    private $nroActaAdj;

    /**
     * @var float
     *
     * @ORM\Column(name="puntaje", type="float")
     */
    private $puntaje;


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
     * @return Designaciones_Docentes
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
     * Set cantDias
     *
     * @param integer $cantDias
     * @return Designaciones_Docentes
     */
    public function setCantDias($cantDias)
    {
        $this->cantDias = $cantDias;
    
        return $this;
    }

    /**
     * Get cantDias
     *
     * @return integer 
     */
    public function getCantDias()
    {
        return $this->cantDias;
    }

    /**
     * Set nroActaAdj
     *
     * @param string $nroActaAdj
     * @return Designaciones_Docentes
     */
    public function setNroActaAdj($nroActaAdj)
    {
        $this->nroActaAdj = $nroActaAdj;
    
        return $this;
    }

    /**
     * Get nroActaAdj
     *
     * @return string 
     */
    public function getNroActaAdj()
    {
        return $this->nroActaAdj;
    }

    /**
     * Set puntaje
     *
     * @param float $puntaje
     * @return Designaciones_Docentes
     */
    public function setPuntaje($puntaje)
    {
        $this->puntaje = $puntaje;
    
        return $this;
    }

    /**
     * Get puntaje
     *
     * @return float 
     */
    public function getPuntaje()
    {
        return $this->puntaje;
    }
}
