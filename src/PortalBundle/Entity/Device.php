<?php

namespace PortalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Device
 *
 * @ORM\Table(name="device")
 * @ORM\Entity(repositoryClass="PortalBundle\Repository\DeviceRepository")
 */
class Device
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
     * @var int
     *
     * @ORM\Column(name="companyid", type="integer", nullable=true)
     */
    private $companyid;

    /**
     * @var int
     *
     * @ORM\Column(name="userid", type="integer", nullable=true)
     */
    private $userid;

    /**
     * @var string
     *
     * @ORM\Column(name="udid", type="string", length=255, nullable=true)
     */
    private $udid;


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
     * Set companyid
     *
     * @param integer $companyid
     *
     * @return Device
     */
    public function setCompanyid($companyid)
    {
        $this->companyid = $companyid;

        return $this;
    }

    /**
     * Get companyid
     *
     * @return int
     */
    public function getCompanyid()
    {
        return $this->companyid;
    }

    /**
     * Set udid
     *
     * @param string $udid
     *
     * @return Device
     */
    public function setUdid($udid)
    {
        $this->udid = $udid;

        return $this;
    }

    /**
     * Get udid
     *
     * @return string
     */
    public function getUdid()
    {
        return $this->udid;
    }

    /**
     * Set userid
     *
     * @param integer $userid
     *
     * @return Device
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return integer
     */
    public function getUserid()
    {
        return $this->userid;
    }
}
