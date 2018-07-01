<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Link;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Link controller.
 *
 */
class LinkController extends Controller
{
    /**
     * Lists all link entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $links = $em->getRepository('AppBundle:Link')->findAll();

        return $this->render('@App/Link/index.html.twig', array(
            'links' => $links,
        ));
    }

    /**
     * Creates a new link entity.
     *
     */
    public function newAction(Request $request)
    {
        $link = new Link();
        $form = $this->createForm('AppBundle\Form\LinkType', $link);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($link);
            $em->flush();

            return $this->redirectToRoute('link_show', array('id' => $link->getId()));
        }

        return $this->render('@App/Link/new.html.twig', array(
            'link' => $link,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a link entity.
     *
     */
    public function showAction(Link $link)
    {
        return $this->render('@App/Link/show.html.twig', array(
            'link' => $link,
        ));
    }

    /**
     * Displays a form to edit an existing link entity.
     *
     */
    public function editAction(Request $request, Link $link)
    {
        $editForm = $this->createForm('AppBundle\Form\LinkType', $link);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('link_edit', array('id' => $link->getId()));
        }

        return $this->render('@App/Link/edit.html.twig', array(
            'link' => $link,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a link entity.
     *
     */
    public function deleteAction(Request $request, Link $link)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($link);
        $em->flush();

        return $this->redirectToRoute('link_index');
    }
}
