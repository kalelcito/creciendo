<?php
namespace CoreBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Diagnosticoseguridad
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
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $a02;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $a03;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $a04;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $a05;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $a06;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $a07;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $a08;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $a09;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $a10;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $a11;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $a12;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $a13;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $a14;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $a15;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $a16;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $a17;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $usuario;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $puesto;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $empresa;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $numero;

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
     * @return Diagnosticoseguridad
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
     * @return Diagnosticoseguridad
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
     * @param integer $a02
     *
     * @return Diagnosticoseguridad
     */
    public function setA02($a02)
    {
        $this->a02 = $a02;

        return $this;
    }

    /**
     * Get a02
     *
     * @return integer
     */
    public function getA02()
    {
        return $this->a02;
    }

    /**
     * Set a03
     *
     * @param integer $a03
     *
     * @return Diagnosticoseguridad
     */
    public function setA03($a03)
    {
        $this->a03 = $a03;

        return $this;
    }

    /**
     * Get a03
     *
     * @return integer
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
     * @return Diagnosticoseguridad
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
     * @param integer $a05
     *
     * @return Diagnosticoseguridad
     */
    public function setA05($a05)
    {
        $this->a05 = $a05;

        return $this;
    }

    /**
     * Get a05
     *
     * @return integer
     */
    public function getA05()
    {
        return $this->a05;
    }

    /**
     * Set a06
     *
     * @param integer $a06
     *
     * @return Diagnosticoseguridad
     */
    public function setA06($a06)
    {
        $this->a06 = $a06;

        return $this;
    }

    /**
     * Get a06
     *
     * @return integer
     */
    public function getA06()
    {
        return $this->a06;
    }

    /**
     * Set a07
     *
     * @param integer $a07
     *
     * @return Diagnosticoseguridad
     */
    public function setA07($a07)
    {
        $this->a07 = $a07;

        return $this;
    }

    /**
     * Get a07
     *
     * @return integer
     */
    public function getA07()
    {
        return $this->a07;
    }

    /**
     * Set a08
     *
     * @param integer $a08
     *
     * @return Diagnosticoseguridad
     */
    public function setA08($a08)
    {
        $this->a08 = $a08;

        return $this;
    }

    /**
     * Get a08
     *
     * @return integer
     */
    public function getA08()
    {
        return $this->a08;
    }

    /**
     * Set a09
     *
     * @param integer $a09
     *
     * @return Diagnosticoseguridad
     */
    public function setA09($a09)
    {
        $this->a09 = $a09;

        return $this;
    }

    /**
     * Get a09
     *
     * @return integer
     */
    public function getA09()
    {
        return $this->a09;
    }

    /**
     * Set a10
     *
     * @param integer $a10
     *
     * @return Diagnosticoseguridad
     */
    public function setA10($a10)
    {
        $this->a10 = $a10;

        return $this;
    }

    /**
     * Get a10
     *
     * @return integer
     */
    public function getA10()
    {
        return $this->a10;
    }

    /**
     * Set a11
     *
     * @param integer $a11
     *
     * @return Diagnosticoseguridad
     */
    public function setA11($a11)
    {
        $this->a11 = $a11;

        return $this;
    }

    /**
     * Get a11
     *
     * @return integer
     */
    public function getA11()
    {
        return $this->a11;
    }

    /**
     * Set a12
     *
     * @param integer $a12
     *
     * @return Diagnosticoseguridad
     */
    public function setA12($a12)
    {
        $this->a12 = $a12;

        return $this;
    }

    /**
     * Get a12
     *
     * @return integer
     */
    public function getA12()
    {
        return $this->a12;
    }

    /**
     * Set a13
     *
     * @param integer $a13
     *
     * @return Diagnosticoseguridad
     */
    public function setA13($a13)
    {
        $this->a13 = $a13;

        return $this;
    }

    /**
     * Get a13
     *
     * @return integer
     */
    public function getA13()
    {
        return $this->a13;
    }

    /**
     * Set a14
     *
     * @param integer $a14
     *
     * @return Diagnosticoseguridad
     */
    public function setA14($a14)
    {
        $this->a14 = $a14;

        return $this;
    }

    /**
     * Get a14
     *
     * @return integer
     */
    public function getA14()
    {
        return $this->a14;
    }

    /**
     * Set a15
     *
     * @param integer $a15
     *
     * @return Diagnosticoseguridad
     */
    public function setA15($a15)
    {
        $this->a15 = $a15;

        return $this;
    }

    /**
     * Get a15
     *
     * @return integer
     */
    public function getA15()
    {
        return $this->a15;
    }

    /**
     * Set a16
     *
     * @param integer $a16
     *
     * @return Diagnosticoseguridad
     */
    public function setA16($a16)
    {
        $this->a16 = $a16;

        return $this;
    }

    /**
     * Get a16
     *
     * @return integer
     */
    public function getA16()
    {
        return $this->a16;
    }

    /**
     * Set a17
     *
     * @param integer $a17
     *
     * @return Diagnosticoseguridad
     */
    public function setA17($a17)
    {
        $this->a17 = $a17;

        return $this;
    }

    /**
     * Get a17
     *
     * @return integer
     */
    public function getA17()
    {
        return $this->a17;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     *
     * @return Diagnosticoseguridad
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set puesto
     *
     * @param string $puesto
     *
     * @return Diagnosticoseguridad
     */
    public function setPuesto($puesto)
    {
        $this->puesto = $puesto;

        return $this;
    }

    /**
     * Get puesto
     *
     * @return string
     */
    public function getPuesto()
    {
        return $this->puesto;
    }

    /**
     * Set empresa
     *
     * @param string $empresa
     *
     * @return Diagnosticoseguridad
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
     * Set numero
     *
     * @param string $numero
     *
     * @return Diagnosticoseguridad
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }
}
