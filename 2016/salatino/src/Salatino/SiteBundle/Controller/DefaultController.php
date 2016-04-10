<?php

namespace Salatino\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
	/**
	 * @Route("/", name="_index")
	 * @Template("SalatinoSiteBundle:Default:index.html.twig")
	 */
    public function indexAction()
    {
        return array();
    }
}