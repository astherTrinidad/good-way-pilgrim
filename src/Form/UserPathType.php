<?php
namespace App\Form;

use App\Entity\Camino;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
    

class UserPathType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('camino', EntityType::class, [
                'class' => Camino::class, 'constraints' => [new NotBlank()]])
            ->add('start_date', TextType::class)
            ->add('finish_date', TextType::class);
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
