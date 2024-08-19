<?php

namespace App\Controller\Admin;

use App\Entity\TypesProprietes;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TypesProprietesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypesProprietes::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
            // TextEditorField::new('description'),
        ];
    }
    
}
