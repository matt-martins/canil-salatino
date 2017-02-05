<?php
namespace Salatino\CMSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Salatino\CMSBundle\Core\DataModelFactory;


class CMSCrudController extends Controller
{
    /**
     * @Route("admin/{modelName}/list/{categ}", name="_cms_list")
     */
    public function listAction( $modelName, $categ = null )
    {
        $dataModel = DataModelFactory::get( 'Salatino\CMSBundle\Model', $modelName );
        $model     = $this->container->get('cms.model')->get( $dataModel );
        $model->setCategory( $categ );

        return $this->render( $model->grid, array(
            'modelName' => $modelName,
            'model'     => $model,
            'list'      => $model->listAll()
        ));
    }

    /**
     * @Route("admin/{modelName}/new/{categ}", name="_cms_create_new")
     * @Route("admin/{modelName}/edit/{id}", name="_cms_edit")
     * @Route("admin/{modelName}/edit-item/{categ}/{id}", name="_cms_edit_categ")
     */
    public function editAction( $modelName, $id = null, $categ = null )
    {
        $dataModel = DataModelFactory::get( 'Salatino\CMSBundle\Model', $modelName );
        $form      = $this->container->get('cms.form')->get( $dataModel, $id );
        $model     = $this->container->get('cms.model')->get( $dataModel );
        $model->setCategory( $categ );
        
        return $this->render('SalatinoCMSBundle:Crud:edit.html.twig', array(
            'hideBackButton'  => isset( $model->hideBackButton ) ? $model->hideBackButton : false,
            'modelName'       => $modelName,
            'model'           => $model,
            'id'              => $id,
            'form'            => $form->createView()
        ));
    }

    /**
     * @Route("admin/{modelName}/create", name="_cms_save_new")
     * @Route("admin/{modelName}/create-item/{categ}", name="_cms_save_new_categ")
     * @Route("admin/{modelName}/update/{id}", name="_cms_update")
     * @Route("admin/{modelName}/update-item/{categ}/{id}", name="_cms_update_categ")
     */
    public function saveAction( Request $request, $modelName, $id = null, $categ = null )
    {
        $dataModel = DataModelFactory::get( 'Salatino\CMSBundle\Model', $modelName );
        $form      = $this->container->get('cms.form')->get( $dataModel, $id );
        
        $form->handleRequest($request);
        
        if ( $form->isSubmitted() && $form->isValid() ) 
        {
            $dataModel = DataModelFactory::get( 'Salatino\CMSBundle\Model', $modelName );
            $model     = $this->container->get('cms.model')->get( $dataModel );
            $model->setCategory( $categ );
            $model->setForm( $form );

            $result = $model->save( $id );
            
            if( null === $result )
                return $this->redirectToRoute('_cms_list', array('modelName' => $modelName, 'categ' => $categ ));
        }
        
        return $this->render('SalatinoCMSBundle:Crud:edit.html.twig', array(
                    'hideBackButton'  => isset( $model->hideBackButton ) ? $model->hideBackButton : false,
                    'modelName'       => $modelName,
                    'model'           => $model,
                    'id'              => $id,
                    'form'            => $form->createView()
                ));;
    }

    /**
     * @Route("admin/{modelName}/delete/{id}", name="_cms_delete")
     */
    public function deleteAction( Request $request, $modelName, $id = null )
    {
    	$dataModel = DataModelFactory::get( 'Salatino\CMSBundle\Model', $modelName );
        $model     = $this->container->get('cms.model')->get( $dataModel );
        $model->delete( $id );

        $response = new Response( json_encode( array( 'status' => 'SUCCESS' ) ) );
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

}
