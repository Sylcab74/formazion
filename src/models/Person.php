<?php

namespace Formazion\Models;

/**
 * Person
 */
class Person
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     */
    private $role;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $formations;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $sessions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $students;

    /**
     * @var \Formazion\Models\company
     */
    private $companies;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->formations = new \Doctrine\Common\Collections\ArrayCollection();
        $this->sessions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->students = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set firstname.
     *
     * @param string $firstname
     *
     * @return Person
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname.
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname.
     *
     * @param string $lastname
     *
     * @return Person
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname.
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set role.
     *
     * @param string $role
     *
     * @return Person
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role.
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Add formation.
     *
     * @param \Formazion\Models\formation $formation
     *
     * @return Person
     */
    public function addFormation(\Formazion\Models\formation $formation)
    {
        $this->formations[] = $formation;

        return $this;
    }

    /**
     * Remove formation.
     *
     * @param \Formazion\Models\formation $formation
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeFormation(\Formazion\Models\formation $formation)
    {
        return $this->formations->removeElement($formation);
    }

    /**
     * Get formations.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFormations()
    {
        return $this->formations;
    }

    /**
     * Add session.
     *
     * @param \Formazion\Models\session $session
     *
     * @return Person
     */
    public function addSession(\Formazion\Models\session $session)
    {
        $this->sessions[] = $session;

        return $this;
    }

    /**
     * Remove session.
     *
     * @param \Formazion\Models\session $session
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeSession(\Formazion\Models\session $session)
    {
        return $this->sessions->removeElement($session);
    }

    /**
     * Get sessions.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSessions()
    {
        return $this->sessions;
    }

    /**
     * Add student.
     *
     * @param \Formazion\Models\StudentsSession $student
     *
     * @return Person
     */
    public function addStudent(\Formazion\Models\StudentsSession $student)
    {
        $this->students[] = $student;

        return $this;
    }

    /**
     * Remove student.
     *
     * @param \Formazion\Models\StudentsSession $student
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeStudent(\Formazion\Models\StudentsSession $student)
    {
        return $this->students->removeElement($student);
    }

    /**
     * Get students.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStudents()
    {
        return $this->students;
    }

    /**
     * Set companies.
     *
     * @param \Formazion\Models\company|null $companies
     *
     * @return Person
     */
    public function setCompanies(\Formazion\Models\company $companies = null)
    {
        $this->companies = $companies;

        return $this;
    }

    /**
     * Get companies.
     *
     * @return \Formazion\Models\company|null
     */
    public function getCompanies()
    {
        return $this->companies;
    }
}
