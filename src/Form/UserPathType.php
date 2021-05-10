<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use App\Entity\Camino;
    

class UserPathType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('camino', EntityType::class, [
                'class' => Camino::class, 'constraints' => [new NotBlank()]])  
        ;
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(
                ['data_class' => UsuarioCamino::class]
                );
    }
    public function getName(){
        return 'caminos';
    }
}
