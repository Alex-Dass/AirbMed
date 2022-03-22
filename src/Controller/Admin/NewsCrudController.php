<?php

namespace App\Controller\Admin;

use App\Entity\News;
use App\Repository\NewsRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\TextEditorType;
use FOS\CKEditorBundle\FOSCKEditorBundle;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Config\FosCkEditorConfig;

class NewsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return News::class;
    }

    public function recentNews($max=3, NewsRepository $newsRepository){
        $news = $newsRepository->findBy([],['id'=>'DESC'],['limit'=> $max]);
        
        return $this->render(
            'news/recent_news.html.twig',
            ['news' => $news]
        );
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            DateTimeField::new('date'),
            TextField::new('author'),
            TextField::new('title'),
            TextEditorField::new('body')->hideOnDetail(),
            //DateTimeField::new('updateAt')->hideOnForm(),
        ];
    }
}
