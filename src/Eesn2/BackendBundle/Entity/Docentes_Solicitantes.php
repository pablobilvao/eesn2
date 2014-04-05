<?php

namespace Eesn2\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Docentes_Solicitantes
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Eesn2\BackendBundle\Entity\Docentes_SolicitantesRepository")
 */
class Docentes_Solicitantes
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_desde", type="date")
     */
    private $fechaDesde;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_hasta", type="date")
     */
    private $fechaHasta;

    /**
     * @var integer
     *
     * @ORM\Column(name="cant_dias", type="integer")
     */
    private $cantDias;

    /**
     * @ORM\OneToOne(targetEntity="Normas")
     *
     * @ORM\JoinColumn(name="id_norma", referencedColumnName="id")
     */
    private $idNormaLegal;

    /**
     * @var string
     *
     * @ORM\Column(name="obligaciones", type="string", length=255)
     */
    private $obligaciones;

    /**
     * @var string
     *
     * @ORM\Column(name="inc", type="string", length=255)
     */
    private $inc;

    /**
     * @var string
     *
     * @ORM\Column(name="articulo", type="string", length=255)
     */
    private $articulo;


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
     * @return Docentes_Solicitantes
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
     * Set fechaDesde
     *
     * @param \DateTime $fechaDesde
     * @return Docentes_Solicitantes
     */
    public function setFechaDesde($fechaDesde)
    {
        $this->fechaDesde = $fechaDesde;
    
        return $this;
    }

    /**
     * Get fechaDesde
     *
     * @return \DateTime 
     */
    public function getFechaDesde()
    {
        return $this->fechaDesde;
    }

    /**
     * Set fechaHasta
     *
     * @param \DateTime $fechaHasta
     * @return Docentes_Solicitantes
     */
    public function setFechaHasta($fechaHasta)
    {
        $this->fechaHasta = $fechaHasta;
    
        return $this;
    }

    /**
     * Get fechaHasta
     *
     * @return \DateTime 
     */
    public function getFechaHasta()
    {
        return $this->fechaHasta;
    }

    /**
     * Set cantDias
     *
     * @param integer $cantDias
     * @return Docentes_Solicitantes
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
     * Set idNormaLegal
     *
     * @param integer $idNormaLegal
     * @return Docentes_Solicitantes
     */
    public function setIdNormaLegal($idNormaLegal)
    {
        $this->idNormaLegal = $idNormaLegal;
    
        return $this;
    }

    /**
     * Get idNormaLegal
     *
     * @return integer 
     */
    public function getIdNormaLegal()
    {
        return $this->idNormaLegal;
    }

    /**
     * Set obligaciones
     *
     * @param string $obligaciones
     * @return Docentes_Solicitantes
     */
    public function setObligaciones($obligaciones)
    {
        $this->obligaciones = $obligaciones;
    
        return $this;
    }

    /**
     * Get obligaciones
     *
     * @return string 
     */
    public function getObligaciones()
    {
        return $this->obligaciones;
    }

    /**
     * Set inc
     *
     * @param string $inc
     * @return Docentes_Solicitantes
     */
    public function setInc($inc)
    {
        $this->inc = $inc;
    
        return $this;
    }

    /**
     * Get inc
     *
     * @return string 
     */
    public function getInc()
    {
        return $this->inc;
    }

    /**
     * Set articulo
     *
     * @param string $articulo
     * @return Docentes_Solicitantes
     */
    public function setArticulo($articulo)
    {
        $this->articulo = $articulo;
    
        return $this;
    }

    /**
     * Get articulo
     *
     * @return string 
     */
    public function getArticulo()
    {
        return $this->articulo;
    }
}
