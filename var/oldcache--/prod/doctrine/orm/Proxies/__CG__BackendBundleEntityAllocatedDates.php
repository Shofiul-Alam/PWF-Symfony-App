<?php

namespace Proxies\__CG__\BackendBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class AllocatedDates extends \BackendBundle\Entity\AllocatedDates implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'BackendBundle\\Entity\\AllocatedDates' . "\0" . 'id', '' . "\0" . 'BackendBundle\\Entity\\AllocatedDates' . "\0" . 'date', '' . "\0" . 'BackendBundle\\Entity\\AllocatedDates' . "\0" . 'day', '' . "\0" . 'BackendBundle\\Entity\\AllocatedDates' . "\0" . 'respond', '' . "\0" . 'BackendBundle\\Entity\\AllocatedDates' . "\0" . 'cancelallocation', '' . "\0" . 'BackendBundle\\Entity\\AllocatedDates' . "\0" . 'deny', '' . "\0" . 'BackendBundle\\Entity\\AllocatedDates' . "\0" . 'accecptallocation', '' . "\0" . 'BackendBundle\\Entity\\AllocatedDates' . "\0" . 'requestsend', '' . "\0" . 'BackendBundle\\Entity\\AllocatedDates' . "\0" . 'employeeAllocation', '' . "\0" . 'BackendBundle\\Entity\\AllocatedDates' . "\0" . 'cancelSms', '' . "\0" . 'BackendBundle\\Entity\\AllocatedDates' . "\0" . 'sms', '' . "\0" . 'BackendBundle\\Entity\\AllocatedDates' . "\0" . 'reAllocated', '' . "\0" . 'BackendBundle\\Entity\\AllocatedDates' . "\0" . 'siteArrivalId', '' . "\0" . 'BackendBundle\\Entity\\AllocatedDates' . "\0" . 'siteArrival'];
        }

        return ['__isInitialized__', '' . "\0" . 'BackendBundle\\Entity\\AllocatedDates' . "\0" . 'id', '' . "\0" . 'BackendBundle\\Entity\\AllocatedDates' . "\0" . 'date', '' . "\0" . 'BackendBundle\\Entity\\AllocatedDates' . "\0" . 'day', '' . "\0" . 'BackendBundle\\Entity\\AllocatedDates' . "\0" . 'respond', '' . "\0" . 'BackendBundle\\Entity\\AllocatedDates' . "\0" . 'cancelallocation', '' . "\0" . 'BackendBundle\\Entity\\AllocatedDates' . "\0" . 'deny', '' . "\0" . 'BackendBundle\\Entity\\AllocatedDates' . "\0" . 'accecptallocation', '' . "\0" . 'BackendBundle\\Entity\\AllocatedDates' . "\0" . 'requestsend', '' . "\0" . 'BackendBundle\\Entity\\AllocatedDates' . "\0" . 'employeeAllocation', '' . "\0" . 'BackendBundle\\Entity\\AllocatedDates' . "\0" . 'cancelSms', '' . "\0" . 'BackendBundle\\Entity\\AllocatedDates' . "\0" . 'sms', '' . "\0" . 'BackendBundle\\Entity\\AllocatedDates' . "\0" . 'reAllocated', '' . "\0" . 'BackendBundle\\Entity\\AllocatedDates' . "\0" . 'siteArrivalId', '' . "\0" . 'BackendBundle\\Entity\\AllocatedDates' . "\0" . 'siteArrival'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (AllocatedDates $proxy) {
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
    public function setSiteArrivalId($id)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSiteArrivalId', [$id]);

        return parent::setSiteArrivalId($id);
    }

    /**
     * {@inheritDoc}
     */
    public function getSiteArrivalId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSiteArrivalId', []);

        return parent::getSiteArrivalId();
    }

    /**
     * {@inheritDoc}
     */
    public function getSiteArrival()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSiteArrival', []);

        return parent::getSiteArrival();
    }

    /**
     * {@inheritDoc}
     */
    public function setSiteArrival(\BackendBundle\Entity\SiteArrival $siteArrival)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSiteArrival', [$siteArrival]);

        return parent::setSiteArrival($siteArrival);
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
    public function setDate($date)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDate', [$date]);

        return parent::setDate($date);
    }

    /**
     * {@inheritDoc}
     */
    public function getDate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDate', []);

        return parent::getDate();
    }

    /**
     * {@inheritDoc}
     */
    public function getDateString()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDateString', []);

        return parent::getDateString();
    }

    /**
     * {@inheritDoc}
     */
    public function setDay($day = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDay', [$day]);

        return parent::setDay($day);
    }

    /**
     * {@inheritDoc}
     */
    public function getDay()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDay', []);

        return parent::getDay();
    }

    /**
     * {@inheritDoc}
     */
    public function setRespond($respond = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRespond', [$respond]);

        return parent::setRespond($respond);
    }

    /**
     * {@inheritDoc}
     */
    public function getRespond()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRespond', []);

        return parent::getRespond();
    }

    /**
     * {@inheritDoc}
     */
    public function setCancelallocation($cancelallocation = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCancelallocation', [$cancelallocation]);

        return parent::setCancelallocation($cancelallocation);
    }

    /**
     * {@inheritDoc}
     */
    public function getCancelallocation()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCancelallocation', []);

        return parent::getCancelallocation();
    }

    /**
     * {@inheritDoc}
     */
    public function isReAllocated()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isReAllocated', []);

        return parent::isReAllocated();
    }

    /**
     * {@inheritDoc}
     */
    public function setReAllocated(bool $reAllocated)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setReAllocated', [$reAllocated]);

        return parent::setReAllocated($reAllocated);
    }

    /**
     * {@inheritDoc}
     */
    public function setAccecptallocation($accecptallocation = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAccecptallocation', [$accecptallocation]);

        return parent::setAccecptallocation($accecptallocation);
    }

    /**
     * {@inheritDoc}
     */
    public function getAccecptallocation()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAccecptallocation', []);

        return parent::getAccecptallocation();
    }

    /**
     * {@inheritDoc}
     */
    public function setRequestsend($requestsend = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRequestsend', [$requestsend]);

        return parent::setRequestsend($requestsend);
    }

    /**
     * {@inheritDoc}
     */
    public function getRequestsend()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRequestsend', []);

        return parent::getRequestsend();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmployeeAllocation(\BackendBundle\Entity\EmployeeAllocation $employeeAllocation)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmployeeAllocation', [$employeeAllocation]);

        return parent::setEmployeeAllocation($employeeAllocation);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmployeeAllocation()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmployeeAllocation', []);

        return parent::getEmployeeAllocation();
    }

    /**
     * {@inheritDoc}
     */
    public function getCancelSms()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCancelSms', []);

        return parent::getCancelSms();
    }

    /**
     * {@inheritDoc}
     */
    public function setCancelSms(string $sms)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCancelSms', [$sms]);

        return parent::setCancelSms($sms);
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
    public function getSms()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSms', []);

        return parent::getSms();
    }

    /**
     * {@inheritDoc}
     */
    public function setSms(string $sms)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSms', [$sms]);

        return parent::setSms($sms);
    }

    /**
     * {@inheritDoc}
     */
    public function isDeny()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isDeny', []);

        return parent::isDeny();
    }

    /**
     * {@inheritDoc}
     */
    public function setDeny(bool $deny)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDeny', [$deny]);

        return parent::setDeny($deny);
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