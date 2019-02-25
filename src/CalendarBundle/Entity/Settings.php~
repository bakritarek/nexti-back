<?php

namespace CalendarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Settings
 *
 * @ORM\Table(name="settings")
 * @ORM\Entity(repositoryClass="CalendarBundle\Repository\SettingsRepository")
 */
class Settings
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
     * @ORM\Column(name="time_interval", type="string", length=255)
     */
    private $timeInterval;

    /**
     * @var string
     *
     * @ORM\Column(name="snap", type="string", length=255)
     */
    private $snap;

    /**
     * @var string
     *
     * @ORM\Column(name="commit", type="string", length=255, nullable=true)
     */
    private $commit;

    /**
     * @var string
     *
     * @ORM\Column(name="timeout", type="string", length=255, nullable=true)
     */
    private $timeout;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer")
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="start_time", type="string", length=255, nullable=true)
     */
    private $startTime;

    /**
     * @var string
     *
     * @ORM\Column(name="end_time", type="string", length=255, nullable=true)
     */
    private $endTime;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;



    /**
     * @var string
     *
     * @ORM\Column(name="title2", type="string", length=255, nullable=true)
     */
    private $title2;

    /**
     * @var string
     *
     * @ORM\Column(name="title3", type="string", length=255, nullable=true)
     */
    private $title3;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255, nullable=true)
     */
    private $status;

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
     * Set timeInterval
     *
     * @param string $timeInterval
     *
     * @return Settings
     */
    public function setTimeInterval($timeInterval)
    {
        $this->timeInterval = $timeInterval;

        return $this;
    }

    /**
     * Get timeInterval
     *
     * @return string
     */
    public function getTimeInterval()
    {
        return $this->timeInterval;
    }

    /**
     * Set snap
     *
     * @param string $snap
     *
     * @return Settings
     */
    public function setSnap($snap)
    {
        $this->snap = $snap;

        return $this;
    }

    /**
     * Get snap
     *
     * @return string
     */
    public function getSnap()
    {
        return $this->snap;
    }

    /**
     * Set commit
     *
     * @param string $commit
     *
     * @return Settings
     */
    public function setCommit($commit)
    {
        $this->commit = $commit;

        return $this;
    }

    /**
     * Get commit
     *
     * @return string
     */
    public function getCommit()
    {
        return $this->commit;
    }

    /**
     * Set timeout
     *
     * @param string $timeout
     *
     * @return Settings
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;

        return $this;
    }

    /**
     * Get timeout
     *
     * @return string
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * Set user
     *
     * @param integer $user
     *
     * @return Settings
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return integer
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set startTime
     *
     * @param string $startTime
     *
     * @return Settings
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;

        return $this;
    }

    /**
     * Get startTime
     *
     * @return string
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * Set endTime
     *
     * @param string $endTime
     *
     * @return Settings
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;

        return $this;
    }

    /**
     * Get endTime
     *
     * @return string
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Settings
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set title2
     *
     * @param string $title2
     *
     * @return Settings
     */
    public function setTitle2($title2)
    {
        $this->title2 = $title2;

        return $this;
    }

    /**
     * Get title2
     *
     * @return string
     */
    public function getTitle2()
    {
        return $this->title2;
    }

    /**
     * Set title3
     *
     * @param string $title3
     *
     * @return Settings
     */
    public function setTitle3($title3)
    {
        $this->title3 = $title3;

        return $this;
    }

    /**
     * Get title3
     *
     * @return string
     */
    public function getTitle3()
    {
        return $this->title3;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Settings
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
}
