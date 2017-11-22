<?php

namespace FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ValoresType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre', TextType::class,array(
            'label' => 'Nombre',
            'constraints' => array(
                new NotBlank(array(
                    'message' => 'Ingresa una nombre',
                )),
                new Length(array('min' => 2,
                    'minMessage' => 'El nombre debe ser mayor a {{ limit }} letras',
                )),
            ),
            'attr' => array('placeholder' => 'Nombre')
        ))
            ->add('telefono', IntegerType::class,array(
                'label' => 'Teléfono',
                'invalid_message' => 'El número \'{{ value }}\' no es válido',
                'constraints' => array(
                    new Length(array('min' => 10,
                        'minMessage' => 'El teléfono debe ser de {{ limit }} dígitos',
                    )),
                ),
                'attr' => array('placeholder' => 'Teléfono')
            ))
            ->add('email', TextType::class, array(
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
                'attr' => array('placeholder' => 'Correo electrónico')
            ))
            ->add('empresa', TextType::class,array(
                'label' => 'Nombre de la Empresa',
                'constraints' => array(
                    new NotBlank(array(
                        'message' => 'Ingresa una Empresa',
                    )),
                ),
                'attr' => array('placeholder' => 'Nombre de la Empresa')
            ))
            ->add('puesto', TextType::class,array(
                'label' => 'Puesto',
                'constraints' => array(
                    new NotBlank(array(
                        'message' => 'Ingresa un Puesto',
                    )),
                ),
                'attr' => array('placeholder' => 'Puesto')
            ))
            ->add('valores', TextType::class,array(
                'label' => 'Valores de tu Empresa',
                'constraints' => array(
                    new NotBlank(array(
                        'message' => 'Ingresa Valores',
                    )),
                ),
                'attr' => array('placeholder' => 'Valores en tu Empresa')
            ))

            ->add('enviar', SubmitType::class,  array(
                    'label' => 'Enviar')
            );

    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'frontend_bundle_solicitud_type';
    }
}
