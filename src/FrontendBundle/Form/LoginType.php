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

class LoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options){
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
                    'attr' => array('placeholder' => 'correo electrónico'),
                    'trim' => true
                    ))
            ->add('password', PasswordType::class,array(
                'constraints' => array(
                    new NotBlank(array(
                        'message' => 'Ingresa una contraseña',
                    )),
                    new Length(array('min' => 6,
                        'minMessage' => 'La contraseña debe ser mayor a {{ limit }} digitos',
                    )),
                    ),
                'attr' => array('placeholder' => 'contraseña')
                ))
            ->add('ingresar', SubmitType::class,  array(
                'label' => 'Ingresar »')
                );

        //->add('ingresar', SubmitType::class,  array('attr' => array('label' => 'Ingresar >>'),));
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getName()
    {
        return 'frontend_login';
    }
}
