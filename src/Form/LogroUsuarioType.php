<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Logro;
use App\Entity\LogroUsuario;

class LogroUsuarioType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('achievement', EntityType::class,
                        ['class' => Logro::class])
                ->add('date', DateType::class);               
    }
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'csrf_protection'       => false,
            'data_class'            => LogroUsuario::class
        ));
    }

    public function getBlockPrefix() {
        return '';
    }

}
