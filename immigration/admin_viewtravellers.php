<?php include 'adminheader.php' ?>
<div class="container-fluid p-0 mb-5 pb-5">
    <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item position-relative active"  style="height: 50vh; min-height: 10px;">
                <img class="position-absolute w-100 h-100" src="img/carousel-1.jpg" style="object-fit: cover;">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<center>
 <h1>View User</h1>
 <table class="table" style="width: 500px">
   <tr>
    <th>Sino</th>
    <th> Name</th>
    
    <th>Address</th>
    <th>Photo</th>
    <th>Place</th>
    <th>Phone</th>
    <th>Email</th>
    <th>Travelling From and to</th>
   
    <th>Luggage Weight</th>
    <th>Flight Name</th>
    <th>Flight No</th>
    <th>Passport No</th>
</tr>
<?php 

$q="SELECT *,CONCAT (first_name,' ',last_name) AS name,CONCAT (travelling_from,' ',travelling_to) AS fromandto FROM USER";
$res=select($q);
$sino=1;
foreach ($res as $row) {
 ?>
 <tr>
  <td><?php echo $sino++; ?></td>
  <td><?php echo $row['name'] ?></td>
 
  <td><?php echo $row['address'] ?></td>
  <td><img src="<?php echo $row['photo'] ?>" width="100" heigth="100"	></td>
  <td><?php echo $row['place'] ?></td>
  <td><?php echo $row['phone'] ?></td>
  <td><?php echo $row['email'] ?></td>
  <td><?php echo $row['fromandto'] ?></td>
  
  <td><?php echo $row['luggage_weight'] ?></td>
  <td><?php echo $row['flight_name'] ?></td>
  <td><?php echo $row['flight_no'] ?></td>
  <td><?php echo $row['passport_no'] ?></td>


</tr>
<?php 
}

?>
</table>

</center>
<?php include 'footer.php' ?>