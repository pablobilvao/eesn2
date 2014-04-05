<?php

namespace Eesn2\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alumnos_Regulares
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Eesn2\BackendBundle\Entity\Alumnos_RegularesRepository")
 */
class Alumnos_Regulares
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
     * @ORM\OneToOne(targetEntity="Primer_Trimestre")
     *
     * @ORM\JoinColumn(name="id_primer_trimestre", referencedColumnName="id")
     */
    private $idPrimerTrimestre;

    /**
     * @ORM\OneToOne(targetEntity="Segundo_Trimestre")
     *
     * @ORM\JoinColumn(name="id_segundo_trimestra", referencedColumnName="id")
     */
    private $idSegundoTrimestra;

    /**
     * @ORM\OneToOne(targetEntity="Tercer_Trimestre")
     *
     * @ORM\JoinColumn(name="id_tercer_trimestre", referencedColumnName="id")
     */
    private $idTercerTrimestre;

    /**
     * @var float
     *
     * @ORM\Column(name="calificacion_final", type="float")
     */
    private $calificacionFinal;

    /**
     * @var float
     *
     * @ORM\Column(name="nota_diciembre", type="float")
     */
    private $notaDiciembre;

    /**
     * @var float
     *
     * @ORM\Column(name="nota_febrero", type="float")
     */
    private $notaFebrero;

    /**
     * @var float
     *
     * @ORM\Column(name="calificacion_definitiva", type="float")
     */
    private $calificacionDefinitiva;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="string", length=255)
     */
    private $observaciones;

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
     * @ORM\OneToOne(targetEntity="Asignaturas")
     *
     * @ORM\JoinColumn(name="id_asignatura", referencedColumnName="id")
     */
    private $idAsignatura;

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
     * Set idAlumnoMatricula
     *
     * @param integer $idAlumnoMatricula
     * @return Alumnos_Regulares
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
     * Set idPrimerTrimestre
     *
     * @param integer $idPrimerTrimestre
     * @return Alumnos_Regulares
     */
    public function setIdPrimerTrimestre($idPrimerTrimestre)
    {
        $this->idPrimerTrimestre = $idPrimerTrimestre;
    
        return $this;
    }

    /**
     * Get idPrimerTrimestre
     *
     * @return integer 
     */
    public function getIdPrimerTrimestre()
    {
        return $this->idPrimerTrimestre;
    }

    /**
     * Set idSegundoTrimestra
     *
     * @param integer $idSegundoTrimestra
     * @return Alumnos_Regulares
     */
    public function setIdSegundoTrimestra($idSegundoTrimestra)
    {
        $this->idSegundoTrimestra = $idSegundoTrimestra;
    
        return $this;
    }

    /**
     * Get idSegundoTrimestra
     *
     * @return integer 
     */
    public function getIdSegundoTrimestra()
    {
        return $this->idSegundoTrimestra;
    }

    /**
     * Set idTercerTrimestre
     *
     * @param integer $idTercerTrimestre
     * @return Alumnos_Regulares
     */
    public function setIdTercerTrimestre($idTercerTrimestre)
    {
        $this->idTercerTrimestre = $idTercerTrimestre;
    
        return $this;
    }

    /**
     * Get idTercerTrimestre
     *
     * @return integer 
     */
    public function getIdTercerTrimestre()
    {
        return $this->idTercerTrimestre;
    }

    /**
     * Set calificacionFinal
     *
     * @param float $calificacionFinal
     * @return Alumnos_Regulares
     */
    public function setCalificacionFinal($calificacionFinal)
    {
        $this->calificacionFinal = $calificacionFinal;
    
        return $this;
    }

    /**
     * Get calificacionFinal
     *
     * @return float 
     */
    public function getCalificacionFinal()
    {
        return $this->calificacionFinal;
    }

    /**
     * Set notaDiciembre
     *
     * @param float $notaDiciembre
     * @return Alumnos_Regulares
     */
    public function setNotaDiciembre($notaDiciembre)
    {
        $this->notaDiciembre = $notaDiciembre;
    
        return $this;
    }

    /**
     * Get notaDiciembre
     *
     * @return float 
     */
    public function getNotaDiciembre()
    {
        return $this->notaDiciembre;
    }

    /**
     * Set notaFebrero
     *
     * @param float $notaFebrero
     * @return Alumnos_Regulares
     */
    public function setNotaFebrero($notaFebrero)
    {
        $this->notaFebrero = $notaFebrero;
    
        return $this;
    }

    /**
     * Get notaFebrero
     *
     * @return float 
     */
    public function getNotaFebrero()
    {
        return $this->notaFebrero;
    }

    /**
     * Set calificacionDefinitiva
     *
     * @param float $calificacionDefinitiva
     * @return Alumnos_Regulares
     */
    public function setCalificacionDefinitiva($calificacionDefinitiva)
    {
        $this->calificacionDefinitiva = $calificacionDefinitiva;
    
        return $this;
    }

    /**
     * Get calificacionDefinitiva
     *
     * @return float 
     */
    public function getCalificacionDefinitiva()
    {
        return $this->calificacionDefinitiva;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return Alumnos_Regulares
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    
        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set idCurso
     *
     * @param integer $idCurso
     * @return Alumnos_Regulares
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
     * @return Alumnos_Regulares
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
     * Set idAsignatura
     *
     * @param integer $idAsignatura
     * @return Alumnos_Regulares
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
     * Set idDocente
     *
     * @param integer $idDocente
     * @return Alumnos_Regulares
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
