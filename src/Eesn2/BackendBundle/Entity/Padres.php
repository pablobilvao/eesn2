<?php

namespace Eesn2\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Padres
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Eesn2\BackendBundle\Entity\PadresRepository")
 */
class Padres
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
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=255)
     */
    private $apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="dni", type="string", length=8)
     */
    private $dni;
    /**
     * @var string
     *
     * @ORM\Column(name="nacionalidad", type="string", length=255)
     */
    private $nacionalidad;

    /**
     * @var boolean
     *
     * @ORM\Column(name="vive", type="boolean")
     */
    private $vive;

    /**
     * @var string
     *
     * @ORM\Column(name="profesion", type="string", length=255)
     */
    private $profesion;

    /**
     * @ORM\OneToOne(targetEntity="Alumnos")
     *
     * @ORM\JoinColumn(name="id_alumno", referencedColumnName="id")
     */
    private $idAlumno;

    /**
     * @ORM\OneToMany(targetEntity="Alumno_Matricula", mappedBy="Padres")
     */

    protected $alumno_matricula;

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
     * Set nombre
     *
     * @param string $nombre
     * @return Padres
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellido
     *
     * @param string $apellido
     * @return Padres
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    
        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set nacionalidad
     *
     * @param string $nacionalidad
     * @return Padres
     */
    public function setNacionalidad($nacionalidad)
    {
        $this->nacionalidad = $nacionalidad;
    
        return $this;
    }

    /**
     * Get nacionalidad
     *
     * @return string 
     */
    public function getNacionalidad()
    {
        return $this->nacionalidad;
    }

    /**
     * Set vive
     *
     * @param boolean $vive
     * @return Padres
     */
    public function setVive($vive)
    {
        $this->vive = $vive;
    
        return $this;
    }

    /**
     * Get vive
     *
     * @return boolean 
     */
    public function getVive()
    {
        return $this->vive;
    }

    /**
     * Set profesion
     *
     * @param string $profesion
     * @return Padres
     */
    public function setProfesion($profesion)
    {
        $this->profesion = $profesion;
    
        return $this;
    }

    /**
     * Get profesion
     *
     * @return string 
     */
    public function getProfesion()
    {
        return $this->profesion;
    }

    /**
     * Set idAlumno
     *
     * @param integer $idAlumno
     * @return Padres
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
}
