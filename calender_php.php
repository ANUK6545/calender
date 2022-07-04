<?php
// db connection file
include 'new_conn.php';


// calender class inheriting from datetime class
class Calender extends DateTime
{

    public $year;             // the year for calender
    public $monthNumber;      // the month
    public $weekDays=[        // the weekdays in alphabets
        'Sun','Mon','Tue','Wed','Thu','Fri','Sat'
    ];


    // returns the name of weekdays
    public function getWeekDay()
    {
        return $this->weekDays;
    }


    // returns the year
    public function getYear()
    {
        return $this-> year;
    }

    // sets the value of year to new value
    public function setYear($year)
    {
         $this->year = $year ;
    }

    //returns month in numeric 
    public function getMonthNumber()
    {
        return $this->monthNumber;
    } 

    // sets the value of month to new value
    public function setMonthNumber($month_option)
    {
        $this->monthNumber = $month_option ;
        //  $this->monthNumber = $monthNumber ;
    } 

// returns all days in the month in 7 day divided format
    public function getWeeks()
    {
        return $this -> weeks;
    }


    // creates the calender 
    public function create()
    {
        // passing the values in setdate in order to set the date to input values
        $date = $this-> setDate($this->getYear(), $this->getMonthNumber(),1);
        
        // value of how many days in the month 
        $daysInMonth = $date-> format('t');

        // the numeric value of the first day of month 
        $dayMonthStarts = $date->format('N');
        // var_dump($daysInMonth);
        // die;

        // var_dump($dayMonthStarts);
        // exit;

        // filling empty spaces in the days prior to start of month
        $days = array_fill(1,$dayMonthStarts,'');

        // filling the rest of days 
        for ($x =1 ; $x <= $daysInMonth; $x++){
            $days[] = $x;
        }

        // filling days in arrays with 7 days each
        $this-> weeks = array_chunk($days, 7);

    }


    public function even_data($month)
    {
        global $conn;
        $data = array();
        $query = "SELECT * FROM calener  ";
        $exec_q = mysqli_query($conn,$query);
        
        while($row = $exec_q->fetch_assoc()){
           
            $data[($row['e_day'])] = $row ;

        }
        return $data ;
    }
  

}

?>