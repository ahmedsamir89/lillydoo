<?php

namespace AppBundle\Form;


use AppBundle\Entity\AddressBook;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressBookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class)
            ->add('lastName', TextType::class)
            ->add('streetAndNumber', TextType::class)
            ->add('zip', TextType::class)
            ->add('city', TextType::class)
            ->add('country', CountryType::class)
            ->add('phoneNumber', TextType::class)
            ->add('birthday', BirthdayType::class)
            ->add('email', EmailType::class)
            ->add('picture', FileType::class, ['required' => false, 'data_class' => null])

            ;
    }

   public function configureOptions(OptionsResolver $resolver)
   {
       $resolver->setDefaults([
          'data_class' => AddressBook::class
       ]);
   }
}