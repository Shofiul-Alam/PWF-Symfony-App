<?php

namespace Proxies\__CG__\BackendBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class TimesheetHourEntry extends \BackendBundle\Entity\TimesheetHourEntry implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'BackendBundle\\Entity\\TimesheetHourEntry' . "\0" . 'id', '' . "\0" . 'BackendBundle\\Entity\\TimesheetHourEntry' . "\0" . 'hourlyRate', '' . "\0" . 'BackendBundle\\Entity\\TimesheetHourEntry' . "\0" . 'timeSheet', '' . "\0" . 'BackendBundle\\Entity\\TimesheetHourEntry' . "\0" . 'rate', '' . "\0" . 'BackendBundle\\Entity\\TimesheetHourEntry' . "\0" . 'hours', '' . "\0" . 'BackendBundle\\Entity\\TimesheetHourEntry' . "\0" . 'minutes'];
        }

        return ['__isInitialized__', '' . "\0" . 'BackendBundle\\Entity\\TimesheetHourEntry' . "\0" . 'id', '' . "\0" . 'BackendBundle\\Entity\\TimesheetHourEntry' . "\0" . 'hourlyRate', '' . "\0" . 'BackendBundle\\Entity\\TimesheetHourEntry' . "\0" . 'timeSheet', '' . "\0" . 'BackendBundle\\Entity\\TimesheetHourEntry' . "\0" . 'rate', '' . "\0" . 'BackendBundle\\Entity\\TimesheetHourEntry' . "\0" . 'hours', '' . "\0" . 'BackendBundle\\Entity\\TimesheetHourEntry' . "\0" . 'minutes'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (TimesheetHourEntry $proxy) {
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
    public function setHourlyRate(\BackendBundle\Entity\HourlyRate $hourlyRate = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHourlyRate', [$hourlyRate]);

        return parent::setHourlyRate($hourlyRate);
    }

    /**
     * {@inheritDoc}
     */
    public function getHourlyRate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHourlyRate', []);

        return parent::getHourlyRate();
    }

    /**
     * {@inheritDoc}
     */
    public function setTimeSheet(\BackendBundle\Entity\TimeSheet $timeSheet = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTimeSheet', [$timeSheet]);

        return parent::setTimeSheet($timeSheet);
    }

    /**
     * {@inheritDoc}
     */
    public function getTimeSheet()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTimeSheet', []);

        return parent::getTimeSheet();
    }

    /**
     * {@inheritDoc}
     */
    public function getRate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRate', []);

        return parent::getRate();
    }

    /**
     * {@inheritDoc}
     */
    public function setRate($rate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRate', [$rate]);

        return parent::setRate($rate);
    }

    /**
     * {@inheritDoc}
     */
    public function getHours()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHours', []);

        return parent::getHours();
    }

    /**
     * {@inheritDoc}
     */
    public function setHours($hours)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHours', [$hours]);

        return parent::setHours($hours);
    }

    /**
     * {@inheritDoc}
     */
    public function getMinutes()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMinutes', []);

        return parent::getMinutes();
    }

    /**
     * {@inheritDoc}
     */
    public function setMinutes($minutes)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMinutes', [$minutes]);

        return parent::setMinutes($minutes);
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
