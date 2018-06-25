<?php

namespace AppBundle\Entity;

/**
 * Link
 */
class Link
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $original;

    /**
     * @var string
     */
    private $short;

    /**
     * @var \DateTime
     */
    private $lifetimeTo;

    /**
     * @var boolean
     */
    private $active = false;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set original
     *
     * @param string $original
     *
     * @return Link
     */
    public function setOriginal($original)
    {
        $this->original = $original;

        return $this;
    }

    /**
     * Get original
     *
     * @return string
     */
    public function getOriginal()
    {
        return $this->original;
    }

    /**
     * Set short
     *
     * @param string $short
     *
     * @return Link
     */
    public function setShort($short)
    {
        $this->short = $short;

        return $this;
    }

    /**
     * Get short
     *
     * @return string
     */
    public function getShort()
    {
        return $this->short;
    }

    /**
     * Set lifetimeTo
     *
     * @param \DateTime $lifetimeTo
     *
     * @return Link
     */
    public function setLifetimeTo($lifetimeTo)
    {
        $this->lifetimeTo = $lifetimeTo;

        return $this;
    }

    /**
     * Get lifetimeTo
     *
     * @return \DateTime
     */
    public function getLifetimeTo()
    {
        return $this->lifetimeTo;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Link
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }
}
