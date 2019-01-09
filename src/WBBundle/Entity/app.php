<?php

namespace WBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * app
 *
 * @ORM\Table(name="app")
 * @ORM\Entity(repositoryClass="WBBundle\Repository\appRepository")
 */
class app
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
     * @ORM\Column(name="systemid", type="integer", unique=true)
     */
    private $systemid;

    /**
     * @var bool
     *
     * @ORM\Column(name="enabled", type="boolean")
     */
    private $enabled;


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
     * Set systemid
     *
     * @param integer $systemid
     *
     * @return app
     */
    public function setSystemid($systemid)
    {
        $this->systemid = $systemid;

        return $this;
    }

    /**
     * Get systemid
     *
     * @return int
     */
    public function getSystemid()
    {
        return $this->systemid;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     *
     * @return app
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return bool
     */
    public function getEnabled()
    {
        return $this->enabled;
    }
}

