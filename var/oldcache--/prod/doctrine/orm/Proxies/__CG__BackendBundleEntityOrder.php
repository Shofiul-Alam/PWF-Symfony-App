<?php

namespace Proxies\__CG__\BackendBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Order extends \BackendBundle\Entity\Order implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'BackendBundle\\Entity\\Order' . "\0" . 'id', '' . "\0" . 'BackendBundle\\Entity\\Order' . "\0" . 'orderTitle', '' . "\0" . 'BackendBundle\\Entity\\Order' . "\0" . 'startDate', '' . "\0" . 'BackendBundle\\Entity\\Order' . "\0" . 'endDate', '' . "\0" . 'BackendBundle\\Entity\\Order' . "\0" . 'orderStatus', '' . "\0" . 'BackendBundle\\Entity\\Order' . "\0" . 'orderDescription', '' . "\0" . 'BackendBundle\\Entity\\Order' . "\0" . 'contactDetails', '' . "\0" . 'BackendBundle\\Entity\\Order' . "\0" . 'comments', '' . "\0" . 'BackendBundle\\Entity\\Order' . "\0" . 'archived', '' . "\0" . 'BackendBundle\\Entity\\Order' . "\0" . 'taskReferenceId', '' . "\0" . 'BackendBundle\\Entity\\Order' . "\0" . 'project', '' . "\0" . 'BackendBundle\\Entity\\Order' . "\0" . 'allocatedContact', 'splicedAllocatedContact', 'firstTime'];
        }

        return ['__isInitialized__', '' . "\0" . 'BackendBundle\\Entity\\Order' . "\0" . 'id', '' . "\0" . 'BackendBundle\\Entity\\Order' . "\0" . 'orderTitle', '' . "\0" . 'BackendBundle\\Entity\\Order' . "\0" . 'startDate', '' . "\0" . 'BackendBundle\\Entity\\Order' . "\0" . 'endDate', '' . "\0" . 'BackendBundle\\Entity\\Order' . "\0" . 'orderStatus', '' . "\0" . 'BackendBundle\\Entity\\Order' . "\0" . 'orderDescription', '' . "\0" . 'BackendBundle\\Entity\\Order' . "\0" . 'contactDetails', '' . "\0" . 'BackendBundle\\Entity\\Order' . "\0" . 'comments', '' . "\0" . 'BackendBundle\\Entity\\Order' . "\0" . 'archived', '' . "\0" . 'BackendBundle\\Entity\\Order' . "\0" . 'taskReferenceId', '' . "\0" . 'BackendBundle\\Entity\\Order' . "\0" . 'project', '' . "\0" . 'BackendBundle\\Entity\\Order' . "\0" . 'allocatedContact', 'splicedAllocatedContact', 'firstTime'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Order $proxy) {
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
    public function getAllocatedContact()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAllocatedContact', []);

        return parent::getAllocatedContact();
    }

    /**
     * {@inheritDoc}
     */
    public function replaceAllocatedContact(\BackendBundle\Entity\AllocatedContact $contact)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'replaceAllocatedContact', [$contact]);

        return parent::replaceAllocatedContact($contact);
    }

    /**
     * {@inheritDoc}
     */
    public function addAllocatedContact(\BackendBundle\Entity\AllocatedContact $contact)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addAllocatedContact', [$contact]);

        return parent::addAllocatedContact($contact);
    }

    /**
     * {@inheritDoc}
     */
    public function removeAllocatedContact(\BackendBundle\Entity\AllocatedContact $contact)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeAllocatedContact', [$contact]);

        return parent::removeAllocatedContact($contact);
    }

    /**
     * {@inheritDoc}
     */
    public function unsetAllocatedContact()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'unsetAllocatedContact', []);

        return parent::unsetAllocatedContact();
    }

    /**
     * {@inheritDoc}
     */
    public function getAllContacts()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAllContacts', []);

        return parent::getAllContacts();
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
    public function getOrderTitle()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOrderTitle', []);

        return parent::getOrderTitle();
    }

    /**
     * {@inheritDoc}
     */
    public function setOrderTitle(string $orderTitle)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOrderTitle', [$orderTitle]);

        return parent::setOrderTitle($orderTitle);
    }

    /**
     * {@inheritDoc}
     */
    public function setStartDate($startDate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStartDate', [$startDate]);

        return parent::setStartDate($startDate);
    }

    /**
     * {@inheritDoc}
     */
    public function getStartDate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStartDate', []);

        return parent::getStartDate();
    }

    /**
     * {@inheritDoc}
     */
    public function setEndDate($endDate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEndDate', [$endDate]);

        return parent::setEndDate($endDate);
    }

    /**
     * {@inheritDoc}
     */
    public function getEndDate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEndDate', []);

        return parent::getEndDate();
    }

    /**
     * {@inheritDoc}
     */
    public function setOrderStatus($orderStatus)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOrderStatus', [$orderStatus]);

        return parent::setOrderStatus($orderStatus);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrderStatus()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOrderStatus', []);

        return parent::getOrderStatus();
    }

    /**
     * {@inheritDoc}
     */
    public function setOrderDescription($orderDescription)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOrderDescription', [$orderDescription]);

        return parent::setOrderDescription($orderDescription);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrderDescription()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOrderDescription', []);

        return parent::getOrderDescription();
    }

    /**
     * {@inheritDoc}
     */
    public function setContactDetails($contactDetails)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setContactDetails', [$contactDetails]);

        return parent::setContactDetails($contactDetails);
    }

    /**
     * {@inheritDoc}
     */
    public function getContactDetails()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getContactDetails', []);

        return parent::getContactDetails();
    }

    /**
     * {@inheritDoc}
     */
    public function setComments($comments)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setComments', [$comments]);

        return parent::setComments($comments);
    }

    /**
     * {@inheritDoc}
     */
    public function getComments()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getComments', []);

        return parent::getComments();
    }

    /**
     * {@inheritDoc}
     */
    public function setTaskReferenceId($taskReferenceId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTaskReferenceId', [$taskReferenceId]);

        return parent::setTaskReferenceId($taskReferenceId);
    }

    /**
     * {@inheritDoc}
     */
    public function getTaskReferenceId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTaskReferenceId', []);

        return parent::getTaskReferenceId();
    }

    /**
     * {@inheritDoc}
     */
    public function setProject(\BackendBundle\Entity\Project $project = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProject', [$project]);

        return parent::setProject($project);
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
    public function getProject()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProject', []);

        return parent::getProject();
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
