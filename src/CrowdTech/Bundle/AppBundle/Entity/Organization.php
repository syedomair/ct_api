<?php
namespace CrowdTech\Bundle\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Organization
 *
 * @ORM\Table(name="organization", indexes={@ORM\Index(name="organization_client", columns={"client_id"}) })
 * @ORM\Entity(repositoryClass="CrowdTech\Bundle\AppBundle\Entity\OrganizationRepository")
 */
class Organization
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var \CrowdTech\Bundle\AppBundle\Entity\Client
     *
     * @ORM\ManyToOne(targetEntity="CrowdTech\Bundle\AppBundle\Entity\Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     * })
     */
    private $client;


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
     * @return Organization
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
     * Set client
     *
     * @param \CrowdTech\Bundle\AppBundle\Entity\Client $client
     *
     * @return Organization
     */
    public function setClient(\CrowdTech\Bundle\AppBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \CrowdTech\Bundle\AppBundle\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }
}
