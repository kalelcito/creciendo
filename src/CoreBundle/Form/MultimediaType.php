<?php

namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MultimediaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre')->add('descripcion')->add('tipo',ChoiceType::class, array('choices'  => array('Imagen'=>1,'Video Interno'=>2,'Video Youtube'=>3,'Video Vimeo'=>4,)))->add('seccionContenidos',TextType::class,array('disabled'=>true));
        $request = Request::createFromGlobals();
        $tipo = $request->get('tipo');
        $seccion = $request->get('sec');
        if($tipo==1){
            $builder->add('imagen',FileType::class, array('label'=>'Imagen','data_class'=>null,'required'=>false,'attr'=>array('ruta'=>'pres/'.$seccion)));
        }elseif ($tipo==2){
            $builder->add('imagen',FileType::class, array('label'=>'Video (tamaño máximo 250mb)','data_class'=>null,'required'=>false,'attr'=>array('ruta'=>'video/'.$seccion)));
        }elseif ($tipo==3){
            $builder->add('video',TextType::class, array('label'=>'Link Youtube'));
        }elseif ($tipo==4){
            $builder->add('video',TextType::class, array('label'=>'Link Vimeo'));
        }
    }

/**
* {@inheritdoc}
*/
public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults(array(
'data_class' => 'CoreBundle\Entity\Multimedia'
));
}

/**
* {@inheritdoc}
*/
public function getBlockPrefix()
{
return 'corebundle_multimedia';
}

}
