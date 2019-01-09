<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * isLoged
 *
 * @ORM\Table(name="is_loged")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\isLogedRepository")
 */
class isLoged
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
     * @ORM\Column(name="userid", type="string", nullable=true, length=255)
     */
    private $userid;

    /**
     * @var string
     *
     * @ORM\Column(name="systemid", type="string", nullable=true, length=255)
     */
    private $systemid;


    /**
     * @var bool
     *
     * @ORM\Column(name="isloged", type="boolean")
     */
    private $isloged;

    /**
     * @var string
     *
     * @ORM\Column(name="last_update", type="string", nullable=true, length=255)
     */
    private $lastUpdate;

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
     * Set isloged
     *
     * @param boolean $isloged
     *
     * @return isLoged
     */
    public function setIsloged($isloged)
    {
        $this->isloged = $isloged;

        return $this;
    }

    /**
     * Get isloged
     *
     * @return bool
     */
    public function getIsloged()
    {
        return $this->isloged;
    }

    /**
     * Set userid
     *
     * @param string $userid
     *
     * @return isLoged
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return string
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set systemid
     *
     * @param string $systemid
     *
     * @return isLoged
     */
    public function setSystemid($systemid)
    {
        $this->systemid = $systemid;

        return $this;
    }

    /**
     * Get systemid
     *
     * @return string
     */
    public function getSystemid()
    {
        return $this->systemid;
    }

    /**
     * Set lastUpdate
     *
     * @param string $lastUpdate
     *
     * @return isLoged
     */
    public function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;

        return $this;
    }

    /**
     * Get lastUpdate
     *
     * @return string
     */
    public function getLastUpdate()
    {
        return $this->lastUpdate;
    }
}
