<?php
namespace Salatino\SiteBundle\Core;

use Salatino\EntityBundle\Entity\Content as Table;

use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Filesystem\Filesystem;
use Salatino\SiteBundle\Core\Component\CoreComponent;

class Content extends CoreComponent
{

	public function getContent( $permalink, $sub, $id )
	{
		$section = $this->getSectionByLink( $permalink . ( $sub ? '/' . $sub : '' ) );

		if( !$section ) return null;

		if( $id != null )
		{
			$pedigree = null;
			$content  = $this->getOneContentById( $id );

			if( !$content ) return null;

			if( $content->getTemplate() == 'pedigree' )
			{
				$pedigree = new Pedigree();
				$pedigree->setDoctrine( $this->doctrine );
				$pedigree = $pedigree->getPedigreeById( $id );

				$content->setTemplate('image-n-text');
			}

			$obj = new \stdClass();

			$obj->section  = $section;
			$obj->content  = $content;
			$obj->template = $content->getTemplate();
			$obj->media    = $this->getContentBySection( 12, true, 5 );
			$obj->pedigree = $pedigree;

			return $obj;
		}

		if( $section->getType() != 'picture-group' )
		{
			if( $section->getType() == 'cover' )
				$content = $this->getSingleContentBySectionIdAndType( $section->getId(), $section->getType() );

			if( $section->getType() == null )
				$content = $this->getSingleContentBySectionId( $section->getId() );

			if( !$content ) return null;

			$obj = new \stdClass();

			$obj->section  = $section;
			$obj->content  = $content;
			$obj->template = $content->getTemplate();
			$obj->media    = $this->getContentBySection( 12, true, 5 );
			$obj->pedigree = null;

			return $obj;
		}

		if( $section->getType() == 'picture-group' )
		{
			$content = $this->getContentBySection( $section->getId() );

			if( !$content ) return null;

			$obj = new \stdClass();

			$obj->section  = $section;
			$obj->content  = count( $content ) > 1 ? $content : $content[0];
			$obj->template = count( $content ) > 1 ? $section->getType() : $content[0]->getTemplate();
			$obj->media    = $this->getContentBySection( 12, true, 5 );
			$obj->pedigree = null;

			return $obj;
		}
	}

	protected function getCarousel( $group )
	{
		$group = explode( '-', $group );
		$group = 'carousel-' . $group[0];

		return $this->getContentByTemplate( $group );
	}

	protected function getSectionByLink( $permalink )
	{
		$sql = 'SELECT n
				FROM
					SalatinoEntityBundle:Section n
				WHERE
					n.isActive  = 1 AND
					n.permalink = :permalink
				ORDER BY n.sequence ASC';
		
		$result = $this->dql( $sql )->setParameter('permalink', $permalink )->getOneOrNullResult();
		
		return $result;
	}

	protected function getContentBySection( $sectionId, $random = false, $limiation = false )
	{
		$sql = 'SELECT n, o
				FROM
					SalatinoEntityBundle:Content n
					JOIN n.section o
				WHERE
					o.isActive  = 1 AND
					n.isActive  = 1 AND
					n.section   = :sectionId';
		
		$result = $this->dql( $sql )->setParameter('sectionId', $sectionId );
		$params = array('sectionId' => $sectionId);

		if( $random == false )
		{
			$sql = $sql . ' ORDER BY n.sequence ASC';
		}
		else
		{
			for( $i = 0; $i < 9999; $i++ )
			{
				$rand = rand ( 1 , 9999 );
				$ids[ $rand ] = $rand;
			}

			$sql = $sql . ' AND n.id IN(:ids)';
			$params['ids'] = $ids;
		}
			

		$result = $this->dql( $sql )->setParameters( $params );

		if( $limiation != false )
			$result = $result->setMaxResults( $limiation );

		$result = $result->getResult();
		
		return $result;
	}

	protected function getContentByTemplate( $template )
	{
		$sql = 'SELECT n
				FROM
					SalatinoEntityBundle:Content n
				WHERE
					n.isActive  = 1 AND
					n.template  = :template
				ORDER BY n.sequence ASC';
		
		$result = $this->dql( $sql )->setParameter('template', $template )->getResult();
		
		return $result;
	}

	protected function getSingleContentBySectionIdAndType( $sectionId, $type )
	{
		$sql = 'SELECT n, o
				FROM
					SalatinoEntityBundle:Content n
					JOIN n.section o
				WHERE
					o.isActive  = 1 AND
					n.isActive  = 1 AND
					n.section   = :sectionId AND
					n.template  = :type
				ORDER BY n.sequence ASC';
		
		$result = $this->dql( $sql )->setParameters( array('sectionId' => $sectionId, 'type' => $type) )->getOneOrNullResult();
		
		return $result;
	}

	protected function getSingleContentBySectionId( $sectionId )
	{
		$sql = 'SELECT n, o
				FROM
					SalatinoEntityBundle:Content n
					JOIN n.section o
				WHERE
					o.isActive  = 1 AND
					n.isActive  = 1 AND
					n.section   = :sectionId
				GROUP BY n.section
				ORDER BY n.sequence ASC';

		$result = $this->dql( $sql )->setParameters( array('sectionId' => $sectionId) )->setMaxResults();

		return $result;
	}

	public function getOneContentById( $id )
	{
		$sql = 'SELECT n
				FROM
					SalatinoEntityBundle:Content n
				WHERE
					n.isActive = 1 AND
					n.id = :id';
		
		$result = $this->dql( $sql )->setParameter('id', $id )->getOneOrNullResult();
		
		return $result;
	}
	
}
