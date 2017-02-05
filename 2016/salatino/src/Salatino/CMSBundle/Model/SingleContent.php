<?php
namespace Salatino\CMSBundle\Model;

use Salatino\CMSBundle\Model\Component\ModelComponent;

class SingleContent extends Content
{
	public $grid = 'SalatinoCMSBundle:CrudCustomLists:title-image.html.twig';
	public $hideBackButton = true;

	public function save( $id )
	{
		parent::save( $id );

		//return true if you don't want to redirect form to the list page after save
		return true;
	}

}