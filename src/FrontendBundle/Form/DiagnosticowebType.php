<?php

namespace FrontendBundle\Form;

use CoreBundle\Entity\Diagnosticoweb;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Form;

class DiagnosticowebType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $campos = array(
            'Si' => '1',
            'En desarrollo avanzado / Informal muy conocido / Subjetivo muy claro' => '2',
            '50%' => '3',
            'En desarrollo iniciando / Informal poco conocido / Subjetivo poco claro' => '4',
            'No' => '5'
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
            ->add('b01', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a02', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b02', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a03', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b03', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a04', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b04', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a05', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b05', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a06', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b06', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a07', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b07', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a07', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b07', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a08', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b08', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a09', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b09', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a10', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b10', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a11', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b11', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a12', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b12', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a13', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b13', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a14', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b14', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a15', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b15', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a16', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b16', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a17', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b17', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a18', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b18', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a19', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b19', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a20', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b20', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a21', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b21', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a22', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b22', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a23', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b23', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a24', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b24', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a25', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b25', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a26', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b26', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a27', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b27', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a28', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b28', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a29', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b29', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a30', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b30', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a31', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b31', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a32', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b32', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a33', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b33', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a34', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b34', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a35', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b35', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a36', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b36', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a37', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b37', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a38', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b38', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a39', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b39', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a40', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b40', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a41', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b41', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a42', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b42', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a43', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b43', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a44', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b44', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a45', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b45', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a46', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b46', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a47', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b47', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a48', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b48', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a49', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b49', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a50', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b50', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a51', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b51', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a52', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b52', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a53', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b53', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a54', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b54', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a55', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b55', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a56', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b56', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a57', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b57', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a58', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b58', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a59', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b59', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a60', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b60', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a61', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b61', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a62', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b62', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a63', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b63', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a64', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b64', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a65', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b65', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a66', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b66', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a67', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b67', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a68', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b68', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a69', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b69', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a70', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b70', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a71', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b71', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a72', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b72', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a73', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b73', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a74', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b74', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a75', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b75', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a76', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b76', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a77', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b77', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a78', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b78', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a79', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b79', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a80', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b80', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a81', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b81', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a82', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b82', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a83', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b83', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a84', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b84', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a85', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b85', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a86', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b86', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a87', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b87', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a88', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b88', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a89', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b89', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a90', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b90', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a91', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b91', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a92', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b92', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a93', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b93', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a94', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b94', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a95', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b95', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a96', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b96', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a97', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b97', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a98', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b98', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a99', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b99', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a100', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b100', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a101', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b101', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a102', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b102', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a103', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b103', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a104', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b104', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a105', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b105', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a106', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b106', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a107', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b107', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a108', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b108', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a109', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b109', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a110', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b110', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a111', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b111', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a112', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b112', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a113', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b113', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a114', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b114', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a115', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b115', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a116', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b116', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a117', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b117', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a118', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b118', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a119', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b119', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a120', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b120', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a121', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b121', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a122', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b122', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a123', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b123', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a124', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b124', TextareaType::class, array(
                'required' => false,
            ))
            ->add('a125', ChoiceType::class, array(
                'choices' => $campos,
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'placeholder' => false
            ))
            ->add('b125', TextareaType::class, array(
                'required' => false,
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
        return 'corebundle_diagnosticoweb';
    }


}