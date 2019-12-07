<?php
namespace ParcBundle\Form;
/**
 * Created by PhpStorm.
 * User: aho
 * Date: 24/11/2019
 * Time: 15:11
 */
use function Sodium\add;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;


class ModeleForm extends \Symfony\Component\Form\AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('Libelle',TextareaType::class)
            ->add('Pays',TextareaType::class);

    }
    public function getName(){
        return 'Modele';
    }

}