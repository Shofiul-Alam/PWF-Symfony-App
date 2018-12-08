<?php

namespace Proxies\__CG__\BackendBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Form extends \BackendBundle\Entity\Form implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'BackendBundle\\Entity\\Form' . "\0" . 'id', '' . "\0" . 'BackendBundle\\Entity\\Form' . "\0" . 'formName', '' . "\0" . 'BackendBundle\\Entity\\Form' . "\0" . 'isDeleted', '' . "\0" . 'BackendBundle\\Entity\\Form' . "\0" . 'fieldsArr', 'splicedFieldsArr', 'firstTime'];
        }

        return ['__isInitialized__', '' . "\0" . 'BackendBundle\\Entity\\Form' . "\0" . 'id', '' . "\0" . 'BackendBundle\\Entity\\Form' . "\0" . 'formName', '' . "\0" . 'BackendBundle\\Entity\\Form' . "\0" . 'isDeleted', '' . "\0" . 'BackendBundle\\Entity\\Form' . "\0" . 'fieldsArr', 'splicedFieldsArr', 'firstTime'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Form $proxy) {
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
    public function getFieldsArr()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFieldsArr', []);

        return parent::getFieldsArr();
    }

    /**
     * {@inheritDoc}
     */
    public function addFieldsArr(\BackendBundle\Entity\Field $fieldsArr)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addFieldsArr', [$fieldsArr]);

        return parent::addFieldsArr($fieldsArr);
    }

    /**
     * {@inheritDoc}
     */
    public function initFieldsArr($fieldsArr)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'initFieldsArr', [$fieldsArr]);

        return parent::initFieldsArr($fieldsArr);
    }

    /**
     * {@inheritDoc}
     */
    public function removeFieldsArr(\BackendBundle\Entity\Field $fieldsArr)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeFieldsArr', [$fieldsArr]);

        return parent::removeFieldsArr($fieldsArr);
    }

    /**
     * {@inheritDoc}
     */
    public function replaceFieldsArr($fieldsArr)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'replaceFieldsArr', [$fieldsArr]);

        return parent::replaceFieldsArr($fieldsArr);
    }

    /**
     * {@inheritDoc}
     */
    public function emptyFieldsArr()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'emptyFieldsArr', []);

        return parent::emptyFieldsArr();
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
    public function setId($id)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setId', [$id]);

        return parent::setId($id);
    }

    /**
     * {@inheritDoc}
     */
    public function setFormName($formName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFormName', [$formName]);

        return parent::setFormName($formName);
    }

    /**
     * {@inheritDoc}
     */
    public function getFormName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFormName', []);

        return parent::getFormName();
    }

    /**
     * {@inheritDoc}
     */
    public function isFirstTime()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isFirstTime', []);

        return parent::isFirstTime();
    }

    /**
     * {@inheritDoc}
     */
    public function setFirstTime(bool $firstTime)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFirstTime', [$firstTime]);

        return parent::setFirstTime($firstTime);
    }

    /**
     * {@inheritDoc}
     */
    public function getisDeleted()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getisDeleted', []);

        return parent::getisDeleted();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsDeleted(bool $isDeleted)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsDeleted', [$isDeleted]);

        return parent::setIsDeleted($isDeleted);
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