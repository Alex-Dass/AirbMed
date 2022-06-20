<?php

namespace App\Controller\Admin;

use App\Entity\HomeText;
use App\Repository\HomeTextRepository;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

use FOS\CKEditorBundle\Form\Type\CKEditorType;


class HomeTextCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return HomeText::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud 
        ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
        ;
    }

    
    public function show(HomeTextRepository $doctrine)
    { 
        $text = $doctrine->findAll();
        return $this->render(
            'home/text.html.twig',
            ['text' => $text]
        );
    }
      

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextEditorField::new('hometexte', 'Contenu')->setFormType(CKEditorType::class),
        ];
    }
    
}
