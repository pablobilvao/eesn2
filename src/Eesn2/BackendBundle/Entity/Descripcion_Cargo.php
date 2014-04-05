<?php

namespace Eesn2\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Descripcion_Cargo
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Eesn2\BackendBundle\Entity\Descripcion_CargoRepository")
 */
class Descripcion_Cargo
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
     * @ORM\OneToOne(targetEntity="Cargos")
     *
     * @ORM\JoinColumn(name="id_cargo", referencedColumnName="id")
     */
    private $idCargo;

    /**
     * @ORM\OneToOne(targetEntity="Asignaturas")
     *
     * @ORM\JoinColumn(name="id_asignatura", referencedColumnName="id")
     */
    private $idAsignatura;

    /**
     * @ORM\OneToOne(targetEntity="Turnos")
     *
     * @ORM\JoinColumn(name="id_turno", referencedColumnName="id")
     */
    private $idTurno;

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
     * @ORM\OneToOne(targetEntity="Sit_Revista")
     *
     * @ORM\JoinColumn(name="id_sit_revista", referencedColumnName="id")
     */
    private $idSitRevista;

    /**
     * @ORM\OneToOne(targetEntity="Docentes")
     *
     * @ORM\JoinColumn(name="id_docente", referencedColumnName="id")
     */
    private $idDocente;


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
     * Set idCargo
     *
     * @param integer $idCargo
     * @return Descripcion_Cargo
     */
    public function setIdCargo($idCargo)
    {
        $this->idCargo = $idCargo;
    
        return $this;
    }

    /**
     * Get idCargo
     *
     * @return integer 
     */
    public function getIdCargo()
    {
        return $this->idCargo;
    }

    /**
     * Set idAsignatura
     *
     * @param integer $idAsignatura
     * @return Descripcion_Cargo
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
     * Set idTurno
     *
     * @param integer $idTurno
     * @return Descripcion_Cargo
     */
    public function setIdTurno($idTurno)
    {
        $this->idTurno = $idTurno;
    
        return $this;
    }

    /**
     * Get idTurno
     *
     * @return integer 
     */
    public function getIdTurno()
    {
        return $this->idTurno;
    }

    /**
     * Set idCurso
     *
     * @param integer $idCurso
     * @return Descripcion_Cargo
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
     * @return Descripcion_Cargo
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

    /**
     * Set idSitRevista
     *
     * @param integer $idSitRevista
     * @return Descripcion_Cargo
     */
    public function setIdSitRevista($idSitRevista)
    {
        $this->idSitRevista = $idSitRevista;
    
        return $this;
    }

    /**
     * Get idSitRevista
     *
     * @return integer 
     */
    public function getIdSitRevista()
    {
        return $this->idSitRevista;
    }

    /**
     * Set idDocente
     *
     * @param integer $idDocente
     * @return Descripcion_Cargo
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
}
