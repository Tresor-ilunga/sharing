<?php

namespace App\Form;

use App\Entity\Link;
use App\Message\CreateLinkMessage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateLinkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('url', UrlType::class, [
                'label' => 'Lien',
                'attr' => [
                    'placeholder' => 'https://example.com',
                ],

            ])
            ->add('slug');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CreateLinkMessage::class,
        ]);
    }
}
