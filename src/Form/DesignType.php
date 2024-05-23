<?php

namespace App\Form;

use App\Entity\Design;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DesignType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('logo')
            ->add('backgroundColor')
            ->add('backgroundUrl')
            ->add('backgroundStyle')
            ->add('font')
            ->add('color')
            ->add('fontsize')
            ->add('isBold')
            ->add('isItalic')
            ->add('isUnderline')
            ->add('align')
            ->add('cardOpacity')
            ->add('cardBackgroundColor')
            ->add('cardBorderColor')
            ->add('cardBorderSize')
            ->add('cardRiduis')
            ->add('buttonBackgroundColor')
            ->add('buttonBorderColor')
            ->add('buttonStyle')
            ->add('buttonRiduis')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Design::class,
        ]);
    }
}
