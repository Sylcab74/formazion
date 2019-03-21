<?php



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
    private $start;

    /**
     * @var \DateTime
     */
    private $end;

    /**
     * @var int|null
     */
    private $hoursperformed;

    /**
     * @var string|null
     */
    private $report;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $studentsSession;

    /**
     * @var \formation
     */
    private $formations;

    /**
     * @var \room
     */
    private $rooms;

    /**
     * @var \person
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
     * @param \DateTime $start
     *
     * @return Session
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start.
     *
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end.
     *
     * @param \DateTime $end
     *
     * @return Session
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end.
     *
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set hoursperformed.
     *
     * @param int|null $hoursperformed
     *
     * @return Session
     */
    public function setHoursperformed($hoursperformed = null)
    {
        $this->hoursperformed = $hoursperformed;

        return $this;
    }

    /**
     * Get hoursperformed.
     *
     * @return int|null
     */
    public function getHoursperformed()
    {
        return $this->hoursperformed;
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
     * @param \studentsSession $studentsSession
     *
     * @return Session
     */
    public function addStudentsSession(\studentsSession $studentsSession)
    {
        $this->studentsSession[] = $studentsSession;

        return $this;
    }

    /**
     * Remove studentsSession.
     *
     * @param \studentsSession $studentsSession
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeStudentsSession(\studentsSession $studentsSession)
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
     * @param \formation|null $formations
     *
     * @return Session
     */
    public function setFormations(\formation $formations = null)
    {
        $this->formations = $formations;

        return $this;
    }

    /**
     * Get formations.
     *
     * @return \formation|null
     */
    public function getFormations()
    {
        return $this->formations;
    }

    /**
     * Set rooms.
     *
     * @param \room|null $rooms
     *
     * @return Session
     */
    public function setRooms(\room $rooms = null)
    {
        $this->rooms = $rooms;

        return $this;
    }

    /**
     * Get rooms.
     *
     * @return \room|null
     */
    public function getRooms()
    {
        return $this->rooms;
    }

    /**
     * Set teacher.
     *
     * @param \person|null $teacher
     *
     * @return Session
     */
    public function setTeacher(\person $teacher = null)
    {
        $this->teacher = $teacher;

        return $this;
    }

    /**
     * Get teacher.
     *
     * @return \person|null
     */
    public function getTeacher()
    {
        return $this->teacher;
    }
}
