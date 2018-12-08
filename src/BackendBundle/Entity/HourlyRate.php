<?php

namespace BackendBundle\Entity;

/**
 * HourlyRate
 */
class HourlyRate
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $timeCategory;

    /**
     * @var string
     */
    private $rate;


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
     * Set timeCategory
     *
     * @param string $timeCategory
     *
     * @return HourlyRate
     */
    public function setTimeCategory($timeCategory)
    {
        $this->timeCategory = $timeCategory;

        return $this;
    }

    /**
     * Get timeCategory
     *
     * @return string
     */
    public function getTimeCategory()
    {
        return $this->timeCategory;
    }

    /**
     * Set rate
     *
     * @param string $rate
     *
     * @return HourlyRate
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
}

