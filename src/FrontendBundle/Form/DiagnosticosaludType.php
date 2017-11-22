<?php

namespace FrontendBundle\Form;

use CoreBundle\Entity\Diagnosticosalud;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DiagnosticosaludType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $campos = array(
            'Si' => '1',
            'No' => '2'
        );
        $builder
            ->add('id_cliente', HiddenType::class)
            ->add('a01', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a02', TextareaType::class)
            ->add('a03', TextareaType::class)
            ->add('a04', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a05', TextareaType::class)
            ->add('a06', TextareaType::class)
            ->add('empresa', TextType::class)
            ->add('sucursal', TextType::class)
            ->add('nombre', TextType::class)
            ->add('departamento', TextType::class)
            ->add('asesor', TextType::class)
            ->add('fecha', DateType::class, array(
                'widget' => 'single_text',
                'html5' => true,
            ))
            ->add('enviar', SubmitType::class);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {

    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'corebundle_diagnosticosalud';
    }


}