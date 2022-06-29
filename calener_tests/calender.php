<?php

require 'calender_php.php';

$calender = new Calender();
$calender->setYear(2022);
$calender->setMonthNumber(6);

$calender->create();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calender</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<style>
    #the_modal
    {
        /* display: block; */
        /* color: wheat; */
        display: none; 
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
   background-color: black; /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

        .modal-content{
            height: 350px;
            width: 450px;
            margin: 0  auto ; 
            margin-top: 70px;
        }

        label{
            margin-top: 30px;
        }

        #add_event_btn{
            margin: 90px;
        }
</style>


<body>
    <table class="table-bordered" id="tblData">
        <thead>
            <tr>
                <?php foreach ($calender->getWeekDays() as $dayName) : ?>
                    <th>
                        <?php echo $dayName; ?>
                    </th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody id="the_tbody">
        <?php foreach ($calender->getWeeks() as $week) : ?>
            <tr>
                <?php foreach ($week as $dayNumber) : ?>
                    <td><?php echo $dayNumber; ?>
                    <!-- <span id="spnText"> s </span> -->
                </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>


    </table>
   

    <div id="the_modal" class="modal">
    <div class="modal-content">
    <div class="modal-header">
    <span id="close" class="close">&times;</span>
    <h4 class="modal-title">Modal Header</h4>
        </div>
                <div class="col-lg-12 ">
                   <form action="" class="form-group">
                    <label for="event_input">Enter Event:</label>
                    <input type="text" id="event_input" class="form-control">
                    <input type="button" id="add_event_btn" class="btn btn-primary mb-2" name="add_event_btn" value="add_event_btn">
                   </form>
                   </div>
    </div>
    </div>
    <script>
        $(document).ready(function() {

         

            $("#tblData tr:has(td)").click(function(e) {
                var clickedCell = $(e.target).closest("td");

               var  td_text= clickedCell.text();

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

                    $.ajax({
                    type: 'post',
                    url: 'index.php',
                    data: {
                        td_text:td_text,
                        event:event
                    },
                    success: function (response) {
                         $('#the_tbody').html(response);
                    }
                });

            });

               });

              

            });


         


    
    </script>

</body>

</html>