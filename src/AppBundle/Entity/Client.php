<?php
// src/AppBundle/Entity/Client.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\ClientRepository")
 * @ORM\Table(name="client")
 * @ORM\HasLifecycleCallbacks
 */
class Client
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", nullable=false)
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(name="address", type="string", nullable=true)
     */
    private $address;

    /**
     * @var string
     * @ORM\Column(name="phone", type="integer", nullable=true)
     */
    private $phone;

    /**
     * @var \DateTime
     * @ORM\Column(name="modified", type="datetime", nullable=false)
     */
    private $modified;

    /**
     * @var Hardware
     * @ORM\OneToMany(targetEntity="Hardware", mappedBy="client")
     */
    private $client_hardware;

    /**
     * @var Software
     * @ORM\OneToOne(targetEntity="Software", mappedBy="client")
     */
    private $client_software;

    /**
     * @var Database
     * @ORM\OneToOne(targetEntity="Database", mappedBy="client")
     */
    private $client_database;

    //private $users;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->client_hardware = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Client
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Client
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set phone
     *
     * @param integer $phone
     *
     * @return Client
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return integer
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set modified
     * @ORM\PrePersist
     * @return Client
     */
    public function setModified()
    {
        $this->modified = new \DateTime();

        return $this;
    }

    /**
     * Get modified
     *
     * @return \DateTime
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * Add clientHardware
     *
     * @param Hardware $clientHardware
     *
     * @return Client
     */
    public function addClientHardware(Hardware $clientHardware)
    {
        $this->client_hardware[] = $clientHardware;

        return $this;
    }

    /**
     * Remove clientHardware
     *
     * @param Hardware $clientHardware
     */
    public function removeClientHardware(Hardware $clientHardware)
    {
        $this->client_hardware->removeElement($clientHardware);
    }

    /**
     * Get clientHardware
     *
     * @return Collection
     */
    public function getClientHardware()
    {
        return $this->client_hardware;
    }

    /**
     * Set clientSoftware
     *
     * @param Software $clientSoftware
     *
     * @return Client
     */
    public function setClientSoftware(Software $clientSoftware = null)
    {
        $this->client_software = $clientSoftware;

        return $this;
    }

    /**
     * Get clientSoftware
     *
     * @return Software
     */
    public function getClientSoftware()
    {
        return $this->client_software;
    }

    /**
     * Set clientDatabase
     *
     * @param Database $clientDatabase
     *
     * @return Client
     */
    public function setClientDatabase(Database $clientDatabase = null)
    {
        $this->client_database = $clientDatabase;

        return $this;
    }

    /**
     * Get clientDatabase
     *
     * @return Database
     */
    public function getClientDatabase()
    {
        return $this->client_database;
    }
}
