<?php

namespace Formazion\Models;

/**
 * Company
 */
class Company
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
     * @var int
     */
    private $numberAddress;

    /**
     * @var string
     */
    private $street;

    /**
     * @var int
     */
    private $postalCode;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $country;

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
     * Set name.
     *
     * @param string $name
     *
     * @return Company
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
     * Set numberAddress.
     *
     * @param int $numberAddress
     *
     * @return Company
     */
    public function setNumberAddress($numberAddress)
    {
        $this->numberAddress = $numberAddress;

        return $this;
    }

    /**
     * Get numberAddress.
     *
     * @return int
     */
    public function getNumberAddress()
    {
        return $this->numberAddress;
    }

    /**
     * Set street.
     *
     * @param string $street
     *
     * @return Company
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street.
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set postalCode.
     *
     * @param int $postalCode
     *
     * @return Company
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode.
     *
     * @return int
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set city.
     *
     * @param string $city
     *
     * @return Company
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city.
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set country.
     *
     * @param string $country
     *
     * @return Company
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country.
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Add person.
     *
     * @param \Formazion\Models\person $person
     *
     * @return Company
     */
    public function addPerson(\Formazion\Models\person $person)
    {
        $this->persons[] = $person;

        return $this;
    }

    /**
     * Remove person.
     *
     * @param \Formazion\Models\person $person
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removePerson(\Formazion\Models\person $person)
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
