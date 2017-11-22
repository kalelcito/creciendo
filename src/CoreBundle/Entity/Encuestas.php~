<?php
namespace CoreBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 */
class Encuestas
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
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
    private $archivojson;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="create", field="created_at")
     * 
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="update", field="updated_at")
     * 
     */
    private $updated_at;

    /**
     * 
     */
    private $seccionContenidos;

    /**
     * @ORM\OneToMany(targetEntity="CoreBundle\Entity\Respuestas", mappedBy="encuestas")
     */
    private $respuestas;

    /**
     * @ORM\ManyToMany(targetEntity="CoreBundle\Entity\Seccion_Contenidos", mappedBy="encuestas")
     */
    private $secContenidos;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->respuestas = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Encuestas
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
     * Set archivojson
     *
     * @param string $archivojson
     *
     * @return Encuestas
     */
    public function setArchivojson($archivojson)
    {
        $this->archivojson = $archivojson;

        return $this;
    }

    /**
     * Get archivojson
     *
     * @return string
     */
    public function getArchivojson()
    {
        return $this->archivojson;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Encuestas
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
     * @return Encuestas
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
     * Add respuesta
     *
     * @param \CoreBundle\Entity\Respuestas $respuesta
     *
     * @return Encuestas
     */
    public function addRespuesta(\CoreBundle\Entity\Respuestas $respuesta)
    {
        $this->respuestas[] = $respuesta;

        return $this;
    }

    /**
     * Remove respuesta
     *
     * @param \CoreBundle\Entity\Respuestas $respuesta
     */
    public function removeRespuesta(\CoreBundle\Entity\Respuestas $respuesta)
    {
        $this->respuestas->removeElement($respuesta);
    }

    /**
     * Get respuestas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRespuestas()
    {
        return $this->respuestas;
    }

    /**
     * Add seccionContenido
     *
     * @param \CoreBundle\Entity\Seccion_Contenidos $seccionContenido
     *
     * @return Encuestas
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
     * Add secContenido
     *
     * @param \CoreBundle\Entity\Seccion_Contenidos $secContenido
     *
     * @return Encuestas
     */
    public function addSecContenido(\CoreBundle\Entity\Seccion_Contenidos $secContenido)
    {
        $this->secContenidos[] = $secContenido;

        return $this;
    }

    /**
     * Remove secContenido
     *
     * @param \CoreBundle\Entity\Seccion_Contenidos $secContenido
     */
    public function removeSecContenido(\CoreBundle\Entity\Seccion_Contenidos $secContenido)
    {
        $this->secContenidos->removeElement($secContenido);
    }

    /**
     * Get secContenidos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSecContenidos()
    {
        return $this->secContenidos;
    }
}
