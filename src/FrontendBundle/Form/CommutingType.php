<?php

namespace FrontendBundle\Form;
use CoreBundle\Entity\Commuting;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CommutingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ruta', EntityType::class, array(
                'class' => 'FrontendBundle\Entity\Commuting',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->where('u.activo = ?1')
                        ->andWhere('u.commuting = ?2 ')
                        ->orderBy('u.id', 'ASC')
                        ->setParameter(1, 1)
                        ->setParameter(2, 1);
                },
                'choice_label' => 'nombre',
            ))

            ->add('fecha', TextType::class,array(
                'constraints' => array(
                    new NotBlank(array(
                        'message' => 'Ingresa una fecha',
                    ))
                ),
                'attr' => array('placeholder' => 'Selecciona una fecha')
            ))
            ->add('regreso', ChoiceType::class, array(
                'choices'  => array(
                    'Viaje Sencillo' => 1,
                    'Viaje Redondo' => 2,
                )),array(
                'constraints' => array(
                    new NotBlank(array(
                        'message' => 'Regreso',
                    ))
                ),
                'attr' => array('placeholder' => 'Personas')
            ))
            ->add('buscar', SubmitType::class,  array(
                    'label' => 'Buscar rutas')
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getName()
    {
        return 'frontend_commuting';
    }
}
