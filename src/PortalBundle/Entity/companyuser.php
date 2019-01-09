<?php

namespace PortalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * companyuser
 *
 * @ORM\Table(name="companyuser")
 * @ORM\Entity(repositoryClass="PortalBundle\Repository\companyuserRepository")
 */
class companyuser
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
     * @var boolean
     * @ORM\Column(name="isblocked", type="boolean", nullable=true)
     */
    private $isblocked;



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
     * Set isblocked
     *
     * @param boolean $isblocked
     *
     * @return companyuser
     */
    public function setIsblocked($isblocked)
    {
        $this->isblocked = $isblocked;

        return $this;
    }

    /**
     * Get isblocked
     *
     * @return boolean
     */
    public function getIsblocked()
    {
        return $this->isblocked;
    }
}
