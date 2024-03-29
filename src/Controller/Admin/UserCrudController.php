<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureActions(Actions $actions): Actions
{
    return $actions

        ->remove(Crud::PAGE_INDEX, Action::NEW)
    ;
}

    public function configureCrud(Crud $crud): Crud
    {
        return $crud 
        ->renderSidebarMinimized()
        ;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('username','Nom d\'utilisateur')->hideOnForm(),
            TextField::new('email','Adresse mail')->hideOnForm(),
            ChoiceField::new('roles','Rôle')->allowMultipleChoices()->autocomplete()->setChoices([
                'Utilisateur' => 'ROLE_USER',
                'Modérateur' => 'ROLE_MOD',
                'Administrateur' => 'ROLE_ADMIN',
            ])
        ];
    }
    
}
