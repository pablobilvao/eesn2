<?php

namespace Eesn2\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Solicitudes_Examenes
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Eesn2\BackendBundle\Entity\Solicitudes_ExamenesRepository")
 */
class Solicitudes_Examenes
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
     * @ORM\OneToOne(targetEntity="TiposExamenes")
     *
     * @ORM\JoinColumn(name="id_tipo_examen", referencedColumnName="id")
     */
    private $idTipoExamen;

    /**
     * @ORM\OneToOne(targetEntity="TiposEstudiantes")
     *
     * @ORM\JoinColumn(name="id_tipo_estudiante", referencedColumnName="id")
     */
    private $idTipoEstudiante;

    /**
     * @ORM\OneToOne(targetEntity="Tutores")
     *
     * @ORM\JoinColumn(name="id_tutor", referencedColumnName="id")
     */
    private $idTutor;

    /**
     * @ORM\OneToOne(targetEntity="Turnos")
     *
     * @ORM\JoinColumn(name="id_turno", referencedColumnName="id")
     */
    private $idTurno;

    /**
     * @ORM\OneToOne(targetEntity="Escuelas")
     *
     * @ORM\JoinColumn(name="id_escuela", referencedColumnName="id")
     */
    private $idEscuela;

    /**
     * @var boolean
     *
     * @ORM\Column(name="autorizado", type="boolean")
     */
    private $autorizado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=255)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="autoridad", type="string", length=255)
     */
    private $autoridad;

    /**
     * @var string
     *
     * @ORM\Column(name="domicilio_estudiante", type="string", length=255)
     */
    private $domicilioEstudiante;

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
     * Set idTipoExamen
     *
     * @param integer $idTipoExamen
     * @return Solicitudes_Examenes
     */
    public function setIdTipoExamen($idTipoExamen)
    {
        $this->idTipoExamen = $idTipoExamen;
    
        return $this;
    }

    /**
     * Get idTipoExamen
     *
     * @return integer 
     */
    public function getIdTipoExamen()
    {
        return $this->idTipoExamen;
    }

    /**
     * Set idTipoEstudiante
     *
     * @param integer $idTipoEstudiante
     * @return Solicitudes_Examenes
     */
    public function setIdTipoEstudiante($idTipoEstudiante)
    {
        $this->idTipoEstudiante = $idTipoEstudiante;
    
        return $this;
    }

    /**
     * Get idTipoEstudiante
     *
     * @return integer 
     */
    public function getIdTipoEstudiante()
    {
        return $this->idTipoEstudiante;
    }

    /**
     * Set idTutor
     *
     * @param integer $idTutor
     * @return Solicitudes_Examenes
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
     * Set idTurno
     *
     * @param integer $idTurno
     * @return Solicitudes_Examenes
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
     * Set idEscuela
     *
     * @param integer $idEscuela
     * @return Solicitudes_Examenes
     */
    public function setIdEscuela($idEscuela)
    {
        $this->idEscuela = $idEscuela;
    
        return $this;
    }

    /**
     * Get idEscuela
     *
     * @return integer 
     */
    public function getIdEscuela()
    {
        return $this->idEscuela;
    }

    /**
     * Set autorizado
     *
     * @param boolean $autorizado
     * @return Solicitudes_Examenes
     */
    public function setAutorizado($autorizado)
    {
        $this->autorizado = $autorizado;
    
        return $this;
    }

    /**
     * Get autorizado
     *
     * @return boolean 
     */
    public function getAutorizado()
    {
        return $this->autorizado;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Solicitudes_Examenes
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
     * Set telefono
     *
     * @param string $telefono
     * @return Solicitudes_Examenes
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    
        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set autoridad
     *
     * @param string $autoridad
     * @return Solicitudes_Examenes
     */
    public function setAutoridad($autoridad)
    {
        $this->autoridad = $autoridad;
    
        return $this;
    }

    /**
     * Get autoridad
     *
     * @return string 
     */
    public function getAutoridad()
    {
        return $this->autoridad;
    }

    /**
     * Set domicilioEstudiante
     *
     * @param string $domicilioEstudiante
     * @return Solicitudes_Examenes
     */
    public function setDomicilioEstudiante($domicilioEstudiante)
    {
        $this->domicilioEstudiante = $domicilioEstudiante;
    
        return $this;
    }

    /**
     * Get domicilioEstudiante
     *
     * @return string 
     */
    public function getDomicilioEstudiante()
    {
        return $this->domicilioEstudiante;
    }
}
