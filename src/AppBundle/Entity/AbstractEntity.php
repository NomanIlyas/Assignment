<?php

namespace AppBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class AbstractEntity
 * @package AppBundle\Entity
 */
class AbstractEntity
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected int $id;

    /**
     * @var \DateTime $created_at
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    protected \DateTime $created_at;

    /**
     * @var \DateTime $updated_at
     *
     * @ORM\Column(name="updated_at", type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    protected \DateTime $updated_at;

    /**
     * @return string
     */
    public function toString()
    {
        if (method_exists($this, '__toString')) {
            return $this->__toString();
        }
        return get_class($this);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->created_at;
    }

    /**
     * Set created
     *
     * @param \DateTime $created_at
     * @return AbstractEntity
     */
    public function setCreatedAt(\DateTime $created_at): AbstractEntity
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updated_at;
    }

    /**
     * Set Updated_at
     *
     * @param \DateTime $updated_at
     * @return AbstractEntity
     */
    public function setUpdatedAt(\DateTime $updated_at): AbstractEntity
    {
        $this->updated_at = $updated_at;
        return $this;
    }
}

