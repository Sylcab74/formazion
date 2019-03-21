<?php



/**
 * StudentsSession
 */
class StudentsSession
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $note;

    /**
     * @var \person
     */
    private $students;

    /**
     * @var \sessions
     */
    private $sessions;


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
     * Set note.
     *
     * @param int $note
     *
     * @return StudentsSession
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note.
     *
     * @return int
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set students.
     *
     * @param \person|null $students
     *
     * @return StudentsSession
     */
    public function setStudents(\person $students = null)
    {
        $this->students = $students;

        return $this;
    }

    /**
     * Get students.
     *
     * @return \person|null
     */
    public function getStudents()
    {
        return $this->students;
    }

    /**
     * Set sessions.
     *
     * @param \sessions|null $sessions
     *
     * @return StudentsSession
     */
    public function setSessions(\sessions $sessions = null)
    {
        $this->sessions = $sessions;

        return $this;
    }

    /**
     * Get sessions.
     *
     * @return \sessions|null
     */
    public function getSessions()
    {
        return $this->sessions;
    }
}
