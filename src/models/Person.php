<?php



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
     * @var \company
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
     * @param \formation $formation
     *
     * @return Person
     */
    public function addFormation(\formation $formation)
    {
        $this->formations[] = $formation;

        return $this;
    }

    /**
     * Remove formation.
     *
     * @param \formation $formation
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeFormation(\formation $formation)
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
     * @param \session $session
     *
     * @return Person
     */
    public function addSession(\session $session)
    {
        $this->sessions[] = $session;

        return $this;
    }

    /**
     * Remove session.
     *
     * @param \session $session
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeSession(\session $session)
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
     * @param \student $student
     *
     * @return Person
     */
    public function addStudent(\student $student)
    {
        $this->students[] = $student;

        return $this;
    }

    /**
     * Remove student.
     *
     * @param \student $student
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeStudent(\student $student)
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
     * @param \company|null $companies
     *
     * @return Person
     */
    public function setCompanies(\company $companies = null)
    {
        $this->companies = $companies;

        return $this;
    }

    /**
     * Get companies.
     *
     * @return \company|null
     */
    public function getCompanies()
    {
        return $this->companies;
    }
}
