<?php

namespace App\Controller\Admin;

use App\Entity\Presentation;
use App\Repository\PresentationRepository;
use Doctrine\ORM\Mapping\Id;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;

use FOS\CKEditorBundle\Form\Type\CKEditorType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;

class PresentationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Presentation::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud 
        ->setSearchFields(['id', '1'])
        ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->remove(Crud::PAGE_INDEX, Action::NEW)
            ->remove(Crud::PAGE_INDEX, Action::DELETE)
        ;
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre'),
            SlugField::new('slug')->setTargetFieldName('titre')->hideOnForm()->hideOnDetail()->hideOnIndex(),
            ImageField::new('image','Image titre')->setUploadDir('public\images\Presentation')->setBasePath('images\Presentation')->setUploadedFileNamePattern('[slug]-[contenthash].[extension]'),
            TextEditorField::new('corp', 'Contenu de la page')->setFormType(CKEditorType::class),
           
        ];
    }
    
}
