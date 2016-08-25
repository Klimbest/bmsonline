<?php
// src/AppBundle/Entity/Hardware.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\HardwareRepository")
 * @ORM\Table(name="client_hardware")
 * @ORM\HasLifecycleCallbacks
 */
class Hardware
{
    /**
     * @var string
     * @ORM\Id
     * @ORM\Column(name="uuid", type="string", nullable=false)
     */
    private $uuid;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", nullable=false)
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(name="login", type="string", nullable=false)
     */
    private $login;

    /**
     * @var integer
     * @ORM\Column(name="vpn_address", type="integer", nullable=false)
     */
    private $vpn_address;

    /**
     * @var string
     * @ORM\Column(name="password", type="string", nullable=false)
     */
    private $password;

    /**
     * @var \DateTime
     * @ORM\Column(name="modified", type="datetime", nullable=false)
     */
    private $modified;

    /**
     * @var boolean
     * @ORM\Column(name="is_active", type="boolean", nullable=false)
     */
    private $is_active;

    /**
     * @var Client
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="client_hardware")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    private $client;

    /**
     * @var HardwareSSDReport
     * @ORM\OneToMany(targetEntity="HardwareSSDReport", mappedBy="hardware")
     */
    private $hardware_ssd_report;


    public function __toString()
    {
        return $this->uuid;
    }

    /**
     * Set uuid
     *
     * @param string $uuid
     *
     * @return Hardware
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * Get uuid
     *
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return Hardware
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set vpnAddress
     *
     * @param integer $vpnAddress
     *
     * @return Hardware
     */
    public function setVpnAddress($vpnAddress)
    {
        $this->vpn_address = $vpnAddress;

        return $this;
    }

    /**
     * Get vpnAddress
     *
     * @return integer
     */
    public function getVpnAddress()
    {
        return $this->vpn_address;
    }

    /**
     * Set password
     *
     * @param integer $password
     *
     * @return Hardware
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return integer
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set modified
     * @ORM\PrePersist
     * @return Hardware
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
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Hardware
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * Set client
     *
     * @param Client $client
     *
     * @return Hardware
     */
    public function setClient(Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Hardware
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
     * Constructor
     */
    public function __construct()
    {
        $this->hardware_ssd_report = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add hardwareSsdReport
     *
     * @param \AppBundle\Entity\HardwareSSDReport $hardwareSsdReport
     *
     * @return Hardware
     */
    public function addHardwareSsdReport(\AppBundle\Entity\HardwareSSDReport $hardwareSsdReport)
    {
        $this->hardware_ssd_report[] = $hardwareSsdReport;

        return $this;
    }

    /**
     * Remove hardwareSsdReport
     *
     * @param \AppBundle\Entity\HardwareSSDReport $hardwareSsdReport
     */
    public function removeHardwareSsdReport(\AppBundle\Entity\HardwareSSDReport $hardwareSsdReport)
    {
        $this->hardware_ssd_report->removeElement($hardwareSsdReport);
    }

    /**
     * Get hardwareSsdReport
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHardwareSsdReport()
    {
        return $this->hardware_ssd_report;
    }
}
