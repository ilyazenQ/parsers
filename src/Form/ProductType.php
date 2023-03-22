<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('brandName')
            ->add('externalId')
            ->add('FullPrice')
            ->add('SalePrice')
            ->add('Extra')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('link')
            ->add('diffPrice')
            ->add('Category')
            ->add('Property')
            ->add('ShopVendor')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
