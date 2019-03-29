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
     * @var \Formazion\Models\Company
     */
    private $companies;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $sessionStudents;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->formations = new \Doctrine\Common\Collections\ArrayCollection();
        $this->sessions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->sessionStudents = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @param \Formazion\Models\Formation $formation
     *
     * @return Person
     */
    public function addFormation(\Formazion\Models\Formation $formation)
    {
        $this->formations[] = $formation;

        return $this;
    }

    /**
     * Remove formation.
     *
     * @param \Formazion\Models\Formation $formation
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeFormation(\Formazion\Models\Formation $formation)
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
     * @param \Formazion\Models\Session $session
     *
     * @return Person
     */
    public function addSession(\Formazion\Models\Session $session)
    {
        $this->sessions[] = $session;

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
     * Set companies.
     *
     * @param \Formazion\Models\Company|null $companies
     *
     * @return Person
     */
    public function setCompanies(\Formazion\Models\Company $companies = null)
    {
        $this->companies = $companies;

        return $this;
    }

    /**
     * Get companies.
     *
     * @return \Formazion\Models\Company|null
     */
    public function getCompanies()
    {
        return $this->companies;
    }

    /**
     * Add sessionStudent.
     *
     * @param \Formazion\Models\Session $sessionStudent
     *
     * @return Person
     */
    public function addSessionStudent(\Formazion\Models\Session $sessionStudent)
    {
        $this->sessionStudents[] = $sessionStudent;

        return $this;
    }

    /**
     * Remove sessionStudent.
     *
     * @param \Formazion\Models\Session $sessionStudent
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeSessionStudent(\Formazion\Models\Session $sessionStudent)
    {
        return $this->sessionStudents->removeElement($sessionStudent);
    }

    /**
     * Get sessionStudents.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSessionStudents()
    {
        return $this->sessionStudents;
    }
}
