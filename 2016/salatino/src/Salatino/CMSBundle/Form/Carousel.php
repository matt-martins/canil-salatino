<?php
namespace Salatino\CMSBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Carousel extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $picture = array(
                        'label'              => 'forms.labels.picture', 
                        'translation_domain' => 'CMS', 
                        'required'           => false,
                        'data_class'         => null
                    );

        $builder
            ->add('picture', 'Symfony\Component\Form\Extension\Core\Type\FileType', $picture);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Salatino\EntityBundle\Entity\Content',
        ));
    }

}