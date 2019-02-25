<?php

namespace CalendarBundle\Controller;

use CalendarBundle\Entity\ClientCompany;
use CalendarBundle\Entity\servicecase;
use CalendarBundle\Entity\ServiceCaseReschedule;
use CalendarBundle\Entity\ServiceCaseStaff;
use CalendarBundle\Entity\Settings;
use CalendarBundle\Entity\Staff;
use CalendarBundle\Entity\StaffColor;
use CalendarBundle\Entity\TaskType;
use CalendarBundle\Entity\Titles;
use JMS\Serializer\SerializerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PortalBundle\Entity\accountsystems;
use PortalBundle\Entity\Company;
use PortalBundle\Entity\companyuser;
use PortalBundle\Entity\Device;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\VarDumper\Tests\Cloner\DataTest;
use UserBundle\Entity\isLoged;
use WBBundle\Entity\Color;

/**
 * Class DefaultController
 * @package CalendarBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @param $systemid
     * @param LoggerInterface $logger
     * @param $userid
     * @return JsonResponse
     */
    public function SynchroDataAction($systemid, LoggerInterface $logger, $userid) {


       $em = $this->getDoctrine()->getManager('db'.$systemid);
       $emDefault = $this->getDoctrine()->getManager('default');

       $isLoged = $emDefault->getRepository(isLoged::class)->getLogedUser($systemid,$userid);

      $lastUpdate = $emDefault->getRepository(isLoged::class)->findOneBy(['userid'=>$userid]);
      $lastUpdate->setLastUpdate(gmdate('Y/m/d H:i:s'));
      $emDefault->persist($lastUpdate);
      $emDefault->flush();
       $error = 'someone is logged';

       if (!$isLoged) {
           //Truncate
           $q = $em->createQuery('delete from CalendarBundle:ServiceCaseReschedule');
           $numDeleted = $q->execute();

           $q = $em->createQuery('delete from CalendarBundle:servicecase');
           $numDeleted = $q->execute();

           $q = $em->createQuery('delete from CalendarBundle:Staff');
           $numDeleted = $q->execute();

           $q = $em->createQuery('delete from CalendarBundle:ClientCompany');
           $numDeleted = $q->execute();

           $q = $em->createQuery('delete from CalendarBundle:TaskType');
           $numDeleted = $q->execute();


           //Staff

           $url = 'http://192.168.100.138:8090/Service/Replicator/GetDataDump?Instance=default&DeviceID=TESTUDID&Raw=true&format=json&DeviceVersion=1&Device=iphone&table=staff&limit=1000';


           $json = file_get_contents($url);
           if ($json) {
               $json = '['.$json.']';
               $words = ['\n','\t','\r'];
               $json = str_replace($words,' ',$json);
               $json = str_replace('null','""',$json);
               $json = str_replace('}','},',$json);
               $length = strlen($json) -2;
               $json = substr($json,0, $length);


               $json = $json.']';

               $js = json_decode($json);
               $i=1;
               foreach ($js as $obj) {
                   $obj = get_object_vars($obj);

                   $staff = new Staff();

                   $staff->setName($obj['name']);
                   $staff->setGlobalid($obj['id']);
                   $staff->setStaffid($obj['staffid']);
                   $colorExist = $em->getRepository(StaffColor::class)->findOneBy(['staffid'=>$obj['staffid']]);
                   if (!$colorExist) {
                       if (count($js) >= 25 && $i < 26) {
                           $staffColor = new StaffColor();
                           $staffColor->setStaffid($obj['staffid']);
                           $color = $emDefault->getRepository(Color::class)->find($i);
                           $staffColor->setColor($color->getCode());
                           $staff->setColor($staffColor);

                           $em->persist($staffColor);
                       }
                       elseif (count($js) >= 25 && $i >= 26) {
                           $color = dechex(mt_rand(0,16777215));
                           $color = str_pad($color,6,'0');
                           $staffColor = new StaffColor();
                           $staffColor->setStaffid($obj['staffid']);
                           $staffColor->setColor('#'.$color);
                           $staff->setColor($staffColor);

                           $em->persist($staffColor);
                       }
                       elseif (count($js) < 25) {
                           $staffColor = new StaffColor();
                           $staffColor->setStaffid($obj['staffid']);
                           $color = $emDefault->getRepository(Color::class)->find($i);
                           $staffColor->setColor($color->getCode());
                           $staff->setColor($staffColor);

                           $em->persist($staffColor);
                       }
                       $i++;

                   }
                   else {
                       $staff->setColor($colorExist);
                   }


                   $em->persist($staff);
               }
               $em->flush();

               //TaskType

               $url = 'http://192.168.100.138:8090/Service/Replicator/GetDataDump?Instance=default&DeviceID=TESTUDID&Raw=true&format=json&DeviceVersion=1&Device=iphone&table=servicecasetype&limit=1000';

               $json = file_get_contents($url);

               if ($json) {
                   $json = '['.$json.']';
                   $words = ['\n','\t','\r'];
                   $json = str_replace($words,' ',$json);
                   $json = str_replace('}','},',$json);
                   $length = strlen($json) -2;
                   $json = substr($json,0, $length);


                   $json = $json.']';

                   $js = json_decode($json);

                   foreach ($js as $obj) {

                       $obj = get_object_vars($obj);

                       $taskType = new TaskType();

                       $taskType->setDescription($obj['description']);
                       $taskType->setTasktype($obj['tasktype']);

                       $em->persist($taskType);


                   }


                   $em->flush();
               }
               //ServiceCase

               $url = 'http://192.168.100.138:8090/Service/Replicator/GetDataDump?Instance=default&DeviceID=TESTUDID&Raw=true&format=json&DeviceVersion=1&Device=iphone&table=servicecase&limit=1000';

               $json = file_get_contents($url);

               if ($json) {
                   $json = '['.$json.']';
                   $words = ['\n','\t','\r'];
                   $json = str_replace($words,' ',$json);
                   $json = str_replace('null','""',$json);
                   $json = str_replace('}','},',$json);
                   $length = strlen($json) -2;
                   $json = substr($json,0, $length);


                   $json = $json.']';

                   $js = json_decode($json);
                   $now = new \DateTime();
                   foreach ($js as $obj) {
                       $obj = get_object_vars($obj);

                       $scstart = new \DateTime($obj['startdate']);
                       $dateDiff = date_diff($now, $scstart);
                       if ($dateDiff->m < 2) {

                           $taskType = $em->getRepository(TaskType::class)->findOneBy(['tasktype' => $obj['tasktype']]);

                           $servicecase = new servicecase();

                           $servicecase->setStartdate($obj['startdate']);
                           $servicecase->setStarttime($obj['starttime']);
                           $servicecase->setTasktype($obj['tasktype']);
                           $servicecase->setShortdescription($obj['shortdescription']);
                           $servicecase->setLongdescription($obj['longdescription']);
                           $servicecase->setServicecaseno($obj['servicecaseno']);
                           $servicecase->setLatestenddate($obj['latestenddate']);
                           $servicecase->setLatestendtime($obj['latestendtime']);
                           $servicecase->setPlannedfor($obj['plannedfor']);
                           $servicecase->setGlobalid($obj['id']);
                           $servicecase->setCompanyno($obj['companyno']);
                           $servicecase->setStatus($obj['status']);
                           $servicecase->setTasktypes($taskType);

                           $Staff = $em->getRepository(Staff::class)->findOneBy(['staffid'=>$obj['plannedfor']]);
                           $servicecase->setStaff($Staff);

                           //Company Name
                            $servicecaseno =  $servicecase->getServicecaseno();
                            $servicecaseno = "'".$servicecaseno."'";
                           $urlCompany = 'http://192.168.100.138:8090/Service/Replicator/GetDataDump?DeviceVersion=2&Server=default&Compression=NONE&Compressed=&format=json&Device=iPhone&RequestID=6313&AppVersion=4.8.2%2520(16542)&table=servicecasecontact&ServerVersion=1&Instance=default&DeviceID=TESTUDID&ColumnCondition=servicecaseno&condition='.$servicecaseno.'&limit=1';
                           $json = file_get_contents($urlCompany);
                           if ($json){

                               $json = '['.$json.']';
                               $words = ['\n','\t','\r'];
                               $json = str_replace($words,' ',$json);
                               $json = str_replace('null','""',$json);
                               $json = str_replace('}','},',$json);
                               $length = strlen($json) -2;
                               $json = substr($json,0, $length);


                               $json = $json.']';


                               $js = json_decode($json);
                               $obj = $js['0'];
                               $obj = get_object_vars($obj);
                               if ($obj['companyno']) {

                                   $company = new ClientCompany();
                                   $company->setName($obj['companyname']);


                                   $em->persist($company);
                                   $em->flush();

                                   $servicecase->setCompany($company);
                               }
                           }
                           else {
                               $companyno = $servicecase->getCompanyno();
                               $urlCompany = 'http://192.168.100.138:8090/Service/Replicator/GetDataDump?DeviceVersion=2&Server=default&Compression=NONE&Compressed=&format=json&Device=iPhone&RequestID=6313&AppVersion=4.8.2%2520(16542)&table=company&ServerVersion=1&Instance=default&DeviceID=TESTUDID&ColumnCondition=id&condition='.$companyno.'&limit=1';
                               $json = file_get_contents($urlCompany);

                               if ($json){
                                   $json = '['.$json.']';
                                   $words = ['\n','\t','\r'];
                                   $json = str_replace($words,' ',$json);
                                   $json = str_replace('null','""',$json);
                                   $json = str_replace('}','},',$json);
                                   $length = strlen($json) -2;
                                   $json = substr($json,0, $length);


                                   $json = $json.']';

                                   $js = json_decode($json);
                                   $obj = $js['0'];
                                   if ($obj) {

                                       $company = new ClientCompany();

                                       $company->setName($obj->companyname);
                                       $em->persist($company);


                                       $servicecase->setCompany($company);
                                   }
                               }
                           }
                           $em->persist($servicecase);
                       }
                   }

                   $em->flush();
               }

               //ServiceCaseReschudule

               $url = 'http://192.168.100.138:8090/Service/Replicator/GetDataDump?Instance=default&DeviceID=TESTUDID&Raw=true&format=json&DeviceVersion=1&Device=iphone&table=servicecasereschedule&limit=1000';

               $json = file_get_contents($url);

               if ($json) {
                   $json = '['.$json.']';
                   $words = ['\n','\t','\r'];
                   $json = str_replace($words,' ',$json);
                   $json = str_replace('}','},',$json);
                   $length = strlen($json) -2;
                   $json = substr($json,0, $length);


                   $json = $json.']';

                   $js = json_decode($json);

                   foreach ($js as $obj) {

                       $obj = get_object_vars($obj);

                       $servicecase = $em->getRepository(servicecase::class)->findOneBy(['servicecaseno'=>$obj['servicecaseno']]);

                       if ($servicecase) {

                           $servicecase->setStartdate($obj['reschedulenewstartdate']);
                           $servicecase->setStarttime($obj['reschedulenewstarttime']);
                           $servicecase->setLatestenddate($obj['reschedulenewenddate']);
                           $servicecase->setLatestendtime($obj['reschedulenewendtime']);
                           $servicecase->setSatelliteid($obj['satelliteid']);

                           $staff = $em->getRepository(Staff::class)->findOneBy(['staffid'=>$obj['reschedulenewstaffid']]);
                           if ($staff) {
                               $servicecase->setStaff($staff);
                           }
                           $em->persist($servicecase);
                       }

                       $servicecaseR = new ServiceCaseReschedule();
                       $servicecaseR->setServicecaseno($obj['servicecaseno']);
                       $servicecaseR->setGlobalid($obj['id']);
                       $servicecaseR->setStartdate($obj['reschedulenewstartdate']);
                       $servicecaseR->setStarttime($obj['reschedulenewstarttime']);
                       $servicecaseR->setLatestenddate($obj['reschedulenewenddate']);
                       $servicecaseR->setLatestendtime($obj['reschedulenewendtime']);
                       $servicecaseR->setSatelliteid($obj['satelliteid']);
                       $servicecaseR->setReschedulenewstaffid($obj['reschedulenewstaffid']);



                       $em->persist($servicecaseR);


                   }


                   $em->flush();
               }


               $error = json_last_error_msg();

           } else {
               $error = 'No staff table available';
           }


       }

       $response = new JsonResponse();
       return $response->setData(['message'=>'success']);


       //return new Response($js);

       /*
       $em = $this->getDoctrine()->getManager('db'.$systemid);

       $log = '';
       $log=$log. 'Start at : '.gmdate('Y-m-d H:i:s').';';
       ini_set('memory_limit', '-1');
       $url = 'http://192.168.100.174:8000/wb/getdata/servicecase';

       $getDataFromServerB = new \DateTime();


       $file = file_get_contents($url);

       $getDataFromServerF = new \DateTime();
       $dateDiff = date_diff($getDataFromServerB,$getDataFromServerF);

       $log = $log.'Get Data from server 6500 rows : '.$dateDiff->s.' s;';

       $objs = json_decode($file);


       $result = [];
       $now = new \DateTime();
       $insertingIntoDBB = new \DateTime();
      foreach ($objs as $obj) {
          $obj = (get_object_vars($obj));
          if (isset($obj['startdate']))
              $startDate = $obj['startdate'];
          else
              $startDate = '';

          if (isset($obj['starttime']))
              $startTime = $obj['starttime'];
          else
              $startDate = '';

          if (isset($obj['tasktype']))
              $tasktype = $obj['tasktype'];
          else
              $tasktype = '';

          if (isset($obj['shortdescription']))
              $shortDiscription = $obj['shortdescription'];
          else
              $shortDiscription = '';

          if (isset($obj['longdescription']))
              $longDescription = $obj['longdescription'];
          else
              $longDescription = '';

          if (isset($obj['servicecaseno']))
              $servicecaseno = $obj['servicecaseno'];
          else
              $servicecaseno = '';

          if (isset($obj['latestenddate']))
              $enDate = $obj['latestenddate'];
          else
              $enDate = '';

          if (isset($obj['latestendtime']))
              $endTime = $obj['latestendtime'];
          else
              $endTime = '';


          if (isset($obj['startdate'])) {
              $scstart = new \DateTime($obj['startdate']);
              $dateDiff = date_diff($now, $scstart);
              if ($dateDiff->m < 2) {
                  $servicecase = new servicecase();

                  $servicecase->setStartdate($startDate);
                  $servicecase->setStarttime($startTime);
                  $servicecase->setTasktype($tasktype);
                  $servicecase->setShortdescription($shortDiscription);
                  $servicecase->setLongdescription($longDescription);
                  $servicecase->setServicecaseno($servicecaseno);
                  $servicecase->setLatestenddate($enDate);
                  $servicecase->setLatestendtime($endTime);

                  $em->persist($servicecase);
              }

          }
      }
      $em->flush();
      $insertingIntoDBF = new \DateTime();

      $DDiff = date_diff($insertingIntoDBB,$insertingIntoDBF);
      $log = $log.'Inserting Into Data Base : '.$DDiff->s.' s;';

      $log = explode(';', $log);

       $response = new JsonResponse();

       return $response->setData($log);

       */
   }

    /**
     * @return JsonResponse
     */
    public function TestJsonAction() {

       $url = 'http://192.168.100.138:8090/Service/Replicator/GetDataDump?Instance=default&DeviceID=TESTUDID&Raw=true&format=json&DeviceVersion=1&Device=iphone&table=servicecase&limit=10';

        $json = file_get_contents($url);


        $json = '['.$json.']';
        $words = ['\n','\t','\r'];
        $json = str_replace($words,' ',$json);
        $json = str_replace('null','""',$json);
        $json = str_replace('}','},',$json);
       $length = strlen($json) -2;
       $json = substr($json,0, $length);


        $json = $json.']';

        $js = json_decode($json);

        foreach ($js as $obj) {
            $obj = get_object_vars($obj);

            var_dump($obj['id']);
        }
       $error = json_last_error_msg();

       $response = new JsonResponse();return $response->setData($js);


       //return new Response($js);

   }

    /**
     * @return Response
     */
    public function Test2Action() {

       $url = 'http://192.168.100.136/nexti/web/app_dev.php/calendar/test';

       $file = file_get_contents($url);

       $json = json_decode($file);

       foreach ($json as $j) {
           $obj = (get_object_vars($j));
           var_dump($obj['id']);
       }

       return new Response('ss');
   }

    /**
     * @param $id
     * @param $systemid
     * @return Response
     */
    public function getSettingsAction($id, $systemid) {
       $em = $this->getDoctrine()->getManager('db'.$systemid);

       $settings = $em->getRepository(Settings::class)->findOneBy(['user'=>$id]);

       $serializer = SerializerBuilder::create()->build();
       $jsonObject = $serializer->serialize($settings, 'json');

       return $response = new Response($jsonObject);
   }

   public function getTitlesAction($systemid) {
        $em = $this->getDoctrine()->getManager('db'.$systemid);

        $titles = $em->getRepository(Titles::class)->findAll();

        $serializer = SerializerBuilder::create()->build();
        $jsonObject = $serializer->serialize($titles, 'json');

       return $response = new Response($jsonObject);
   }

    public function getTitlesConAction($systemid, $title1, $titlex) {
        $em = $this->getDoctrine()->getManager('db'.$systemid);

        $titles = $em->getRepository(Titles::class)->getTitles($title1, $titlex);

        $serializer = SerializerBuilder::create()->build();
        $jsonObject = $serializer->serialize($titles, 'json');

        return $response = new Response($jsonObject);
    }

    public function getTitleAction($systemid,$servicecaseid,  $title) {
       $em = $this->getDoctrine()->getManager('db'.$systemid);

       $servicecase = $em->getRepository(servicecase::class)->find($servicecaseid);
       $result = new JsonResponse();
       if ($title === 'company_name') {
           if ($servicecase->getCompany())
               return $result->setData($servicecase->getCompany()->getName());
           else
               return $result->setData('');
       }



       if ($title === 'staff_name')
           return $result->setData($servicecase->getStaff()->getName());

       if ($title === 'tasktype' && $servicecase->getTasktypes())
           return $result->setData($servicecase->getTasktypes()->getDescription());

       if ($title === 'company_no')
           return $result->setData($servicecase->getCompanyno());

       if ($title === 'servicecase_no')
            return $result->setData($servicecase->getServicecaseno());

       if ($title === 'servicecase_no')
            return $result->setData($servicecase->getServicecaseno());

       if ($title === 'shortdescription')
            return $result->setData($servicecase->getShortdescription());

       if ($title === 'longdescription')
            return $result->setData($servicecase->getLongdescription());


       return $result->setData(' ');

    }

    /**
     * @param $time
     * @param $snap
     * @param $timeout
     * @param $commit
     * @param $starttime
     * @param $endtime
     * @param $title
     * @param $status
     * @param $id
     * @param $systemid
     * @return Response
     */
    public function updateSettingsAction($time, $snap, $timeout, $commit, $starttime, $endtime, $title, $title2, $title3, $status, $id, $systemid) {
       $em = $this->getDoctrine()->getManager('db'.$systemid);
       $emDefault = $this->getDoctrine()->getManager('default');
       $setting = $em->getRepository(Settings::class)->findOneBy(['user'=>$id]);

       $isLoged = $emDefault->getRepository(isLoged::class)->findOneBy(['userid'=>$id]);

       $isLoged->setLastUpdate(gmdate('Y/m/d H:i:s'));
       $emDefault->persist($isLoged);
       $emDefault->flush();



       $setting->setTimeInterval($time);
       $setting->setSnap($snap);
       $setting->setCommit($commit);
       $setting->setTimeout($timeout);
       $setting->setStartTime($starttime);
       $setting->setEndTime($endtime);
       $setting->setStatus($status);
       $setting->setTitle($title);
       $setting->setTitle2($title2);
       $setting->setTitle3($title3);


       $em->persist($setting);
       $em->flush();

       $serializer = SerializerBuilder::create()->build();
       $jsonObject = $serializer->serialize($setting, 'json');

       return $response = new Response($jsonObject);
   }

    /**
     * @param $systemid
     * @param $userid
     * @return JsonResponse
     */
    public function CommitAction($systemid, $userid) {


       $emPortal = $this->getDoctrine()->getManager('portal');
       $em = $this->getDoctrine()->getManager('db'.$systemid);
       $emDefault = $this->getDoctrine()->getManager('default');
       //delete in prod
       $systemid = 733;
       $company = $emPortal->getRepository(Company::class)->find($systemid);
       $host = $company->getMobisynchost();
       $port = $company->getMobisyncport();

       $companyUsers = $emPortal->getRepository(companyuser::class)->findBy(['isblocked'=>false]);
        $devices = $emPortal->getRepository(Device::class)->findBy(['companyid'=>$systemid]);


       $url = "http://192.168.100.138:8090/Service/Replicator/ApplyUpdate?RequestID=245&compressed=yes&AppVersion=4.9.1%20(58)&raw=no&checksum=md5&Instance=default&DeviceVersion=5&format=csv&OSVersion=12.1&DeviceID=TESTUDID&DeviceType=iphone&MaxTranCount=50&LastTranID=9930229";

       $servicecases = $em->getRepository(servicecase::class)->findAll();

       $operations = [];
       foreach ($servicecases as $servicecase) {
           $servicecaseR = $em->getRepository(ServiceCaseReschedule::class)->findOneBy(['satelliteid'=>$servicecase->getSatelliteid()]);

           if ($servicecaseR) {

               $filePath = __DIR__.'/../../../web/xmlfiles/';
               $fileName = 'xmlinsert' . date('d.m.Y') . '_' . $systemid . '.xml';
               $fs = new Filesystem();
               $fs->mkdir($filePath);

               $servicecaseNo = $servicecase->getServicecaseno();
               $startDate = $servicecase->getStartdate();
               $startTime = $servicecase->getStarttime();
               $endDate = $servicecase->getLatestenddate();
               $endTime = $servicecase->getLatestendtime();
               if ($servicecase->getStaff())
                $NewStaffId = $servicecase->getStaff()->getStaffid();
               else
                   $NewStaffId = $servicecase->getPlannedfor();

               $satelliteID = $servicecaseR->getSatelliteid();

               $xml = '<?xml version="1.0" encoding="UTF-8"?>
                    <Request>
                        <UPDATE Table="ServiceCaseReschedule" rowID="'.$satelliteID.'" >
                            <RescheduleNewStartdate>'.$startDate.'</RescheduleNewStartdate>
                            <RescheduleNewStarttime>'.$startTime.'</RescheduleNewStarttime>
                            <RescheduleNewEnddate>'.$endDate.'</RescheduleNewEnddate>
                            <RescheduleNewEndtime>'.$endTime.'</RescheduleNewEndtime>
                            <rescheduleNewStaffID>'.$NewStaffId.'</rescheduleNewStaffID>
                        </UPDATE> 
                    </Request>';
               array_push($operations, 'update '.$servicecaseNo);

           }

           else {

               $filePath = __DIR__.'/../../../web/xmlfiles/';
               $fileName = 'xmlupdates' . date('d.m.Y') .'_' . $systemid . '.xml';

               $fs = new Filesystem();
               $fs->mkdir($filePath);
               $rowID = rand(1000000,1000000000);
               $servicecaseNo = $servicecase->getServicecaseno();
               $startDate = $servicecase->getStartdate();
               $startTime = $servicecase->getStarttime();
               $endDate = $servicecase->getLatestenddate();
               $endTime = $servicecase->getLatestendtime();

               $servicecaseR = new ServiceCaseReschedule();

               $servicecaseR->setServicecaseno($servicecaseNo);
               $servicecaseR->setGlobalid($servicecase->getGlobalid());
               $servicecaseR->setStartdate($startDate);
               $servicecaseR->setStarttime($startTime);
               $servicecaseR->setLatestenddate($endDate);
               $servicecaseR->setLatestendtime($endTime);
               $servicecaseR->setSatelliteid($rowID);
               if ($servicecase->getStaff())
                   $NewStaffId = $servicecase->getStaff()->getStaffid();
               else
                   $NewStaffId = $servicecase->getPlannedfor();

               $em->persist($servicecaseR);

               $xml = '<?xml version="1.0" encoding="UTF-8"?>
                    <Request>
                        <INSERT Table="ServiceCaseReschedule" rowID="'.$rowID.'" globalID="">
                            <RescheduleNewStartdate>'.$startDate.'</RescheduleNewStartdate>
                            <RescheduleNewStarttime>'.$startTime.'</RescheduleNewStarttime>
                            <RescheduleNewEnddate>'.$endDate.'</RescheduleNewEnddate>
                            <RescheduleNewEndtime>'.$endTime.'</RescheduleNewEndtime>
                            <rescheduleNewStaffID>'.$NewStaffId.'</rescheduleNewStaffID>
                        </INSERT> 
                    </Request>';
               $servicecase->setSatelliteid($rowID);
               $em->persist($servicecase);
               $em->flush();

               array_push($operations, 'Insert '.$servicecaseNo);
           }


           $compressed = gzencode($xml, 9,FORCE_DEFLATE);
           $file = $filePath.'xml'.$systemid.'-'.gmdate('d-m-Y_H-i-s').'.xml.zip';
           file_put_contents($file, $compressed);

           try {
               $result = file_get_contents('http://192.168.100.138:8090/Service/Replicator/ApplyUpdate?RequestID=245&compressed=yes&AppVersion=4.9.1%20%2858%29&raw=no&checksum=md5&Instance=default&DeviceVersion=5&format=csv&OSVersion=12.1&DeviceID=TESTUDID&DeviceType=iphone&MaxTranCount=50&LastTranID=9930229', null, stream_context_create(array(
                   'http' => array(
                       'method' => 'POST',
                       'header' => 'Content-Type: application/deflated-xml' . "\r\n"
                           . 'Content-Length: ' . strlen(file_get_contents($file)) . "\r\n",
                       'content' => file_get_contents($file),
                   ),
               )));

               $result = 1;
               unlink($file);
           } catch (\Exception $e) {
               $result = 0;
           }
       }

       $isLoged = $emDefault->getRepository(isLoged::class)->findOneBy(['userid'=>$userid]);
       $isLoged->setLastUpdate(gmdate('Y/m/d H:i:s'));
       $emDefault->persist($isLoged);
       $emDefault->flush();

       $response = new JsonResponse();

        return $response->setData($result);

   }

    /**
     * @param KernelInterface $kernel
     * @return JsonResponse
     */
    public function AutoLogoutAction(KernelInterface $kernel) {
       /*
       $em = $this->getDoctrine()->getManager('default');

       $isLogeds = $em->getRepository(isLoged::class)->findAll();

       foreach ($isLogeds as $isLoged) {
           $now = new \DateTime();
           $lastUpdate = new \DateTime($isLoged->getLastUpdate());

          $diff = $lastUpdate->diff($now);

          if ($isLoged->getIsLoged() && $diff->i <= 59) {
              var_dump('logout');
          }
       }
        */
      // exec('/var/www/html/nexti/script.sh',$output);
       $output = exec('/var/www/html/nexti/script.sh', $outputs);
       $response= new JsonResponse();
       return $response->setData(['mess'=>$outputs]);
   }

    /**
     * @param $staffId
     * @param $servicecaseid
     * @param $systemid
     * @param $userid
     * @param $start
     * @return JsonResponse
     */
    public function ChangeStaffAction($staffId, $servicecaseid, $systemid, $userid, $start) {
       $em = $this->getDoctrine()->getManager('db'.$systemid);
       $emDefault = $this->getDoctrine()->getManager('default');

       $staff = $em->getRepository(Staff::class)->find($staffId);
       $servicecase = $em->getRepository(servicecase::class)->find($servicecaseid);
       $servicecaseR = $em->getRepository(ServiceCaseReschedule::class)->findOneBy(['servicecaseno'=>$servicecase->getServicecaseno()]);
       if ($servicecaseR) {
           $servicecaseR->setReschedulenewstaffid($staff->getStaffid());
           $servicecaseR->setStarttime($start);
           $em->persist($servicecaseR);
       }

       $servicecase->setStaff($staff);
       $servicecase->setStarttime($start);

       $em->persist($servicecase);
       $em->flush();

       $isLoged = $emDefault->getRepository(isLoged::class)->findOneBy(['userid'=>$userid]);
       $isLoged->setLastUpdate(gmdate('Y/m/d H:i:s'));
       $emDefault->persist($isLoged);
       $emDefault->flush();



     $result = 1;

       $response = new JsonResponse();

       return $response->setData($result);

   }

    /**
     * @param $url
     * @param $systemid
     * @param $userid
     * @return JsonResponse
     */
    public function StatusFromUrlAction($url, $systemid, $userid) {

      $em = $this->getDoctrine()->getManager('db'.$systemid);
      $event = $em->getRepository(servicecase::class)->find($url);

      $array = ['id' => $url, 'status' => $event->getStatus()];
      $response = new JsonResponse();

      return $response->setData($array);
   }

}
