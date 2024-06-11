<?php include 'officerheader.php';
$oid=$_SESSION['officer_id'];
extract($_GET);

if (isset($_POST['cau'])) {
	extract($_POST);

	$q="select * from caught where  officer_id='$oid' ";
	$res=select($q);
	if (sizeof($res)>0) {
		alert('already exist');
	}else{

	$q2="insert into caught values(null,'$uid','$cid','$oid','$po',now(),'pending')";
	insert($q2);
}
}



 ?>
 <div class="container-fluid p-0 mb-5 pb-5">
	<div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item position-relative active"  style="height: 100vh; min-height: 400px;">
				<img class="position-absolute w-100 h-100" src="img/carousel-1.jpg" style="object-fit: cover;">
				<div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
					<div class="p-3" style="max-width: 900px;">

<center>
	<h1 style="color: white">Send found criminal notification</h1>
	<form method="post">
		<table class="table" style="color: white">
			<tr>
				<th>Police</th>
				<td><select name="po" class="form-control">
					<?php 


               $q="select * from police";
               $res=select($q);
               foreach ($res as $row) {
               	?>
               	 <option value="<?php echo $row['police_id'] ?>"><?php echo $row['first_name'] ?></option>
              <?php 
               }
               
?>
					
				</select></td>
			</tr>
			<tr>
				<td><input type="submit" name="cau" class="btn btn-success" value="submit"></td>
			</tr>
		</table>
	</form>
</center>
			</div>
				</div>
			</div>
		</div>
	</div>
</div>

<center>
	<h1>View Caught</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>User</th>
				<th>Criminal</th>
				<th>Date & Time</th>
				<th>Officer</th>
				<th>Police</th>
				<th>Status</th>
				<?php 

              $q="SELECT * ,CONCAT (`police`.first_name,'-',`police`.last_name) AS police,CONCAT (`immigrationofficer`.first_name,'-',`immigrationofficer`.last_name) AS office,CONCAT(`user`.passport_no) AS users FROM caught INNER JOIN `user`  USING (user_id) INNER JOIN criminals USING (criminal_id) INNER JOIN immigrationofficer USING (officer_id) INNER JOIN police USING (police_id) ";
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
                    <?php 
                      if ($row['status']=="caught") {
                      	?>
                     <td><a class="btn btn-success" href="officer_viewmessage.php?pid=<?php echo $row['police_id'] ?>">View Message</a></td>
                  <?php  
                     }



                     ?>
                    <td><?php echo $row['status'] ?></td>
              	</tr>
          <?php  
           }



				 ?>
			</tr>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>