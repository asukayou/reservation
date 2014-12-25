<?php

namespace Ay\ReservationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
     */
    public function createAction(Request $request) {
        // 追加処理
        return new Response('追加処理');
    }

    /**
     * @Route("/update/{id}", requirements={"id" = "\d+"}, name="facility_update")
     */
    public function updateAction(Request $request, $id) {
        // 更新処理
        return new Response('更新処理');
    }

}
