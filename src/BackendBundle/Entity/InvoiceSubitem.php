<?php

namespace BackendBundle\Entity;

/**
 * InvoiceSubitem
 */
class InvoiceSubitem
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $details;

    /**
     * @var integer
     */
    private $quantity;

    /**
     * @var string
     */
    private $rate;

    /**
     * @var string
     */
    private $price;

    /**
     * @var \BackendBundle\Entity\InvoiceItem
     */
    private $invoiceItem;


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
     * Set details
     *
     * @param string $details
     *
     * @return InvoiceSubitem
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
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return InvoiceSubitem
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set rate
     *
     * @param string $rate
     *
     * @return InvoiceSubitem
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get rate
     *
     * @return string
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return InvoiceSubitem
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set invoiceItem
     *
     * @param \BackendBundle\Entity\InvoiceItem $invoiceItem
     *
     * @return InvoiceSubitem
     */
    public function setInvoiceItem(\BackendBundle\Entity\InvoiceItem $invoiceItem = null)
    {
        $this->invoiceItem = $invoiceItem;

        return $this;
    }

    /**
     * Get invoiceItem
     *
     * @return \BackendBundle\Entity\InvoiceItem
     */
    public function getInvoiceItem()
    {
        return $this->invoiceItem;
    }
}

