<?php

namespace ERP\DocumentBundle\Entity;

use CoreBundle\Traits\CreatedAtableEntity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Document
 *
 * @ORM\Table(name="erp_document_document")
 * @ORM\Entity(repositoryClass="ERP\DocumentBundle\Repository\DocumentRepository")
 */
class Document
{
    use CreatedAtableEntity;

    /** @ORM\ManyToOne(targetEntity="Sheet", inversedBy="documents", cascade={"persist"}) */
    private $sheet;

    /** @ORM\ManyToOne(targetEntity="ERP\UserBundle\Entity\User", inversedBy="documents", cascade={"persist"}) */
    private $user;
    
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="number", type="integer")
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255, nullable=true)
     */
    private $reference;

    public function __construct()
    {
        $this->setCreatedAt(new \DateTime());
    }

    public function getParentEntity(){
        return $this->getSheet() ? $this->getSheet() :  new Sheet();
    }

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
     * Set number
     *
     * @param integer $number
     *
     * @return Document
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set reference
     *
     * @param string $reference
     *
     * @return Document
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set sheet
     *
     * @param \ERP\DocumentBundle\Entity\Sheet $sheet
     *
     * @return Document
     */
    public function setSheet(\ERP\DocumentBundle\Entity\Sheet $sheet = null)
    {
        $this->sheet = $sheet;

        return $this;
    }

    /**
     * Get sheet
     *
     * @return \ERP\DocumentBundle\Entity\Sheet
     */
    public function getSheet()
    {
        return $this->sheet;
    }

    /**
     * Set user
     *
     * @param \ERP\UserBundle\Entity\User $user
     *
     * @return Document
     */
    public function setUser(\ERP\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \ERP\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
