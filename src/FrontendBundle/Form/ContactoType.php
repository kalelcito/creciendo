<?php

namespace FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $a = array('Información'=>'Información','Soporte'=>'Soporte','Consultoría'=>'Consultoría');
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
            ->add('email', EmailType::class, array(
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
        ))
            ->add('tipo',ChoiceType::class, array(
                'label' => 'Selecciona una Opción',
                'choices' => array('Selecciona una Opción'=>$a),
                'expanded' => false,
                'multiple' => false,
                'required' => true,
                'placeholder' => false
            ))
            ->add('asunto', TextType::class,array(
                'label' => 'Asunto',
                'constraints' => array(
                    new NotBlank(array(
                        'message' => 'Ingresa un Asunto',
                    )),
                    new Length(array('min' => 5,
                        'minMessage' => 'El asunto debe ser mayor a {{ limit }} letras',
                    )),
                ),
                'attr' => array('placeholder' => 'Asunto')
            ))
            ->add('mensaje', TextareaType::class,array(
                'label' => 'Mensaje',
                'constraints' => array(
                    new NotBlank(array(
                        'message' => 'Ingresa un mensaje',
                    )),
                ),
                'attr' => array('placeholder' => 'Mensaje')
            ))

            ->add('enviar', SubmitType::class,  array(
                    'label' => 'Enviar')
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getName()
    {
        return 'frontend_contacto';
    }
}
