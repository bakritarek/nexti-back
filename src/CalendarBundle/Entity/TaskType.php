<?php

namespace CalendarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TaskType
 *
 * @ORM\Table(name="task_type")
 * @ORM\Entity(repositoryClass="CalendarBundle\Repository\TaskTypeRepository")
 */
class TaskType
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
     * @ORM\Column(name="tasktype", type="string", length=255)
     */
    private $tasktype;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;


    /**
     * @ORM\OneToMany(targetEntity="servicecase", mappedBy="tasktypes")
     */
    private $servicecase;

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
     * Set tasktype
     *
     * @param string $tasktype
     *
     * @return TaskType
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
     * Set description
     *
     * @param string $description
     *
     * @return TaskType
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->servicecase = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add servicecase
     *
     * @param \CalendarBundle\Entity\servicecase $servicecase
     *
     * @return TaskType
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
}
