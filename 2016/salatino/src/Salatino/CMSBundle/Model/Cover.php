<?php
namespace Salatino\CMSBundle\Model;

use Salatino\CMSBundle\Model\Component\ModelComponent;

class Cover extends ModelComponent
{
	public $grid = 'SalatinoCMSBundle:CrudCustomLists:title-image.html.twig';

	public function listAll()
	{
		$repo   = $this->doctrine->getRepository( 'SalatinoEntityBundle:Content' );
		$rows   = $repo->findBy(
							array( 'isActive' => 1, 'section'  => $this->getCategory() ),
							array( 'sequence' => 'ASC', 'id' => 'ASC' )
						);

		return $rows;
	}

	public function generateForm( $id )
	{
		$content = $this->getEntity( 'SalatinoEntityBundle:Content', $id );
		$content->setBody( str_replace( array( '<br />', '<br>', '<br/>' ), "\r\n", $content->getBody() ) );

		$form = $this->formFactory->create( 'Salatino\CMSBundle\Form\Cover', $content );

		return $form;
	}
	
	public function save( $id )
	{
		if( $this->getCategory() !== null )
			$section = $this->getEntity( 'SalatinoEntityBundle:Section', $this->getCategory() );
		else
			$section = null;
		
		$content = $this->getEntity( 'SalatinoEntityBundle:Content', $id );
		$content->setTitle( $this->form['title']->getData() );
		$content->setBody( nl2br( $this->form['body']->getData() ) );
		$content->setSection( $section );
		$content->setIsActive( '1' );

		if( $this->form['picture']->getData() != null )
			$content->setPicture( $this->uploadFile( $this->form['picture']->getData() ) );

		if( $this->form['smallPicture']->getData() != null )
			$content->setSmallPicture( $this->uploadFile( $this->form['smallPicture']->getData() ) );

		if( $this->form['bigPicture']->getData() != null )
			$content->setBigPicture( $this->uploadFile( $this->form['bigPicture']->getData() ) );

		$em = $this->doctrine->getManager();
		$em->persist( $content );
		$em->flush();

		//return true if you don't want to redirect form to the list page after save
		return true;
	}

	public function delete( $id )
	{
		$content = $this->getEntity( 'SalatinoEntityBundle:Content', $id );

		$em = $this->doctrine->getManager();
		$em->remove( $content );
		$em->flush();
	}
}