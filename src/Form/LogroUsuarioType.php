<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use App\Entity\LogroUsuario;
use App\Entity\Logro;
    

class LogroUsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('achievement', EntityType::class, [
                'class' => Logro::class, 'constraints' => [new NotBlank()]])            
            ->add('date', TextType::class, ['constraints' => [new NotBlank()]])
        ;
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(
                ['data_class' => LogroUsuario::class]
                );
    }
    public function getName(){
        return 'logros';
    }
}
