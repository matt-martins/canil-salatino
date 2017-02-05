<?php
namespace Salatino\CMSBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class Pedigree extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $picture = array(
                        'label'              => 'forms.labels.picture', 
                        'translation_domain' => 'CMS', 
                        'required'           => false,
                        'data_class'         => null
                    );

        $smallPicture = $picture;
        $smallPicture['label'] = 'forms.labels.smallPicture';

        $builder
            ->add('title' , null, array('label' => 'forms.labels.title', 'translation_domain' => 'CMS'))
            ->add('smallPicture', 'Symfony\Component\Form\Extension\Core\Type\FileType', $smallPicture)
            ->add('picture', 'Symfony\Component\Form\Extension\Core\Type\FileType', $picture)
            ->add('body' , TextareaType::class, array('label' => 'forms.labels.body', 'translation_domain' => 'CMS'))

            ->add('cp01' , null, array('label' => 'forms.labels.cp01', 'translation_domain' => 'CMS'))
            ->add('cp02' , null, array('label' => 'forms.labels.cp02', 'translation_domain' => 'CMS'))
            ->add('cp03' , null, array('label' => 'forms.labels.cp03', 'translation_domain' => 'CMS'))
            ->add('cp04' , null, array('label' => 'forms.labels.cp04', 'translation_domain' => 'CMS'))
            ->add('cp05' , null, array('label' => 'forms.labels.cp05', 'translation_domain' => 'CMS'))
            ->add('cp06' , null, array('label' => 'forms.labels.cp06', 'translation_domain' => 'CMS'))
            ->add('cp07' , null, array('label' => 'forms.labels.cp07', 'translation_domain' => 'CMS'))
            ->add('cp08' , null, array('label' => 'forms.labels.cp08', 'translation_domain' => 'CMS'))
            ->add('cp09' , null, array('label' => 'forms.labels.cp09', 'translation_domain' => 'CMS'))
            ->add('cp10' , null, array('label' => 'forms.labels.cp10', 'translation_domain' => 'CMS'))
            ->add('cp11' , null, array('label' => 'forms.labels.cp11', 'translation_domain' => 'CMS'))
            ->add('cp12' , null, array('label' => 'forms.labels.cp12', 'translation_domain' => 'CMS'))
            ->add('cp13' , null, array('label' => 'forms.labels.cp13', 'translation_domain' => 'CMS'))
            ->add('cp14' , null, array('label' => 'forms.labels.cp14', 'translation_domain' => 'CMS'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => null,
        ));
    }

}