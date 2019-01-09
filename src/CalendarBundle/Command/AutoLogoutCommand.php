<?php
/**
 * Created by PhpStorm.
 * User: tarek
 * Date: 07.12.18
 * Time: 14:57
 */

namespace CalendarBundle\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use UserBundle\Entity\isLoged;

class AutoLogoutCommand extends ContainerAwareCommand
{

    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'calendar:auto-logout';

    protected function configure()
    {
        // ...
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getEntityManager();

        $isLogeds = $em->getRepository(isLoged::class)->findAll();
        foreach ($isLogeds as $isLoged) {
            $now = new \DateTime();
            $lastUpdate = new \DateTime($isLoged->getLastUpdate());

            $diff = $lastUpdate->diff($now);

            if ($isLoged->getIsLoged() && $diff->i >= 59) {
                $isLoged->setIsLoged(false);

                $em->persist($isLoged);
                $em->flush();
            }
        }

        $output->writeln("Table IsLoged is updated ");
    }
}