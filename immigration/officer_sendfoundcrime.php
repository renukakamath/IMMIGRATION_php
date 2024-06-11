<?php include 'officerheader.php' ;

if (isset($_GET['pid'])) {
	extract($_GET);

	echo$q1="select * from criminals where passport_no='$pid'";
	$r=select($q1);
	if (sizeof($r)==0) 
	{
		alert('not criminal');
		return redirect('officer_sendfoundcrime.php');

	}
	else{
		$cid=$r[0]['criminal_id'];
		echo $cid;
		return redirect("officer_check.php?uid=$uid&cid=$cid");
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
							<h1 style="color: white">Clear immigration</h1>
							<form method="post">
								<table class="table" style="width:500px;color: white">
								<tr>
										<th> Passport No:</th>
										<td><input type="text" required="" class="form-control" name="fn"></td>
									</tr>
									<tr>
										<td align="center" colspan="2"><input type="submit" name="caught" class="btn btn-success" value="submit"></td>
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
    <br><br>
<h1>View User</h1>
<form method="post">
	<table class="table" style="width: 500px">
		  <tr>
           <th>Sino</th>
            <th>Passport No</th>
            <th>Firt Name</th>
            <th>Last Name</th>
            <th>Place</th>
            <th>Email</th>
            <th>Travelling from </th>
           <th>Tavelling To</th>

            <th>Photo</th>
          
           
           
        
           
        </tr>
		<?php 
    if (isset($_POST['caught'])) {
        extract($_POST);


  $q="SELECT * FROM user  WHERE passport_no  LIKE '$fn%'";
}
    else{
    $q="select * from user";}
    $res=select($q);
     $sino=1;
    foreach ($res as $row) {
    	?>
    	<tr>
            <td><?php echo $sino++; ?></td>

            <td><?php echo $row['passport_no'] ?></td>
            <td><?php echo $row['first_name'] ?></td>
            <td><?php echo $row['last_name'] ?></td>
            <td><?php echo $row['place'] ?></td>
          
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['travelling_from'] ?></td>
            <td><?php echo $row['travelling_to'] ?></td>
            <td><img src="<?php echo $row['photo'] ?>" width="100" heigth="100"></td>

           <td><a class="btn btn-success" href="?pid=<?php echo $row['passport_no'] ?>&uid=<?php echo $row['user_id'] ?>">check</a></td>
            </tr>
    	
   <?php
}


		 ?>
	</table>
</form>
<?php include 'footer.php' ?>