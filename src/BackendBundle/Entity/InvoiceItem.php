<?php

namespace BackendBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * InvoiceItem
 */
class InvoiceItem
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $day;

    /**
     * @var string
     */
    private $details;

    /**
     * @var string
     */
    private $itemTotal;

    /**
     * @var \BackendBundle\Entity\Invoice
     */
    private $invoice;

    private $invoiceSubitem = array();


    public function __construct()
    {
        $this->invoiceSubitem = new ArrayCollection();
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return InvoiceItem
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set day
     *
     * @param string $day
     *
     * @return InvoiceItem
     */
    public function setDay($day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get day
     *
     * @return string
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Set details
     *
     * @param string $details
     *
     * @return InvoiceItem
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * Get details
     *
     * @return string
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Set itemTotal
     *
     * @param string $itemTotal
     *
     * @return InvoiceItem
     */
    public function setItemTotal($itemTotal)
    {
        $this->itemTotal = $itemTotal;

        return $this;
    }

    /**
     * Get itemTotal
     *
     * @return string
     */
    public function getItemTotal()
    {
        return $this->itemTotal;
    }

    /**
     * Set invoice
     *
     * @param \BackendBundle\Entity\Invoice $invoice
     *
     * @return InvoiceItem
     */
    public function setInvoice(\BackendBundle\Entity\Invoice $invoice = null)
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * Get invoice
     *
     * @return \BackendBundle\Entity\Invoice
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * @return mixed
     */
    public function getInvoiceSubitem()
    {
        return $this->invoiceSubitem;
    }

    /**
     * @param mixed $invoiceSubitem
     */
    public function addInvoiceSubitem(\BackendBundle\Entity\InvoiceSubitem $invoiceSubitem)
    {
        $this->invoiceSubitem[] = $invoiceSubitem;
    }

}

