<?php

namespace FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;

class ActivarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email', EmailType::class, array(
            'constraints' => array(
                new Email(array(
                    'message' => 'El correo electrónico \'{{ value }}\' no es válido',
                    )),
                new NotBlank(array(
                    'message' => 'Ingresa un correo electrónico',
                    )),
                new Length(array('min' => 3,
                    'minMessage' => 'El correo electrónico debe ser mayor a {{ limit }} digitos',)),
                ),
            'attr' => array('placeholder' => 'Correo Electrónico'),
            'trim' => true
        ))
            ->add('codigo', TextType::class, array(
                'constraints' => array(
                    new NotBlank(array(
                        'message' => 'Ingrese el código de activación',
                        )),
                    new Length(array('min' => 3,
                        'minMessage' => 'El número debe ser mayor a {{ limit }} digitos',)),
                    new Length(array('max' => 20,
                        'maxMessage' => 'El número debe ser menor a {{ limit }} digitos',)),
                    ),
                'attr' => array('placeholder' => 'Código de activación')
            ))
            ->add('activar', SubmitType::class,  array(
                'label' => 'Activar »')
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getName()
    {
        return 'frontend_activar';
    }
}
