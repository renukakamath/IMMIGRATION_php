<?php include 'policeheader.php';
$pid=$_SESSION['police_id'];
extract($_GET);

if (isset($_POST['crimes'])) {
	extract($_POST);
	$q="insert into crimes values(null,'$pid','$cname','$desc')";
	insert($q);
	alert(' Successfully');
	return redirect('police_managecrime.php');

}
if (isset($_GET['did'])) {
	extract($_GET);

	$q="delete from crimes where crime_id='$did'";
	delete($q);
	alert(' Successfully');
	return redirect('police_managecrime.php');

}
if (isset($_GET['uid'])) {
	extract($_GET);

	$q="select * from crimes where crime_id='$uid'";
	$res=select($q);

}
if (isset($_POST['update'])) {
	extract($_POST);

	$q="update crimes set crime_name='$cname',description='$desc' where crime_id='$uid'";
	update($q);
	alert(' Successfully');
	return redirect('police_managecrime.php');

}

?>
<div class="container-fluid p-0 mb-5 pb-5">
	<div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item position-relative active" style="height: 100vh; min-height: 400px;">
				<img class="position-absolute w-100 h-100" src="img/carousel-1.jpg" style="object-fit: cover;">
				<div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
					<div class="p-3" style="max-width: 900px;">
						<center>
							<h1 style="color: white">Manage Crimes</h1>
							<form method="post" >
								<?php if (isset($_GET['uid'])) { ?>
									<table class="table" style="width: 500px;color: white">
										<tr>
											<th>Crime Name</th>
											<td><input type="text" name="cname" class="form-control" required="" value="<?php echo $res[0]['crime_name'] ?>"></td>
										</tr>
										<tr>
											<th>Description</th>
											<td><input type="text" name="desc" class="form-control" required="" value="<?php echo $res[0]['description'] ?>"></td>
										</tr>
										
										
										<tr>
											<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="update" value="submit"></td>
										</tr>
									</table>
								<?php }else{ ?>
									<table class="table" style="width: 500px;color: white">
										<tr>
											<th>Crime Name</th>
											<td><input type="text" class="form-control" required="" name="cname"></td>
										</tr>
										<tr>
											<th>Description</th>
											<td><input type="text" class="form-control" required="" name="desc"></td>
										</tr>
										
										
										<tr>
											<td align="center" colspan="2"><input type="submit" name="crimes" class="btn btn-success" value="submit"></td>
										</tr>
									</table>
								<?php } ?>
							</form>
						</center>
					</div></div></div></div></div></div>
					<center>
						<h1>View Crimes</h1>
						<table class="table" style="width: 500px">
							<tr>
								<th>Sino</th>
								<th>Crimes Name</th>
								<th>Description</th>
								
								
							</tr>
							<?php 

							$q="SELECT * FROM crimes INNER JOIN police USING(police_id) WHERE police_id='$pid'";
							$res=select($q);
							$sino=1;
							foreach ($res as $row) {
								?>
								<tr>
									<td><?php echo $sino++; ?></td>
									<td><?php echo $row['crime_name'] ?></td>
									<td><?php echo $row['description'] ?></td>
									
									
									<td><a class="btn btn-success" href="?did=<?php echo $row['crime_id'] ?>">Delete</a></td>
									<td><a class="btn btn-success" href="?uid=<?php echo $row['crime_id'] ?>">Update</a></td>

								</tr>
								<?php 
							}

							?>
						</table>
						
					</center>
					<?php include 'footer.php' ?>