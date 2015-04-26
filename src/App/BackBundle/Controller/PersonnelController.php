<?php

namespace App\BackBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\BackBundle\Entity\Personnel;
use App\BackBundle\Form\PersonnelType;
use Symfony\Component\Validator\Constraints\Date;


/**
 * Personnel controller.
 *
 */
class PersonnelController extends Controller
{

    /**
     * Lists all Personnel entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBackBundle:Personnel')->findAll();
        return $this->render('AppBackBundle:Personnel:index.html.twig', array(
            'entities' => $entities,

        ));
    }
    /**
     * Creates a new Personnel entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Personnel();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $entity->upload();
           $s = $this->get('request')->request->get('rv');
            $rv = new \DateTime($s);
            $entity->setDateNaissance($rv);
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('personnel_show', array('id' => $entity->getId())));
        }

        return $this->render('AppBackBundle:Personnel:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Personnel entity.
     *
     * @param Personnel $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Personnel $entity)
    {
        $form = $this->createForm(new PersonnelType(), $entity, array(
            'action' => $this->generateUrl('personnel_create'),
            'method' => 'POST',
        ));

       // $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Personnel entity.
     *
     */
    public function newAction()
    {
        $entity = new Personnel();
        $form   = $this->createCreateForm($entity);

        return $this->render('AppBackBundle:Personnel:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Personnel entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBackBundle:Personnel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personnel entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBackBundle:Personnel:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Personnel entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBackBundle:Personnel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personnel entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppBackBundle:Personnel:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Personnel entity.
    *
    * @param Personnel $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Personnel $entity)
    {
        $form = $this->createForm(new PersonnelType(), $entity, array(
            'action' => $this->generateUrl('personnel_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        //$form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Personnel entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBackBundle:Personnel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personnel entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $entity->upload();
            $s = $this->get('request')->request->get('date');
            $rv = new \DateTime($s);
            //$r = $rv->modify('+0 days');
            $entity->setDateNaissance($rv);
            $em->persist($entity);
            $em->flush();


            return $this->redirect($this->generateUrl('personnel_edit', array('id' => $id)));
        }

        return $this->render('AppBackBundle:Personnel:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Personnel entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBackBundle:Personnel')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Personnel entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('personnel'));
    }

    /**
     * Creates a form to delete a Personnel entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('personnel_delete', array('id' => $id)))
            ->setMethod('DELETE')
           // ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
