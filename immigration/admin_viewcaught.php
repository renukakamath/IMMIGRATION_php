<?php include 'adminheader.php' ?>
<div class="container-fluid p-0 mb-5 pb-5" >
    <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item position-relative active" style="height: 50vh; min-height: 10px;">
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
 <h1>View Caught</h1>
 <table class="table" style="width: 500px">
  <tr>
   <th>Sino</th>
   <th>User</th>
   <th>Criminal</th>
   <th>Date Time</th>
   <th>Officer</th>
   <th>Police</th>
   <th>status</th>
</tr>
<?php 

$q="SELECT * ,CONCAT (`police`.first_name,'-',`police`.last_name) AS police,CONCAT (`immigrationofficer`.first_name,'-',`immigrationofficer`.last_name) AS office,CONCAT(`user`.passport_no) AS users FROM caught INNER JOIN `user`  USING (user_id) INNER JOIN criminals USING (criminal_id) INNER JOIN immigrationofficer USING (officer_id) INNER JOIN police USING (police_id)";

$res=select($q);
$sino=1;
foreach ($res as $row) {
 ?>
 <tr>
  <td><?php echo $sino++; ?></td>
  <td><?php echo $row['users'] ?></td>
  <td><?php echo $row['passport_no'] ?></td>
  <td><?php echo $row['datetime'] ?></td>
  <td><?php echo $row['office'] ?></td>
  <td><?php echo $row['police'] ?></td>
  <td><?php echo $row['status'] ?></td>
</tr>
<?php 
}


?>
</table>
</center>
<?php include 'footer.php' ?>