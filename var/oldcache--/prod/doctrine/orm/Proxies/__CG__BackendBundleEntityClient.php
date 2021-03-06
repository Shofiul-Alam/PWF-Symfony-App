<?php

namespace Proxies\__CG__\BackendBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Client extends \BackendBundle\Entity\Client implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'id', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'companyName', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'contactPerson', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'companyAbnNo', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'companyAcn', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'companyTfn', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'landlineNo', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'mobileNo', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'accountPayableNo', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'accountPayableEmail', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'accountPayablePersonDetails', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'creditLimit', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'invoiceDueDate', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'comments', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'chargeRates', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'inductions', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'extra', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'archived', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'user', 'firstTime', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'allocatedContact', 'splicedAllocatedContact'];
        }

        return ['__isInitialized__', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'id', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'companyName', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'contactPerson', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'companyAbnNo', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'companyAcn', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'companyTfn', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'landlineNo', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'mobileNo', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'accountPayableNo', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'accountPayableEmail', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'accountPayablePersonDetails', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'creditLimit', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'invoiceDueDate', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'comments', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'chargeRates', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'inductions', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'extra', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'archived', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'user', 'firstTime', '' . "\0" . 'BackendBundle\\Entity\\Client' . "\0" . 'allocatedContact', 'splicedAllocatedContact'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Client $proxy) {
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
    public function getRemoveArr()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRemoveArr', []);

        return parent::getRemoveArr();
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
    public function setCompanyName($companyName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCompanyName', [$companyName]);

        return parent::setCompanyName($companyName);
    }

    /**
     * {@inheritDoc}
     */
    public function getCompanyName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCompanyName', []);

        return parent::getCompanyName();
    }

    /**
     * {@inheritDoc}
     */
    public function setContactPerson($contactPerson)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setContactPerson', [$contactPerson]);

        return parent::setContactPerson($contactPerson);
    }

    /**
     * {@inheritDoc}
     */
    public function getContactPerson()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getContactPerson', []);

        return parent::getContactPerson();
    }

    /**
     * {@inheritDoc}
     */
    public function setCompanyAbnNo($companyAbnNo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCompanyAbnNo', [$companyAbnNo]);

        return parent::setCompanyAbnNo($companyAbnNo);
    }

    /**
     * {@inheritDoc}
     */
    public function getCompanyAbnNo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCompanyAbnNo', []);

        return parent::getCompanyAbnNo();
    }

    /**
     * {@inheritDoc}
     */
    public function setCompanyAcn($companyAcn)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCompanyAcn', [$companyAcn]);

        return parent::setCompanyAcn($companyAcn);
    }

    /**
     * {@inheritDoc}
     */
    public function getCompanyAcn()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCompanyAcn', []);

        return parent::getCompanyAcn();
    }

    /**
     * {@inheritDoc}
     */
    public function setCompanyTfn($companyTfn)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCompanyTfn', [$companyTfn]);

        return parent::setCompanyTfn($companyTfn);
    }

    /**
     * {@inheritDoc}
     */
    public function getCompanyTfn()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCompanyTfn', []);

        return parent::getCompanyTfn();
    }

    /**
     * {@inheritDoc}
     */
    public function setLandlineNo($landlineNo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLandlineNo', [$landlineNo]);

        return parent::setLandlineNo($landlineNo);
    }

    /**
     * {@inheritDoc}
     */
    public function getLandlineNo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLandlineNo', []);

        return parent::getLandlineNo();
    }

    /**
     * {@inheritDoc}
     */
    public function setMobileNo($mobileNo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMobileNo', [$mobileNo]);

        return parent::setMobileNo($mobileNo);
    }

    /**
     * {@inheritDoc}
     */
    public function getMobileNo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMobileNo', []);

        return parent::getMobileNo();
    }

    /**
     * {@inheritDoc}
     */
    public function setAccountPayableNo($accountPayableNo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAccountPayableNo', [$accountPayableNo]);

        return parent::setAccountPayableNo($accountPayableNo);
    }

    /**
     * {@inheritDoc}
     */
    public function getAccountPayableNo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAccountPayableNo', []);

        return parent::getAccountPayableNo();
    }

    /**
     * {@inheritDoc}
     */
    public function setAccountPayableEmail($accountPayableEmail)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAccountPayableEmail', [$accountPayableEmail]);

        return parent::setAccountPayableEmail($accountPayableEmail);
    }

    /**
     * {@inheritDoc}
     */
    public function getAccountPayableEmail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAccountPayableEmail', []);

        return parent::getAccountPayableEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function setAccountPayablePersonDetails($accountPayablePersonDetails)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAccountPayablePersonDetails', [$accountPayablePersonDetails]);

        return parent::setAccountPayablePersonDetails($accountPayablePersonDetails);
    }

    /**
     * {@inheritDoc}
     */
    public function getAccountPayablePersonDetails()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAccountPayablePersonDetails', []);

        return parent::getAccountPayablePersonDetails();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreditLimit($creditLimit)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreditLimit', [$creditLimit]);

        return parent::setCreditLimit($creditLimit);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreditLimit()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreditLimit', []);

        return parent::getCreditLimit();
    }

    /**
     * {@inheritDoc}
     */
    public function setInvoiceDueDate($invoiceDueDate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setInvoiceDueDate', [$invoiceDueDate]);

        return parent::setInvoiceDueDate($invoiceDueDate);
    }

    /**
     * {@inheritDoc}
     */
    public function getInvoiceDueDate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getInvoiceDueDate', []);

        return parent::getInvoiceDueDate();
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
    public function setChargeRates($chargeRates)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setChargeRates', [$chargeRates]);

        return parent::setChargeRates($chargeRates);
    }

    /**
     * {@inheritDoc}
     */
    public function getChargeRates()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getChargeRates', []);

        return parent::getChargeRates();
    }

    /**
     * {@inheritDoc}
     */
    public function setInductions($inductions)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setInductions', [$inductions]);

        return parent::setInductions($inductions);
    }

    /**
     * {@inheritDoc}
     */
    public function getInductions()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getInductions', []);

        return parent::getInductions();
    }

    /**
     * {@inheritDoc}
     */
    public function setExtra($extra)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setExtra', [$extra]);

        return parent::setExtra($extra);
    }

    /**
     * {@inheritDoc}
     */
    public function getExtra()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getExtra', []);

        return parent::getExtra();
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
    public function isFirstTime()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isFirstTime', []);

        return parent::isFirstTime();
    }

    /**
     * {@inheritDoc}
     */
    public function setFirstTime($firstTime)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFirstTime', [$firstTime]);

        return parent::setFirstTime($firstTime);
    }

    /**
     * {@inheritDoc}
     */
    public function setUser(\BackendBundle\Entity\User $user = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUser', [$user]);

        return parent::setUser($user);
    }

    /**
     * {@inheritDoc}
     */
    public function getUser()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUser', []);

        return parent::getUser();
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
    public function getCompanyShortName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCompanyShortName', []);

        return parent::getCompanyShortName();
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
