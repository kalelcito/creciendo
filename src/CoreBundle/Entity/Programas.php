<?php
namespace CoreBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 */
class Programas
{
    /**
     * @ORM\Id
     * @ORM\Column(type="bigint", length=10)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     * @Gedmo\Slug(separator="-", updatable=true, fields={"url_key"})
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $url_key;

    /**
     * @ORM\Column(type="text", length=5000, nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="text", length=50000, nullable=true)
     */
    private $contenido;

    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default":1})
     */
    private $activo;

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
     * @ORM\OneToMany(targetEntity="CoreBundle\Entity\Secciones", mappedBy="programa")
     */
    private $secciones;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->secciones = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
       return $this->nombre;
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
     * Set slug
     *
     * @param string $slug
     *
     * @return Programas
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Programas
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
     * @return Programas
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
     * Set contenido
     *
     * @param string $contenido
     *
     * @return Programas
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
     * Set activo
     *
     * @param boolean $activo
     *
     * @return Programas
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return boolean
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Add seccione
     *
     * @param \CoreBundle\Entity\Secciones $seccione
     *
     * @return Programas
     */
    public function addSeccione(\CoreBundle\Entity\Secciones $seccione)
    {
        $this->secciones[] = $seccione;

        return $this;
    }

    /**
     * Remove seccione
     *
     * @param \CoreBundle\Entity\Secciones $seccione
     */
    public function removeSeccione(\CoreBundle\Entity\Secciones $seccione)
    {
        $this->secciones->removeElement($seccione);
    }

    /**
     * Get secciones
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSecciones()
    {
        return $this->secciones;
    }

    /**
     * Set urlKey
     *
     * @param string $urlKey
     *
     * @return Programas
     */
    public function setUrlKey($urlKey)
    {
        $this->url_key = $urlKey;

        return $this;
    }

    /**
     * Get urlKey
     *
     * @return string
     */
    public function getUrlKey()
    {
        return $this->url_key;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Programas
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
     * @return Programas
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
