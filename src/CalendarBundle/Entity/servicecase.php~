<?php

namespace CalendarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * servicecase
 *
 * @ORM\Table(name="servicecase")
 * @ORM\Entity(repositoryClass="CalendarBundle\Repository\servicecaseRepository")
 */
class servicecase
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
     * @var string
     *
     * @ORM\Column(name="startdate", type="text", nullable=true)
     */
    private $startdate;

    /**
     * @var string
     *
     * @ORM\Column(name="starttime", type="text", nullable=true)
     */
    private $starttime;

    /**
     * @var integer
     *
     * @ORM\Column(name="duration", type="integer", nullable=true)
     */
    private $duration;

    /**
     * @var string
     *
     * @ORM\Column(name="tasktype", type="text", nullable=true)
     */
    private $tasktype;

    /**
     * @var string
     *
     * @ORM\Column(name="shortdescription", type="text", nullable=true)
     */
    private $shortdescription;

    /**
     * @var string
     *
     * @ORM\Column(name="longdescription", type="text", nullable=true)
     */
    private $longdescription;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="text", nullable=true)
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="text", nullable=true)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="companyno", type="text", nullable=true)
     */
    private $companyno;

    /**
     * @var string
     *
     * @ORM\Column(name="addressno", type="text", nullable=true)
     */
    private $addressno;

    /**
     * @var string
     *
     * @ORM\Column(name="personno", type="text", nullable=true)
     */
    private $personno;

    /**
     * @var string
     *
     * @ORM\Column(name="prio", type="text", nullable=true)
     */
    private $prio;

    /**
     * @var string
     *
     * @ORM\Column(name="staffpool", type="text", nullable=true)
     */
    private $staffpool;

    /**
     * @var string
     *
     * @ORM\Column(name="servicecaseno", type="text", nullable=true)
     */
    private $servicecaseno;

    /**
     * @var string
     *
     * @ORM\Column(name="latestenddate", type="text", nullable=true)
     */
    private $latestenddate;

    /**
     * @var string
     *
     * @ORM\Column(name="latestendtime", type="text", nullable=true)
     */
    private $latestendtime;

    /**
     * @var string
     *
     * @ORM\Column(name="personno2", type="text", nullable=true)
     */
    private $personno2;

    /**
     * @var integer
     *
     * @ORM\Column(name="allowteamcase", type="integer", nullable=true)
     */
    private $allowteamcase;

    /**
     * @var string
     *
     * @ORM\Column(name="checklisthtml", type="text", nullable=true)
     */
    private $checklisthtml;

    /**
     * @var integer
     *
     * @ORM\Column(name="sourceid", type="integer", nullable=true)
     */
    private $sourceid;

    /**
     * @var string
     *
     * @ORM\Column(name="reporttype", type="text", nullable=true)
     */
    private $reporttype;

    /**
     * @var string
     *
     * @ORM\Column(name="text1", type="text", nullable=true)
     */
    private $text1;

    /**
     * @var string
     *
     * @ORM\Column(name="text2", type="text", nullable=true)
     */
    private $text2;

    /**
     * @var string
     *
     * @ORM\Column(name="text3", type="text", nullable=true)
     */
    private $text3;

    /**
     * @var string
     *
     * @ORM\Column(name="text4", type="text", nullable=true)
     */
    private $text4;

    /**
     * @var string
     *
     * @ORM\Column(name="device", type="text", nullable=true)
     */
    private $device;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="text", nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="targetdate", type="text", nullable=true)
     */
    private $targetdate;

    /**
     * @var string
     *
     * @ORM\Column(name="untildate", type="text", nullable=true)
     */
    private $untildate;

    /**
     * @var string
     *
     * @ORM\Column(name="invoicecompanyno", type="text", nullable=true)
     */
    private $invoicecompanyno;

    /**
     * @var string
     *
     * @ORM\Column(name="invoiceaddressno", type="text", nullable=true)
     */
    private $invoiceaddressno;

    /**
     * @var string
     *
     * @ORM\Column(name="plannedfor", type="text", nullable=true)
     */
    private $plannedfor;

    /**
     * @var string
     *
     * @ORM\Column(name="insertedby", type="text", nullable=true)
     */
    private $insertedby;

    /**
     * @ORM\ManyToOne(targetEntity="Staff", inversedBy="servicecase")
     */
    private $staff;

    /**
     * @ORM\OneToOne(targetEntity="ClientCompany", cascade={"persist","remove"})
     */
    private $company;

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
     * @return ServiceCase
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
     * @return ServiceCase
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
     * @return ServiceCase
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
     * Set startdate
     *
     * @param string $startdate
     *
     * @return ServiceCase
     */
    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;

        return $this;
    }

    /**
     * Get startdate
     *
     * @return string
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * Set starttime
     *
     * @param string $starttime
     *
     * @return ServiceCase
     */
    public function setStarttime($starttime)
    {
        $this->starttime = $starttime;

        return $this;
    }

    /**
     * Get starttime
     *
     * @return string
     */
    public function getStarttime()
    {
        return $this->starttime;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     *
     * @return ServiceCase
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return integer
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set tasktype
     *
     * @param string $tasktype
     *
     * @return ServiceCase
     */
    public function setTasktype($tasktype)
    {
        $this->tasktype = $tasktype;

        return $this;
    }

    /**
     * Get tasktype
     *
     * @return string
     */
    public function getTasktype()
    {
        return $this->tasktype;
    }

    /**
     * Set shortdescription
     *
     * @param string $shortdescription
     *
     * @return ServiceCase
     */
    public function setShortdescription($shortdescription)
    {
        $this->shortdescription = $shortdescription;

        return $this;
    }

    /**
     * Get shortdescription
     *
     * @return string
     */
    public function getShortdescription()
    {
        return $this->shortdescription;
    }

    /**
     * Set longdescription
     *
     * @param string $longdescription
     *
     * @return ServiceCase
     */
    public function setLongdescription($longdescription)
    {
        $this->longdescription = $longdescription;

        return $this;
    }

    /**
     * Get longdescription
     *
     * @return string
     */
    public function getLongdescription()
    {
        return $this->longdescription;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return ServiceCase
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return ServiceCase
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set companyno
     *
     * @param string $companyno
     *
     * @return ServiceCase
     */
    public function setCompanyno($companyno)
    {
        $this->companyno = $companyno;

        return $this;
    }

    /**
     * Get companyno
     *
     * @return string
     */
    public function getCompanyno()
    {
        return $this->companyno;
    }

    /**
     * Set addressno
     *
     * @param string $addressno
     *
     * @return ServiceCase
     */
    public function setAddressno($addressno)
    {
        $this->addressno = $addressno;

        return $this;
    }

    /**
     * Get addressno
     *
     * @return string
     */
    public function getAddressno()
    {
        return $this->addressno;
    }

    /**
     * Set personno
     *
     * @param string $personno
     *
     * @return ServiceCase
     */
    public function setPersonno($personno)
    {
        $this->personno = $personno;

        return $this;
    }

    /**
     * Get personno
     *
     * @return string
     */
    public function getPersonno()
    {
        return $this->personno;
    }

    /**
     * Set prio
     *
     * @param string $prio
     *
     * @return ServiceCase
     */
    public function setPrio($prio)
    {
        $this->prio = $prio;

        return $this;
    }

    /**
     * Get prio
     *
     * @return string
     */
    public function getPrio()
    {
        return $this->prio;
    }

    /**
     * Set staffpool
     *
     * @param string $staffpool
     *
     * @return ServiceCase
     */
    public function setStaffpool($staffpool)
    {
        $this->staffpool = $staffpool;

        return $this;
    }

    /**
     * Get staffpool
     *
     * @return string
     */
    public function getStaffpool()
    {
        return $this->staffpool;
    }

    /**
     * Set servicecaseno
     *
     * @param string $servicecaseno
     *
     * @return ServiceCase
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
     * Set latestenddate
     *
     * @param string $latestenddate
     *
     * @return ServiceCase
     */
    public function setLatestenddate($latestenddate)
    {
        $this->latestenddate = $latestenddate;

        return $this;
    }

    /**
     * Get latestenddate
     *
     * @return string
     */
    public function getLatestenddate()
    {
        return $this->latestenddate;
    }

    /**
     * Set latestendtime
     *
     * @param string $latestendtime
     *
     * @return ServiceCase
     */
    public function setLatestendtime($latestendtime)
    {
        $this->latestendtime = $latestendtime;

        return $this;
    }

    /**
     * Get latestendtime
     *
     * @return string
     */
    public function getLatestendtime()
    {
        return $this->latestendtime;
    }

    /**
     * Set personno2
     *
     * @param string $personno2
     *
     * @return ServiceCase
     */
    public function setPersonno2($personno2)
    {
        $this->personno2 = $personno2;

        return $this;
    }

    /**
     * Get personno2
     *
     * @return string
     */
    public function getPersonno2()
    {
        return $this->personno2;
    }

    /**
     * Set allowteamcase
     *
     * @param integer $allowteamcase
     *
     * @return ServiceCase
     */
    public function setAllowteamcase($allowteamcase)
    {
        $this->allowteamcase = $allowteamcase;

        return $this;
    }

    /**
     * Get allowteamcase
     *
     * @return integer
     */
    public function getAllowteamcase()
    {
        return $this->allowteamcase;
    }

    /**
     * Set checklisthtml
     *
     * @param string $checklisthtml
     *
     * @return ServiceCase
     */
    public function setChecklisthtml($checklisthtml)
    {
        $this->checklisthtml = $checklisthtml;

        return $this;
    }

    /**
     * Get checklisthtml
     *
     * @return string
     */
    public function getChecklisthtml()
    {
        return $this->checklisthtml;
    }

    /**
     * Set sourceid
     *
     * @param integer $sourceid
     *
     * @return ServiceCase
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
     * Set reporttype
     *
     * @param string $reporttype
     *
     * @return ServiceCase
     */
    public function setReporttype($reporttype)
    {
        $this->reporttype = $reporttype;

        return $this;
    }

    /**
     * Get reporttype
     *
     * @return string
     */
    public function getReporttype()
    {
        return $this->reporttype;
    }

    /**
     * Set text1
     *
     * @param string $text1
     *
     * @return ServiceCase
     */
    public function setText1($text1)
    {
        $this->text1 = $text1;

        return $this;
    }

    /**
     * Get text1
     *
     * @return string
     */
    public function getText1()
    {
        return $this->text1;
    }

    /**
     * Set text2
     *
     * @param string $text2
     *
     * @return ServiceCase
     */
    public function setText2($text2)
    {
        $this->text2 = $text2;

        return $this;
    }

    /**
     * Get text2
     *
     * @return string
     */
    public function getText2()
    {
        return $this->text2;
    }

    /**
     * Set text3
     *
     * @param string $text3
     *
     * @return ServiceCase
     */
    public function setText3($text3)
    {
        $this->text3 = $text3;

        return $this;
    }

    /**
     * Get text3
     *
     * @return string
     */
    public function getText3()
    {
        return $this->text3;
    }

    /**
     * Set text4
     *
     * @param string $text4
     *
     * @return ServiceCase
     */
    public function setText4($text4)
    {
        $this->text4 = $text4;

        return $this;
    }

    /**
     * Get text4
     *
     * @return string
     */
    public function getText4()
    {
        return $this->text4;
    }

    /**
     * Set device
     *
     * @param string $device
     *
     * @return ServiceCase
     */
    public function setDevice($device)
    {
        $this->device = $device;

        return $this;
    }

    /**
     * Get device
     *
     * @return string
     */
    public function getDevice()
    {
        return $this->device;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return ServiceCase
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set targetdate
     *
     * @param string $targetdate
     *
     * @return ServiceCase
     */
    public function setTargetdate($targetdate)
    {
        $this->targetdate = $targetdate;

        return $this;
    }

    /**
     * Get targetdate
     *
     * @return string
     */
    public function getTargetdate()
    {
        return $this->targetdate;
    }

    /**
     * Set untildate
     *
     * @param string $untildate
     *
     * @return ServiceCase
     */
    public function setUntildate($untildate)
    {
        $this->untildate = $untildate;

        return $this;
    }

    /**
     * Get untildate
     *
     * @return string
     */
    public function getUntildate()
    {
        return $this->untildate;
    }

    /**
     * Set invoicecompanyno
     *
     * @param string $invoicecompanyno
     *
     * @return ServiceCase
     */
    public function setInvoicecompanyno($invoicecompanyno)
    {
        $this->invoicecompanyno = $invoicecompanyno;

        return $this;
    }

    /**
     * Get invoicecompanyno
     *
     * @return string
     */
    public function getInvoicecompanyno()
    {
        return $this->invoicecompanyno;
    }

    /**
     * Set invoiceaddressno
     *
     * @param string $invoiceaddressno
     *
     * @return ServiceCase
     */
    public function setInvoiceaddressno($invoiceaddressno)
    {
        $this->invoiceaddressno = $invoiceaddressno;

        return $this;
    }

    /**
     * Get invoiceaddressno
     *
     * @return string
     */
    public function getInvoiceaddressno()
    {
        return $this->invoiceaddressno;
    }

    /**
     * Set plannedfor
     *
     * @param string $plannedfor
     *
     * @return ServiceCase
     */
    public function setPlannedfor($plannedfor)
    {
        $this->plannedfor = $plannedfor;

        return $this;
    }

    /**
     * Get plannedfor
     *
     * @return string
     */
    public function getPlannedfor()
    {
        return $this->plannedfor;
    }

    /**
     * Set insertedby
     *
     * @param string $insertedby
     *
     * @return ServiceCase
     */
    public function setInsertedby($insertedby)
    {
        $this->insertedby = $insertedby;

        return $this;
    }

    /**
     * Get insertedby
     *
     * @return string
     */
    public function getInsertedby()
    {
        return $this->insertedby;
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
     * @return ServiceCase
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
     * Set staff
     *
     * @param \CalendarBundle\Entity\Staff $staff
     *
     * @return servicecase
     */
    public function setStaff(\CalendarBundle\Entity\Staff $staff = null)
    {
        $this->staff = $staff;

        return $this;
    }

    /**
     * Get staff
     *
     * @return \CalendarBundle\Entity\Staff
     */
    public function getStaff()
    {
        return $this->staff;
    }

    /**
     * Set company
     *
     * @param \CalendarBundle\Entity\ClientCompany $company
     *
     * @return servicecase
     */
    public function setCompany(\CalendarBundle\Entity\ClientCompany $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \CalendarBundle\Entity\ClientCompany
     */
    public function getCompany()
    {
        return $this->company;
    }
}
