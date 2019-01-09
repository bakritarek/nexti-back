<?php

namespace CalendarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Staff
 *
 * @ORM\Table(name="staff")
 * @ORM\Entity(repositoryClass="CalendarBundle\Repository\StaffRepository")
 */
class Staff
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
     * @var string
     *
     * @ORM\Column(name="globalid", type="text", nullable=true)
     */
    private $globalid;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="text", nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="staffid", type="text", nullable=true)
     */
    private $staffid;

    /**
     * @var string
     *
     * @ORM\Column(name="importid", type="text", nullable=true)
     */
    private $importid;

    /**
     * @var integer
     *
     * @ORM\Column(name="satelliteid", type="integer", nullable=true)
     */
    private $satelliteid;

    /**
     * @var integer
     *
     * @ORM\Column(name="sourceid", type="integer", nullable=true)
     */
    private $sourceid;

    /**
     * @var string
     *
     * @ORM\Column(name="serviceteam", type="text", nullable=true)
     */
    private $serviceteam;

    /**
     * @var integer
     *
     * @ORM\Column(name="initials", type="integer", nullable=true)
     */
    private $initials;

    /**
     * @var integer
     *
     * @ORM\Column(name="in_lead", type="integer", nullable=true)
     */
    private $inLead;

    /**
     * @var integer
     *
     * @ORM\Column(name="in_sales", type="integer", nullable=true)
     */
    private $inSales;

    /**
     * @var integer
     *
     * @ORM\Column(name="in_crm", type="integer", nullable=true)
     */
    private $inCrm;

    /**
     * @var integer
     *
     * @ORM\Column(name="in_task", type="integer", nullable=true)
     */
    private $inTask;

    /**
     * @var integer
     *
     * @ORM\Column(name="in_service", type="integer", nullable=true)
     */
    private $inService;

    /**
     * @ORM\OneToMany(targetEntity="servicecase", mappedBy="staff")
     */
    private $servicecase;

    /**
     *
     *
     * @ORM\OneToOne(targetEntity="StaffColor", cascade={"persist","remove"})
     */
    private $color;



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
     * Set globalid
     *
     * @param string $globalid
     *
     * @return Staff
     */
    public function setGlobalid($globalid)
    {
        $this->globalid = $globalid;

        return $this;
    }

    /**
     * Get globalid
     *
     * @return string
     */
    public function getGlobalid()
    {
        return $this->globalid;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Staff
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set staffid
     *
     * @param string $staffid
     *
     * @return Staff
     */
    public function setStaffid($staffid)
    {
        $this->staffid = $staffid;

        return $this;
    }

    /**
     * Get staffid
     *
     * @return string
     */
    public function getStaffid()
    {
        return $this->staffid;
    }

    /**
     * Set importid
     *
     * @param string $importid
     *
     * @return Staff
     */
    public function setImportid($importid)
    {
        $this->importid = $importid;

        return $this;
    }

    /**
     * Get importid
     *
     * @return string
     */
    public function getImportid()
    {
        return $this->importid;
    }

    /**
     * Set satelliteid
     *
     * @param integer $satelliteid
     *
     * @return Staff
     */
    public function setSatelliteid($satelliteid)
    {
        $this->satelliteid = $satelliteid;

        return $this;
    }

    /**
     * Get satelliteid
     *
     * @return integer
     */
    public function getSatelliteid()
    {
        return $this->satelliteid;
    }

    /**
     * Set sourceid
     *
     * @param integer $sourceid
     *
     * @return Staff
     */
    public function setSourceid($sourceid)
    {
        $this->sourceid = $sourceid;

        return $this;
    }

    /**
     * Get sourceid
     *
     * @return integer
     */
    public function getSourceid()
    {
        return $this->sourceid;
    }

    /**
     * Set serviceteam
     *
     * @param string $serviceteam
     *
     * @return Staff
     */
    public function setServiceteam($serviceteam)
    {
        $this->serviceteam = $serviceteam;

        return $this;
    }

    /**
     * Get serviceteam
     *
     * @return string
     */
    public function getServiceteam()
    {
        return $this->serviceteam;
    }

    /**
     * Set initials
     *
     * @param integer $initials
     *
     * @return Staff
     */
    public function setInitials($initials)
    {
        $this->initials = $initials;

        return $this;
    }

    /**
     * Get initials
     *
     * @return integer
     */
    public function getInitials()
    {
        return $this->initials;
    }

    /**
     * Set inLead
     *
     * @param integer $inLead
     *
     * @return Staff
     */
    public function setInLead($inLead)
    {
        $this->inLead = $inLead;

        return $this;
    }

    /**
     * Get inLead
     *
     * @return integer
     */
    public function getInLead()
    {
        return $this->inLead;
    }

    /**
     * Set inSales
     *
     * @param integer $inSales
     *
     * @return Staff
     */
    public function setInSales($inSales)
    {
        $this->inSales = $inSales;

        return $this;
    }

    /**
     * Get inSales
     *
     * @return integer
     */
    public function getInSales()
    {
        return $this->inSales;
    }

    /**
     * Set inCrm
     *
     * @param integer $inCrm
     *
     * @return Staff
     */
    public function setInCrm($inCrm)
    {
        $this->inCrm = $inCrm;

        return $this;
    }

    /**
     * Get inCrm
     *
     * @return integer
     */
    public function getInCrm()
    {
        return $this->inCrm;
    }

    /**
     * Set inTask
     *
     * @param integer $inTask
     *
     * @return Staff
     */
    public function setInTask($inTask)
    {
        $this->inTask = $inTask;

        return $this;
    }

    /**
     * Get inTask
     *
     * @return integer
     */
    public function getInTask()
    {
        return $this->inTask;
    }

    /**
     * Set inService
     *
     * @param integer $inService
     *
     * @return Staff
     */
    public function setInService($inService)
    {
        $this->inService = $inService;

        return $this;
    }

    /**
     * Get inService
     *
     * @return integer
     */
    public function getInService()
    {
        return $this->inService;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->servicecasestaff = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add servicecasestaff
     *
     * @param \CalendarBundle\Entity\ServiceCaseStaff $servicecasestaff
     *
     * @return Staff
     */
    public function addServicecasestaff(\CalendarBundle\Entity\ServiceCaseStaff $servicecasestaff)
    {
        $this->servicecasestaff[] = $servicecasestaff;

        return $this;
    }

    /**
     * Remove servicecasestaff
     *
     * @param \CalendarBundle\Entity\ServiceCaseStaff $servicecasestaff
     */
    public function removeServicecasestaff(\CalendarBundle\Entity\ServiceCaseStaff $servicecasestaff)
    {
        $this->servicecasestaff->removeElement($servicecasestaff);
    }

    /**
     * Get servicecasestaff
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getServicecasestaff()
    {
        return $this->servicecasestaff;
    }



    /**
     * Add servicecase
     *
     * @param \CalendarBundle\Entity\servicecase $servicecase
     *
     * @return Staff
     */
    public function addServicecase(\CalendarBundle\Entity\servicecase $servicecase)
    {
        $this->servicecase[] = $servicecase;

        return $this;
    }

    /**
     * Remove servicecase
     *
     * @param \CalendarBundle\Entity\servicecase $servicecase
     */
    public function removeServicecase(\CalendarBundle\Entity\servicecase $servicecase)
    {
        $this->servicecase->removeElement($servicecase);
    }

    /**
     * Get servicecase
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getServicecase()
    {
        return $this->servicecase;
    }

    /**
     * Set color
     *
     * @param \CalendarBundle\Entity\StaffColor $color
     *
     * @return Staff
     */
    public function setColor(\CalendarBundle\Entity\StaffColor $color = null)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return \CalendarBundle\Entity\StaffColor
     */
    public function getColor()
    {
        return $this->color;
    }
}
