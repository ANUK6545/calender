<?php

class Calender extends DateTime
{

    protected $year;
    protected $monthNumber;
    protected $weekDays=[
        'Sun','Mon','Tues','Wed','Thru','Fri','Sat'
    ];
    protected $weeeks =[];

    public function getWeekDays()
    {
        return $this->weekDays;
    }

    public function getYear()
    {
        return $this-> year;
    }

    public function setYear($year)
    {
         $this-> year = $year ;
    }

    public function getMonthNumber()
    {
        return $this->monthNumber;
    } 

    public function setMonthNumber($monthNumber)
    {
         $this->monthNumber = $monthNumber ;
    } 

    public function getWeeks()
    {
        return $this -> weeks;
    }

    public function create()
    {
        $date = $this-> setDate($this->getYear(), $this->getMonthNumber(),1);
        $daysInMonth = $date-> format('t');
        $dayMonthStarts = $date->format('N');
        // var_dump($daysInMonth);
        // die;


        // var_dump($dayMonthStarts);
        // exit;

        $days = array_fill(0,$dayMonthStarts,'');

        for ($x =1 ; $x<= $daysInMonth; $x++){
            $days[]=$x;
        }

        $this-> weeks = array_chunk($days, 7);

    }


}

?>