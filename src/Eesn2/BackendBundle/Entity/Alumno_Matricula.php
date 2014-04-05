<?php

namespace Eesn2\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alumno_Matricula
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Eesn2\BackendBundle\Entity\Alumno_MatriculaRepository")
 */
class Alumno_Matricula
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
     * @ORM\OneToOne(targetEntity="Padres")
     *
     * @ORM\JoinColumn(name="id_padre", referencedColumnName="id")
     */
    private $idPadre;

    /**
     * @ORM\OneToOne(targetEntity="Madres")
     *
     * @ORM\JoinColumn(name="id_madre", referencedColumnName="id")
     */
    private $idMadre;

    /**
     * @ORM\OneToOne(targetEntity="Tutores")
     *
     * @ORM\JoinColumn(name="id_tutor", referencedColumnName="id")
     */
    private $idTutor;

    /**
     * @var integer
     *
     * @ORM\Column(name="nro_matricula", type="integer")
     */
    private $nroMatricula;

    /**
     * @var boolean
     *
     * @ORM\Column(name="debe_materia", type="boolean")
     */
    private $debeMateria;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="lugar", type="string", length=255)
     */
    private $lugar;

    /**
     * @ORM\OneToOne(targetEntity="Cursos")
     *
     * @ORM\JoinColumn(name="id_curso", referencedColumnName="id")
     */
    private $idCurso;

    /**
     * @ORM\OneToOne(targetEntity="Divisiones")
     *
     * @ORM\JoinColumn(name="id_division", referencedColumnName="id")
     */
    private $idDivision;

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
     * @return Alumno_Matricula
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
     * Set idPadre
     *
     * @param integer $idPadre
     * @return Alumno_Matricula
     */
    public function setIdPadre($idPadre)
    {
        $this->idPadre = $idPadre;
    
        return $this;
    }

    /**
     * Get idPadre
     *
     * @return integer 
     */
    public function getIdPadre()
    {
        return $this->idPadre;
    }

    /**
     * Set idMadre
     *
     * @param integer $idMadre
     * @return Alumno_Matricula
     */
    public function setIdMadre($idMadre)
    {
        $this->idMadre = $idMadre;
    
        return $this;
    }

    /**
     * Get idMadre
     *
     * @return integer 
     */
    public function getIdMadre()
    {
        return $this->idMadre;
    }

    /**
     * Set idTutor
     *
     * @param integer $idTutor
     * @return Alumno_Matricula
     */
    public function setIdTutor($idTutor)
    {
        $this->idTutor = $idTutor;
    
        return $this;
    }

    /**
     * Get idTutor
     *
     * @return integer 
     */
    public function getIdTutor()
    {
        return $this->idTutor;
    }

    /**
     * Set nroMatricula
     *
     * @param integer $nroMatricula
     * @return Alumno_Matricula
     */
    public function setNroMatricula($nroMatricula)
    {
        $this->nroMatricula = $nroMatricula;
    
        return $this;
    }

    /**
     * Get nroMatricula
     *
     * @return integer 
     */
    public function getNroMatricula()
    {
        return $this->nroMatricula;
    }

    /**
     * Set debeMateria
     *
     * @param boolean $debeMateria
     * @return Alumno_Matricula
     */
    public function setDebeMateria($debeMateria)
    {
        $this->debeMateria = $debeMateria;
    
        return $this;
    }

    /**
     * Get debeMateria
     *
     * @return boolean 
     */
    public function getDebeMateria()
    {
        return $this->debeMateria;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Alumno_Matricula
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    
        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set lugar
     *
     * @param string $lugar
     * @return Alumno_Matricula
     */
    public function setLugar($lugar)
    {
        $this->lugar = $lugar;
    
        return $this;
    }

    /**
     * Get lugar
     *
     * @return string 
     */
    public function getLugar()
    {
        return $this->lugar;
    }

    /**
     * Set idCurso
     *
     * @param integer $idCurso
     * @return Alumno_Matricula
     */
    public function setIdCurso($idCurso)
    {
        $this->idCurso = $idCurso;
    
        return $this;
    }

    /**
     * Get idCurso
     *
     * @return integer 
     */
    public function getIdCurso()
    {
        return $this->idCurso;
    }

    /**
     * Set idDivision
     *
     * @param integer $idDivision
     * @return Alumno_Matricula
     */
    public function setIdDivision($idDivision)
    {
        $this->idDivision = $idDivision;
    
        return $this;
    }

    /**
     * Get idDivision
     *
     * @return integer 
     */
    public function getIdDivision()
    {
        return $this->idDivision;
    }
}
