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
     * @var \Formazion\Models\Person
     */
    private $students;

    /**
     * @var \Formazion\Models\Session
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
     * @param \Formazion\Models\Person|null $students
     *
     * @return StudentsSession
     */
    public function setStudents(\Formazion\Models\Person $students = null)
    {
        $this->students = $students;

        return $this;
    }

    /**
     * Get students.
     *
     * @return \Formazion\Models\Person|null
     */
    public function getStudents()
    {
        return $this->students;
    }

    /**
     * Set sessions.
     *
     * @param \Formazion\Models\Session|null $sessions
     *
     * @return StudentsSession
     */
    public function setSessions(\Formazion\Models\Session $sessions = null)
    {
        $this->sessions = $sessions;

        return $this;
    }

    /**
     * Get sessions.
     *
     * @return \Formazion\Models\Session|null
     */
    public function getSessions()
    {
        return $this->sessions;
    }
}
