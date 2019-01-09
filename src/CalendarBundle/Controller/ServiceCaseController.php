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

class ServiceCaseController extends Controller
{
   public function UpdateEventAction($id, $start, $end, $starttime, $endtime, $systemid, $userid) {

       $em = $this->getDoctrine()->getManager('db'.$systemid);
       $emDefault = $this->getDoctrine()->getManager('default');
       if ($end == 'ko')
           $end = '';
       if ($endtime == 'ko')
           $endtime = '';
       $servicecase = $em->getRepository(servicecase::class)->find($id);
       $servicecase->setStartdate($start);
       $servicecase->setStarttime($starttime);
       $servicecase->setLatestenddate($end);
       $servicecase->setLatestendtime($endtime);

       $isLoged = $emDefault->getRepository(isLoged::class)->findOneBy(['userid'=>$userid]);
       $isLoged->setLastUpdate(gmdate('Y/m/d H:i:s'));

       $emDefault->persist($isLoged);
       $emDefault->flush();

       $em->persist($servicecase);
       $em->flush();

       $serializer = SerializerBuilder::create()->build();
       $jsonObject = $serializer->serialize($servicecase, 'json');

       return $response = new Response($jsonObject);


   }

}
