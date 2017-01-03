<?php

namespace ERP\DocumentBundle\Entity;

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
    /** @ORM\ManyToOne(targetEntity="Sheet", inversedBy="documents", cascade={"all"}) */
    private $sheet;
    
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Document
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set sheet
     *
     * @param \ERP\DocumentBundle\Entity\Sheet $sheet
     *
     * @return Document
     */
    public function setSheet()
    {
        $session = new Session();
        $sheet = $session->get('activeSheet');
        dump($sheet);
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
}
