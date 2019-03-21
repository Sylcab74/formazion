<?php



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
    private $numberaddress;

    /**
     * @var string
     */
    private $street;

    /**
     * @var int
     */
    private $postalcode;

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
     * Set numberaddress.
     *
     * @param int $numberaddress
     *
     * @return Company
     */
    public function setNumberaddress($numberaddress)
    {
        $this->numberaddress = $numberaddress;

        return $this;
    }

    /**
     * Get numberaddress.
     *
     * @return int
     */
    public function getNumberaddress()
    {
        return $this->numberaddress;
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
     * Set postalcode.
     *
     * @param int $postalcode
     *
     * @return Company
     */
    public function setPostalcode($postalcode)
    {
        $this->postalcode = $postalcode;

        return $this;
    }

    /**
     * Get postalcode.
     *
     * @return int
     */
    public function getPostalcode()
    {
        return $this->postalcode;
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
     * @param \person $person
     *
     * @return Company
     */
    public function addPerson(\person $person)
    {
        $this->persons[] = $person;

        return $this;
    }

    /**
     * Remove person.
     *
     * @param \person $person
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removePerson(\person $person)
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
