<?php
namespace CoreBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 */
class Pagos
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
    private $id_transaccion;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $referencia_venta;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $referencia_transaccion;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $banco;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $moneda;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $entidad;

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
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $monto;

    /**
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\Clientes", inversedBy="pagos")
     * @ORM\JoinColumn(name="id_cliente", referencedColumnName="id", nullable=false)
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Pagos
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
     * @return Pagos
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
     * @return Pagos
     */
    public function setClientes(\CoreBundle\Entity\Clientes $clientes)
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
     * Set idTransaccion
     *
     * @param string $idTransaccion
     *
     * @return Pagos
     */
    public function setIdTransaccion($idTransaccion)
    {
        $this->id_transaccion = $idTransaccion;

        return $this;
    }

    /**
     * Get idTransaccion
     *
     * @return string
     */
    public function getIdTransaccion()
    {
        return $this->id_transaccion;
    }

    /**
     * Set referenciaVenta
     *
     * @param string $referenciaVenta
     *
     * @return Pagos
     */
    public function setReferenciaVenta($referenciaVenta)
    {
        $this->referencia_venta = $referenciaVenta;

        return $this;
    }

    /**
     * Get referenciaVenta
     *
     * @return string
     */
    public function getReferenciaVenta()
    {
        return $this->referencia_venta;
    }

    /**
     * Set referenciaTransaccion
     *
     * @param string $referenciaTransaccion
     *
     * @return Pagos
     */
    public function setReferenciaTransaccion($referenciaTransaccion)
    {
        $this->referencia_transaccion = $referenciaTransaccion;

        return $this;
    }

    /**
     * Get referenciaTransaccion
     *
     * @return string
     */
    public function getReferenciaTransaccion()
    {
        return $this->referencia_transaccion;
    }

    /**
     * Set banco
     *
     * @param string $banco
     *
     * @return Pagos
     */
    public function setBanco($banco)
    {
        $this->banco = $banco;

        return $this;
    }

    /**
     * Get banco
     *
     * @return string
     */
    public function getBanco()
    {
        return $this->banco;
    }

    /**
     * Set moneda
     *
     * @param string $moneda
     *
     * @return Pagos
     */
    public function setMoneda($moneda)
    {
        $this->moneda = $moneda;

        return $this;
    }

    /**
     * Get moneda
     *
     * @return string
     */
    public function getMoneda()
    {
        return $this->moneda;
    }

    /**
     * Set entidad
     *
     * @param string $entidad
     *
     * @return Pagos
     */
    public function setEntidad($entidad)
    {
        $this->entidad = $entidad;

        return $this;
    }

    /**
     * Get entidad
     *
     * @return string
     */
    public function getEntidad()
    {
        return $this->entidad;
    }

    /**
     * Set monto
     *
     * @param string $monto
     *
     * @return Pagos
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;

        return $this;
    }

    /**
     * Get monto
     *
     * @return string
     */
    public function getMonto()
    {
        return $this->monto;
    }
}
