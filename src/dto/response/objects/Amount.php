<?php

namespace YodleeRestApi\dto\response\objects;

use BaseHelpers\hydrators\ConstructFromArrayOrJson;

class Amount extends ConstructFromArrayOrJson
{
    const PATTERN = '/^\d+(\.\d{1,2})?$/';

    /**
     * @var int
     */
    protected $beforeDot = 0;

    /**
     * @var string
     */
    protected $afterDot = '00';

    /**
     * @return int
     */
    public function getBeforeDot()
    {
        return (int)$this->beforeDot;
    }

    /**
     * @param int $beforeDot
     *
     * @return $this
     */
    public function setBeforeDot($beforeDot)
    {
        $this->beforeDot = (int)trim($beforeDot);
        return $this;
    }

    /**
     * @return string
     */
    public function getAfterDot()
    {
        if (strlen($this->afterDot) > 2) {
            $this->afterDot = substr($this->afterDot, 0, 2);
        } elseif (strlen($this->afterDot) == 1) {
            $this->afterDot = $this->afterDot . '0';
        }
        return $this->afterDot;
    }

    /**
     * @param string $afterDot
     *
     * @return $this
     */
    public function setAfterDot($afterDot = '')
    {
        if (isset($afterDot[0])) {
            $this->afterDot = (int)$afterDot[0];
        }
        if (isset($afterDot[1])) {
            $this->afterDot .= (int)$afterDot[1];
        }
        return $this;
    }

    /**
     * @param string $amount
     *
     * @return $this
     * @throws \Exception
     */
    public function initAmountFromString($amount)
    {
        $amount = explode('.', (string)$amount);
        if (count($amount) == 2) {
            $this->setBeforeDot($amount[0])->setAfterDot($amount[1]);
        } elseif (count($amount) == 1) {
            $this->setBeforeDot($amount[0]);
        } else {
            throw new \Exception('Incorrect format of amount. Got ' . $amount);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getFullSum()
    {
        return $this->getBeforeDot() . '.' . $this->getAfterDot();
    }
}