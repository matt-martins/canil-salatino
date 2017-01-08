<?php

namespace Salatino\EntityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SalatinoEntityBundle:Default:index.html.twig');
    }
}
