<?php

namespace AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class crearEncuestaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('encuesta', TextType::class,array(
            'label' => 'Nombre de la Encuesta',
            'constraints' => array(
                new NotBlank(array(
                    'message' => 'Ingresa un nombre para la Encuesta',
                )),
                new Length(array('min' => 2,
                    'minMessage' => 'El nombre debe ser mayor a {{ limit }} letras',
                )),
            ),
            'attr' => array('placeholder' => 'Nombre de la Encuesta')
        ))
            ->add('descripcion', TextType::class,array('label' => 'Descripción','required'=>false))
            ->add('enviar', SubmitType::class,  array(
                    'label' => 'Crear')
            );

    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'admin_bundle_crearencuesta_type';
    }
}
