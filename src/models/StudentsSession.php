<?php

namespace Formazion\Models;

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
     * @var \Formazion\Models\person
     */
    private $students;

    /**
     * @var \Formazion\Models\session
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
    public function setNote($note = null)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note.
     *
     * @return int|null
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set students.
     *
     * @param \Formazion\Models\person|null $students
     *
     * @return StudentsSession
     */
    public function setStudents(\Formazion\Models\person $students = null)
    {
        $this->students = $students;

        return $this;
    }

    /**
     * Get students.
     *
     * @return \Formazion\Models\person|null
     */
    public function getStudents()
    {
        return $this->students;
    }

    /**
     * Set sessions.
     *
     * @param \Formazion\Models\session|null $sessions
     *
     * @return StudentsSession
     */
    public function setSessions(\Formazion\Models\session $sessions = null)
    {
        $this->sessions = $sessions;

        return $this;
    }

    /**
     * Get sessions.
     *
     * @return \Formazion\Models\session|null
     */
    public function getSessions()
    {
        return $this->sessions;
    }
}
