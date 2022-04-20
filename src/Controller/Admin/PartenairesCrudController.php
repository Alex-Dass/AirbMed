<?php

namespace App\Controller\Admin;

use App\Entity\Partenaires;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PartenairesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Partenaires::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('categories'),
            TextField::new('sousCategories'),
            TextField::new('nom'),
            TextField::new('description'),
            TextField::new('url'),
        ];
    }
    
}
