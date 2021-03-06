<?php

namespace Proxies\__CG__\BackendBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Job extends \BackendBundle\Entity\Job implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'BackendBundle\\Entity\\Job' . "\0" . 'id', '' . "\0" . 'BackendBundle\\Entity\\Job' . "\0" . 'name', '' . "\0" . 'BackendBundle\\Entity\\Job' . "\0" . 'chargeRate', '' . "\0" . 'BackendBundle\\Entity\\Job' . "\0" . 'payscale', '' . "\0" . 'BackendBundle\\Entity\\Job' . "\0" . 'archived', '' . "\0" . 'BackendBundle\\Entity\\Job' . "\0" . 'induction', '' . "\0" . 'BackendBundle\\Entity\\Job' . "\0" . 'skillCompetencyList', 'splicedInduction', 'splicedSkillCompetencyList', 'splicedTask'];
        }

        return ['__isInitialized__', '' . "\0" . 'BackendBundle\\Entity\\Job' . "\0" . 'id', '' . "\0" . 'BackendBundle\\Entity\\Job' . "\0" . 'name', '' . "\0" . 'BackendBundle\\Entity\\Job' . "\0" . 'chargeRate', '' . "\0" . 'BackendBundle\\Entity\\Job' . "\0" . 'payscale', '' . "\0" . 'BackendBundle\\Entity\\Job' . "\0" . 'archived', '' . "\0" . 'BackendBundle\\Entity\\Job' . "\0" . 'induction', '' . "\0" . 'BackendBundle\\Entity\\Job' . "\0" . 'skillCompetencyList', 'splicedInduction', 'splicedSkillCompetencyList', 'splicedTask'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Job $proxy) {
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
    public function getName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getName', []);

        return parent::getName();
    }

    /**
     * {@inheritDoc}
     */
    public function setName(string $name)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setName', [$name]);

        return parent::setName($name);
    }

    /**
     * {@inheritDoc}
     */
    public function setChargeRate($chargeRate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setChargeRate', [$chargeRate]);

        return parent::setChargeRate($chargeRate);
    }

    /**
     * {@inheritDoc}
     */
    public function getChargeRate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getChargeRate', []);

        return parent::getChargeRate();
    }

    /**
     * {@inheritDoc}
     */
    public function setPayscale($payscale)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPayscale', [$payscale]);

        return parent::setPayscale($payscale);
    }

    /**
     * {@inheritDoc}
     */
    public function getPayscale()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPayscale', []);

        return parent::getPayscale();
    }

    /**
     * {@inheritDoc}
     */
    public function addInduction(\BackendBundle\Entity\Induction $induction)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addInduction', [$induction]);

        return parent::addInduction($induction);
    }

    /**
     * {@inheritDoc}
     */
    public function removeInduction(\BackendBundle\Entity\Induction $induction)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeInduction', [$induction]);

        return parent::removeInduction($induction);
    }

    /**
     * {@inheritDoc}
     */
    public function getInduction()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getInduction', []);

        return parent::getInduction();
    }

    /**
     * {@inheritDoc}
     */
    public function replaceInduction(\BackendBundle\Entity\Induction $induction)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'replaceInduction', [$induction]);

        return parent::replaceInduction($induction);
    }

    /**
     * {@inheritDoc}
     */
    public function addSkillCompetencyList(\BackendBundle\Entity\SkillCompetencyList $skillCompetencyList)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addSkillCompetencyList', [$skillCompetencyList]);

        return parent::addSkillCompetencyList($skillCompetencyList);
    }

    /**
     * {@inheritDoc}
     */
    public function removeSkillCompetencyList(\BackendBundle\Entity\SkillCompetencyList $skillCompetencyList)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeSkillCompetencyList', [$skillCompetencyList]);

        return parent::removeSkillCompetencyList($skillCompetencyList);
    }

    /**
     * {@inheritDoc}
     */
    public function getSkillCompetencyList()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSkillCompetencyList', []);

        return parent::getSkillCompetencyList();
    }

    /**
     * {@inheritDoc}
     */
    public function replaceSkillCompetencyList(\BackendBundle\Entity\SkillCompetencyList $skillCompetencyList)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'replaceSkillCompetencyList', [$skillCompetencyList]);

        return parent::replaceSkillCompetencyList($skillCompetencyList);
    }

    /**
     * {@inheritDoc}
     */
    public function isArchived()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isArchived', []);

        return parent::isArchived();
    }

    /**
     * {@inheritDoc}
     */
    public function setArchived(bool $archived)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setArchived', [$archived]);

        return parent::setArchived($archived);
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
