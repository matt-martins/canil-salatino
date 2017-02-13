<?php

namespace Salatino\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Salatino\SiteBundle\Core\Content;

class DefaultController extends Controller
{
    /**
     * @Route("/contato", name="_contact_us")
     * @Template("SalatinoSiteBundle:Default:contact.html.twig")
     */
    public function contactUsAction( $permalink = null )
    {
        $result = array();

        return $result;
    }

	/**
	 * @Route("/", name="_index")
     * @Route("/{permalink}", name="_section")
     * @Route("/{permalink}/{sub}", name="_sub_section")
     * @Route("/{permalink}/{id}/{title}", name="_content")
     * @Route("/{permalink}/{sub}/{id}/{title}", name="_sub_content")
	 * @Template("SalatinoSiteBundle:Default:index.html.twig")
	 */
    public function indexAction( $permalink = null, $sub = null, $id = null )
    {
        $result = array();

        if( $permalink )
        {
            $carousel = $this->get('model')->get('Salatino\SiteBundle\Core\Content')->getCarousel( $post->section->getGroup() );
            $post     = $this->get('model')->get('Salatino\SiteBundle\Core\Content')->getContent( $permalink, $sub, $id );

            if( $post )
            {
                $result = $this->render( 'SalatinoSiteBundle:Default:' . $post->template . '.html.twig', 
                    array( 
                        'section'   => $post->section,
                        'post'      => $post->content,
                        'pedigree'  => $post->pedigree,
                        'permalink' => $permalink,
                        'sub'       => $sub,
                        'carousel'  => $carousel ) );
            }
            else
            {
                $result = $this->render( 'SalatinoSiteBundle:Error:404.html.twig', array() );
            }
        }
        else
        {
            $result = $this->get('model')->get('Salatino\SiteBundle\Core\Home')->getHomeContent();
        }


        return $result;
    }
}