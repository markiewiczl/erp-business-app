<?php

namespace App\Form;

use App\Entity\FileCatalogue;
use App\Entity\Units;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class NewFileCatalogueFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fileName', TextType::class, [
                'label' => 'nazwa produktu'
            ])
            ->add('fileCatalogueIndex', TextType::class, [
                'label' => 'index w katalogu'
            ])
            ->add('fileNetPrice', NumberType::class, [
                'label' => 'cena netto',
                'attr' => ['min' => 0]
            ])
            ->add('image', FileType::class, [
                'label' => 'Zdjęcie(opcjonalne)',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/*',
                        ],
                        'mimeTypesMessage' => 'Nie poprawne rozszerzenie pliku'
                    ])
                ]
            ])
            ->add('unit', EntityType::class, [
                'label' => 'jednostka',
                'class' => Units::class,
                'choice_label' => 'unit_name'
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Zapisz',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FileCatalogue::class,
        ]);
    }
}
