<?php

namespace App\Controller\Admin;

use App\Entity\SousPrestations;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Twig\Node\TextNode;

class SousPrestationsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SousPrestations::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud 
        ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
        ;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            //ArrayField::new('titre'),
            TextField::new('sousTitre'),
            TextEditorField::new('texte', 'sous corps 1 (optionel)')->setFormType(CKEditorType::class),
        ];
    }
    
}
