<?php
namespace Salatino\CMSBundle\Model;

use Salatino\CMSBundle\Model\Component\ModelComponent;

class Export extends ModelComponent
{
	public $grid = 'SalatinoCMSBundle:CrudCustomLists:title-image1.html.twig';

	public function listAll()
	{
		$repo   = $this->doctrine->getRepository( 'SalatinoCMSBundle:Content' );
		$rows   = $repo->findBy(
							array( 'isActive' => 1, 'session'  => 'export' ),
							array( 'sequence' => 'ASC', 'id' => 'ASC' )
						);

		return $rows;
	}

	public function generateForm( $id )
	{
		$content = $this->getEntity( 'SalatinoCMSBundle:Content', $id );
		$form    = $this->formFactory->create( 'SalatinoCMSBundle\Form\Simple', $content );

		return $form;
	}
	
	public function save( $id )
	{
		$content = $this->getEntity( 'SalatinoCMSBundle:Content', $id );
		$content->setTitle( $this->form['title']->getData() );
		$content->setSession( 'export' );
		$content->setIsActive( '1' );

		
		if( $this->form['image1']->getData() != null )
			$content->setImage1( $this->uploadFile( $this->form['image1']->getData() ) );

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