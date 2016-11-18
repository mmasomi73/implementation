<?php namespace App\Handler;


use App\Utilities\PersianDate;

class PersianDateHandler
{
    private $persianDate;


    public function __construct(PersianDate $persianDate)
    {
        $this->persianDate = $persianDate;
    }

    /**
     * this function will return number between 0 to 6
     * 0 = saturday , 6 = friday
     *
     * @return integer
     */
    public function getToadyCode()
    {
        return $this->persianDate->jdate('N');
    }


}