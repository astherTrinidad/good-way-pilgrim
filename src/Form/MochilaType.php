<?php
namespace App\Form;

use App\Entity\Camino;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
    

class MochilaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('camino', EntityType::class, [
                'class' => Camino::class, 'constraints' => [new NotBlank()]])            
            ->add('object', TextType::class, ['constraints' => [new NotBlank()]])       
            ->add('quantity', IntegerType::class, ['constraints' => [new NotBlank()]])
        ;
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(
                ['data_class' => Camino::class]
                );
    }
    public function getName(){
        return 'logros';
    }
}
