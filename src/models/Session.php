<?php

namespace Formazion\Models;

/**
 * Session
 */
class Session
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $starting;

    /**
     * @var \DateTime
     */
    private $ending;

    /**
     * @var int|null
     */
    private $hoursPerformed;

    /**
     * @var string|null
     */
    private $report;

    /**
     * @var \Formazion\Models\Formation
     */
    private $formations;

    /**
     * @var \Formazion\Models\Room
     */
    private $rooms;

    /**
     * @var \Formazion\Models\Person
     */
    private $teacher;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $persons;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->persons = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set starting.
     *
     * @param \DateTime $starting
     *
     * @return Session
     */
    public function setStarting($starting)
    {
        $this->starting = $starting;

        return $this;
    }

    /**
     * Get starting.
     *
     * @return \DateTime
     */
    public function getStarting()
    {
        return $this->starting;
    }

    /**
     * Set ending.
     *
     * @param \DateTime $ending
     *
     * @return Session
     */
    public function setEnding($ending)
    {
        $this->ending = $ending;

        return $this;
    }

    /**
     * Get ending.
     *
     * @return \DateTime
     */
    public function getEnding()
    {
        return $this->ending;
    }

    /**
     * Set hoursPerformed.
     *
     * @param int|null $hoursPerformed
     *
     * @return Session
     */
    public function setHoursPerformed($hoursPerformed = null)
    {
        $this->hoursPerformed = $hoursPerformed;

        return $this;
    }

    /**
     * Get hoursPerformed.
     *
     * @return int|null
     */
    public function getHoursPerformed()
    {
        return $this->hoursPerformed;
    }

    /**
     * Set report.
     *
     * @param string|null $report
     *
     * @return Session
     */
    public function setReport($report = null)
    {
        $this->report = $report;

        return $this;
    }

    /**
     * Get report.
     *
     * @return string|null
     */
    public function getReport()
    {
        return $this->report;
    }

    /**
     * Set formations.
     *
     * @param \Formazion\Models\Formation|null $formations
     *
     * @return Session
     */
    public function setFormations(\Formazion\Models\Formation $formations = null)
    {
        $this->formations = $formations;

        return $this;
    }

    /**
     * Get formations.
     *
     * @return \Formazion\Models\Formation|null
     */
    public function getFormations()
    {
        return $this->formations;
    }

    /**
     * Set rooms.
     *
     * @param \Formazion\Models\Room|null $rooms
     *
     * @return Session
     */
    public function setRooms(\Formazion\Models\Room $rooms = null)
    {
        $this->rooms = $rooms;

        return $this;
    }

    /**
     * Get rooms.
     *
     * @return \Formazion\Models\Room|null
     */
    public function getRooms()
    {
        return $this->rooms;
    }

    /**
     * Set teacher.
     *
     * @param \Formazion\Models\Person|null $teacher
     *
     * @return Session
     */
    public function setTeacher(\Formazion\Models\Person $teacher = null)
    {
        $this->teacher = $teacher;

        return $this;
    }

    /**
     * Get teacher.
     *
     * @return \Formazion\Models\Person|null
     */
    public function getTeacher()
    {
        return $this->teacher;
    }

    /**
     * Add person.
     *
     * @param \Formazion\Models\Person $person
     *
     * @return Session
     */
    public function addPerson(\Formazion\Models\Person $person)
    {
        $this->persons[] = $person;

        return $this;
    }

    /**
     * Remove person.
     *
     * @param \Formazion\Models\Person $person
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removePerson(\Formazion\Models\Person $person)
    {
        return $this->persons->removeElement($person);
    }

    /**
     * Get persons.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPersons()
    {
        return $this->persons;
    }
}
