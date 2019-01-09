<?php

namespace WBBundle\Controller;

use PortalBundle\Entity\accountsystems;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Yaml\Yaml;
use WBBundle\Entity\app;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;
use WBBundle\Entity\Color;

class DefaultController extends Controller
{
    public function AddSystemAction($id, KernelInterface $kernel) {
        $em = $this->getDoctrine()->getManager('default');
        $system = $em->getRepository(app::class)->findOneBy(['systemid'=>$id]);
        if (!$system) {
            $file = Yaml::parseFile('/var/www/html/nexti/app/config/config.yml');
            $dbName = 'db'.$id;
            $file['doctrine']['dbal']['connections']["$dbName"] = [
                'driver'=> 'pdo_pgsql','host'=> '192.168.100.136','dbname'=> "$dbName",'user'=> 'postgres',
                'password'=> 'Nexti2018<','charset'=> 'UTF8'
            ];
            $file['doctrine']['orm']['entity_managers']["$dbName"] = [
                 'connection'=>"$dbName",
                'mappings' => [
                    'CalendarBundle'=>null
                ]
            ];
            $file = Yaml::dump($file);

            file_put_contents('/var/www/html/nexti/app/config/config.yml', $file);
            $cmd = "doctrine:database:create --connection=$dbName";
            // install the bundle & run this code, e.g. in a controller

            $console = new \CoreSphere\ConsoleBundle\Executer\CommandExecuter($kernel);
            $responses = $console->execute("cache:clear");


            $console = new \CoreSphere\ConsoleBundle\Executer\CommandExecuter($kernel);
            $responses = $console->execute("doctrine:database:create --connection=$dbName");
            $responses = $console->execute("doctrine:schema:update --force --em=$dbName");
            $responses = $console->execute("cache:clear");
            $responses = $console->execute("cache:clear");
            $responses = $console->execute("cache:clear");
            $app = new app();

            $app->setSystemid($id);
            $app->setEnabled(true);

            $em->persist($app);
            $em->flush();



        }
        else
            $responses = 'nothing';
        $response = new JsonResponse();

        return $response->setData([$responses]);

    }

    public function AddColorAction() {
        $em = $this->getDoctrine()->getManager('default');

        $colors = ['#6494CC','#083973','#786DD2','#190E7A','#5BCCAD','#007353','#FFE072','#B08900','#FFA572','#B03F00'
            ,'#64E06C','#008A09','#59C0C5','#FFB372','#B05100','#FF7572','#B00400','#FFFFF72','#B0B000','#C8F56D','#6DA400',
            '#E265AC','#8D0050','#A862CE','#640896'];

        foreach ($colors as $color) {
            $ColorTable = new Color();

            $ColorTable->setCode($color);
            $em->persist($ColorTable);

        }
        $em->flush();

        $response = new JsonResponse();

        return $response->setData($colors);
    }

}
