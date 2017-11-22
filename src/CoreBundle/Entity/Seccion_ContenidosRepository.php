<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\EntityRepository;

class Seccion_ContenidosRepository extends EntityRepository
{
    public function loadTest($seccion)
    {
        return $this->createQueryBuilder('u')
            ->where('u.seccion = :seccion')
            ->orderBy('u.orden')
            ->setParameter('seccion', $seccion )
            ->getQuery();
    }
}
