<?php

namespace CoreBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReportesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre')
            ->add('archivo',FileType::class,array('data_class'=>null,'required'=>false))
            ->add('clientes',EntityType::class,array('class'=>'CoreBundle\Entity\Clientes','label'=>'Cliente'))
            //->add('seccionContenidos')
            ->add('seccionContenidos', 'Symfony\Bridge\Doctrine\Form\Type\EntityType', array(
                'class' => 'CoreBundle\Entity\Seccion_Contenidos',
                'label' => 'Contenido',
                'query_builder' => function(EntityRepository $repository) {
                    $qb = $repository->createQueryBuilder('s');
                    return $qb
                        ->where('s.id = 7')
                        ->orwhere('s.id = 9')
                        ->orwhere('s.id = 11')
                        ->orwhere('s.id = 13')
                        ->orwhere('s.id = 19')
                        ->orderBy('s.id', 'ASC');
                },
            ))
        ;
}

/**
* {@inheritdoc}
*/
public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults(array(
'data_class' => 'CoreBundle\Entity\Reportes'
));
}

/**
* {@inheritdoc}
*/
public function getBlockPrefix()
{
return 'corebundle_reportes';
}


}
