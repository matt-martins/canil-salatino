<?php
namespace Salatino\CMSBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UploadImage extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $imageInfo = array(
                        'label'              => 'form.labels.image1', 
                        'translation_domain' => 'CMS', 
                        'required'           => false,
                        'data_class'         => null
                    );


        $builder
            ->add('title' , null, array('label' => 'form.labels.title', 'translation_domain' => 'CMS'))
            ->add('image1', 'Symfony\Component\Form\Extension\Core\Type\FileType', $imageInfo)
            ->add('hash'  , null, array('label' => 'form.labels.YTVid', 'translation_domain' => 'CMS'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SalatinoCMSBundle\Entity\Content',
        ));
    }

}