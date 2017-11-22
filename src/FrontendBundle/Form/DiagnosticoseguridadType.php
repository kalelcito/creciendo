<?php

namespace FrontendBundle\Form;

use CoreBundle\Entity\Diagnosticoseguridad;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DiagnosticoseguridadType extends AbstractType
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
            ->add('a02', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a03', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a04', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a05', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a06', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a07', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a08', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a09', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a10', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a11', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a12', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a13', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a14', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a15', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a16', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a17', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('usuario', TextType::class)
            ->add('puesto', TextType::class)
            ->add('empresa', TextType::class)
            ->add('numero', TextType::class)
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
        return 'corebundle_diagnosticoseguridad';
    }


}