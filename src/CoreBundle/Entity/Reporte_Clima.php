<?php
namespace CoreBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 */
class Reporte_Clima
{
    /**
     * @ORM\Id
     * @ORM\Column(type="bigint", length=12)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=50000, nullable=true)
     */
    private $contenido;

    /**
     * @ORM\Column(type="smallint", length=1, nullable=true, options={"default":0})
     */
    private $estatus;

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
     * @ORM\OneToMany(targetEntity="CoreBundle\Entity\Archivos_Clima", mappedBy="reporteClima")
     */
    private $archivosClima;

    /**
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\Clientes", inversedBy="reporteClima")
     * @ORM\JoinColumn(name="id_cliente", referencedColumnName="id")
     */
    private $clientes;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->archivosClima = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     *
     * @return Reporte_Clima
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
     * Set contenido
     *
     * @param string $contenido
     *
     * @return Reporte_Clima
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;

        return $this;
    }

    /**
     * Get contenido
     *
     * @return string
     */
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * Set estatus
     *
     * @param integer $estatus
     *
     * @return Reporte_Clima
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;

        return $this;
    }

    /**
     * Get estatus
     *
     * @return integer
     */
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Reporte_Clima
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
     * @return Reporte_Clima
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
     * Add archivosClima
     *
     * @param \CoreBundle\Entity\Archivos_Clima $archivosClima
     *
     * @return Reporte_Clima
     */
    public function addArchivosClima(\CoreBundle\Entity\Archivos_Clima $archivosClima)
    {
        $this->archivosClima[] = $archivosClima;

        return $this;
    }

    /**
     * Remove archivosClima
     *
     * @param \CoreBundle\Entity\Archivos_Clima $archivosClima
     */
    public function removeArchivosClima(\CoreBundle\Entity\Archivos_Clima $archivosClima)
    {
        $this->archivosClima->removeElement($archivosClima);
    }

    /**
     * Get archivosClima
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArchivosClima()
    {
        return $this->archivosClima;
    }

    /**
     * Set clientes
     *
     * @param \CoreBundle\Entity\Clientes $clientes
     *
     * @return Reporte_Clima
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
}
