<?php
namespace Salatino\CMSBundle\Model;

use Salatino\CMSBundle\Model\Component\ModelComponent;

class AboutInfos extends ModelComponent
{
	public $grid = 'SalatinoCMSBundle:CrudCustomLists:title-body.html.twig';

	public function listAll()
	{
		$repo   = $this->doctrine->getRepository( 'SalatinoCMSBundle:Content' );
		$rows   = $repo->findBy(
							array( 'isActive' => 1, 'session'  => 'about-infos' ),
							array( 'sequence' => 'ASC', 'id' => 'ASC' )
						);

		return $rows;
	}

	public function generateForm( $id )
	{
		$content = $this->getEntity( 'SalatinoCMSBundle:Content', $id );
		$form    = $this->formFactory->create( 'SalatinoCMSBundle\Form\SimpleNoImage', $content );

		return $form;
	}
	
	public function save( $id )
	{
		$content = $this->getEntity( 'SalatinoCMSBundle:Content', $id );
		$content->setTitle( $this->form['title']->getData() );
		$content->setEnTitle( $this->form['enTitle']->getData() );
		$content->setEnBody( $this->form['enBody']->getData() );
		$content->setBody( $this->form['body']->getData() );
		$content->setSession( 'about-infos' );
		$content->setIsActive( '1' );
		
		$em = $this->doctrine->getManager();
		$em->persist( $content );
		$em->flush();
	}

	public function delete( $id )
	{
		$content = $this->getEntity( 'SalatinoCMSBundle:Content', $id );

		$em = $this->doctrine->getManager();
		$em->remove( $content );
		$em->flush();
	}
}