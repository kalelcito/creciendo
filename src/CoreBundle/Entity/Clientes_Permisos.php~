<?php
namespace CoreBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 */
class Clientes_Permisos
{
    /**
     * @ORM\Id
     * @ORM\Column(type="bigint", length=20)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=5000, nullable=true)
     */
    private $permisos;

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
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\Clientes", inversedBy="clientesPermisos")
     * @ORM\JoinColumn(name="id_cliente_permisos", referencedColumnName="id")
     */
    private $clientes;

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
     * Set permisos
     *
     * @param string $permisos
     *
     * @return Clientes_Permisos
     */
    public function setPermisos($permisos)
    {
        $this->permisos = $permisos;

        return $this;
    }

    /**
     * Get permisos
     *
     * @return string
     */
    public function getPermisos()
    {
        return $this->permisos;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Clientes_Permisos
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
     * @return Clientes_Permisos
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
     * Set clientes
     *
     * @param \CoreBundle\Entity\Clientes $clientes
     *
     * @return Clientes_Permisos
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
