<?php
namespace CoreBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 */
class Respuestas
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50000, nullable=true)
     */
    private $respuestajson;

    /**
     * @ORM\Column(type="string", length=240, nullable=true)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $departamento;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $codigo;

    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default":0})
     */
    private $completado;

    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default":0})
     */
    private $iniciado;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $empresa;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $sucursal;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $antiguedad;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="create", field="created_at")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="update", field="updated_at")
     */
    private $updated_at;

    /**
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\Encuestas", inversedBy="respuestas")
     * @ORM\JoinColumn(name="id_encuesta", referencedColumnName="id")
     */
    private $encuestas;

    /**
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\Clientes", inversedBy="respuestas")
     * @ORM\JoinColumn(name="id_cliente", referencedColumnName="id")
     */
    private $clientes;

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
     * Set respuestajson
     *
     * @param string $respuestajson
     *
     * @return Respuestas
     */
    public function setRespuestajson($respuestajson)
    {
        $this->respuestajson = $respuestajson;

        return $this;
    }

    /**
     * Get respuestajson
     *
     * @return string
     */
    public function getRespuestajson()
    {
        return $this->respuestajson;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Respuestas
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Respuestas
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set encuestas
     *
     * @param \CoreBundle\Entity\Encuestas $encuestas
     *
     * @return Respuestas
     */
    public function setEncuestas(\CoreBundle\Entity\Encuestas $encuestas = null)
    {
        $this->encuestas = $encuestas;

        return $this;
    }

    /**
     * Get encuestas
     *
     * @return \CoreBundle\Entity\Encuestas
     */
    public function getEncuestas()
    {
        return $this->encuestas;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Respuestas
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
     * Set departamento
     *
     * @param string $departamento
     *
     * @return Respuestas
     */
    public function setDepartamento($departamento)
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * Get departamento
     *
     * @return string
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     *
     * @return Respuestas
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set completado
     *
     * @param boolean $completado
     *
     * @return Respuestas
     */
    public function setCompletado($completado)
    {
        $this->completado = $completado;

        return $this;
    }

    /**
     * Get completado
     *
     * @return boolean
     */
    public function getCompletado()
    {
        return $this->completado;
    }

    /**
     * Set iniciado
     *
     * @param boolean $iniciado
     *
     * @return Respuestas
     */
    public function setIniciado($iniciado)
    {
        $this->iniciado = $iniciado;

        return $this;
    }

    /**
     * Get iniciado
     *
     * @return boolean
     */
    public function getIniciado()
    {
        return $this->iniciado;
    }

    /**
     * Set clientes
     *
     * @param \CoreBundle\Entity\Clientes $clientes
     *
     * @return Respuestas
     */
    public function setClientes(\CoreBundle\Entity\Clientes $clientes = null)
    {
        $this->clientes = $clientes;

        return $this;
    }

    /**
     * Get clientes
     *
     * @return \CoreBundle\Entity\Clientes
     */
    public function getClientes()
    {
        return $this->clientes;
    }

    /**
     * Set empresa
     *
     * @param string $empresa
     *
     * @return Respuestas
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get empresa
     *
     * @return string
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set sucursal
     *
     * @param string $sucursal
     *
     * @return Respuestas
     */
    public function setSucursal($sucursal)
    {
        $this->sucursal = $sucursal;

        return $this;
    }

    /**
     * Get sucursal
     *
     * @return string
     */
    public function getSucursal()
    {
        return $this->sucursal;
    }

    /**
     * Set antiguedad
     *
     * @param string $antiguedad
     *
     * @return Respuestas
     */
    public function setAntiguedad($antiguedad)
    {
        $this->antiguedad = $antiguedad;

        return $this;
    }

    /**
     * Get antiguedad
     *
     * @return string
     */
    public function getAntiguedad()
    {
        return $this->antiguedad;
    }
}
