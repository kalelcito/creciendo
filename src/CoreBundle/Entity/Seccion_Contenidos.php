<?php
namespace CoreBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 */
class Seccion_Contenidos
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
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $titulo;

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
     * @ORM\Column(type="smallint", length=2, nullable=true, options={"default":1})
     */
    private $tipo;

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
     * @ORM\OneToMany(targetEntity="CoreBundle\Entity\Multimedia", mappedBy="seccionContenidos")
     */
    private $multimedia;

    /**
     * @ORM\OneToMany(targetEntity="CoreBundle\Entity\Descargas", mappedBy="seccionContenidos")
     */
    private $descargas;

    /**
     * @ORM\OneToMany(targetEntity="CoreBundle\Entity\Reportes", mappedBy="seccionContenidos")
     */
    private $reportes;

    /**
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\Secciones", inversedBy="seccionContenidos")
     * @ORM\JoinColumn(name="id_seccion", referencedColumnName="id")
     */
    private $secciones;

    /**
     * 
     * @ORM\ManyToMany(targetEntity="CoreBundle\Entity\Encuestas", inversedBy="secContenidos")
     * @ORM\JoinTable(
     *     name="Encuesta_Contenidos",
     *     joinColumns={@ORM\JoinColumn(name="id_seccion_contenido", referencedColumnName="id", nullable=false)},
     *     inverseJoinColumns={@ORM\JoinColumn(name="id_encuesta", referencedColumnName="id", nullable=false)}
     * )
     */
    private $encuestas;

    /**
     * @ORM\ManyToMany(targetEntity="CoreBundle\Entity\Niveles", inversedBy="seccionContenidos")
     * @ORM\JoinTable(
     *     name="Niveles_Contenidos",
     *     joinColumns={@ORM\JoinColumn(name="id_seccion_contenido", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="id_nivel", referencedColumnName="id")}
     * )
     */
    private $niveles;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->multimedia = new \Doctrine\Common\Collections\ArrayCollection();
        $this->descargas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->niveles = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Seccion_Contenidos
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
     * @return Seccion_Contenidos
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
     * @return Seccion_Contenidos
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
     * @return Seccion_Contenidos
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
     * @return Seccion_Contenidos
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
     * Set tipo
     *
     * @param integer $tipo
     *
     * @return Seccion_Contenidos
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
     * Set orden
     *
     * @param integer $orden
     *
     * @return Seccion_Contenidos
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
     * @return Seccion_Contenidos
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
     * Add multimedia
     *
     * @param \CoreBundle\Entity\Multimedia $multimedia
     *
     * @return Seccion_Contenidos
     */
    public function addMultimedia(\CoreBundle\Entity\Multimedia $multimedia)
    {
        $this->multimedia[] = $multimedia;

        return $this;
    }

    /**
     * Remove multimedia
     *
     * @param \CoreBundle\Entity\Multimedia $multimedia
     */
    public function removeMultimedia(\CoreBundle\Entity\Multimedia $multimedia)
    {
        $this->multimedia->removeElement($multimedia);
    }

    /**
     * Get multimedia
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMultimedia()
    {
        return $this->multimedia;
    }

    /**
     * Add descarga
     *
     * @param \CoreBundle\Entity\Descargas $descarga
     *
     * @return Seccion_Contenidos
     */
    public function addDescarga(\CoreBundle\Entity\Descargas $descarga)
    {
        $this->descargas[] = $descarga;

        return $this;
    }

    /**
     * Remove descarga
     *
     * @param \CoreBundle\Entity\Descargas $descarga
     */
    public function removeDescarga(\CoreBundle\Entity\Descargas $descarga)
    {
        $this->descargas->removeElement($descarga);
    }

    /**
     * Get descargas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDescargas()
    {
        return $this->descargas;
    }

    /**
     * Set secciones
     *
     * @param \CoreBundle\Entity\Secciones $secciones
     *
     * @return Seccion_Contenidos
     */
    public function setSecciones(\CoreBundle\Entity\Secciones $secciones = null)
    {
        $this->secciones = $secciones;

        return $this;
    }

    /**
     * Get secciones
     *
     * @return \CoreBundle\Entity\Secciones
     */
    public function getSecciones()
    {
        return $this->secciones;
    }

    /**
     * Add nivele
     *
     * @param \CoreBundle\Entity\Niveles $nivele
     *
     * @return Seccion_Contenidos
     */
    public function addNivele(\CoreBundle\Entity\Niveles $nivele)
    {
        $this->niveles[] = $nivele;

        return $this;
    }

    /**
     * Remove nivele
     *
     * @param \CoreBundle\Entity\Niveles $nivele
     */
    public function removeNivele(\CoreBundle\Entity\Niveles $nivele)
    {
        $this->niveles->removeElement($nivele);
    }

    /**
     * Get niveles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNiveles()
    {
        return $this->niveles;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Seccion_Contenidos
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Seccion_Contenidos
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
     * @return Seccion_Contenidos
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
     * @return Seccion_Contenidos
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
     * Set encuestas
     *
     * @param \CoreBundle\Entity\Encuestas $encuestas
     *
     * @return Seccion_Contenidos
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
     * Add encuesta
     *
     * @param \CoreBundle\Entity\Encuestas $encuesta
     *
     * @return Seccion_Contenidos
     */
    public function addEncuesta(\CoreBundle\Entity\Encuestas $encuesta)
    {
        $encuesta->addSeccionContenido($this);
        $this->encuestas[] = $encuesta;

        return $this;
    }

    /**
     * Remove encuesta
     *
     * @param \CoreBundle\Entity\Encuestas $encuesta
     */
    public function removeEncuesta(\CoreBundle\Entity\Encuestas $encuesta)
    {
        $this->encuestas->removeElement($encuesta);
    }

    /**
     * Add reporte
     *
     * @param \CoreBundle\Entity\Reportes $reporte
     *
     * @return Seccion_Contenidos
     */
    public function addReporte(\CoreBundle\Entity\Reportes $reporte)
    {
        $this->reportes[] = $reporte;

        return $this;
    }

    /**
     * Remove reporte
     *
     * @param \CoreBundle\Entity\Reportes $reporte
     */
    public function removeReporte(\CoreBundle\Entity\Reportes $reporte)
    {
        $this->reportes->removeElement($reporte);
    }

    /**
     * Get reportes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReportes()
    {
        return $this->reportes;
    }
}
