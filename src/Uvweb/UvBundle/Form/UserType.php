<?php

namespace Uvweb\UvBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $currentYear = date('Y');
        $lastYears = array();

        for ($i= $currentYear; $i > $currentYear - 10 ; $i--) 
        { 
            $lastYears[$i] = $i;
        }
        
        $builder
                ->add('identity', 'text', array(
                    'label' => 'Pseudo (sera visible sur le site)'))
                ->add('email', 'email', array(
                    'label' => 'Email',
                ))
                ->add('firstSemester', 'choice', array(
                    'choices' => array('Automne' => 'Automne', 'Printemps' => 'Printemps'),
                    'label' => 'Semestre d\'entrée'
                ))
                ->add('firstYear', 'choice', array('choices' => $lastYears, 'label' => 'Année d\'entrée'))
                ->add('origin', 'text', array(
                    'label' => 'Cursus d\'origine : prépa, IUT...',
                    'required' => true
                ))
                ->add('origindetails', 'textarea', array(
                    'label' => 'Détails cursus d\'origine',
                    'required' => false
                ))
                ->add('branch', 'choice', array(
                    'choices' => array('TC' => 'TC', 'GB' => 'GB', 'GI' => 'GI', 'GM' => 'GM', 'GP' => 'GP', 'GSM' => 'GSM', 'GSU' => 'GSU'),
                    'label' => 'Branche'
                ))
                ->add('filiere', 'choice', array(
                    'choices' => array('' => 'Aucune',
                                       'MPI' => 'MPI',         //MPI
                                       'GB' => array(    //GB
                                           'BB' => 'BB',    
                                           'BM' => 'BM',
                                           'CIB' => 'CIB',
                                           'IAA' => 'IAA'
                                           ),
                                       'GI' => array(  //GI
                                           'ADEL' => 'ADEL',
                                           'FDD' => 'FDD',
                                           'ICSI' => 'ICSI',
                                           'SRI' => 'SRI',
                                           'STRIE' => 'STRIE'
                                           ),
                                       'GM' => array(    //GM
                                           'AVI' => 'AVI', 
                                           'FQI' => 'FQI',
                                           'IDI' => 'IDI',
                                           'MARS' => 'MARS',
                                           'MIT' => 'MIT'
                                           ),
                                       'GP' => array(   //GP
                                           'AI' => 'AI',
                                           'CPI' => 'CPI',
                                           'QSE' => 'QSE',
                                           'TE' => 'TE'
                                           ),
                                       'GSM' => array(    //GSM
                                           'CMI' => 'CMI',  
                                           'MOPS' => 'MOPS',
                                           'PIL' => 'PIL'
                                           ),
                                       'GSU' => array(    //GSU
                                       'AIE' => 'AIE', 
                                       'SR' => 'SR',
                                       'STI' => 'STI'
                                       )
                                ),
                    'label' => 'Filière',
                    'required' => false
                ))
                ->add('displayAvatar', 'choice', array(
                    'choices' => array(true => 'Oui', false => 'Non'),
                    'label'     => "Utiliser l'avatar lié à l'email ? (Le \"Gravatar\")",
                    'required'  => true,
                    'expanded' => true,
                ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Uvweb\UvBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'uvweb_uvbundle_usertype';
    }
}
