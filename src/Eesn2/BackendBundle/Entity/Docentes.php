<?php

namespace Eesn2\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Docentes
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Eesn2\BackendBundle\Entity\DocentesRepository")
 */
class Docentes
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
     * @ORM\Column(name="tipo_doc", type="string", length=255)
     */
    private $tipoDoc;

    /**
     * @var string
     *
     * @ORM\Column(name="nro_doc", type="string", length=8)
     */
    private $nroDoc;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo", type="string", length=255)
     */
    private $sexo;

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
     * @return Docentes
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
     * @return Docentes
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
     * Set tipoDoc
     *
     * @param string $tipoDoc
     * @return Docentes
     */
    public function setTipoDoc($tipoDoc)
    {
        $this->tipoDoc = $tipoDoc;
    
        return $this;
    }

    /**
     * Get tipoDoc
     *
     * @return string 
     */
    public function getTipoDoc()
    {
        return $this->tipoDoc;
    }

    /**
     * Set nroDoc
     *
     * @param integer $nroDoc
     * @return Docentes
     */
    public function setNroDoc($nroDoc)
    {
        $this->nroDoc = $nroDoc;
    
        return $this;
    }

    /**
     * Get nroDoc
     *
     * @return integer 
     */
    public function getNroDoc()
    {
        return $this->nroDoc;
    }

    /**
     * Set sexo
     *
     * @param string $sexo
     * @return Docentes
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    
        return $this;
    }

    /**
     * Get sexo
     *
     * @return string 
     */
    public function getSexo()
    {
        return $this->sexo;
    }
}
