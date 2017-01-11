<?php

namespace CoreBundle\Traits;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


trait CodeableEntity
{
    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    protected $code;

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $name
     * @return CodeableEntity
     */
    public function setCode($name)
    {
        $this->code = $name;
        return $this;
    }


}
