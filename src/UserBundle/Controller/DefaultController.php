<?php

namespace UserBundle\Controller;

use PortalBundle\Entity\UserPortal;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    public function SynchroniseAllUserAction() {
        $em = $this->getDoctrine()->getManager('portal');

        $userInfo= [];
        $users = $em->getRepository(UserPortal::class)->findAll();
        foreach ($users as $user) {
            array_push($userInfo, [
                'username'=>$user->getLogin(),
                'password'=>$userInfo->getPassword(),

            ]);
        }
        $response = new JsonResponse();
        return $response->setData([$userInfo]);
    }
}
