<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use App\Entity\LogroUsuario;
use App\Entity\Logro;

class LogroUsuarioType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('achievement', EntityType::class, [
                    'class' => Logro::class])
                ->add('date', TextType::class)
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(
                ['data_class' => LogroUsuario::class]
        );
    }

    public function getName() {
        return 'logros';
    }

}
