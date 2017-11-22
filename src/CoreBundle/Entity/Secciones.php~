<?php
namespace CoreBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 */
class Secciones
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", length=10)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $url_key;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     * @Gedmo\Slug(separator="-", updatable=true, fields={"url_key","nombre"})
     */
    private $slug;

    /**
     * @ORM\Column(type="text", length=5000, nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="text", length=10000, nullable=true)
     */
    private $contenido_publico;

    /**
     * @ORM\Column(type="text", length=50000, nullable=true)
     */
    private $contenido_privado;

    /**
     * @ORM\Column(type="integer", length=4, nullable=true)
     */
    private $orden;

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
     * @ORM\OneToMany(targetEntity="CoreBundle\Entity\Seccion_Contenidos", mappedBy="secciones")
     */
    private $seccionContenidos;

    /**
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\Programas", inversedBy="secciones")
     * @ORM\JoinColumn(name="programa_id", referencedColumnName="id", nullable=false)
     */
    private $programa;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->seccionContenidos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Secciones
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
     * Set slug
     *
     * @param string $slug
     *
     * @return Secciones
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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Secciones
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
     * Set contenidoPublico
     *
     * @param string $contenidoPublico
     *
     * @return Secciones
     */
    public function setContenidoPublico($contenidoPublico)
    {
        $this->contenido_publico = $contenidoPublico;

        return $this;
    }

    /**
     * Get contenidoPublico
     *
     * @return string
     */
    public function getContenidoPublico()
    {
        return $this->contenido_publico;
    }

    /**
     * Set contenidoPrivado
     *
     * @param string $contenidoPrivado
     *
     * @return Secciones
     */
    public function setContenidoPrivado($contenidoPrivado)
    {
        $this->contenido_privado = $contenidoPrivado;

        return $this;
    }

    /**
     * Get contenidoPrivado
     *
     * @return string
     */
    public function getContenidoPrivado()
    {
        return $this->contenido_privado;
    }

    /**
     * Set orden
     *
     * @param integer $orden
     *
     * @return Secciones
     */
    public function setOrden($orden)
    {
        $this->orden = $orden;

        return $this;
    }

    /**
     * Get orden
     *
     * @return integer
     */
    public function getOrden()
    {
        return $this->orden;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     *
     * @return Secciones
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
     * Add seccionContenido
     *
     * @param \CoreBundle\Entity\Seccion_Contenidos $seccionContenido
     *
     * @return Secciones
     */
    public function addSeccionContenido(\CoreBundle\Entity\Seccion_Contenidos $seccionContenido)
    {
        $this->seccionContenidos[] = $seccionContenido;

        return $this;
    }

    /**
     * Remove seccionContenido
     *
     * @param \CoreBundle\Entity\Seccion_Contenidos $seccionContenido
     */
    public function removeSeccionContenido(\CoreBundle\Entity\Seccion_Contenidos $seccionContenido)
    {
        $this->seccionContenidos->removeElement($seccionContenido);
    }

    /**
     * Get seccionContenidos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSeccionContenidos()
    {
        return $this->seccionContenidos;
    }

    /**
     * Set programa
     *
     * @param \CoreBundle\Entity\Programas $programa
     *
     * @return Secciones
     */
    public function setPrograma(\CoreBundle\Entity\Programas $programa)
    {
        $this->programa = $programa;

        return $this;
    }

    /**
     * Get programa
     *
     * @return \CoreBundle\Entity\Programas
     */
    public function getPrograma()
    {
        return $this->programa;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Secciones
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
     * @return Secciones
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
     * Set urlKey
     *
     * @param string $urlKey
     *
     * @return Secciones
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
}
