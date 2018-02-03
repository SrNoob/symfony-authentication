<?php
/**
 * Created by PhpStorm.
 * User: herry
 * Date: 2/2/2018
 * Time: 5:57 PM
 */

namespace AppBundle\Form;


use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormConfigBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       //parent::buildForm($builder, $options); // TODO: Change the autogenerated stub
        $builder
            ->add('username',TextType::class)
            ->add('email',EmailType::class)
            ->add('password',RepeatedType::class,[
                'type'=>PasswordType::class
            ])
            ->add('submit',SubmitType::class, [
                'attr'=>[
                    'class'=>'btn btn-success pull-right'
                ]
            ]);



    }

    public function configureOptions(OptionsResolver $resolver)
    {
        //parent::configureOptions($resolver); // TODO: Change the autogenerated stub
        $resolver->setDefaults([
            'data_class'=>User::class
        ]);
    }
}