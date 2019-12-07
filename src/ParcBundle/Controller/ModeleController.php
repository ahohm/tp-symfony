<?php
/**
 * Created by PhpStorm.
 * User: aho
 * Date: 22/11/2019
 * Time: 22:06
 */

namespace ParcBundle\Controller;


use ParcBundle\Entity\Model;
use ParcBundle\Form\ModeleForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ModeleController extends Controller
{

    public function listAction(){

        $em = $this->container->get('doctrine')->getEntityManager();

        $modeles = $em -> getRepository('ParcBundle:Model')->findAll();


        return $this->render('@Parc/Modele/list.html.twig',array('modeles'=>$modeles ));
    }

    public function addAction(Request $request){

        $Modele = new Model();
        $form = $this->createForm(ModeleForm::class, $Modele);

        $form-> handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em =$this->getDoctrine()->getManager();
            $em->persist($Modele);
            $em->flush();
            return $this->redirectToRoute("parc_affichage_modele");
        }
        return $this->render('@Parc/Modele/add.html.twig',array(
            'Form'=>$form->createView()
        ));
    }

    public function deleteAction(Request $request , $id){
        $em = $this->getDoctrine()->getManager();
        $modele = $em->getRepository('ParcBundle:Model')->find($id);
        if($modele!==null){
            $em->remove($modele);
            $em->flush();
        }
        else
        {
            throw new NotFoundHttpException("Le modele de l 'id".$id."n'existe pas");
        }
        return $this->redirectToRoute("parc_affichage_modele");
    }

    public function updateAction(Request $request, $id){

        $em = $this->getDoctrine()->getManager();
        $modele  = $em->getRepository('ParcBundle:Model')->find($id);
        $editform = $this-> createForm(ModeleForm::class,$modele);
        $editform->handleRequest($request);

        if ($editform->isSubmitted()&& $editform->isValid())
        {
            $em->persist($modele);
            $em->flush();
            return $this->redirect($this->generateUrl("parc_affichage_modele"));
        }


        return $this->render('@Parc/Modele/update.html.twig', Array(
            'editForm'=>$editform->createView()
        ));

    }

    public function rechercheAction(Request $request){
        $em = $this->container->get('doctrine')->getEntityManager();

        $modeles = $em->getRepository('ParcBundle:Model')->findAll();

        if($request->isMethod("POST")){
            $motcle= $request->get('input_recheche');
            $query=$em->createQuery(
                "SELECT m FROM ParcBundle:Model m  WHERE m.libelle LIKE '".$motcle."%'"
            );
            $modeles=$query->getResult();
        }
        return $this->render('@Parc/Modele/rechercheModele.html.twig',
            array(
                'modeles'=>$modeles
            ));
    }

}