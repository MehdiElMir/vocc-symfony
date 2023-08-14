<?php

namespace App\Controller\Admin;

use App\Entity\Formation;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;

use EasyCorp\Bundle\EasyAdminBundle\Field\{
    TextField,
    ImageField,
    IntegerField,
    TextareaField,
    AssociationField,
    DateField,
    FileFormField
};

use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class FormationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Formation::class;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('title')
            
        ;
    }

    
     public function configureFields(string $pageName): iterable
     {
         return [
        //  IdField::new('id')->hideOnIndex(),
         TextField::new('reference'),
         TextField::new('title'),
         TextField::new('description')->hideOnIndex(),
         AssociationField::new('modules')
             ->setFormTypeOptions([
                 'by_reference' => false, // this is important for many-to-many relations
                 'attr' => ['data-widget' => 'select2'] // this enables autocomplete
             ]),
         IntegerField::new('hours'),
         TextareaField::new('imageFile')->setFormType(VichImageType::class),
         
     ];
     }
    
}
