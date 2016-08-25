<?php
// src/AppBundle/Entity/HardwareSSDReport.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\HardwareSSDReportRepository")
 * @ORM\Table(name="client_hardware_ssd_report")
 * @ORM\HasLifecycleCallbacks
 */
class HardwareSSDReport
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     *
     * @ORM\Column(name="delta_space", type="bigint", nullable=false)
     */
    private $delta_space;

    /**
     * @var \DateTime
     * @ORM\Column(name="added", type="datetime", nullable=false)
     */
    private $added;

    /**
     * @var Hardware
     * @ORM\ManyToOne(targetEntity="Hardware", inversedBy="hardware_ssd_report")
     * @ORM\JoinColumn(name="hardware_uuid", referencedColumnName="uuid")
     */
    private $hardware;




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
     * Set deltaSpace
     *
     * @param integer $deltaSpace
     *
     * @return HardwareSSDReport
     */
    public function setDeltaSpace($deltaSpace)
    {
        $this->delta_space = $deltaSpace;

        return $this;
    }

    /**
     * Get deltaSpace
     *
     * @return integer
     */
    public function getDeltaSpace()
    {
        return $this->delta_space;
    }

    /**
     * Set added
     * @return HardwareSSDReport
     * @internal param \DateTime $added
     * @ORM\PrePersist
     */
    public function setAdded()
    {
        $this->added = new \DateTime();

        return $this;
    }

    /**
     * Get added
     *
     * @return \DateTime
     */
    public function getAdded()
    {
        return $this->added;
    }

    /**
     * Set hardware
     *
     * @param Hardware $hardware
     *
     * @return HardwareSSDReport
     */
    public function setHardware(Hardware $hardware = null)
    {
        $this->hardware = $hardware;

        return $this;
    }

    /**
     * Get hardware
     *
     * @return Hardware
     */
    public function getHardware()
    {
        return $this->hardware;
    }
}
