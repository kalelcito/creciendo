<?php
namespace CoreBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Reportes
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=240, nullable=true)
     * @Assert\File(mimeTypes={ "application/pdf" })
     */
    private $archivo;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     * @Gedmo\Timestampable(on="update", field="updated_at")
     */
    private $updated_at;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     * @Gedmo\Timestampable(on="create", field="created_at")
     */
    private $created_at;

    /**
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\Clientes", inversedBy="reportes")
     * @ORM\JoinColumn(name="id_cliente", referencedColumnName="id")
     */
    private $clientes;

    /**
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\Seccion_Contenidos", inversedBy="reportes")
     * @ORM\JoinColumn(name="seccion_contenidos_id", referencedColumnName="id")
     */
    private $seccionContenidos;

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
     * @return Reportes
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
     * Set archivo
     *
     * @param string $archivo
     *
     * @return Reportes
     */
    public function setArchivo($archivo)
    {
        $this->archivo = $archivo;

        return $this;
    }

    /**
     * Get archivo
     *
     * @return string
     */
    public function getArchivo()
    {
        return $this->archivo;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Reportes
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Reportes
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
     * Set clientes
     *
     * @param \CoreBundle\Entity\Clientes $clientes
     *
     * @return Reportes
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
     * Set seccionContenidos
     *
     * @param \CoreBundle\Entity\Seccion_Contenidos $seccionContenidos
     *
     * @return Reportes
     */
    public function setSeccionContenidos(\CoreBundle\Entity\Seccion_Contenidos $seccionContenidos = null)
    {
        $this->seccionContenidos = $seccionContenidos;

        return $this;
    }

    /**
     * Get seccionContenidos
     *
     * @return \CoreBundle\Entity\Seccion_Contenidos
     */
    public function getSeccionContenidos()
    {
        return $this->seccionContenidos;
    }
}
