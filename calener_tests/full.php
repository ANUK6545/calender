<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
        table {
 font-family: arial, sans-serif;
 border-collapse: collapse;
 width: 100%;
}
td,
th {
 border: 1px solid #dddddd;
 text-align: left;
 padding: 8px;
}
th {
 background-color: #ccd;
}
tr:nth-child(even) {
 background-color: #dddddd;
}
tr:nth-child(odd) {
 background-color: #ddeedd;
}
.highlight {
 background-color: Yellow;
 color: Green;
}
    </style>

   
</head>
<body>
<table id="tblData">
<tr>
<th>Name</th>
<th>Age</th>
<th>Country</th>
</tr>
<tr>
<td>Maria Anders</td>
<td>30</td>
<td>Germany</td>
</tr>
<tr>
<td>Francisco Chang</td>
<td>24</td>
<td>Mexico</td>
</tr>
<tr>
<td>Roland Mendel</td>
<td>100</td>
<td>Austria</td>
</tr>
<tr>
<td>Helen Bennett</td>
<td>28</td>
<td>UK</td>
</tr>
<tr>
<td>Yoshi Tannamuri</td>
<td>35</td>
<td>Canada</td>
</tr>
<tr>
<td>Giovanni Rovelli</td>
<td>46</td>
<td>Italy</td>
</tr>
<tr>
<td>Alex Smith</td>
<td>59</td>
<td>USA</td>
</tr>
</table>
<br/>
<span id="spnText"></span>

<script>
   $(document).ready(function() {

 $("#tblData tr:has(td)").click(function(e) {
 var clickedCell= $(e.target).closest("td");
 
 $("#spnText").html(
 'Clicked table cell value is: <b> ' + clickedCell.text() + '</b>');
 });
});
    </script>

</body>
</html>