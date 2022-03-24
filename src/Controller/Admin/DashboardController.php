<?php

namespace App\Controller\Admin;

use App\Entity\News;
use App\Entity\User;
use App\Entity\HomeText;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
       // return parent::index();
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
              $url = $routeBuilder->setController(NewsCrudController::class)->generateUrl();
              return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('AirbMed');
    }

    public function configureMenuItems(): iterable
    {
        //yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToUrl('Retour sur le site', 'fas fa-arrow-left', '/');
        yield MenuItem::section('Actualité');
        yield MenuItem::subMenu('News','fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter des news','fas fa-plus', News::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir les news','fas fa-book', News::class),
        ]);
        yield MenuItem::section('Pages');
        yield MenuItem::subMenu('Page d\'acceuil','fas fa-home')->setSubItems([
            MenuItem::linkToCrud('Ajouter','fas fa-plus', HomeText::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Modifier la page','fas fa-home', HomeText::class),
        ]);
        yield MenuItem::subMenu('Page','fas fa-file')->setSubItems([
            MenuItem::linkToCrud('Ajouter','fas fa-plus', News::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir les pages','fas fa-book', News::class),
        ]);
        yield MenuItem::subMenu('blablabla','fab fa-bitcoin')->setSubItems([
            MenuItem::linkToCrud('blablabla','fas fa-plus', News::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('blablablas','fas fa-book', News::class),
        ]);
        yield MenuItem::section('Option');
        yield MenuItem::linkToCrud('Utilisateur','fas fa-users', User::class);
        yield MenuItem::linkToCrud('Option','fas fa-sun', User::class);
        
    }
}
