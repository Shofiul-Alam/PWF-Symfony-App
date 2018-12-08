<?php

namespace Proxies\__CG__\BackendBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class SiteArrival extends \BackendBundle\Entity\SiteArrival implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'id', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'submitted', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'highVisibilityShirtVest', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'steelCapBoots', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'gloves', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'protectionGlasses', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'dustMaskOrOtherPpe', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'earPlugs', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'hardHat', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'sunscreen', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'gumBoots', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'freeOfAlcoholDrug', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'supervisorName', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'safetyInductionDone', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'whatToDo', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'supervisorSign', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'supervisorSignRefusal', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'allocatedDates'];
        }

        return ['__isInitialized__', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'id', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'submitted', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'highVisibilityShirtVest', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'steelCapBoots', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'gloves', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'protectionGlasses', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'dustMaskOrOtherPpe', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'earPlugs', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'hardHat', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'sunscreen', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'gumBoots', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'freeOfAlcoholDrug', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'supervisorName', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'safetyInductionDone', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'whatToDo', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'supervisorSign', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'supervisorSignRefusal', '' . "\0" . 'BackendBundle\\Entity\\SiteArrival' . "\0" . 'allocatedDates'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (SiteArrival $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setSubmitted($submitted)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSubmitted', [$submitted]);

        return parent::setSubmitted($submitted);
    }

    /**
     * {@inheritDoc}
     */
    public function getSubmitted()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSubmitted', []);

        return parent::getSubmitted();
    }

    /**
     * {@inheritDoc}
     */
    public function setHighVisibilityShirtVest($highVisibilityShirtVest)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHighVisibilityShirtVest', [$highVisibilityShirtVest]);

        return parent::setHighVisibilityShirtVest($highVisibilityShirtVest);
    }

    /**
     * {@inheritDoc}
     */
    public function getHighVisibilityShirtVest()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHighVisibilityShirtVest', []);

        return parent::getHighVisibilityShirtVest();
    }

    /**
     * {@inheritDoc}
     */
    public function setSteelCapBoots($steelCapBoots)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSteelCapBoots', [$steelCapBoots]);

        return parent::setSteelCapBoots($steelCapBoots);
    }

    /**
     * {@inheritDoc}
     */
    public function getSteelCapBoots()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSteelCapBoots', []);

        return parent::getSteelCapBoots();
    }

    /**
     * {@inheritDoc}
     */
    public function setGloves($gloves)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGloves', [$gloves]);

        return parent::setGloves($gloves);
    }

    /**
     * {@inheritDoc}
     */
    public function getGloves()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGloves', []);

        return parent::getGloves();
    }

    /**
     * {@inheritDoc}
     */
    public function setProtectionGlasses($protectionGlasses)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProtectionGlasses', [$protectionGlasses]);

        return parent::setProtectionGlasses($protectionGlasses);
    }

    /**
     * {@inheritDoc}
     */
    public function getProtectionGlasses()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProtectionGlasses', []);

        return parent::getProtectionGlasses();
    }

    /**
     * {@inheritDoc}
     */
    public function setDustMaskOrOtherPpe($dustMaskOrOtherPpe)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDustMaskOrOtherPpe', [$dustMaskOrOtherPpe]);

        return parent::setDustMaskOrOtherPpe($dustMaskOrOtherPpe);
    }

    /**
     * {@inheritDoc}
     */
    public function getDustMaskOrOtherPpe()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDustMaskOrOtherPpe', []);

        return parent::getDustMaskOrOtherPpe();
    }

    /**
     * {@inheritDoc}
     */
    public function setEarPlugs($earPlugs)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEarPlugs', [$earPlugs]);

        return parent::setEarPlugs($earPlugs);
    }

    /**
     * {@inheritDoc}
     */
    public function getEarPlugs()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEarPlugs', []);

        return parent::getEarPlugs();
    }

    /**
     * {@inheritDoc}
     */
    public function setHardHat($hardHat)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHardHat', [$hardHat]);

        return parent::setHardHat($hardHat);
    }

    /**
     * {@inheritDoc}
     */
    public function getHardHat()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHardHat', []);

        return parent::getHardHat();
    }

    /**
     * {@inheritDoc}
     */
    public function setSunscreen($sunscreen)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSunscreen', [$sunscreen]);

        return parent::setSunscreen($sunscreen);
    }

    /**
     * {@inheritDoc}
     */
    public function getSunscreen()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSunscreen', []);

        return parent::getSunscreen();
    }

    /**
     * {@inheritDoc}
     */
    public function setGumBoots($gumBoots)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGumBoots', [$gumBoots]);

        return parent::setGumBoots($gumBoots);
    }

    /**
     * {@inheritDoc}
     */
    public function getGumBoots()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGumBoots', []);

        return parent::getGumBoots();
    }

    /**
     * {@inheritDoc}
     */
    public function setFreeOfAlcoholDrug($freeOfAlcoholDrug)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFreeOfAlcoholDrug', [$freeOfAlcoholDrug]);

        return parent::setFreeOfAlcoholDrug($freeOfAlcoholDrug);
    }

    /**
     * {@inheritDoc}
     */
    public function getFreeOfAlcoholDrug()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFreeOfAlcoholDrug', []);

        return parent::getFreeOfAlcoholDrug();
    }

    /**
     * {@inheritDoc}
     */
    public function setSupervisorName($supervisorName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSupervisorName', [$supervisorName]);

        return parent::setSupervisorName($supervisorName);
    }

    /**
     * {@inheritDoc}
     */
    public function getSupervisorName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSupervisorName', []);

        return parent::getSupervisorName();
    }

    /**
     * {@inheritDoc}
     */
    public function setSafetyInductionDone($safetyInductionDone)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSafetyInductionDone', [$safetyInductionDone]);

        return parent::setSafetyInductionDone($safetyInductionDone);
    }

    /**
     * {@inheritDoc}
     */
    public function getSafetyInductionDone()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSafetyInductionDone', []);

        return parent::getSafetyInductionDone();
    }

    /**
     * {@inheritDoc}
     */
    public function setWhatToDo($whatToDo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setWhatToDo', [$whatToDo]);

        return parent::setWhatToDo($whatToDo);
    }

    /**
     * {@inheritDoc}
     */
    public function getWhatToDo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getWhatToDo', []);

        return parent::getWhatToDo();
    }

    /**
     * {@inheritDoc}
     */
    public function setSupervisorSign($supervisorSign)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSupervisorSign', [$supervisorSign]);

        return parent::setSupervisorSign($supervisorSign);
    }

    /**
     * {@inheritDoc}
     */
    public function getSupervisorSign()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSupervisorSign', []);

        return parent::getSupervisorSign();
    }

    /**
     * {@inheritDoc}
     */
    public function setSupervisorSignRefusal($supervisorSignRefusal)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSupervisorSignRefusal', [$supervisorSignRefusal]);

        return parent::setSupervisorSignRefusal($supervisorSignRefusal);
    }

    /**
     * {@inheritDoc}
     */
    public function getSupervisorSignRefusal()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSupervisorSignRefusal', []);

        return parent::getSupervisorSignRefusal();
    }

    /**
     * {@inheritDoc}
     */
    public function setAllocatedDates(\BackendBundle\Entity\AllocatedDates $allocatedDates = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAllocatedDates', [$allocatedDates]);

        return parent::setAllocatedDates($allocatedDates);
    }

    /**
     * {@inheritDoc}
     */
    public function getAllocatedDates()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAllocatedDates', []);

        return parent::getAllocatedDates();
    }

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'toArray', []);

        return parent::toArray();
    }

    /**
     * {@inheritDoc}
     */
    public function getEncryptedId(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEncryptedId', []);

        return parent::getEncryptedId();
    }

    /**
     * {@inheritDoc}
     */
    public function setEncryptedId(string $encryptedId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEncryptedId', [$encryptedId]);

        return parent::setEncryptedId($encryptedId);
    }

    /**
     * {@inheritDoc}
     */
    public function encodeId($id)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'encodeId', [$id]);

        return parent::encodeId($id);
    }

}