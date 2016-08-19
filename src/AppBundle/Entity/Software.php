<?php
// src/AppBundle/Entity/Software.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\SoftwareRepository")
 * @ORM\Table(name="client_software")
 * @ORM\HasLifecycleCallbacks
 */
class Software
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
     * @ORM\Column(name="`hostname`", type="string", nullable=true)
     */
    private $hostname;

    /**
     * @var integer
     * @ORM\Column(name="host_ip", type="integer", nullable=true)
     */
    private $host_ip;

    /**
     * @var string
     * @ORM\Column(name="`version`", type="string", nullable=true)
     */
    private $version;

    /**
     * @var \DateTime
     * @ORM\Column(name="modified", type="datetime", nullable=false)
     */
    private $modified;

    /**
     * @var Client
     * @ORM\OneToOne(targetEntity="Client", inversedBy="client_software")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    private $client;


    public function __toString()
    {
        return $this->hostname;
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
     * Set hostname
     *
     * @param string $hostname
     *
     * @return Software
     */
    public function setHostname($hostname)
    {
        $this->hostname = $hostname;

        return $this;
    }

    /**
     * Get hostname
     *
     * @return string
     */
    public function getHostname()
    {
        return $this->hostname;
    }

    /**
     * Set hostIp
     *
     * @param integer $hostIp
     *
     * @return Software
     */
    public function setHostIp($hostIp)
    {
        $this->host_ip = $hostIp;

        return $this;
    }

    /**
     * Get hostIp
     *
     * @return integer
     */
    public function getHostIp()
    {
        return $this->host_ip;
    }

    /**
     * Set version
     *
     * @param string $version
     *
     * @return Software
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set modified
     * @ORM\PrePersist
     * @return Software
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
     * Set client
     *
     * @param Client $client
     *
     * @return Software
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
}
