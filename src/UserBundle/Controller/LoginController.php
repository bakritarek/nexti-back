<?php

namespace UserBundle\Controller;

use CalendarBundle\Entity\Settings;
use PortalBundle\Entity\accountsystems;
use PortalBundle\Entity\UserPortal;
use UserBundle\Entity\isLoged;
use UserBundle\Form\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends Controller
{
    public function LoginAction($username,$password,$systemid) {


        $em = $this->getDoctrine()->getManager('portal');
        $emDefault = $this->getDoctrine()->getManager('default');
        $accountsystems = $em->getRepository(accountsystems::class)->find($systemid);

        $data = [
            'code' => 0
        ] ;
        if ($accountsystems) {
            if ($accountsystems->getNextiapp()) {
                $user = $em->getRepository(UserPortal::class)->findOneBy(['login'=>$username,'systemid'=>$systemid]);
                if ($user) {
                    $salt = $user->getSalt();
                    $password = hash('SHA256', $password.$salt);

                    $test = strstr($password , $user->getPassword());

                    if ($test == true)
                    {
                        $isLoged = $emDefault->getRepository(isLoged::class)->findOneBy(['userid'=>$user->getId()]);
                        if ($isLoged) {
                            $isLoged->setIsloged(true);
                            $isLoged->setLastUpdate(gmdate('Y/m/d H:i:s'));
                            $emDefault->persist($isLoged);
                            $emDefault->flush();
                        }

                        else {
                            $isLoged = new isLoged();
                            $isLoged->setIsloged(true);
                            $isLoged->setUserid($user->getId());
                            $isLoged->setSystemid($systemid);
                            $isLoged->setLastUpdate(gmdate('Y/m/d H:i:s'));
                            $emDefault->persist($isLoged);
                            $emDefault->flush();
                        }

                        $emDb = $this->getDoctrine()->getManager('db'.$systemid);
                        $settings = $emDb->getRepository(Settings::class)->findBy(['user'=>$user->getId()]);
                        if (!$settings) {
                            $settings = new Settings();
                            $settings->setUser($user->getId());
                            $settings->setSnap(0);
                            $settings->setTimeInterval('00:01:00');
                            $settings->setTimeout(15000);
                            $settings->setCommit('0');
                            $settings->setStatus('0');
                            $settings->setTitle('company');
                            $emDb->persist($settings);
                            $emDb->flush();
                        }

                        $data = [
                            'id'=>$user->getId(),
                            'username' => $username,
                            'systemid' => $systemid,
                            'name' => $user->getUsername(),
                            'code' => 1
                        ];
                    }


                }
            }


        }



        $response = new JsonResponse();

        return $response->setData($data);

    }

    public function LogoutAction($id) {
        $em = $this->getDoctrine()->getManager('default');

        $isLoged = $em->getRepository(isLoged::class)->findOneBy(['userid'=>$id]);

        $isLoged->setIsloged(false);

        $em->persist($isLoged);
        $em->flush();

        $response = new JsonResponse();

        return $response->setData(['loged out']);
    }

    public function StillLogedAction($id) {

        $em = $this->getDoctrine()->getManager('default');

        $isLogeds = $em->getRepository(isLoged::class)->findOneBy(['userid'=>$id]);

        $response = new JsonResponse();

        return $response->setData(['isLoged'=>$isLogeds->getIsLoged()]);

    }
}
