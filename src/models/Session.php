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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $studentsSession;

    /**
     * @var \Formazion\Models\formation
     */
    private $formations;

    /**
     * @var \Formazion\Models\Room
     */
    private $rooms;

    /**
     * @var \Formazion\Models\person
     */
    private $teacher;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->studentsSession = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set start.
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
     * Get start.
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
     * Get end.
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
     * Add studentsSession.
     *
     * @param \Formazion\Models\studentsSession $studentsSession
     *
     * @return Session
     */
    public function addStudentsSession(\Formazion\Models\studentsSession $studentsSession)
    {
        $this->studentsSession[] = $studentsSession;

        return $this;
    }

    /**
     * Remove studentsSession.
     *
     * @param \Formazion\Models\studentsSession $studentsSession
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeStudentsSession(\Formazion\Models\studentsSession $studentsSession)
    {
        return $this->studentsSession->removeElement($studentsSession);
    }

    /**
     * Get studentsSession.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStudentsSession()
    {
        return $this->studentsSession;
    }

    /**
     * Set formations.
     *
     * @param \Formazion\Models\formation|null $formations
     *
     * @return Session
     */
    public function setFormations(\Formazion\Models\formation $formations = null)
    {
        $this->formations = $formations;

        return $this;
    }

    /**
     * Get formations.
     *
     * @return \Formazion\Models\formation|null
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
     * @param \Formazion\Models\person|null $teacher
     *
     * @return Session
     */
    public function setTeacher(\Formazion\Models\person $teacher = null)
    {
        $this->teacher = $teacher;

        return $this;
    }

    /**
     * Get teacher.
     *
     * @return \Formazion\Models\person|null
     */
    public function getTeacher()
    {
        return $this->teacher;
    }
}
