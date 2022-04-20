<?php

namespace App\Controller\Admin;

use App\Entity\News;
use App\Repository\NewsRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class NewsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return News::class;
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
            DateTimeField::new('date','Date'),
            TextField::new('author','Autheur'),
            TextField::new('title','Titre de l\'article'),
            ImageField::new('image','Image du carrouselle')->setUploadDir('public\images')->setBasePath('images')->setUploadedFileNamePattern('[slug]-[contenthash].[extension]'),
            TextEditorField::new('body', 'Contenu')->setFormType(CKEditorType::class),
            
           
            //TextEditorField::new('body','Article')->hideOnDetail(),
            //DateTimeField::new('updateAt')->hideOnForm(),
        ];
    }
}
