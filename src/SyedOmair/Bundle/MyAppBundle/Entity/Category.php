<?php
namespace SyedOmair\Bundle\MyAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category", indexes={@ORM\Index(name="category_catalog", columns={"catalog_id"}) })
 * @ORM\Entity(repositoryClass="SyedOmair\Bundle\MyAppBundle\Entity\CategoryRepository")
 */
class Category
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
     * @var \SyedOmair\Bundle\MyAppBundle\Entity\Catalog
     *
     * @ORM\ManyToOne(targetEntity="SyedOmair\Bundle\MyAppBundle\Entity\Catalog")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="catalog_id", referencedColumnName="id")
     * })
     */
    private $catalog;

    /**
     * Set name
     *
     * @param string $name
     * @return Category
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set catalog
     *
     * @param \SyedOmair\Bundle\MyAppBundle\Entity\Catalog $catalog
     * @return Category
     */
    public function setCatalog(\SyedOmair\Bundle\MyAppBundle\Entity\Catalog $catalog = null)
    {
        $this->catalog = $catalog;

        return $this;
    }

    /**
     * Get catalog
     *
     * @return \SyedOmair\Bundle\MyAppBundle\Entity\Catalog 
     */
    public function getCatalog()
    {
        return $this->catalog;
    }
}
