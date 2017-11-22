<?php
namespace CoreBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 */
class Administradores
{
    /**
     * @ORM\Id
     * @ORM\Column(type="bigint", length=20)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $apellidos;

    /**
     * @ORM\Column(type="string", unique=true, length=250, nullable=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", unique=true, length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $telefono;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $celular;

    /**
     * @ORM\Column(type="string", length=600, nullable=true)
     */
    private $pass;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    private $salt;

    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default":0})
     */
    private $activo;

    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default":0})
     */
    private $verificado;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $recuperacion;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $ultimo_acceso;

    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default":0})
     */
    private $is_active;

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
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\Roles", inversedBy="administradores")
     * @ORM\JoinColumn(name="id_rol", referencedColumnName="id", nullable=false)
     */
    private $roles;

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
     * @return Administradores
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
     * @return Administradores
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
     * Set username
     *
     * @param string $username
     *
     * @return Administradores
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Administradores
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Administradores
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set celular
     *
     * @param string $celular
     *
     * @return Administradores
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Get celular
     *
     * @return string
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Set pass
     *
     * @param string $pass
     *
     * @return Administradores
     */
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * Get pass
     *
     * @return string
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set salt
     *
     * @param string $salt
     *
     * @return Administradores
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     *
     * @return Administradores
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
     * Set verificado
     *
     * @param boolean $verificado
     *
     * @return Administradores
     */
    public function setVerificado($verificado)
    {
        $this->verificado = $verificado;

        return $this;
    }

    /**
     * Get verificado
     *
     * @return boolean
     */
    public function getVerificado()
    {
        return $this->verificado;
    }

    /**
     * Set recuperacion
     *
     * @param string $recuperacion
     *
     * @return Administradores
     */
    public function setRecuperacion($recuperacion)
    {
        $this->recuperacion = $recuperacion;

        return $this;
    }

    /**
     * Get recuperacion
     *
     * @return string
     */
    public function getRecuperacion()
    {
        return $this->recuperacion;
    }

    /**
     * Set ultimoAcceso
     *
     * @param \DateTime $ultimoAcceso
     *
     * @return Administradores
     */
    public function setUltimoAcceso($ultimoAcceso)
    {
        $this->ultimo_acceso = $ultimoAcceso;

        return $this;
    }

    /**
     * Get ultimoAcceso
     *
     * @return \DateTime
     */
    public function getUltimoAcceso()
    {
        return $this->ultimo_acceso;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Administradores
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * Set roles
     *
     * @param \CoreBundle\Entity\Roles $roles
     *
     * @return Administradores
     */
    public function setRoles(\CoreBundle\Entity\Roles $roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Get roles
     *
     * @return \CoreBundle\Entity\Roles
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Administradores
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
     * @return Administradores
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
