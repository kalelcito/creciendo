<?php

namespace FrontendBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MinutasType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('id_cliente', HiddenType::class)
            ->add('fecha', DateType::class, array(
                'widget' => 'single_text',
                'html5' => true,
            ))
            ->add('tema', TextType::class)
            ->add('empresa', TextType::class)
            ->add('consultor', ChoiceType::class,array('choices'=>array(
                'Alberto Sandoval'=> 'albertosandoval583@gmail.com',
                'Alma Trinidad'=> 'alma.trinidad.g@gmail.com',
                'Antonio Padilla'=> 'padilla.de.alba@hotmail.com',
                'Arturo S Hernández'=> 'ash.om09@gmail.com',
                'Federico Rodríguez'=> 'frodriguez@red-erac.com',
                'Gerardo Milano'=> 'gmilano132@gmail.com',
                'Héctor Martínez de Castro'=> 'mtzdecastro@hotmail.com',
                'Olga Adriana Melo'=> 'oambastida@hotmail.com',
                'Perla Velazquez'=> 'pvelazquez@red-erac.com',
                'Guadalupe Morales'=> 'gmoralsa@yahoo.com.mx',
                'Jesús Casas'=> 'jesuscasas01@gmail.com',
                'Celeste Ricárdez'=> 'cricardez@red-erac.com',
                'Sin Consultor ERAC'=>'minutas@rederac.com'/*,
                'Test'=>'cesar@innology.mx'*/
            )))
            ->add('duracion', TextType::class)
            ->add('asistentes', TextareaType::class)
            ->add('puntos', TextareaType::class)
            ->add('acuerdos', TextareaType::class)
            ->add('fechasiguiente', DateType::class, array(
                'widget' => 'single_text',
                'html5' => true,
            ))
            ->add('enviar', SubmitType::class,array('attr'=>array('class'=>'hidden')))
        ;
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
        return 'corebundle_minutas';
    }


}