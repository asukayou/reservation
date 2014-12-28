<?php

namespace Ay\ReservationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

use Ay\ReservationBundle\Entity\Facility;
use Ay\ReservationBundle\Form\Type\FacilityType;

/**
 * @Route("/facility")
 */
class FacilityController extends Controller {

    /**
     * @Route("/", name="facility_index")
     * @Template()
     */
    public function indexAction() {
        // 一覧表示処理
        $facilities = $this->getDoctrine()
                ->getRepository('AyReservationBundle:Facility')
                ->findBy(array(), array('name' => 'asc'));
        return array('facilities' => $facilities);
    }

    /**
     * @Route("/create", name="facility_create")
     * @Method({"GET", "POST"})
     */
    public function createAction(Request $request) {
        // 追加処理
        $facility = new Facility();
        $form = $this->createForm(new FacilityType(), $facility);
        if ($request->getMethod() == 'GET') {
            return $this->render('AyReservationBundle:Facility:create.html.twig', array('form' => $form->createView()));
        }
        $form->handleRequest($request);
        if (!$form->isValid()) {
            return $this->render('AyReservationBundle:Facility:create.html.twig', array('form' => $form->createView()));
        }
        $facility->setDeleted(false);
        $em = $this->getDoctrine()->getManager();
        $em->persist($facility);
        $em->flush();
        return $this->redirect($this->generateUrl('facility_index'));
    }

    /**
     * @Route("/update/{id}", requirements={"id" = "\d+"}, name="facility_update", options={"expose"=true})
     * @Method({"GET", "POST"})
     */
    public function updateAction(Request $request, $id) {
        // 更新処理
        $facility = $this->getDoctrine()
                ->getRepository('AyReservationBundle:Facility')
                ->find($id);
        if (!$facility) {
            throw $this->createNotFoundException('Facility not found');
        }
        $form = $this->createForm(new FacilityType(), $facility);
        if ($request->getMethod() == 'GET') {
            return $this->render('AyReservationBundle:Facility:update.html.twig', array(
                        'form' => $form->createView(),
                        'id' => $id
            ));
        }
        $form->handleRequest($request);
        if (!$form->isValid()) {
            return $this->render('AyReservationBundle:Facility:update.html.twig', array(
                        'form' => $form->createView(),
                        'id' => $id
            ));
        }
        $em = $this->getDoctrine()->getManager();
        $em->flush();
        return $this->redirect($this->generateUrl('facility_index'));
    }

}
