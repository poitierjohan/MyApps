<?php

namespace ERP\UserBundle\Entity;

use CoreBundle\Traits\CreatedAtableEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="erp_user")
 * @ORM\Entity(repositoryClass="ERP\UserBundle\Repository\UserRepository")
 */
class User
{
    use CreatedAtableEntity;

    /** @ORM\ManyToOne(targetEntity="UserBundle\Entity\User") */
    private $user;

    /** @ORM\OneToMany(targetEntity="ERP\DocumentBundle\Entity\Document", mappedBy="user", cascade={"persist"}) */
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
    private $code;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $society;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tvaNumber;

    public function getCodeWithCompleteName()
    {
        $code = $this->getCode();

        return $code.' - '.$this->getCompleteName();
    }

    public function getCompleteName()
    {
        $society = $this->getSociety();
        $name = $this->getLastName().', '.$this->getFirstName();
        if ($name == ', ') $name = '';
        if ($society != '' && $name != "") $society = $society.' - ';

        return $society.$name;
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
     * Set society
     *
     * @param string $society
     *
     * @return User
     */
    public function setSociety($society)
    {
        $this->society = $society;

        return $this;
    }

    /**
     * Get society
     *
     * @return string
     */
    public function getSociety()
    {
        return $this->society;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return User
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
     * Set code
     *
     * @param string $code
     *
     * @return User
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set tvaNumber
     *
     * @param string $tvaNumber
     *
     * @return User
     */
    public function setTvaNumber($tvaNumber)
    {
        $this->tvaNumber = $tvaNumber;

        return $this;
    }

    /**
     * Get tvaNumber
     *
     * @return string
     */
    public function getTvaNumber()
    {
        return $this->tvaNumber;
    }

    /**
     * Set documents
     *
     * @param \ERP\DocumentBundle\Entity\Document $documents
     *
     * @return User
     */
    public function setDocuments(\ERP\DocumentBundle\Entity\Document $documents = null)
    {
        $this->documents = $documents;

        return $this;
    }

    /**
     * Get documents
     *
     * @return \ERP\DocumentBundle\Entity\Document
     */
    public function getDocuments()
    {
        return $this->documents;
    }
}
