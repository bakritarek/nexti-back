<?php

namespace CalendarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ServiceCaseStaff
 *
 * @ORM\Table(name="service_case_staff")
 * @ORM\Entity(repositoryClass="CalendarBundle\Repository\ServiceCaseStaffRepository")
 */
class ServiceCaseStaff
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
     * @var integer
     *
     * @ORM\Column(name="satelliteid", type="integer", nullable=true)
     */
    private $satelliteid;

    /**
     * @var string
     *
     * @ORM\Column(name="globalid", type="text", nullable=true)
     */
    private $globalid;

    /**
     * @var string
     *
     * @ORM\Column(name="importid", type="text", nullable=true)
     */
    private $importid;

    /**
     * @ORM\ManyToOne(targetEntity="servicecase", inversedBy="servicecasestaff")
     */
    private $servicecaseno;

    /**
     * @ORM\ManyToOne(targetEntity="Staff", inversedBy="servicecasestaff")
     */
    private $staffno;

    /**
     * @var integer
     *
     * @ORM\Column(name="sourceid", type="integer", nullable=true)
     */
    private $sourceid;


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
     * Set satelliteid
     *
     * @param integer $satelliteid
     *
     * @return ServiceCaseStaff
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
     * Set globalid
     *
     * @param string $globalid
     *
     * @return ServiceCaseStaff
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
     * Set importid
     *
     * @param string $importid
     *
     * @return ServiceCaseStaff
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
     * Set servicecaseno
     *
     * @param string $servicecaseno
     *
     * @return ServiceCaseStaff
     */
    public function setServicecaseno($servicecaseno)
    {
        $this->servicecaseno = $servicecaseno;

        return $this;
    }

    /**
     * Get servicecaseno
     *
     * @return string
     */
    public function getServicecaseno()
    {
        return $this->servicecaseno;
    }

    /**
     * Set staffno
     *
     * @param string $staffno
     *
     * @return ServiceCaseStaff
     */
    public function setStaffno($staffno)
    {
        $this->staffno = $staffno;

        return $this;
    }

    /**
     * Get staffno
     *
     * @return string
     */
    public function getStaffno()
    {
        return $this->staffno;
    }

    /**
     * Set sourceid
     *
     * @param integer $sourceid
     *
     * @return ServiceCaseStaff
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
}
