<?php

namespace App\Controller\Admin;

use App\Entity\Prestations;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Twig\Node\TextNode;

class PrestationsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Prestations::class;
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
            FormField::addPanel('Remplisage obligatoire'),
            TextField::new('titre'),
           // ArrayField::new('SousTitre', 'Sous categorie'),
            TextEditorField::new('texte', 'Contenu')->setFormType(CKEditorType::class),
            FormField::addPanel('Remplisage optionel en fonction de la page')->collapsible(),
            TextField::new('sousTitre1', 'Sous titre 1 (optionel)'),
            TextEditorField::new('body1', 'sous corps 1 (optionel)')->setFormType(CKEditorType::class),
            TextField::new('sousTitre2', 'Sous titre 2 (optionel)')->hideOnIndex(),
            TextEditorField::new('body2', 'Contenu')->setFormType(CKEditorType::class)->hideOnIndex(),
            TextField::new('sousTitre3', 'Sous titre 3 (optionel)')->hideOnIndex(),
            TextEditorField::new('body3', 'Contenu')->setFormType(CKEditorType::class)->hideOnIndex(),
            TextField::new('sousTitre4', 'Sous titre 4 (optionel)')->hideOnIndex(),
            TextEditorField::new('body4', 'Contenu')->setFormType(CKEditorType::class)->hideOnIndex(),
            TextField::new('sousTitre5', 'Sous titre 5 (optionel)')->hideOnIndex(),
            TextEditorField::new('body5', 'Contenu')->setFormType(CKEditorType::class)->hideOnIndex(),
        ];

         // $id = IdField::new('id');   
            // $titre =TextField::new('titre');
            // $text=TextEditorField::new('texte', 'Contenu')->setFormType(CKEditorType::class);
            // $st1=TextField::new('sousTitre1', 'Sous titre 1 (optionel)');
            // $body1=TextEditorField::new('body1', 'sous corps 1 (optionel)')->setFormType(CKEditorType::class);
            // $st2= TextField::new('sousTitre2', 'Sous titre 2 (optionel)')->hideOnIndex();
            // $body2=TextEditorField::new('body2', 'Contenu')->setFormType(CKEditorType::class)->hideOnIndex();
            // $st3= TextField::new('sousTitre3', 'Sous titre 3 (optionel)')->hideOnIndex();
            // $body3=TextEditorField::new('body3', 'Contenu')->setFormType(CKEditorType::class)->hideOnIndex();
            // $st4= TextField::new('sousTitre4', 'Sous titre 4 (optionel)')->hideOnIndex();
            // $body4=TextEditorField::new('body4', 'Contenu')->setFormType(CKEditorType::class)->hideOnIndex();
            // $st5=  TextField::new('sousTitre5', 'Sous titre 5 (optionel)')->hideOnIndex();
            // $body5=TextEditorField::new('body5', 'Contenu')->setFormType(CKEditorType::class)->hideOnIndex();

            // if($st1 != NULL){
            //     return[$titre, $text];
            // }
            // else
            //     return [$titre, $text, $st1, $body1,$st2,$body2,$st3,$body3,$st4,$body4,$st5,$body5];
    }      
}
