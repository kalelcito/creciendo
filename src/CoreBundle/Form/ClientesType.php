<?php

namespace CoreBundle\Form;

use CoreBundle\Entity\Clientes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('id_parent')
            ->add('nombre')
            ->add('apellidos')
            ->add('nom_empresa',TextType::class,array('label'=>'Nombre de la Empresa'))
            ->add('puesto')
            ->add('foto')
            ->add('username',TextType::class,array('label'=>'Usuario'))
            ->add('email')
            ->add('telefono')
            ->add('celular')
            //->add('pass')
            //->add('salt')
            ->add('is_active',CheckboxType::class,array('label'=>'Activo'))
            //->add('verificado')
            //->add('recuperacion')
            //->add('activacion')
            //->add('ultimo_acceso')
            ->add('pagoefectivo')
            ->add('pagotarjeta')
            ->add('pagooxxo')
            ->add('saldo')
            ->add('conekta_customer_id',TextType::class,array('label'=>'ID Conekta'))
            ->add('creado')
            ->add('actualizado')
            //->add('empresa')
            ->add('niveles')
            ->add('perfil');
}

/**
* {@inheritdoc}
*/
public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults(array(
'data_class' => 'CoreBundle\Entity\Clientes'
));
}

/**
* {@inheritdoc}
*/
public function getBlockPrefix()
{
return 'corebundle_clientes';
}


}
