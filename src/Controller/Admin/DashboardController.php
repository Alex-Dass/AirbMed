<?php
namespace App\Controller\Admin;

use App\Entity\News;
use App\Entity\User;
use App\Entity\HomeText;
use App\Entity\Partenaires;
use App\Entity\Presentation;
use App\Entity\Prestations;
use App\Entity\PrestationTrois;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
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
        yield MenuItem::section('Home');
        yield MenuItem::subMenu('Page d\'acceuil','fas fa-home')->setSubItems([
            MenuItem::linkToCrud('Ajouter','fas fa-plus', HomeText::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Modifier la page','fas fa-home', HomeText::class),
        ]);
        yield MenuItem::section('Pages du site');
        yield MenuItem::subMenu('Presentation','fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Voir les pages','fas fa-book', Presentation::class),
        ]);
        yield MenuItem::subMenu('Prestation','fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Voir les pages simples','fas fa-book', Prestations::class),
        ]);
        yield MenuItem::subMenu('Partenaires','fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Voir les pages','fas fa-book', Partenaires::class),
        ]);
        yield MenuItem::section('Option');
        yield MenuItem::linkToCrud('Utilisateur','fas fa-users', User::class);
        yield MenuItem::linkToCrud('Option','fas fa-sun', User::class);
    }
}
