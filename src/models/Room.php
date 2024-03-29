<?php

namespace Formazion\Models;

/**
 * Room
 */
class Room
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $number;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $session;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->session = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set number.
     *
     * @param int $number
     *
     * @return Room
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number.
     *
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Add session.
     *
     * @param \Formazion\Models\Session $session
     *
     * @return Room
     */
    public function addSession(\Formazion\Models\Session $session)
    {
        $this->session[] = $session;

        return $this;
    }

    /**
     * Remove session.
     *
     * @param \Formazion\Models\Session $session
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeSession(\Formazion\Models\Session $session)
    {
        return $this->session->removeElement($session);
    }

    /**
     * Get session.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSession()
    {
        return $this->session;
    }
}
