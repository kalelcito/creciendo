<?php

namespace FrontendBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;

class RegistroType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre', TextType::class, array(
            'constraints' => array(
                new NotBlank(array(
                    'message' => 'Ingrese su nombre',
                )),
            ),
            'attr' => array('placeholder' => 'Nombre(s)')
        ))
            ->add('apellidos', TextType::class, array(
                'constraints' => array(
                    new NotBlank(array(
                        'message' => 'Ingrese sus apellidos',
                    )),
                ),
                'attr' => array('placeholder' => 'Apellidos')
            ))
            ->add('email', EmailType::class, array(
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
                'trim' => true,
            ))
            ->add('empresa', TextType::class, array(
                'constraints' => array(
                    new NotBlank(array(
                        'message' => 'Ingrese su empresa',
                    )),
                ),
                'attr' => array('placeholder' => 'Empresa')
            ))
            ->add('ciudad', TextType::class, array(
                'constraints' => array(
                    new NotBlank(array(
                        'message' => 'Ingrese su ciudad',
                    )),
                ),
                'attr' => array('placeholder' => 'Ciudad')
            ))
            ->add('sucursal', TextType::class, array(
                'attr' => array('placeholder' => 'Sucursal'),'required'=>false
            ))
            ->add('puesto', TextType::class, array(
                'constraints' => array(
                    new NotBlank(array(
                        'message' => 'Ingrese su puesto',
                    )),
                ),
                'attr' => array('placeholder' => 'Puesto')
            ))
            ->add('password', PasswordType::class, array(
                'constraints' => array(
                    new NotBlank(array(
                        'message' => 'Ingresa una contraseña',
                    )),
                    new Length(array('min' => 6,
                        'minMessage' => 'La contraseña debe ser mayor a {{ limit }} digitos',
                    )),
                ),
                'attr' => array('placeholder' => 'Contraseña')
            ))
            ->add('terminos', CheckboxType::class, array(
                'constraints' => array(
                    new NotBlank(array(
                        'message' => 'Acepto los términos y condiciones de uso',
                    )),
                ),
                'attr' => array('placeholder' => '')
            ))
            ->add('niveles',EntityType::class,array('class'=>'CoreBundle\Entity\Niveles','label'=>'Niveles',
                'query_builder' => function(EntityRepository $repository) {
                $qb = $repository->createQueryBuilder('s');
                return $qb
                    ->where('s.activo=1');
            }))
            /*->add('niveles', EntityType::class, array(
                'class' => 'CoreBundle\Entity\Niveles',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->where('u.activo = 1');
                },
                'choice_label' => 'nombre',
            ))*/
            /*->add('telefono', TextType::class, array(
                'constraints' => array(
                    new NotBlank(array(
                        'message' => 'Ingrese un teléfono fijo',
                    )),
                    new Length(array('min' => 10,
                        'minMessage' => 'El número debe ser de  {{ limit }} digitos',)),
                    new Length(array('max' => 10,
                        'maxMessage' => 'El número debe ser de  {{ limit }} digitos',)),
            ),
                'attr' => array('placeholder' => 'Número con lada sin 01')
            ))
            ->add('celular', TextType::class, array(
                'constraints' => array(
                    new NotBlank(array(
                        'message' => 'Ingrese un número celular',
                    )),
                    new Length(array('min' => 10,
                        'minMessage' => 'El número debe ser de  {{ limit }} digitos',)),
                    new Length(array('max' => 10,
                        'maxMessage' => 'El número debe ser de  {{ limit }} digitos',)),
                ),
                'attr' => array('placeholder' => 'Número sin 044 o 045')
            ))*/
            ->add('registrar', SubmitType::class, array(
                    'label' => 'Registrar »')
            )
           ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getName()
    {
        return 'frontend_registro';
    }
}
