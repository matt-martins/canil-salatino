<?php

namespace Salatino\CMSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/admin/")
     * @Route("/admin")
     */
    public function loginAction()
    {
        return $this->render('SalatinoCMSBundle:Default:index.html.twig');
    }
}
