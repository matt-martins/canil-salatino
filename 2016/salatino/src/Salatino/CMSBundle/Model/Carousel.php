<?php
namespace Salatino\CMSBundle\Model;

use Salatino\CMSBundle\Model\Component\ModelComponent;

class Carousel extends ModelComponent
{
	public $grid = 'SalatinoCMSBundle:CrudCustomLists:title-image.html.twig';

	public function listAll()
	{
		$repo   = $this->doctrine->getRepository( 'SalatinoEntityBundle:Content' );
		$rows   = $repo->findBy(
							array( 'isActive' => 1, 'template'  => $this->getCategory() ),
							array( 'sequence' => 'ASC', 'id' => 'ASC' )
						);

		return $rows;
	}

	public function generateForm( $id )
	{
		$content = $this->getEntity( 'SalatinoEntityBundle:Content', $id );
		$form    = $this->formFactory->create( 'Salatino\CMSBundle\Form\Carousel', $content );

		return $form;
	}
	
	public function save( $id )
	{
		$content = $this->getEntity( 'SalatinoEntityBundle:Content', $id );
		$content->setTemplate( $this->getCategory() );
		$content->setIsActive( '1' );

		if( $this->form['picture']->getData() != null )
			$content->setPicture( $this->uploadFile( $this->form['picture']->getData() ) );

		$em = $this->doctrine->getManager();
		$em->persist( $content );
		$em->flush();
	}

	public function delete( $id )
	{
		$content = $this->getEntity( 'SalatinoEntityBundle:Content', $id );

		$em = $this->doctrine->getManager();
		$em->remove( $content );
		$em->flush();
	}
}