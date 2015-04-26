<?php

namespace App\BackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonnelType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom','text')
            ->add('prenom','text')
            ->add('email','text')
            /*->add('dateNaissance','')*/
            //->add('date','text')
            ->add('file')
            ->add('fonction','text')
            ->add('role','choice')
            ->add('verouillage','checkbox')
            ->add('username','text')
            ->add('password','password')
            ->add('adresse','text')
            ->add('telephone','text')
           /* ->add('salt')
            ->add('roles')*/
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'App\BackBundle\Entity\Personnel'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'app_backbundle_personnel';
    }
}
