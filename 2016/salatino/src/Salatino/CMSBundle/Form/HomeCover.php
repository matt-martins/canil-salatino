<?php
namespace Salatino\CMSBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class HomeCover extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $picture = array(
                        'label'              => 'forms.labels.pic01', 
                        'translation_domain' => 'CMS', 
                        'required'           => false,
                        'data_class'         => null
                    );

        $smallPicture = $picture;
        $smallPicture['label'] = 'forms.labels.pic02';

        $bigPicture = $picture;
        $bigPicture['label'] = 'forms.labels.pic03';

        $builder
            ->add('title' , null, array('label' => 'forms.labels.title', 'translation_domain' => 'CMS'))
            ->add('body' , null, array('label' => 'forms.labels.body', 'translation_domain' => 'CMS'))
            ->add('picture', FileType::class, $picture)
            ->add('smallPicture', FileType::class, $smallPicture)
            ->add('bigPicture', FileType::class, $bigPicture)
            ->add('showPuppies' , CheckboxType::class, array('label' => 'forms.labels.showPuppies', 'translation_domain' => 'CMS', 'required' => false))
            ->add('showHostel' , CheckboxType::class, array('label' => 'forms.labels.showHostel', 'translation_domain' => 'CMS', 'required' => false));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Salatino\EntityBundle\Entity\Content',
        ));
    }

}