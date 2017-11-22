<?php
namespace CoreBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 */
class Roles
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", length=3)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $nombre;

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
     * @ORM\OneToMany(targetEntity="CoreBundle\Entity\Administradores", mappedBy="roles")
     */
    private $administradores;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->administradores = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Roles
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
     * Add administradore
     *
     * @param \CoreBundle\Entity\Administradores $administradore
     *
     * @return Roles
     */
    public function addAdministradore(\CoreBundle\Entity\Administradores $administradore)
    {
        $this->administradores[] = $administradore;

        return $this;
    }

    /**
     * Remove administradore
     *
     * @param \CoreBundle\Entity\Administradores $administradore
     */
    public function removeAdministradore(\CoreBundle\Entity\Administradores $administradore)
    {
        $this->administradores->removeElement($administradore);
    }

    /**
     * Get administradores
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAdministradores()
    {
        return $this->administradores;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Roles
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
     * @return Roles
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
