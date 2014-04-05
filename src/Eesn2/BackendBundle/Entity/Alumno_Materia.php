<?php

namespace Eesn2\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alumno_Materia
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Eesn2\BackendBundle\Entity\Alumno_MateriaRepository")
 */
class Alumno_Materia
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
     * @ORM\OneToOne(targetEntity="Alumno_Matricula")
     *
     * @ORM\JoinColumn(name="id_alumno_matricula", referencedColumnName="id")
     */
    private $idAlumnoMatricula;

    /**
     * @ORM\OneToOne(targetEntity="Asignaturas")
     *
     * @ORM\JoinColumn(name="id_asignatura", referencedColumnName="id")
     */
    private $idAsignatura;

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
     * Set idAlumnoMatricula
     *
     * @param integer $idAlumnoMatricula
     * @return Alumno_Materia
     */
    public function setIdAlumnoMatricula($idAlumnoMatricula)
    {
        $this->idAlumnoMatricula = $idAlumnoMatricula;
    
        return $this;
    }

    /**
     * Get idAlumnoMatricula
     *
     * @return integer 
     */
    public function getIdAlumnoMatricula()
    {
        return $this->idAlumnoMatricula;
    }

    /**
     * Set idAsignatura
     *
     * @param integer $idAsignatura
     * @return Alumno_Asignatura
     */
    public function setIdAsignatura($idAsignatura)
    {
        $this->idAsignatura = $idAsignatura;
    
        return $this;
    }

    /**
     * Get idAsignatura
     *
     * @return integer 
     */
    public function getIdAsignatura()
    {
        return $this->idAsignatura;
    }

    /**
     * Set idCurso
     *
     * @param integer $idCurso
     * @return Alumno_Materia
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
     * @return Alumno_Materia
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
