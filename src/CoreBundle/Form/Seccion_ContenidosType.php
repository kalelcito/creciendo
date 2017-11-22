<?php

namespace CoreBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Seccion_ContenidosType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre')->add('titulo')->add('url_key',TextType::class,array('label'=>'URL Única'))->add('descripcion')->add('contenido_privado',TextareaType::class,array('attr'=>array('class'=>'ckeditor')))
            ->add('tipo',ChoiceType::class,array('choices'  => array(
                'Contenido solo Texto'=>1,
                'Contenido solo Presentación de PowerPoint'=>2,
                'Contenido Solo Presentación de video Youtube / Vimeo'=>3,
                'Contenido Solo Presentación de video Interno'=>4,
                'Contenido ligado a una encuesta'=>5,
                'Encuesta Auto Diagnóstico'=>10,
                'Encuesta Clima Laboral'=>11,
                'Encuesta Diagnóstico Prevención Incendios'=>12,
                'Encuesta Diagnóstico Salud'=>13,
                'Plan de Trabajo'=>14,
                'Carpeta Virtual'=>15,
                'Minutas'=>16,
                'Red Social'=>17,
                'Programa RFC'=>18,
                'Programa Talento Laboral Parroquial'=>19,
                'Enlace a Página Web'=>20,
                )))
            ->add('orden')->add('activo')->add('secciones')->add('niveles');
        $request = Request::createFromGlobals();
        $tipo = $request->get('tipo');
        if($tipo==10){
            $builder->add('encuestas',EntityType::class, array('class'=>'CoreBundle\Entity\Encuestas','by_reference'=>false,'expanded'=>true,'multiple'=>true));
        }elseif($tipo==11 || $tipo==12 || $tipo==13){
            $builder->add('encuestas',EntityType::class, array('class'=>'CoreBundle\Entity\Encuestas','by_reference'=>false,'expanded'=>false,'multiple'=>false));
        }
}

/**
* {@inheritdoc}
*/
public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults(array(
'data_class' => 'CoreBundle\Entity\Seccion_Contenidos'
));
}

/**
* {@inheritdoc}
*/
public function getBlockPrefix()
{
return 'corebundle_seccion_contenidos';
}


}
