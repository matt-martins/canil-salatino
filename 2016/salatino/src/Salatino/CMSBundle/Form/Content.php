<?php
namespace Salatino\CMSBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Content extends AbstractType
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

        $bigPicture = $picture;
        $bigPicture['label'] = 'forms.labels.pic03';

        $builder
            ->add('title' , null, array('label' => 'forms.labels.title', 'translation_domain' => 'CMS'))
            ->add('body' , null, array('label' => 'forms.labels.body', 'translation_domain' => 'CMS'))
            ->add('video' , null, array('label' => 'forms.labels.video', 'translation_domain' => 'CMS'))
            ->add('smallPicture', 'Symfony\Component\Form\Extension\Core\Type\FileType', $smallPicture)
            ->add('picture', 'Symfony\Component\Form\Extension\Core\Type\FileType', $picture)
            ->add('bigPicture', 'Symfony\Component\Form\Extension\Core\Type\FileType', $bigPicture);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Salatino\EntityBundle\Entity\Content',
        ));
    }

}