<?php

namespace Manticora\PushNotificationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('type')
            ->add('token')
        ;
    }

    public function getName()
    {
        return 'manticora_pushnotificationbundle_clienttype';
    }
}
