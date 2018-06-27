<?php

namespace AppBundle\Entity;

/**
 * FollowingsLog
 */
class FollowingsLog
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $followingDateTime;

    /**
     * @var string
     */
    private $referer;

    /**
     * @var string
     */
    private $ip;

    /**
     * @var string
     */
    private $browser;

    /**
     * @var \AppBundle\Entity\Link
     */
    private $link;


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
     * Set followingDateTime
     *
     * @param \DateTime $followingDateTime
     *
     * @return FollowingsLog
     */
    public function setFollowingDateTime($followingDateTime)
    {
        $this->followingDateTime = $followingDateTime;

        return $this;
    }

    /**
     * Get followingDateTime
     *
     * @return \DateTime
     */
    public function getFollowingDateTime()
    {
        return $this->followingDateTime;
    }

    /**
     * Set referer
     *
     * @param string $referer
     *
     * @return FollowingsLog
     */
    public function setReferer($referer)
    {
        $this->referer = $referer;

        return $this;
    }

    /**
     * Get referer
     *
     * @return string
     */
    public function getReferer()
    {
        return $this->referer;
    }

    /**
     * Set ip
     *
     * @param string $ip
     *
     * @return FollowingsLog
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set browser
     *
     * @param string $browser
     *
     * @return FollowingsLog
     */
    public function setBrowser($browser)
    {
        $this->browser = $browser;

        return $this;
    }

    /**
     * Get browser
     *
     * @return string
     */
    public function getBrowser()
    {
        return $this->browser;
    }

    /**
     * Set link
     *
     * @param \AppBundle\Entity\Link $link
     *
     * @return FollowingsLog
     */
    public function setLink(Link $link = null)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return \AppBundle\Entity\Link
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @ORM\PrePersist
     */
    public function setFollowingDateTimeValue()
    {
        $this->followingDateTime = new \DateTime();
    }
}
