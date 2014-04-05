<?php

namespace Eesn2\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acta_Volante_Examen
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Eesn2\BackendBundle\Entity\Acta_Volante_ExamenRepository")
 */
class Acta_Volante_Examen
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
     * @ORM\Column(name="nota_examen_escrito", type="float")
     */
    private $notaExamenEscrito;

    /**
     * @var float
     *
     * @ORM\Column(name="nota_examen_oral", type="float")
     */
    private $notaExamenOral;

    /**
     * @var float
     *
     * @ORM\Column(name="promedio", type="float")
     */
    private $promedio;

    /**
     * @ORM\OneToOne(targetEntity="Alumno_Matricula")
     *
     * @ORM\JoinColumn(name="id_alumno_matricula", referencedColumnName="id")
     */
    private $idAlumnoMatricula;

    /**
     * @ORM\OneToOne(targetEntity="Solicitudes_Examenes")
     *
     * @ORM\JoinColumn(name="id_solicitud_examen", referencedColumnName="id")
     */
    private $idSolicitudExamen;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="asignatura", type="string", length=255)
     */
    private $asignatura;

    /**
     * @ORM\OneToOne(targetEntity="Alumnos")
     *
     * @ORM\JoinColumn(name="id_alumno", referencedColumnName="id")
     */
    private $idAlumno;


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
     * Set notaExamenEscrito
     *
     * @param float $notaExamenEscrito
     * @return Acta_Volante_Examen
     */
    public function setNotaExamenEscrito($notaExamenEscrito)
    {
        $this->notaExamenEscrito = $notaExamenEscrito;
    
        return $this;
    }

    /**
     * Get notaExamenEscrito
     *
     * @return float 
     */
    public function getNotaExamenEscrito()
    {
        return $this->notaExamenEscrito;
    }

    /**
     * Set notaExamenOral
     *
     * @param float $notaExamenOral
     * @return Acta_Volante_Examen
     */
    public function setNotaExamenOral($notaExamenOral)
    {
        $this->notaExamenOral = $notaExamenOral;
    
        return $this;
    }

    /**
     * Get notaExamenOral
     *
     * @return float 
     */
    public function getNotaExamenOral()
    {
        return $this->notaExamenOral;
    }

    /**
     * Set promedio
     *
     * @param float $promedio
     * @return Acta_Volante_Examen
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

    /**
     * Set idAlumnoMatricula
     *
     * @param integer $idAlumnoMatricula
     * @return Acta_Volante_Examen
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
     * Set idSolicitudExamen
     *
     * @param integer $idSolicitudExamen
     * @return Acta_Volante_Examen
     */
    public function setIdSolicitudExamen($idSolicitudExamen)
    {
        $this->idSolicitudExamen = $idSolicitudExamen;
    
        return $this;
    }

    /**
     * Get idSolicitudExamen
     *
     * @return integer 
     */
    public function getIdSolicitudExamen()
    {
        return $this->idSolicitudExamen;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Acta_Volante_Examen
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
     * Set asignatura
     *
     * @param string $asignatura
     * @return Acta_Volante_Examen
     */
    public function setAsignatura($asignatura)
    {
        $this->asignatura = $asignatura;
    
        return $this;
    }

    /**
     * Get asignatura
     *
     * @return string 
     */
    public function getAsignatura()
    {
        return $this->asignatura;
    }

    /**
     * Set idAlumno
     *
     * @param integer $idAlumno
     * @return Acta_Volante_Examen
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
