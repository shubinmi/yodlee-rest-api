<?php

namespace YodleeRestApi\dto\response\objects;

use BaseHelpers\hydrators\ConstructFromArrayOrJson;

class AmountDto extends ConstructFromArrayOrJson
{
    /**
     * @var Amount
     */
    public $amount;

    /**
     * @var string
     */
    public $currency;

    public function __construct($params = null)
    {
        $this->amount = new Amount();
        parent::__construct($params);
    }

    /**
     * @return Amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param string|float $amount
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        try {
            $this->amount = (new Amount)->initAmountFromString($amount);
        } catch (\Exception $e) {
            $this->amount = (float)$amount;
        }
        return $this;
    }

}