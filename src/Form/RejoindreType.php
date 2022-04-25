<?php

namespace App\Form;

use App\Entity\Rejoindre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;



class RejoindreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class,[
                'label' => 'Nom',
                'required' => true ])
            ->add('prenom', TextType::class,[
                'label' => 'Prénom',
                'required' => true ])
            ->add('telephone', NumberType::class,[
                'label' => 'N° de téléphone',
                'required' => true ])
            ->add('email', EmailType::class,[
                'label' => 'E-mail',
                'required' => true ])
            ->add('cv', FileType::class,[
                'label' => 'CV',
                'required' => true ])
            ->add('motivation', FileType::class,[
                'label' => 'L ettre de motivation',
                'required' => true ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Rejoindre::class,
        ]);
    }
}
