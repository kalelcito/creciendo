<?php
namespace CoreBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Climalaboral
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
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $apellidos;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $correo_electronico;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $pin;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $codigo;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $fecha;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $empresa;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $numero;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $antiguedad;

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
     * @ORM\Column(type="text", nullable=true)
     */
    private $b11;

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
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $a18;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $a19;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $a20;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $a21;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $a22;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $a23;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $a24;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $a25;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $a26;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $a27;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $a28;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $a29;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $a30;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $a31;

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
     * @return Climalaboral
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
     * Set slug
     *
     * @param string $slug
     *
     * @return Climalaboral
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
     * @return Climalaboral
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
     * Set apellidos
     *
     * @param string $apellidos
     *
     * @return Climalaboral
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set correoElectronico
     *
     * @param string $correoElectronico
     *
     * @return Climalaboral
     */
    public function setCorreoElectronico($correoElectronico)
    {
        $this->correo_electronico = $correoElectronico;

        return $this;
    }

    /**
     * Get correoElectronico
     *
     * @return string
     */
    public function getCorreoElectronico()
    {
        return $this->correo_electronico;
    }

    /**
     * Set pin
     *
     * @param string $pin
     *
     * @return Climalaboral
     */
    public function setPin($pin)
    {
        $this->pin = $pin;

        return $this;
    }

    /**
     * Get pin
     *
     * @return string
     */
    public function getPin()
    {
        return $this->pin;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     *
     * @return Climalaboral
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Climalaboral
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

    /**
     * Set empresa
     *
     * @param string $empresa
     *
     * @return Climalaboral
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
     * @return Climalaboral
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

    /**
     * Set antiguedad
     *
     * @param string $antiguedad
     *
     * @return Climalaboral
     */
    public function setAntiguedad($antiguedad)
    {
        $this->antiguedad = $antiguedad;

        return $this;
    }

    /**
     * Get antiguedad
     *
     * @return string
     */
    public function getAntiguedad()
    {
        return $this->antiguedad;
    }

    /**
     * Set a01
     *
     * @param integer $a01
     *
     * @return Climalaboral
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
     * @return Climalaboral
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
     * @return Climalaboral
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
     * @return Climalaboral
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
     * @return Climalaboral
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
     * @return Climalaboral
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
     * @return Climalaboral
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
     * @return Climalaboral
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
     * @return Climalaboral
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
     * @return Climalaboral
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
     * @return Climalaboral
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
     * Set b11
     *
     * @param string $b11
     *
     * @return Climalaboral
     */
    public function setB11($b11)
    {
        $this->b11 = $b11;

        return $this;
    }

    /**
     * Get b11
     *
     * @return string
     */
    public function getB11()
    {
        return $this->b11;
    }

    /**
     * Set a12
     *
     * @param integer $a12
     *
     * @return Climalaboral
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
     * @return Climalaboral
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
     * @return Climalaboral
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
     * @return Climalaboral
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
     * @return Climalaboral
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
     * @return Climalaboral
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
     * Set a18
     *
     * @param integer $a18
     *
     * @return Climalaboral
     */
    public function setA18($a18)
    {
        $this->a18 = $a18;

        return $this;
    }

    /**
     * Get a18
     *
     * @return integer
     */
    public function getA18()
    {
        return $this->a18;
    }

    /**
     * Set a19
     *
     * @param integer $a19
     *
     * @return Climalaboral
     */
    public function setA19($a19)
    {
        $this->a19 = $a19;

        return $this;
    }

    /**
     * Get a19
     *
     * @return integer
     */
    public function getA19()
    {
        return $this->a19;
    }

    /**
     * Set a20
     *
     * @param integer $a20
     *
     * @return Climalaboral
     */
    public function setA20($a20)
    {
        $this->a20 = $a20;

        return $this;
    }

    /**
     * Get a20
     *
     * @return integer
     */
    public function getA20()
    {
        return $this->a20;
    }

    /**
     * Set a21
     *
     * @param integer $a21
     *
     * @return Climalaboral
     */
    public function setA21($a21)
    {
        $this->a21 = $a21;

        return $this;
    }

    /**
     * Get a21
     *
     * @return integer
     */
    public function getA21()
    {
        return $this->a21;
    }

    /**
     * Set a22
     *
     * @param integer $a22
     *
     * @return Climalaboral
     */
    public function setA22($a22)
    {
        $this->a22 = $a22;

        return $this;
    }

    /**
     * Get a22
     *
     * @return integer
     */
    public function getA22()
    {
        return $this->a22;
    }

    /**
     * Set a23
     *
     * @param integer $a23
     *
     * @return Climalaboral
     */
    public function setA23($a23)
    {
        $this->a23 = $a23;

        return $this;
    }

    /**
     * Get a23
     *
     * @return integer
     */
    public function getA23()
    {
        return $this->a23;
    }

    /**
     * Set a24
     *
     * @param integer $a24
     *
     * @return Climalaboral
     */
    public function setA24($a24)
    {
        $this->a24 = $a24;

        return $this;
    }

    /**
     * Get a24
     *
     * @return integer
     */
    public function getA24()
    {
        return $this->a24;
    }

    /**
     * Set a25
     *
     * @param integer $a25
     *
     * @return Climalaboral
     */
    public function setA25($a25)
    {
        $this->a25 = $a25;

        return $this;
    }

    /**
     * Get a25
     *
     * @return integer
     */
    public function getA25()
    {
        return $this->a25;
    }

    /**
     * Set a26
     *
     * @param integer $a26
     *
     * @return Climalaboral
     */
    public function setA26($a26)
    {
        $this->a26 = $a26;

        return $this;
    }

    /**
     * Get a26
     *
     * @return integer
     */
    public function getA26()
    {
        return $this->a26;
    }

    /**
     * Set a27
     *
     * @param integer $a27
     *
     * @return Climalaboral
     */
    public function setA27($a27)
    {
        $this->a27 = $a27;

        return $this;
    }

    /**
     * Get a27
     *
     * @return integer
     */
    public function getA27()
    {
        return $this->a27;
    }

    /**
     * Set a28
     *
     * @param integer $a28
     *
     * @return Climalaboral
     */
    public function setA28($a28)
    {
        $this->a28 = $a28;

        return $this;
    }

    /**
     * Get a28
     *
     * @return integer
     */
    public function getA28()
    {
        return $this->a28;
    }

    /**
     * Set a29
     *
     * @param integer $a29
     *
     * @return Climalaboral
     */
    public function setA29($a29)
    {
        $this->a29 = $a29;

        return $this;
    }

    /**
     * Get a29
     *
     * @return integer
     */
    public function getA29()
    {
        return $this->a29;
    }

    /**
     * Set a30
     *
     * @param integer $a30
     *
     * @return Climalaboral
     */
    public function setA30($a30)
    {
        $this->a30 = $a30;

        return $this;
    }

    /**
     * Get a30
     *
     * @return integer
     */
    public function getA30()
    {
        return $this->a30;
    }

    /**
     * Set a31
     *
     * @param integer $a31
     *
     * @return Climalaboral
     */
    public function setA31($a31)
    {
        $this->a31 = $a31;

        return $this;
    }

    /**
     * Get a31
     *
     * @return integer
     */
    public function getA31()
    {
        return $this->a31;
    }
}
