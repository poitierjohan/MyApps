<?php

namespace ERP\DocumentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sheet
 *
 * @ORM\Table(name="erp_document_sheet")
 * @ORM\Entity(repositoryClass="ERP\DocumentBundle\Repository\SheetRepository")
 */
class Sheet
{
    /** @ORM\ManyToOne(targetEntity="UserBundle\Entity\User") */
    private $user;

    /** @ORM\OneToMany(targetEntity="Document", mappedBy="sheet", cascade={"persist"}) */
    private $documents;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $abbr;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $color;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;


    public function __construct()
    {
        $this->setCreatedAt(new \DateTime());
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
     * Set name
     *
     * @param string $name
     *
     * @return Sheet
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
     * Set abbr
     *
     * @param string $abbr
     *
     * @return Sheet
     */
    public function setAbbr($abbr)
    {
        $this->abbr = $abbr;

        return $this;
    }

    /**
     * Get abbr
     *
     * @return string
     */
    public function getAbbr()
    {
        return $this->abbr;
    }

    /**
     * Set createdAt
     *
     * @param string $createdAt
     *
     * @return Sheet
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Sheet
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Add document
     *
     * @param \ERP\DocumentBundle\Entity\Document $document
     *
     * @return Sheet
     */
    public function addDocument(\ERP\DocumentBundle\Entity\Document $document)
    {
        $this->documents[] = $document;
        $document->setSheet($this);
        return $this;
    }

    /**
     * Remove document
     *
     * @param \ERP\DocumentBundle\Entity\Document $document
     */
    public function removeDocument(\ERP\DocumentBundle\Entity\Document $document)
    {
        $this->documents->removeElement($document);
    }

    /**
     * Get documents
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDocuments()
    {
        return $this->documents;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return Sheet
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
}
