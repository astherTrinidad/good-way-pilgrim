<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class LogroUsuarioType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('achievement', IntegerType::class, array('required' => true))->add('achievement', IntegerType::class, array('required' => true))
                ->add('user', IntegerType::class, array('required' => true))
                ->add('date', DateType::class, array('required' => true));               
    }

}
