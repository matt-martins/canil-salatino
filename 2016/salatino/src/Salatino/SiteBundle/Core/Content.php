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
			$obj->pedigree = null;

			return $obj;
		}
	}

	private function getSectionByLink( $permalink )
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

	private function getContentBySection( $sectionId )
	{
		$sql = 'SELECT n, o
				FROM
					SalatinoEntityBundle:Content n
					JOIN n.section o
				WHERE
					o.isActive  = 1 AND
					n.isActive  = 1 AND
					n.section   = :sectionId
				ORDER BY n.sequence ASC';
		
		$result = $this->dql( $sql )->setParameter('sectionId', $sectionId )->getResult();
		
		return $result;
	}

	private function getSingleContentBySectionIdAndType( $sectionId, $type )
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

	private function getSingleContentBySectionId( $sectionId )
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
		
		$result = $this->dql( $sql )->setParameters( array('sectionId' => $sectionId) )->getOneOrNullResult();
		
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
	
	// public function getNextOneContentById( $id )
	// {
	// 	$sql = 'SELECT n, o
	// 			FROM
	// 				SalatinoEntityBundle:Content  n
	// 				LEFT JOIN n.content o
	// 			WHERE
	// 				n.isActive = 1 AND
	// 				n.id > :id
	// 			ORDER BY o.sequence ASC';
		
	// 	$result = $this->dql( $sql )->setParameter('id', $id )->setMaxResults(1)->getOneOrNullResult();
		
	// 	return $result;
	// }
	
	// public function getSessionOneContent( $session )
	// {
	// 	$result = $this->getSessionContent( $session );
		
	// 	return $result[0];
	// }

	// public function getSessionRandomContent( $session )
	// {
	// 	$query = $this->doctrine->getRepository('SalatinoEntityBundle:Content')->createQueryBuilder('n');
		
	// 	$select = $query
	// 				->where('n.isActive = 1')
	// 				->andWhere('n.session = :session')
	// 				->setParameter( 'session', $session )
	// 				->setMaxResults( 10 )
	// 				->getQuery()
	// 				->execute()
	// 			;
		
	// 	return $select[ rand( 0, count($select)-1 ) ];
	// }

	// public function getSessionContent( $session )
	// {
	// 	$sql = 'SELECT n, o
	// 			FROM
	// 				SalatinoEntityBundle:Content  n
	// 				LEFT JOIN n.content o
	// 			WHERE
	// 				n.isActive = 1 AND
	// 				n.session = :session
	// 			ORDER BY o.sequence ASC';
		
	// 	$result = $this->dql( $sql )->setParameter('session', $session )->getResult();
		
	// 	return $result;
	// }

	// public function getLestFiveBlogPosts()
	// {
	// 	$sql = 'SELECT n, o
	// 			FROM
	// 				SalatinoEntityBundle:Content  n
	// 				LEFT JOIN n.content o
	// 			WHERE
	// 				n.isActive = 1 AND
	// 				n.session = \'blog\'
	// 			ORDER BY o.sequence ASC';
		
	// 	$result = $this->dql( $sql )->setParameter('session', $session )->setMaxResults( 5 )->getResult();
		
	// 	return $result;
	// }

	// public function getBlogHistory()
	// {
	// 	$sql = 'SELECT SUBSTRING(n.dateCreated, 1, 4) as Year, SUBSTRING(n.dateCreated, 6, 2) as Month, count( n.id ) as Total, n.dateCreated
	// 			FROM
	// 				SalatinoEntityBundle:Content n
	// 			WHERE
	// 				n.isActive = 1 AND
	// 				n.session = :session
	// 			GROUP BY Month, Year';
		
	// 	$result = $this->dql( $sql )->setParameter('session', 'blog' )->getResult();
		
	// 	foreach ( $result as $key => $value )
	// 	{
	// 		$days = $this->getBlogHistoryDays( $value['Month'], $value['Year'] );
	// 		$result[ $key ]['days'] = $days;
	// 	}
		
	// 	return $result;
	// }
	
	// private function getBlogHistoryDays( $month, $year )
	// {
	// 	$sql = 'SELECT n
	// 			FROM
	// 				SalatinoEntityBundle:Content n
	// 			WHERE
	// 				n.isActive = 1 AND
	// 				SUBSTRING(n.dateCreated, 1, 4) = :year AND
	// 				SUBSTRING(n.dateCreated, 6, 2) = :month';
		
	// 	$result = $this->dql( $sql )->setParameters( array( 'month' => $month, 'year' => $year ) )->getResult();
		
	// 	return $result;
	// }

	// public function getBlogCategories()
	// {
	// 	$sql = 'SELECT n.smallDescription, count( n.smallDescription ) as Total 
	// 			FROM
	// 				SalatinoEntityBundle:Content n
	// 			WHERE
	// 				n.isActive = 1 AND
	// 				n.session = :session
	// 			GROUP BY n.smallDescription';
		
	// 	$result = $this->dql( $sql )->setParameter('session', 'blog' )->getResult();
		
	// 	return $result;
	// }

	// public function getBlogPostsByCategories( $filter )
	// {
	// 	$sql = 'SELECT n 
	// 			FROM
	// 				SalatinoEntityBundle:Content n
	// 			WHERE
	// 				n.isActive = 1 AND
	// 				n.smallDescription LIKE :filter';
		
	// 	$result = $this->dql( $sql )->setParameter( 'filter', '%'. $filter . '%' )->getResult();
		
	// 	return $result;
	// }

	// public function getBlogFilteredPosts( $session )
	// {
	// 	$sql = 'SELECT n 
	// 			FROM
	// 				SalatinoEntityBundle:Content n
	// 			WHERE
	// 				n.isActive = 1 AND
	// 				n.title LIKE :session';
		
	// 	$result = $this->dql( $sql )->setParameter( 'session', $session )->getResult();
		
	// 	return $result;
	// }

	// private function getRepository()
	// {
	// 	$repository = $this->doctrine->getRepository('SalatinoEntityBundle:Content');
	
	// 	return $repository;
	// }
	
}
