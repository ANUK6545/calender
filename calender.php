<?php
include 'new_conn.php';
require 'calender_php.php';


//creating a calender() object
$calender = new Calender();

// calling the setYear function and passing the value
$calender->setYear(2022);

// setting the month 
$calender->setMonthNumber('6');

//creating the calender
$calender->create();

$even_data = $calender->even_data('');
// echo "<pre>"; print_r($even_data);

// echo "<pre>"; print_r( $calender->getWeeks()); exit; 


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calender</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.min.css" class="css">
<link rel="stylesheet" href="styles.css" class="css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

<!--  -->
<div id="select_box">
            <select onchange="fetch_select(this.value);" id = "select_month" >
                <option value="" class="disabled">-- select month --</option>
                <option value="1">Jan</option>
                <option value="2">Feb</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">Jun</option>
                <option value="7">July</option>
                <option value="8">Aug</option>
                <option value="9">Sept</option>
                <option value="10">Oct</option>
                <option value="11">Nov</option>
                <option value="12">Dec</option>
            </select>
        </div>
        <p id="print-ajax"></p>

    <h1>Calendar</h1>
    <table class="table table-bordered" id="tblData">
        <thead>
            <tr>
                <?php foreach ($calender->getWeekDay() as $dayName) : ?>
                    <th>
                        <?php echo $dayName; ?>
                    </th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody id="the_tbody">
        <?php 
   
            foreach ($calender->getWeeks() as $week) : ?>
                     <tr>
                <?php
                foreach ($week as $dayNumber): ?>
                  
                    <td data-mnth="<?php echo $dayNumber?$dayNumber:" ";?>"><?php echo $dayNumber;?>
                    <?php if(isset($even_data[$dayNumber]['event'])){echo $even_data[$dayNumber]['event'];} ?>
                </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>


    </table>
   
    <div id="the_modal" class="modal">
    <div class="modal-content">
    <div class="modal-header">
    <h4 class="modal-title">Add Event</h4>

    <span id="close" class="close">&times;</span>
        </div>
                <div class="col-lg-12 ">
                   <form action="" class="form-group">
                    <label for="">Enter Event:</label>
                    <input type="text" id="event_input" class="form-control"  placeholder="Event">
                    <input type="button" id="add_event_btn" class="btn btn-primary mb-2" name="add_event_btn" value="Add event">
                   </form>
                   </div>
    </div>
    </div>

     <script>

                    var option = getElementById('#select_month');
            // 
            // function fetch_select(val){
            //     $.ajax({
            //         type: 'post',
            //         url: 'index.php',
            //         data: {option:val},
            //         success: function (response) {
            //             $('#print-ajax').html(response);
            //         }
            //     });
            // } 

      $( document ).ready(function() {
        

            $("#tblData tr:has(td)").click(function(e) {
            var clickedCell = $(e.target).closest("td");

            var  td_text= clickedCell.attr('data-mnth');

            

            var modalObject =  document.getElementById("the_modal");
               modalObject.style.display = "block";

               $("#close").click(function(){
               modalObject.style.display = "none"; });
           
                // console.log(td_text);
                // console.log(clickedCell.text());
                // $("#spnText").html(
                //'Clicked table cell value is: <b> ' + clickedCell.text() + '</b>');
            
                $("#add_event_btn").click(function(){
                    var event = document.getElementById("event_input").value;
                    modalObject.style.display = "none"; 
                  
                    $.ajax({
                    type: 'post',
                    url: 'index.php',
                    data: {
                        td_text:td_text,
                        event:event
                    },
                    success: function (response) {
                         $('#tblData').html(response);
                         window.location.reload();
                    }
                });



            });
            
               });
               });

              
         


         


    
    </script> 

</body>

</html>