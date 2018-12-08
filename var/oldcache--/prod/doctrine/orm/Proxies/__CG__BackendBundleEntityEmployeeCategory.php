<?php

namespace Proxies\__CG__\BackendBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class EmployeeCategory extends \BackendBundle\Entity\EmployeeCategory implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'BackendBundle\\Entity\\EmployeeCategory' . "\0" . 'id', '' . "\0" . 'BackendBundle\\Entity\\EmployeeCategory' . "\0" . 'categoryName', '' . "\0" . 'BackendBundle\\Entity\\EmployeeCategory' . "\0" . 'pricePerHour', '' . "\0" . 'BackendBundle\\Entity\\EmployeeCategory' . "\0" . 'employee'];
        }

        return ['__isInitialized__', '' . "\0" . 'BackendBundle\\Entity\\EmployeeCategory' . "\0" . 'id', '' . "\0" . 'BackendBundle\\Entity\\EmployeeCategory' . "\0" . 'categoryName', '' . "\0" . 'BackendBundle\\Entity\\EmployeeCategory' . "\0" . 'pricePerHour', '' . "\0" . 'BackendBundle\\Entity\\EmployeeCategory' . "\0" . 'employee'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (EmployeeCategory $proxy) {
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
    public function setCategoryName($categoryName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCategoryName', [$categoryName]);

        return parent::setCategoryName($categoryName);
    }

    /**
     * {@inheritDoc}
     */
    public function getCategoryName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCategoryName', []);

        return parent::getCategoryName();
    }

    /**
     * {@inheritDoc}
     */
    public function setPricePerHour($pricePerHour)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPricePerHour', [$pricePerHour]);

        return parent::setPricePerHour($pricePerHour);
    }

    /**
     * {@inheritDoc}
     */
    public function getPricePerHour()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPricePerHour', []);

        return parent::getPricePerHour();
    }

    /**
     * {@inheritDoc}
     */
    public function addEmployee(\BackendBundle\Entity\Employee $employee)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addEmployee', [$employee]);

        return parent::addEmployee($employee);
    }

    /**
     * {@inheritDoc}
     */
    public function removeEmployee(\BackendBundle\Entity\Employee $employee)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeEmployee', [$employee]);

        return parent::removeEmployee($employee);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmployee()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmployee', []);

        return parent::getEmployee();
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
