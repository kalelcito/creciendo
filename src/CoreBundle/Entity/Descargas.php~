<?php
namespace CoreBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Descargas
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     * @Assert\File(mimeTypes={ "application/msword" , "application/pdf" ,  "application/excel"})
     */
    private $archivo;

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
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\Seccion_Contenidos", inversedBy="descargas")
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
     * @return Descargas
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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Descargas
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set archivo
     *
     * @param string $archivo
     *
     * @return Descargas
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Descargas
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
     * @return Descargas
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
     * Set seccionContenidos
     *
     * @param \CoreBundle\Entity\Seccion_Contenidos $seccionContenidos
     *
     * @return Descargas
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
