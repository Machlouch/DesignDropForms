<?php

namespace App\Form;

use App\Entity\Answer;
use App\Entity\Session;
use App\Entity\Survey;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SessionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('start', null, [
                'widget' => 'single_text',
            ])
            ->add('end', null, [
                'widget' => 'single_text',
            ])
            ->add('surveys', EntityType::class, [
                'class' => Survey::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
            ->add('answers', EntityType::class, [
                'class' => Answer::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Session::class,
        ]);
    }
}
