<?php

namespace App\Controller\Admin;

use App\Entity\NewsLetter;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;

class NewsLetterCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return NewsLetter::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            EmailField::new('email'),
            
        ];
    }
    
}
