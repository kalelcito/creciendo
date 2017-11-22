<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Table;

/**
 * CoreBundle\Entity\NivelesContenidos
 *
 * @ORM\Entity
 * @Table(name="Niveles_Contenidos")
 */
class NivelesContenidos
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id_seccion_contenido;

    /**
     * @ORM\Column(type="integer")
     */
    protected $id_nivel;

    public function __construct()
    {
    }

    /**
     * Set the value of id_seccion_contenido.
     *
     * @param integer $id_seccion_contenido
     * @return \CoreBundle\Entity\NivelesContenidos
     */
    public function setIdSeccionContenido($id_seccion_contenido)
    {
        $this->id_seccion_contenido = $id_seccion_contenido;

        return $this;
    }

    /**
     * Get the value of id_seccion_contenido.
     *
     * @return integer
     */
    public function getIdSeccionContenido()
    {
        return $this->id_seccion_contenido;
    }

    /**
     * Set the value of id_nivel.
     *
     * @param integer $id_nivel
     * @return \CoreBundle\Entity\NivelesContenidos
     */
    public function setIdNivel($id_nivel)
    {
        $this->id_nivel = $id_nivel;

        return $this;
    }

    /**
     * Get the value of id_nivel.
     *
     * @return integer
     */
    public function getIdNivel()
    {
        return $this->id_nivel;
    }
}
