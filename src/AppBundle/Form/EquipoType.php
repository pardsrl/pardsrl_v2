<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EquipoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('uuid', null, [
              'label' => 'UUID'
            ])
            ->add('nombre')
            ->add('modelo')
            ->add('tel')
            ->add('email')
            ->add('compania', null, [
              'attr' => [ 'class' => 'select2']
            ])
            ->add('personas', EntityType::class, array(
                'class' => 'AppBundle\Entity\Persona',
                'choice_label'     => 'nombreCompleto',
                'multiple'     => true,
                'expanded'     => true
            ))
            ->add('activo')
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Equipo'
        ));
    }
}
