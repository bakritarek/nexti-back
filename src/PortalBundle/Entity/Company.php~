<?php

namespace PortalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Company
 *
 * @ORM\Table(name="company")
 * @ORM\Entity(repositoryClass="PortalBundle\Repository\CompanyRepository")
 */
class Company
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
     * @ORM\Column(name="mobisynchost", type="string", length=255, nullable=true)
     */
    private $mobisynchost;

    /**
     * @var int
     *
     * @ORM\Column(name="mobisyncport", type="integer", nullable=true)
     */
    private $mobisyncport;


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
     * Set mobisynchost
     *
     * @param string $mobisynchost
     *
     * @return Company
     */
    public function setMobisynchost($mobisynchost)
    {
        $this->mobisynchost = $mobisynchost;

        return $this;
    }

    /**
     * Get mobisynchost
     *
     * @return string
     */
    public function getMobisynchost()
    {
        return $this->mobisynchost;
    }

    /**
     * Set mobisyncport
     *
     * @param integer $mobisyncport
     *
     * @return Company
     */
    public function setMobisyncport($mobisyncport)
    {
        $this->mobisyncport = $mobisyncport;

        return $this;
    }

    /**
     * Get mobisyncport
     *
     * @return int
     */
    public function getMobisyncport()
    {
        return $this->mobisyncport;
    }
}
