<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Database;
use AppBundle\Form\DatabaseType;

/**
 * Database controller.
 *
 * @Route("/database")
 */
class DatabaseController extends Controller
{
    /**
     * Lists all Database entities.
     *
     * @Route("/", name="database_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $databases = $em->getRepository('AppBundle:Database')->findAll();

        return $this->render('AppBundle:database:index.html.twig', array(
            'databases' => $databases,
        ));
    }

    /**
     * Creates a new Database entity.
     *
     * @Route("/new", name="database_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $database = new Database();
        $form = $this->createForm('AppBundle\Form\DatabaseType', $database);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($database);
            $em->flush();

            return $this->redirectToRoute('database_show', array('id' => $database->getId()));
        }

        return $this->render('AppBundle:database:new.html.twig', array(
            'database' => $database,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Database entity.
     *
     * @Route("/{id}", name="database_show")
     * @Method("GET")
     */
    public function showAction(Database $database)
    {
        $deleteForm = $this->createDeleteForm($database);

        return $this->render('AppBundle:database:show.html.twig', array(
            'database' => $database,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Database entity.
     *
     * @Route("/{id}/edit", name="database_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Database $database)
    {
        $deleteForm = $this->createDeleteForm($database);
        $editForm = $this->createForm('AppBundle\Form\DatabaseType', $database);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($database);
            $em->flush();

            return $this->redirectToRoute('database_edit', array('id' => $database->getId()));
        }

        return $this->render('AppBundle:database:edit.html.twig', array(
            'database' => $database,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Database entity.
     *
     * @Route("/{id}", name="database_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Database $database)
    {
        $form = $this->createDeleteForm($database);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($database);
            $em->flush();
        }

        return $this->redirectToRoute('database_index');
    }

    /**
     * Creates a form to delete a Database entity.
     *
     * @param Database $database The Database entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Database $database)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('database_delete', array('id' => $database->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
