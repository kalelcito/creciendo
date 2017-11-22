<?php

namespace FrontendBundle\Form;

use CoreBundle\Entity\Climalaboral;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClimalaboralType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $a = array(
            'Si' => '1',
            'No' => '2'
        );
        $b = array(
            'Nunca' => '1',
            'Casi Nunca' => '2',
            'Ocasionalmente' => '3',
            'Casi Siempre' => '4',
            'Siempre' => '5'
        );
        $c = array(
            '0' => '1',
            '1' => '2',
            '2' => '3',
            '3' => '4',
            '4' => '5',
            '5' => '6',
            '6' => '7',
            '7' => '8',
            '8' => '9',
            '9' => '10',
            '10' => '11'
        );
        $builder
            ->add('id_cliente', HiddenType::class)
            ->add('fecha', DateType::class, array(
                'widget' => 'single_text',
                'html5' => true,
            ))
            ->add('empresa', TextType::class)
            ->add('numero', TextType::class)
            ->add('antiguedad', TextType::class)
            ->add('a01', ChoiceType::class, array(
                'choices' => $a,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a02', ChoiceType::class, array(
                'choices' => $a,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a03', ChoiceType::class, array(
                'choices' => array(
                    'Si' => '1',
                    'No' => '2',
                    'No Aplica' => '3'
                ),
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a04', ChoiceType::class, array(
                'choices' => $b,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a05', ChoiceType::class, array(
                'choices' => $b,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a06', ChoiceType::class, array(
                'choices' => $b,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a07', ChoiceType::class, array(
                'choices' => $b,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a08', ChoiceType::class, array(
                'choices' => $b,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a09', ChoiceType::class, array(
                'choices' => $b,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a10', ChoiceType::class, array(
                'choices' => $a,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a11', ChoiceType::class, array(
                'choices' => $c,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b11', TextareaType::class)
            ->add('a12', ChoiceType::class, array(
                'choices' => $b,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a13', ChoiceType::class, array(
                'choices' => $b,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a14', ChoiceType::class, array(
                'choices' => $b,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a15', ChoiceType::class, array(
                'choices' => $c,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a16', ChoiceType::class, array(
                'choices' => $b,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a17', ChoiceType::class, array(
                'choices' => array(
                    'Mucho' => '1',
                    'Poco' => '2',
                    'Nada' => '3'
                ),
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a18', ChoiceType::class, array(
                'choices' => $a,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a19', ChoiceType::class, array(
                'choices' => $b,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a20', ChoiceType::class, array(
                'choices' => $a,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a21', ChoiceType::class, array(
                'choices' => $b,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a22', ChoiceType::class, array(
                'choices' => $c,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a23', ChoiceType::class, array(
                'choices' => $b,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a24', ChoiceType::class, array(
                'choices' => $c,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a25', ChoiceType::class, array(
                'choices' => $c,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a26', ChoiceType::class, array(
                'choices' => array(
                    'Si' => '1',
                    'No' => '2',
                    'No sabe' => '3'
                ),
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a27', ChoiceType::class, array(
                'choices' => array(
                    'Si' => '1',
                    'No' => '2',
                    'No sabe' => '3'
                ),
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a28', ChoiceType::class, array(
                'choices' => array(
                    'Muy cordial' => '1',
                    'Cordial' => '2',
                    'Regular' => '3',
                    'Hostil' => '4',
                    'Muy hostil' => '5'
                ),
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a29', ChoiceType::class, array(
                'choices' => $b,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a30', ChoiceType::class, array(
                'choices' => array(
                    'Muy cordial' => '1',
                    'Cordial' => '2',
                    'Regular' => '3',
                    'Hostil' => '4',
                    'Muy hostil' => '5'
                ),
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('a31', ChoiceType::class, array(
                'choices' => $b,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
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
        return 'corebundle_climalaboral';
    }


}