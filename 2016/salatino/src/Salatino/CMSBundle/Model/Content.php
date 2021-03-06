<?php
namespace Salatino\CMSBundle\Model;

use Salatino\CMSBundle\Model\Component\ModelComponent;

class Content extends ModelComponent
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

		$body = $content->getBody();
        $body = strip_tags( $body, '<ul><li><strong><br/><br /><br><a>' );
		$body = str_replace( "\r\n", "", $body );
		$body = preg_replace('#(<br */?>\s*)+#i', '<br />', $body);
		$body = str_replace( array( '<br />', '<br>', '<br/>' ), "\r\n\r\n", $body );

		$content->setBody( $body );

		$form    = $this->formFactory->create( 'Salatino\CMSBundle\Form\Content', $content );

		return $form;
	}
	
	public function save( $id )
	{
		$section = $this->getEntity( 'SalatinoEntityBundle:Section', $this->getCategory() );
		
		$content = $this->getEntity( 'SalatinoEntityBundle:Content', $id );
		$content->setTitle( $this->form['title']->getData() );
		$content->setBody( nl2br( $this->form['body']->getData() ) );
		$content->setVideo( $this->form['video']->getData() );
		$content->setSection( $section );
		$content->setIsActive( '1' );

		if( $this->form['picture']->getData() != null )
			$content->setPicture( $this->uploadFile( $this->form['picture']->getData() ) );

		if( $this->form['smallPicture']->getData() != null )
			$content->setSmallPicture( $this->uploadFile( $this->form['smallPicture']->getData() ) );

		if( $this->form['bigPicture']->getData() != null )
			$content->setbigPicture( $this->uploadFile( $this->form['bigPicture']->getData() ) );

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