<?php
/**
 * Created by PhpStorm.
 * User: aho
 * Date: 22/11/2019
 * Time: 20:16
 */

namespace etudiantBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EtudiantController extends Controller
{


    public function listAction(){

        //tableau
        $etudiants = array("ali","mohamed","ahmed");

        //tableau des module
        $modules = array(
            array('nom' => 'Technologies web',
                'id' => 1,
                'enseignant' => 'ali',
                'nbrHeure' => 45,
                'date' =>'17/09/2018'),
            array('nom' => 'Design Pattern',
                'id' => 2,
                'enseignant' => 'salah',
                'nbrHeure' => 40,
                'date' =>'17/09/2018'),
        );
        return $this-> render('@etudiant/etudiant/list.html.twig ',array('etudiants'=>$etudiants, 'modules'=>$modules));

    }

    public function affecterAction(){
        return $this->render('@etudiant/etudiant/affecter.html.twig',array());
    }


}