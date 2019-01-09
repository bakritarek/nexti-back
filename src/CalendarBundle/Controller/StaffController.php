<?php

namespace CalendarBundle\Controller;

use CalendarBundle\Entity\servicecase;
use CalendarBundle\Entity\ServiceCaseStaff;
use CalendarBundle\Entity\Staff;
use JMS\Serializer\SerializerBuilder;
use PortalBundle\Entity\accountsystems;
use PortalBundle\Entity\Company;
use PortalBundle\Entity\companyuser;
use PortalBundle\Entity\Device;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use UserBundle\Entity\isLoged;


class StaffController extends Controller
{
    public function getStaffsAction($systemid) {
        $em = $this->getDoctrine()->getManager('db'.$systemid);

        $staffs = $em->getRepository(Staff::class)->findBy([],['name'=>'ASC']);

        $serializer = SerializerBuilder::create()->build();
        $jsonObject = $serializer->serialize($staffs, 'json');

        return $response = new Response($jsonObject);

    }

    public function getStaffFromIdsAction($str, $systemid, $userid) {
        $em = $this->getDoctrine()->getManager('db'.$systemid);
        $emDefault = $this->getDoctrine()->getManager('default');
        $staffs = [];
        $ids = explode(';', $str);
        foreach ($ids as $id) {
            if ($id) {
                $staff = $em->getRepository(Staff::class)->find($id);
                array_push($staffs, $staff);
            }
        }


        $isLoged = $emDefault->getRepository(isLoged::class)->findOneBy(['userid'=>$userid]);

        $isLoged->setLastUpdate(gmdate('Y/m/d H:i:s'));
        $emDefault->persist($isLoged);
        $emDefault->flush();

        $serializer = SerializerBuilder::create()->build();
        $jsonObject = $serializer->serialize($staffs, 'json');

        return $response = new Response($jsonObject);
    }

}
