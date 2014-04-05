<?php

namespace Eesn2\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Promedios_Generales
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Eesn2\BackendBundle\Entity\Promedios_GeneralesRepository")
 */
class Promedios_Generales
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
     * @ORM\OneToOne(targetEntity="Alumnos")
     *
     * @ORM\JoinColumn(name="id_alumno", referencedColumnName="id")
     */
    private $idAlumno;

    /**
     * @var float
     *
     * @ORM\Column(name="promedio_primer_ano", type="float")
     */
    private $promedioPrimerAno;

    /**
     * @var float
     *
     * @ORM\Column(name="promedio_segundo_ano", type="float")
     */
    private $promedioSegundoAno;

    /**
     * @var float
     *
     * @ORM\Column(name="promedio_tercer_ano", type="float")
     */
    private $promedioTercerAno;

    /**
     * @var float
     *
     * @ORM\Column(name="promedio_cuarto_ano", type="float")
     */
    private $promedioCuartoAno;

    /**
     * @var float
     *
     * @ORM\Column(name="promedio_quinto_ano", type="float")
     */
    private $promedioQuintoAno;

    /**
     * @var float
     *
     * @ORM\Column(name="promedio_sexto_ano", type="float")
     */
    private $promedioSextoAno;

    /**
     * @var float
     *
     * @ORM\Column(name="promedio_general", type="float")
     */
    private $promedioGeneral;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="string", length=255)
     */
    private $observacion;


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
     * Set idAlumno
     *
     * @param integer $idAlumno
     * @return Promedios_Generales
     */
    public function setIdAlumno($idAlumno)
    {
        $this->idAlumno = $idAlumno;
    
        return $this;
    }

    /**
     * Get idAlumno
     *
     * @return integer 
     */
    public function getIdAlumno()
    {
        return $this->idAlumno;
    }

    /**
     * Set promedioPrimerAno
     *
     * @param float $promedioPrimerAno
     * @return Promedios_Generales
     */
    public function setPromedioPrimerAno($promedioPrimerAno)
    {
        $this->promedioPrimerAno = $promedioPrimerAno;
    
        return $this;
    }

    /**
     * Get promedioPrimerAno
     *
     * @return float 
     */
    public function getPromedioPrimerAno()
    {
        return $this->promedioPrimerAno;
    }

    /**
     * Set promedioSegundoAno
     *
     * @param float $promedioSegundoAno
     * @return Promedios_Generales
     */
    public function setPromedioSegundoAno($promedioSegundoAno)
    {
        $this->promedioSegundoAno = $promedioSegundoAno;
    
        return $this;
    }

    /**
     * Get promedioSegundoAno
     *
     * @return float 
     */
    public function getPromedioSegundoAno()
    {
        return $this->promedioSegundoAno;
    }

    /**
     * Set promedioTercerAno
     *
     * @param float $promedioTercerAno
     * @return Promedios_Generales
     */
    public function setPromedioTercerAno($promedioTercerAno)
    {
        $this->promedioTercerAno = $promedioTercerAno;
    
        return $this;
    }

    /**
     * Get promedioTercerAno
     *
     * @return float 
     */
    public function getPromedioTercerAno()
    {
        return $this->promedioTercerAno;
    }

    /**
     * Set promedioCuartoAno
     *
     * @param float $promedioCuartoAno
     * @return Promedios_Generales
     */
    public function setPromedioCuartoAno($promedioCuartoAno)
    {
        $this->promedioCuartoAno = $promedioCuartoAno;
    
        return $this;
    }

    /**
     * Get promedioCuartoAno
     *
     * @return float 
     */
    public function getPromedioCuartoAno()
    {
        return $this->promedioCuartoAno;
    }

    /**
     * Set promedioQuintoAno
     *
     * @param float $promedioQuintoAno
     * @return Promedios_Generales
     */
    public function setPromedioQuintoAno($promedioQuintoAno)
    {
        $this->promedioQuintoAno = $promedioQuintoAno;
    
        return $this;
    }

    /**
     * Get promedioQuintoAno
     *
     * @return float 
     */
    public function getPromedioQuintoAno()
    {
        return $this->promedioQuintoAno;
    }

    /**
     * Set promedioSextoAno
     *
     * @param float $promedioSextoAno
     * @return Promedios_Generales
     */
    public function setPromedioSextoAno($promedioSextoAno)
    {
        $this->promedioSextoAno = $promedioSextoAno;
    
        return $this;
    }

    /**
     * Get promedioSextoAno
     *
     * @return float 
     */
    public function getPromedioSextoAno()
    {
        return $this->promedioSextoAno;
    }

    /**
     * Set promedioGeneral
     *
     * @param float $promedioGeneral
     * @return Promedios_Generales
     */
    public function setPromedioGeneral($promedioGeneral)
    {
        $this->promedioGeneral = $promedioGeneral;
    
        return $this;
    }

    /**
     * Get promedioGeneral
     *
     * @return float 
     */
    public function getPromedioGeneral()
    {
        return $this->promedioGeneral;
    }

    /**
     * Set observacion
     *
     * @param string $observacion
     * @return Promedios_Generales
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;
    
        return $this;
    }

    /**
     * Get observacion
     *
     * @return string 
     */
    public function getObservacion()
    {
        return $this->observacion;
    }
}
