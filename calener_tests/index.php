<?php 
include 'new_conn.php';

require 'calender_php.php';

$calender = new Calender();
$calender->setYear(2022);
$calender->setMonthNumber(6);

$calender->create();



$d = $_POST['td_text'];
$ddd = '2022-06-'.$d.'';
//   echo "ye php se aaya $ddd";
 $dd = $_POST['event'];
//  echo "event $dd";


$insert_event = "INSERT INTO `calener`(`event` , `datee` ) VALUES ('$dd', '$ddd' )";

$exe_inser_event = mysqli_query($conn,$insert_event);

// echo $insert_event;

$w = 'select * from `calener` ';
$ew = mysqli_query($conn,$w);
$tows = mysqli_fetch_assoc($ew);


?>

<table class="table-bordered" id="tblData">
        <tbody id="the_tbody">
        <?php foreach ($calender->getWeeks() as $week) : ?>
            <tr>
                <?php
                foreach ($week as $dayNumber): ?>
                    <td><?php echo $dayNumber;
                      $w = "select event from `calener` where day(`datee`) = '.$dayNumber.' ";
                      $ew = mysqli_query($conn,$w);
                      
                    ?>
                    
                </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach;    ?>
        </tbody>


    </table>
   



