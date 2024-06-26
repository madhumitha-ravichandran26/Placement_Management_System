<?php
$db_hostname="127.0.0.1";
$db_username="root";
$db_password="";
$db_name="pms";

$conn=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
if(!$conn) { 
    echo "Connection failed: ".mysqli_connect_error(); 
    exit;
}

$sql= "SELECT*FROM job";
$result=mysqli_query($conn,$sql);
if(!$result)
{
    echo "Error:" .mysqli_error($conn);
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="icon" type="image/x-icon" href="img/logo.jpg">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Hedvig+Letters+Serif:opsz@12..24&family=Merriweather:wght@400;900&family=Red+Hat+Display&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Red+Hat+Display&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/view_job.css">
    
<title>View Jobs</title>
<style>
    .frame{
        border:5px solid black;
        width:500px;
        height:auto;
       padding:10px;
       margin: auto;
    }

    button{     
        margin: 2px;
        text-align: center;
        padding: auto;
        font-size: 12px; 
        display: flex;    
    }
  
    .vc{
        margin: 10px;
    }

    .fa{
        color: aliceblue;
        height: auto;
        padding-right: 5px;
    }
    th{
    background-color:#2b2929;
    border: 2px black solid;
    text-align: center;
    color: beige;
  }

  td{
     border: 2px black solid;
  }

tr:nth-child(even){
    height:auto;
    width: 100%;
    word-wrap: break-word;
    border: 2px black solid;
    background-color:rgb(255, 255, 232);
}

tr:nth-child(odd){
    height:auto;
    width: 100%;
    word-wrap: break-word;
    border: 2px black solid;
    background-color:rgb(213, 213, 169);
}

</style>

</head>
<body>
<div class="head1">
    <div class="head2">
      <img src="img/project_logo.png" class="logo">
</div>
    
<div class="head3">
  
    </div>

    <div class="head4">              
        <img src="img/user.jpg" id="user"  style="height: 50px;">
        <a href="login.html" class="logout"> Logout </a>  
    </div>

</div>

<div class="vc">
    <?php
    echo "<center>";
    echo"<h1>Companies</h1>";
    
    $sql= "SELECT*FROM job";
    $result=mysqli_query($conn,$sql);
  

    echo " <table border='2' style='border: 2px solid black; border-collapse: collapse;'>
    <tr>
    <th >Job_Id</th>
    <th>Company</th>
    <th>Role</th>
    <th>Domain</th>
    <th>Salary</th>
    <th>Location</th>
    <th>Description</th>
    <th>Apply link</th>
    <th> </th>
    
    </tr>";
    
    while($row=mysqli_fetch_assoc($result))
    {
        echo "<tr>";
        echo "<td>" . $row['job_id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['role'] . "</td>";
        echo "<td>" . $row['domain'] . "</td>";
        echo "<td>" . $row['salary'] . "</td>";
        echo "<td>" . $row['location'] . "</td>";
        echo "<td>" . $row['description'] . "</td>";
        echo "<td> <button onclick=\"window.open('". $row['link'] ."','_blank')\"> APPLY HERE</button> </td>
        <td>   
        <button style='background-color:green' onclick=\"editRow('" . $row['job_id'] . "')\"> 
        <span class='material-symbols-outlined'>edit</span><b>EDIT</b> </button>

        <button style='background-color:red' onclick=\"deleteRow('" . $row['job_id'] . "')\">
        <span class='material-symbols-outlined'>delete</span> <b>  DELETE </b></button>
       </td>";
       echo "</tr>";
    }

    echo"</table>";
    echo"</center>";?>


<br>
<div class="frame">
<?php
$sql4= "SELECT COUNT(*) as Domain FROM job";
$result4=mysqli_query($conn,$sql4);
if(!$result4)
{
    echo "Error:" .mysqli_error($conn);
    exit;
}
?>

<?php
$row4=mysqli_fetch_assoc($result4);
echo "<p><b>Total number of companies:</b>" ."  " .$row4['Domain']. "</p>";
//-----------------------------------------------------------
?>

<?php
$sql5= "SELECT COUNT(domain) as Management_domain FROM job WHERE domain='Management'";
$result5=mysqli_query($conn,$sql5);
if(!$result5)
{
    echo "Error:" .mysqli_error($conn);
    exit;
}
?>

<?php
$row5=mysqli_fetch_assoc($result5);
echo "<p><b>Total number of companies under Management domain:</b>" ."  " .$row5['Management_domain']. "</p>";

//----------------------------------

$sql6= "SELECT COUNT(domain) as IT_domain FROM job WHERE domain='IT'";
$result6=mysqli_query($conn,$sql6);
if(!$result6)
{
    echo "Error:" .mysqli_error($conn);
    exit;
}

$row6=mysqli_fetch_assoc($result6);
echo "<p><b>Total number of companies under IT domain:</b>" ."  " .$row6['IT_domain']. "</p>";
?>


<?php

//----------------------------------
$sql7= "SELECT COUNT(domain) as Sales_domain FROM job WHERE domain='Sales'";
$result7=mysqli_query($conn,$sql7);
if(!$result7)
{
    echo "Error:" .mysqli_error($conn);
    exit;
}

$row7=mysqli_fetch_assoc($result7);
echo "<p><b>Total number of companies under Sales domain:</b>" ."  " .$row7['Sales_domain']. "</p>";
    mysqli_close($conn);    
    ?> 
</div>   
    <br>
    <div class="view">
    
    <a href="admin.html" >
        <button class="btn">BACK</button></a>
    <a href="add_job.html" >
        <button class="btn">ADD JOB</button></a>
</div>

</div>
<script>
    function deleteRow(id) {
        if (confirm("Are you sure you want to delete this job?")) {
            window.location.href = "delete_job.php?id=" + id;
        }
    }

    function editRow(id) {
        if (confirm("Are you sure you want to edit this job?")) {
            window.location.href = "edit_job.php?id=" + id;
        }
    }
</script>
    
</body>
</html>
