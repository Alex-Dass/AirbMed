<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContatcType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom', TextType::class, [
                'label' => 'Nom',
                'required' => true])
            ->add('Mail', EmailType::class,[
                'label' => 'Adresse mail',
                'required' => true])
            ->add('Telephone' , NumberType::class,[
                'label' => 'Numéro de téléphone',
                'required' => true])
            ->add('Objet' ,TextType::class,[
                'label' => 'Objet',
                'required' => true])
            ->add('Message' ,TextType::class,[
                'label' => 'Message',
                'required' => true])
            ->add('document' ,FileType::class,[
                'mapped' => false,
                'required' => false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
