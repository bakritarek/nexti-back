<?php

namespace PortalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * accountsystems
 *
 * @ORM\Table(name="accountsystems")
 * @ORM\Entity(repositoryClass="PortalBundle\Repository\accountsystemsRepository")
 */
class accountsystems
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var bool
     *
     * @ORM\Column(name="nextiapp", type="boolean", nullable=true)
     */
    private $nextiapp;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nextiapp
     *
     * @param boolean $nextiapp
     *
     * @return accountsystems
     */
    public function setNextiapp($nextiapp)
    {
        $this->nextiapp = $nextiapp;

        return $this;
    }

    /**
     * Get nextiapp
     *
     * @return bool
     */
    public function getNextiapp()
    {
        return $this->nextiapp;
    }
}
