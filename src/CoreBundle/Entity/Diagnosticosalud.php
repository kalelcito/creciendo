<?php
namespace CoreBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Diagnosticosalud
{
    /**
     * @ORM\Id
     * @ORM\Column(type="bigint", length=20)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="bigint", length=20, nullable=true)
     */
    private $id_cliente;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $a01;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $a02;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $a03;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $a04;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $a05;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $a06;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $empresa;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $sucursal;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $departamento;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $asesor;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $fecha;

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
     * Set idCliente
     *
     * @param integer $idCliente
     *
     * @return Diagnosticosalud
     */
    public function setIdCliente($idCliente)
    {
        $this->id_cliente = $idCliente;

        return $this;
    }

    /**
     * Get idCliente
     *
     * @return integer
     */
    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    /**
     * Set a01
     *
     * @param integer $a01
     *
     * @return Diagnosticosalud
     */
    public function setA01($a01)
    {
        $this->a01 = $a01;

        return $this;
    }

    /**
     * Get a01
     *
     * @return integer
     */
    public function getA01()
    {
        return $this->a01;
    }

    /**
     * Set a02
     *
     * @param string $a02
     *
     * @return Diagnosticosalud
     */
    public function setA02($a02)
    {
        $this->a02 = $a02;

        return $this;
    }

    /**
     * Get a02
     *
     * @return string
     */
    public function getA02()
    {
        return $this->a02;
    }

    /**
     * Set a03
     *
     * @param string $a03
     *
     * @return Diagnosticosalud
     */
    public function setA03($a03)
    {
        $this->a03 = $a03;

        return $this;
    }

    /**
     * Get a03
     *
     * @return string
     */
    public function getA03()
    {
        return $this->a03;
    }

    /**
     * Set a04
     *
     * @param integer $a04
     *
     * @return Diagnosticosalud
     */
    public function setA04($a04)
    {
        $this->a04 = $a04;

        return $this;
    }

    /**
     * Get a04
     *
     * @return integer
     */
    public function getA04()
    {
        return $this->a04;
    }

    /**
     * Set a05
     *
     * @param string $a05
     *
     * @return Diagnosticosalud
     */
    public function setA05($a05)
    {
        $this->a05 = $a05;

        return $this;
    }

    /**
     * Get a05
     *
     * @return string
     */
    public function getA05()
    {
        return $this->a05;
    }

    /**
     * Set a06
     *
     * @param string $a06
     *
     * @return Diagnosticosalud
     */
    public function setA06($a06)
    {
        $this->a06 = $a06;

        return $this;
    }

    /**
     * Get a06
     *
     * @return string
     */
    public function getA06()
    {
        return $this->a06;
    }

    /**
     * Set empresa
     *
     * @param string $empresa
     *
     * @return Diagnosticosalud
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get empresa
     *
     * @return string
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set sucursal
     *
     * @param string $sucursal
     *
     * @return Diagnosticosalud
     */
    public function setSucursal($sucursal)
    {
        $this->sucursal = $sucursal;

        return $this;
    }

    /**
     * Get sucursal
     *
     * @return string
     */
    public function getSucursal()
    {
        return $this->sucursal;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Diagnosticosalud
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
     * Set departamento
     *
     * @param string $departamento
     *
     * @return Diagnosticosalud
     */
    public function setDepartamento($departamento)
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * Get departamento
     *
     * @return string
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }

    /**
     * Set asesor
     *
     * @param string $asesor
     *
     * @return Diagnosticosalud
     */
    public function setAsesor($asesor)
    {
        $this->asesor = $asesor;

        return $this;
    }

    /**
     * Get asesor
     *
     * @return string
     */
    public function getAsesor()
    {
        return $this->asesor;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Diagnosticosalud
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }
}
