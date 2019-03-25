<?php

namespace Formazion\Models;

/**
 * Formation
 */
class Formation
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $session;

    /**
     * @var \Formazion\Models\person
     */
    private $responsibleProfessor;

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
     * Set name.
     *
     * @param string $name
     *
     * @return Formation
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add session.
     *
     * @param \Formazion\Models\session $session
     *
     * @return Formation
     */
    public function addSession(\Formazion\Models\session $session)
    {
        $this->session[] = $session;

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

    /**
     * Set responsibleProfessor.
     *
     * @param \Formazion\Models\person|null $responsibleProfessor
     *
     * @return Formation
     */
    public function setResponsibleProfessor(\Formazion\Models\person $responsibleProfessor = null)
    {
        $this->responsibleProfessor = $responsibleProfessor;

        return $this;
    }

    /**
     * Get responsibleProfessor.
     *
     * @return \Formazion\Models\person|null
     */
    public function getResponsibleProfessor()
    {
        return $this->responsibleProfessor;
    }
}
