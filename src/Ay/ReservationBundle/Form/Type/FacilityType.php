<?php

namespace Ay\ReservationBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FacilityType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('name', 'text', array(
            'attr' => array('class' => 'form-control ay-input-name'),
        ));
        $builder->add('deleted', 'checkbox', array(
            'required' => false
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Ay\ReservationBundle\Entity\Facility',
        ));
    }

    public function getName() {
        return 'facility';
    }

}
