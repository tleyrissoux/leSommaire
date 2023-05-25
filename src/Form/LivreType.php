<?php

namespace App\Form;

use App\Entity\Propriete;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LivreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('resume')
            ->add('image')
            ->add('nombre_etoiles')
            ->add('depositaire')
            ->add('premiere_page')
            ->add('livre')
            ->add('nombre_pages')
            ->add('auteur')
            ->add('isbn')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Propriete::class,
            "translation_domain" => "formulaires",
        ]);
    }
}
