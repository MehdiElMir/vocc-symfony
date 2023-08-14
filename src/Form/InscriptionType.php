<?php

namespace App\Form;

use App\Entity\Formation;
use App\Entity\Inscription;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom_et_prenom', TextType::class, [
                'attr' => ['class' => 'form-control'],
            ])
            ->add('fonction', TextType::class, [
                'attr' => ['class' => 'form-control'],
            ])
            ->add('telephone', IntegerType::class, [
                'attr' => ['class' => 'form-control'],
            ])
            ->add('email', TextType::class, [
                'attr' => ['class' => 'form-control'],
            ])
            ->add('reseaux_sociaux', TextType::class, [
                'attr' => ['class' => 'form-control'],
            ])
            ->add('adresse', TextType::class, [
                'attr' => ['class' => 'form-control'],
            ])
            ->add('code_postal', IntegerType::class, [
                'attr' => ['class' => 'form-control'],
            ])
            ->add('ville', TextType::class, [
                'attr' => ['class' => 'form-control'],
            ])
            ->add('pays', TextType::class, [
                'attr' => ['class' => 'form-control'],
            ])
            ->add('formation', EntityType::class, [
                'class' => Formation::class,
                'attr' => ['class' => 'form-control'],
            ])
            ->add('jour', ChoiceType::class, [
                'choices' => array_combine(range(1, 30), range(1, 30)),
                'attr' => ['class' => 'form-control'],
            ])
            ->add('mois', ChoiceType::class, [
                'choices' => array_combine(range(1, 12), range(1, 12)),
                'attr' => ['class' => 'form-control'],
            ])
            ->add('annee', ChoiceType::class, [
                'choices' => array_combine(range(2023, 2033), range(2023, 2033)),
                'attr' => ['class' => 'form-control'],
            ])
            ->add('prenom_et_nom1', TextType::class, [
                'attr' => ['class' => 'form-control'],
            ])
            ->add('prenom_et_nom2', TextType::class, [
                'attr' => ['class' => 'form-control'],
                'required' => false,
            ])
            ->add('prenom_et_nom3', TextType::class, [
                'attr' => ['class' => 'form-control'],
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Inscription::class,
        ]);
    }
}