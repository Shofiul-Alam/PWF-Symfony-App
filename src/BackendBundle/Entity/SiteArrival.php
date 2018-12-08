<?php

namespace BackendBundle\Entity;

/**
 * SiteArrival
 */
class SiteArrival extends \BackendBundle\Entity\AEntity
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var boolean
     */
    private $submitted;

    /**
     * @var boolean
     */
    private $highVisibilityShirtVest;

    /**
     * @var boolean
     */
    private $steelCapBoots;

    /**
     * @var boolean
     */
    private $gloves;

    /**
     * @var boolean
     */
    private $protectionGlasses;

    /**
     * @var boolean
     */
    private $dustMaskOrOtherPpe;

    /**
     * @var boolean
     */
    private $earPlugs;

    /**
     * @var boolean
     */
    private $hardHat;

    /**
     * @var boolean
     */
    private $sunscreen;

    /**
     * @var boolean
     */
    private $gumBoots;

    /**
     * @var boolean
     */
    private $freeOfAlcoholDrug;

    /**
     * @var string
     */
    private $supervisorName;

    /**
     * @var boolean
     */
    private $safetyInductionDone;

    /**
     * @var boolean
     */
    private $whatToDo;

    /**
     * @var string
     */
    private $supervisorSign;

    /**
     * @var boolean
     */
    private $supervisorSignRefusal;

    /**
     * @var \BackendBundle\Entity\AllocatedDates
     */
    private $allocatedDates;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->encodeId($this->id);
    }

    /**
     * Set submitted
     *
     * @param boolean $submitted
     *
     * @return SiteArrival
     */
    public function setSubmitted($submitted)
    {
        $this->submitted = $submitted;

        return $this;
    }

    /**
     * Get submitted
     *
     * @return boolean
     */
    public function getSubmitted()
    {
        return $this->submitted;
    }

    /**
     * Set highVisibilityShirtVest
     *
     * @param boolean $highVisibilityShirtVest
     *
     * @return SiteArrival
     */
    public function setHighVisibilityShirtVest($highVisibilityShirtVest)
    {
        $this->highVisibilityShirtVest = $highVisibilityShirtVest;

        return $this;
    }

    /**
     * Get highVisibilityShirtVest
     *
     * @return boolean
     */
    public function getHighVisibilityShirtVest()
    {
        return $this->highVisibilityShirtVest;
    }

    /**
     * Set steelCapBoots
     *
     * @param boolean $steelCapBoots
     *
     * @return SiteArrival
     */
    public function setSteelCapBoots($steelCapBoots)
    {
        $this->steelCapBoots = $steelCapBoots;

        return $this;
    }

    /**
     * Get steelCapBoots
     *
     * @return boolean
     */
    public function getSteelCapBoots()
    {
        return $this->steelCapBoots;
    }

    /**
     * Set gloves
     *
     * @param boolean $gloves
     *
     * @return SiteArrival
     */
    public function setGloves($gloves)
    {
        $this->gloves = $gloves;

        return $this;
    }

    /**
     * Get gloves
     *
     * @return boolean
     */
    public function getGloves()
    {
        return $this->gloves;
    }

    /**
     * Set protectionGlasses
     *
     * @param boolean $protectionGlasses
     *
     * @return SiteArrival
     */
    public function setProtectionGlasses($protectionGlasses)
    {
        $this->protectionGlasses = $protectionGlasses;

        return $this;
    }

    /**
     * Get protectionGlasses
     *
     * @return boolean
     */
    public function getProtectionGlasses()
    {
        return $this->protectionGlasses;
    }

    /**
     * Set dustMaskOrOtherPpe
     *
     * @param boolean $dustMaskOrOtherPpe
     *
     * @return SiteArrival
     */
    public function setDustMaskOrOtherPpe($dustMaskOrOtherPpe)
    {
        $this->dustMaskOrOtherPpe = $dustMaskOrOtherPpe;

        return $this;
    }

    /**
     * Get dustMaskOrOtherPpe
     *
     * @return boolean
     */
    public function getDustMaskOrOtherPpe()
    {
        return $this->dustMaskOrOtherPpe;
    }

    /**
     * Set earPlugs
     *
     * @param boolean $earPlugs
     *
     * @return SiteArrival
     */
    public function setEarPlugs($earPlugs)
    {
        $this->earPlugs = $earPlugs;

        return $this;
    }

    /**
     * Get earPlugs
     *
     * @return boolean
     */
    public function getEarPlugs()
    {
        return $this->earPlugs;
    }

    /**
     * Set hardHat
     *
     * @param boolean $hardHat
     *
     * @return SiteArrival
     */
    public function setHardHat($hardHat)
    {
        $this->hardHat = $hardHat;

        return $this;
    }

    /**
     * Get hardHat
     *
     * @return boolean
     */
    public function getHardHat()
    {
        return $this->hardHat;
    }

    /**
     * Set sunscreen
     *
     * @param boolean $sunscreen
     *
     * @return SiteArrival
     */
    public function setSunscreen($sunscreen)
    {
        $this->sunscreen = $sunscreen;

        return $this;
    }

    /**
     * Get sunscreen
     *
     * @return boolean
     */
    public function getSunscreen()
    {
        return $this->sunscreen;
    }

    /**
     * Set gumBoots
     *
     * @param boolean $gumBoots
     *
     * @return SiteArrival
     */
    public function setGumBoots($gumBoots)
    {
        $this->gumBoots = $gumBoots;

        return $this;
    }

    /**
     * Get gumBoots
     *
     * @return boolean
     */
    public function getGumBoots()
    {
        return $this->gumBoots;
    }

    /**
     * Set freeOfAlcoholDrug
     *
     * @param boolean $freeOfAlcoholDrug
     *
     * @return SiteArrival
     */
    public function setFreeOfAlcoholDrug($freeOfAlcoholDrug)
    {
        $this->freeOfAlcoholDrug = $freeOfAlcoholDrug;

        return $this;
    }

    /**
     * Get freeOfAlcoholDrug
     *
     * @return boolean
     */
    public function getFreeOfAlcoholDrug()
    {
        return $this->freeOfAlcoholDrug;
    }

    /**
     * Set supervisorName
     *
     * @param string $supervisorName
     *
     * @return SiteArrival
     */
    public function setSupervisorName($supervisorName)
    {
        $this->supervisorName = $supervisorName;

        return $this;
    }

    /**
     * Get supervisorName
     *
     * @return string
     */
    public function getSupervisorName()
    {
        return $this->supervisorName;
    }

    /**
     * Set safetyInductionDone
     *
     * @param boolean $safetyInductionDone
     *
     * @return SiteArrival
     */
    public function setSafetyInductionDone($safetyInductionDone)
    {
        $this->safetyInductionDone = $safetyInductionDone;

        return $this;
    }

    /**
     * Get safetyInductionDone
     *
     * @return boolean
     */
    public function getSafetyInductionDone()
    {
        return $this->safetyInductionDone;
    }

    /**
     * Set whatToDo
     *
     * @param boolean $whatToDo
     *
     * @return SiteArrival
     */
    public function setWhatToDo($whatToDo)
    {
        $this->whatToDo = $whatToDo;

        return $this;
    }

    /**
     * Get whatToDo
     *
     * @return boolean
     */
    public function getWhatToDo()
    {
        return $this->whatToDo;
    }

    /**
     * Set supervisorSign
     *
     * @param string $supervisorSign
     *
     * @return SiteArrival
     */
    public function setSupervisorSign($supervisorSign)
    {
        $this->supervisorSign = $supervisorSign;

        return $this;
    }

    /**
     * Get supervisorSign
     *
     * @return string
     */
    public function getSupervisorSign()
    {
        return $this->supervisorSign;
    }

    /**
     * Set supervisorSignRefusal
     *
     * @param boolean $supervisorSignRefusal
     *
     * @return SiteArrival
     */
    public function setSupervisorSignRefusal($supervisorSignRefusal)
    {
        $this->supervisorSignRefusal = $supervisorSignRefusal;

        return $this;
    }

    /**
     * Get supervisorSignRefusal
     *
     * @return boolean
     */
    public function getSupervisorSignRefusal()
    {
        return $this->supervisorSignRefusal;
    }

    /**
     * Set allocatedDates
     *
     * @param \BackendBundle\Entity\AllocatedDates $allocatedDates
     *
     * @return SiteArrival
     */
    public function setAllocatedDates(\BackendBundle\Entity\AllocatedDates $allocatedDates = null)
    {
        $this->allocatedDates = $allocatedDates;

        return $this;
    }

    /**
     * Get allocatedDates
     *
     * @return \BackendBundle\Entity\AllocatedDates
     */
    public function getAllocatedDates()
    {
        return $this->allocatedDates;
    }


    public function toArray() {
        return get_object_vars($this);
    }
}

