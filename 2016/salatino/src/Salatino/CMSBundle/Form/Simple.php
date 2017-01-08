<?php
namespace Salatino\CMSBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Simple extends AbstractType
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
            ->add('enTitle', null, array('label' => 'form.labels.titleEN', 'translation_domain' => 'CMS'))
            ->add('title', null, array('label' => 'form.labels.title', 'translation_domain' => 'CMS'))
            ->add('enBody', 'Symfony\Component\Form\Extension\Core\Type\TextareaType', array('label' => 'form.labels.bodyEN', 'translation_domain' => 'CMS'))
            ->add('body', 'Symfony\Component\Form\Extension\Core\Type\TextareaType', array('label' => 'form.labels.body', 'translation_domain' => 'CMS'))
            ->add('image1', 'Symfony\Component\Form\Extension\Core\Type\FileType', $imageInfo)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SalatinoCMSBundle\Entity\Content',
        ));
    }

}