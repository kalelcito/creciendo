<?php
namespace CoreBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 */
class Multimedia
{
    /**
     * @ORM\Id
     * @ORM\Column(type="bigint", length=20)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=600, nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="smallint", length=1, nullable=true, options={"default":0})
     */
    private $tipo;

    /**
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    private $imagen;

    /**
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    private $video;

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
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\Seccion_Contenidos", inversedBy="multimedia")
     * @ORM\JoinColumn(name="id_seccion_contenidos", referencedColumnName="id")
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
     * @return Multimedia
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
     * @return Multimedia
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
     * Set tipo
     *
     * @param integer $tipo
     *
     * @return Multimedia
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return integer
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set imagen
     *
     * @param string $imagen
     *
     * @return Multimedia
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get imagen
     *
     * @return string
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set video
     *
     * @param string $video
     *
     * @return Multimedia
     */
    public function setVideo($video)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video
     *
     * @return string
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Multimedia
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
     * @return Multimedia
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
     * @return Multimedia
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
