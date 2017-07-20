<?php

namespace AppBundle\Form;

use Doctrine\DBAL\Query\QueryBuilder;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\Intervencion;

class IntervencionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $intervencion = $options['data'];

        $builder
            ->add('accionDesc', TextType::class, array(
                'label'    => 'Acción',
                'disabled' => true,
                'mapped'   => false,
                'data'     => $intervencion->getAccion() == 0 ? 'Abrir Pozo' : 'Cerrar Pozo'
            ))
            ->add('accion', HiddenType::class)
            ->add('fecha', DateTimeType::class, array(
                'html5' => false,
                'date_widget' => 'single_text',
                'date_format' => 'dd/MM/yyyy',
                'label' => 'Fecha'
            ))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Intervencion::class,
            'ultima_intervencion' => null
        ));
    }
}
