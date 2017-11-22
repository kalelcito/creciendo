<?php

namespace FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;

class BoletinType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email', EmailType::class, array(
                'label' => 'Correo electrónico',
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
            'attr' => array('placeholder' => 'Correo electrónico'),
                'trim' => true
        ))->add('enviar', SubmitType::class,  array(
                    'label' => '✓')
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getName()
    {
        return 'frontend_boletin';
    }
}
