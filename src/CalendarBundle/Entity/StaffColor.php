<?php

namespace CalendarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StaffColor
 *
 * @ORM\Table(name="staff_color")
 * @ORM\Entity(repositoryClass="CalendarBundle\Repository\StaffColorRepository")
 */
class StaffColor
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
     * @ORM\Column(name="staffid", type="string", length=255)
     */
    private $staffid;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255)
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
     * Set staffid
     *
     * @param string $staffid
     *
     * @return StaffColor
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
     * Set color
     *
     * @param string $color
     *
     * @return StaffColor
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }
}
