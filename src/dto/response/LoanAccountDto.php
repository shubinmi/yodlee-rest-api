<?php

namespace YodleeRestApi\dto\response;

use BaseHelpers\hydrators\ConstructFromArrayOrJson;
use YodleeRestApi\dto\response\objects\AmountDto;
use YodleeRestApi\dto\response\objects\RefreshInfoDto;

class LoanAccountDto extends ConstructFromArrayOrJson
{
    /**
     * @var int
     */
    public $providerAccountId;

    /**
     * @var int
     */
    public $id;

    /**
     * @var int
     */
    public $providerId;

    /**
     * @var string
     */
    public $providerName;

    /**
     * @var string
     */
    public $lastUpdated;

    /**
     * @var AmountDto
     */
    public $balance;

    /**
     * @var AmountDto
     */
    public $amountDue;

    /**
     * @var string
     */
    public $dueDate;

    /**
     * @var AmountDto
     */
    public $minimumAmountDue;

    /**
     * @var AmountDto
     */
    public $availableCredit;

    /**
     * @var string
     */
    public $maturityDate;

    /**
     * @var AmountDto
     */
    public $originalLoanAmount;

    /**
     * @var string
     */
    public $originationDate;

    /**
     * @var string
     */
    public $createdDate;

    /**
     * @var RefreshInfoDto
     */
    public $refreshInfo;

    /**
     * @var string
     */
    public $accountName;

    /**
     * @var string
     */
    public $accountNumber;

    /**
     * @var bool
     */
    public $isAsset;

    /**
     * @var string
     */
    public $holderProfile;

    /**
     * @var string
     */
    public $accountType;

    /**
     * @var string
     */
    public $interestRate;

    public function __construct($params = null)
    {
        parent::__construct($params);
    }

    /**
     * @return int
     */
    public function getProviderAccountId()
    {
        return $this->providerAccountId;
    }

    /**
     * @param int $providerAccountId
     *
     * @return $this
     */
    public function setProviderAccountId($providerAccountId)
    {
        $this->providerAccountId = $providerAccountId;
        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getProviderId()
    {
        return $this->providerId;
    }

    /**
     * @param int $providerId
     *
     * @return $this
     */
    public function setProviderId($providerId)
    {
        $this->providerId = $providerId;
        return $this;
    }

    /**
     * @return string
     */
    public function getProviderName()
    {
        return $this->providerName;
    }

    /**
     * @param string $providerName
     *
     * @return $this
     */
    public function setProviderName($providerName)
    {
        $this->providerName = $providerName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastUpdated()
    {
        if (($date = strtotime($this->lastUpdated)) === false) {
            $date = $this->lastUpdated;
        } else {
            $date = date('Y-m-d H:i:s', $date);
        }
        return $date;
    }

    /**
     * @param string $lastUpdated
     *
     * @return $this
     */
    public function setLastUpdated($lastUpdated)
    {
        $this->lastUpdated = $lastUpdated;
        return $this;
    }

    /**
     * @return AmountDto
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param string|array $balance
     *
     * @return $this
     */
    public function setBalance($balance)
    {
        $this->balance = new AmountDto($balance);
        return $this;
    }

    /**
     * @return AmountDto
     */
    public function getAmountDue()
    {
        return $this->amountDue;
    }

    /**
     * @param string|array $amountDue
     *
     * @return $this
     */
    public function setAmountDue($amountDue)
    {
        $this->amountDue = new AmountDto($amountDue);
        return $this;
    }

    /**
     * @return string
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * @param string $dueDate
     *
     * @return $this
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;
        return $this;
    }

    /**
     * @return AmountDto
     */
    public function getMinimumAmountDue()
    {
        return $this->minimumAmountDue;
    }

    /**
     * @param string|array $minimumAmountDue
     *
     * @return $this
     */
    public function setMinimumAmountDue($minimumAmountDue)
    {
        $this->minimumAmountDue = new AmountDto($minimumAmountDue);
        return $this;
    }

    /**
     * @return AmountDto
     */
    public function getAvailableCredit()
    {
        return $this->availableCredit;
    }

    /**
     * @param string|array $availableCredit
     *
     * @return $this
     */
    public function setAvailableCredit($availableCredit)
    {
        $this->availableCredit = new AmountDto($availableCredit);
        return $this;
    }

    /**
     * @return string
     */
    public function getMaturityDate()
    {
        return $this->maturityDate;
    }

    /**
     * @param string $maturityDate
     *
     * @return $this
     */
    public function setMaturityDate($maturityDate)
    {
        $this->maturityDate = $maturityDate;
        return $this;
    }

    /**
     * @return AmountDto
     */
    public function getOriginalLoanAmount()
    {
        return $this->originalLoanAmount;
    }

    /**
     * @param string|array $originalLoanAmount
     *
     * @return $this
     */
    public function setOriginalLoanAmount($originalLoanAmount)
    {
        $this->originalLoanAmount = new AmountDto($originalLoanAmount);
        return $this;
    }

    /**
     * @return string
     */
    public function getOriginationDate()
    {
        return $this->originationDate;
    }

    /**
     * @param string $originationDate
     *
     * @return $this
     */
    public function setOriginationDate($originationDate)
    {
        $this->originationDate = $originationDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * @param string $createdDate
     *
     * @return $this
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
        return $this;
    }

    /**
     * @return RefreshInfoDto
     */
    public function getRefreshInfo()
    {
        return $this->refreshInfo;
    }

    /**
     * @param string|array $refreshInfo
     *
     * @return $this
     */
    public function setRefreshInfo($refreshInfo)
    {
        $this->refreshInfo = new RefreshInfoDto($refreshInfo);
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountName()
    {
        return $this->accountName;
    }

    /**
     * @param string $accountName
     *
     * @return $this
     */
    public function setAccountName($accountName)
    {
        $this->accountName = $accountName;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isIsAsset()
    {
        return $this->isAsset;
    }

    /**
     * @param boolean $isAsset
     *
     * @return $this
     */
    public function setIsAsset($isAsset)
    {
        $this->isAsset = $isAsset;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHolderProfile()
    {
        return $this->holderProfile;
    }

    /**
     * @param mixed $holderProfile
     *
     * @return $this
     */
    public function setHolderProfile($holderProfile)
    {
        $this->holderProfile =
            empty($holderProfile[0]['name']['displayed']) ? null : $holderProfile[0]['name']['displayed'];
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountType()
    {
        return $this->accountType;
    }

    /**
     * @param string $accountType
     *
     * @return $this
     */
    public function setAccountType($accountType)
    {
        $this->accountType = $accountType;
        return $this;
    }

    /**
     * @return string
     */
    public function getInterestRate()
    {
        return $this->interestRate;
    }

    /**
     * @param string $interestRate
     *
     * @return $this
     */
    public function setInterestRate($interestRate)
    {
        $this->interestRate = $interestRate;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * @param string $accountNumber
     *
     * @return $this
     */
    public function setAccountNumber($accountNumber)
    {
        $this->accountNumber = $accountNumber;
        return $this;
    }
}