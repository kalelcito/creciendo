<?php
namespace CoreBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 */
class Minutas
{
    /**
     * @ORM\Id
     * @ORM\Column(type="bigint", length=20)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="bigint", length=20, nullable=true)
     */
    private $id_cliente;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $fecha;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $tema;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $empresa;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $duracion;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $asistentes;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $puntos;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $acuerdos;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $fechasiguiente;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     * @Gedmo\Timestampable(on="create", field="created_at")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     * @Gedmo\Timestampable(on="update", field="updated_at")
     */
    private $updated_at;

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
     * Set idCliente
     *
     * @param integer $idCliente
     *
     * @return Minutas
     */
    public function setIdCliente($idCliente)
    {
        $this->id_cliente = $idCliente;

        return $this;
    }

    /**
     * Get idCliente
     *
     * @return integer
     */
    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Minutas
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
     * Set tema
     *
     * @param string $tema
     *
     * @return Minutas
     */
    public function setTema($tema)
    {
        $this->tema = $tema;

        return $this;
    }

    /**
     * Get tema
     *
     * @return string
     */
    public function getTema()
    {
        return $this->tema;
    }

    /**
     * Set empresa
     *
     * @param string $empresa
     *
     * @return Minutas
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
     * Set duracion
     *
     * @param string $duracion
     *
     * @return Minutas
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;

        return $this;
    }

    /**
     * Get duracion
     *
     * @return string
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * Set asistentes
     *
     * @param string $asistentes
     *
     * @return Minutas
     */
    public function setAsistentes($asistentes)
    {
        $this->asistentes = $asistentes;

        return $this;
    }

    /**
     * Get asistentes
     *
     * @return string
     */
    public function getAsistentes()
    {
        return $this->asistentes;
    }

    /**
     * Set puntos
     *
     * @param string $puntos
     *
     * @return Minutas
     */
    public function setPuntos($puntos)
    {
        $this->puntos = $puntos;

        return $this;
    }

    /**
     * Get puntos
     *
     * @return string
     */
    public function getPuntos()
    {
        return $this->puntos;
    }

    /**
     * Set acuerdos
     *
     * @param string $acuerdos
     *
     * @return Minutas
     */
    public function setAcuerdos($acuerdos)
    {
        $this->acuerdos = $acuerdos;

        return $this;
    }

    /**
     * Get acuerdos
     *
     * @return string
     */
    public function getAcuerdos()
    {
        return $this->acuerdos;
    }

    /**
     * Set fechasiguiente
     *
     * @param \DateTime $fechasiguiente
     *
     * @return Minutas
     */
    public function setFechasiguiente($fechasiguiente)
    {
        $this->fechasiguiente = $fechasiguiente;

        return $this;
    }

    /**
     * Get fechasiguiente
     *
     * @return \DateTime
     */
    public function getFechasiguiente()
    {
        return $this->fechasiguiente;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Minutas
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
     * @return Minutas
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
}
