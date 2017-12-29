<?php

namespace YodleeRestApi\dto\response\objects;

use BaseHelpers\hydrators\ConstructFromArrayOrJson;

class RefreshInfoDto extends ConstructFromArrayOrJson
{
    /**
     * @var string
     */
    public $lastRefreshed;

    /**
     * @var string
     */
    public $lastRefreshAttempt;

    /**
     * @var string
     */
    public $nextRefreshScheduled;

    /**
     * @return string
     */
    public function getLastRefreshed()
    {
        return $this->lastRefreshed;
    }

    /**
     * @param string $lastRefreshed
     *
     * @return $this
     */
    public function setLastRefreshed($lastRefreshed)
    {
        $this->lastRefreshed = $lastRefreshed;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastRefreshAttempt()
    {
        return $this->lastRefreshAttempt;
    }

    /**
     * @param string $lastRefreshAttempt
     *
     * @return $this
     */
    public function setLastRefreshAttempt($lastRefreshAttempt)
    {
        $this->lastRefreshAttempt = $lastRefreshAttempt;
        return $this;
    }

    /**
     * @return string
     */
    public function getNextRefreshScheduled()
    {
        if (($date = strtotime($this->nextRefreshScheduled)) === false) {
            $date = $this->nextRefreshScheduled;
        } else {
            $date = date('Y-m-d H:i:s', $date);
        }
        return $date;
    }

    /**
     * @param string $nextRefreshScheduled
     *
     * @return $this
     */
    public function setNextRefreshScheduled($nextRefreshScheduled)
    {
        $this->nextRefreshScheduled = $nextRefreshScheduled;
        return $this;
    }
}