<?php

namespace Manticora\PushNotificationBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="Manticora\PushNotificationBundle\Repository\MessageTemplateRepository")
 * @ORM\Table(name="message_template")
 */
class MessageTemplate
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $name;
     /**
     * @ORM\Column(type="string", length=255)
     */
    protected $description;
    /**
     * @ORM\OneToMany(targetEntity="MessageAttribute", mappedBy="message_template",cascade={"persist", "remove"}, orphanRemoval=true, indexBy="chiave")
     *
     */
    protected $attributes;
    
    
    
    public function setAttributes(\Doctrine\Common\Collections\Collection $attributes)
    {
    	foreach ($attributes as $attribute){
    		$attribute->setMessageTemplate($this);
    	}
    	 
    	$this->attributes = $attributes;
    }
public function __toString() {
	return $this->name .' - ' .$this->description;
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
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * Set description
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
    public function __construct()
    {
        $this->attributes = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add attributes
     *
     * @param Manticora\PushNotificationBundle\Entity\MessageAttribute $attributes
     */
    public function addMessageAttribute(\Manticora\PushNotificationBundle\Entity\MessageAttribute $attributes)
    {
        $this->attributes[] = $attributes;
    }

    /**
     * Get attributes
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getAttributes()
    {
        return $this->attributes;
    }
}