<?php

namespace etudiantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
            return $this->render('etudiantBundle:Default:index.html.twig');
    }
}
