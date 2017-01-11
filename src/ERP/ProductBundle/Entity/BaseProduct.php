<?php

namespace ERP\ProductBundle\Entity;

use CoreBundle\Traits\CodeableEntity;
use Doctrine\ORM\Mapping as ORM;
use Dywee\CoreBundle\Traits\NameableEntity;

/**
 * Product
 *
 * @ORM\Entity
 * @ORM\Table(name="erp_base_product")
 *
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({
 *     "product" = "Product"
 * })
 */
abstract class BaseProduct
{
    use NameableEntity;
    use CodeableEntity;

    /** @ORM\ManyToOne(targetEntity="UserBundle\Entity\User") */
    private $user;

    /** @ORM\OneToMany(targetEntity="Image", mappedBy="product", cascade={"persist"}) */
    private $images;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return BaseProduct
     */
    public function setUser(\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add image
     *
     * @param \ERP\ProductBundle\Entity\Image $image
     *
     * @return BaseProduct
     */
    public function addImage(\ERP\ProductBundle\Entity\Image $image)
    {
        $this->images[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \ERP\ProductBundle\Entity\Image $image
     */
    public function removeImage(\ERP\ProductBundle\Entity\Image $image)
    {
        $this->images->removeElement($image);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }
}
