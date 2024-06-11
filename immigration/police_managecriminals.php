<?php include 'policeheader.php';
$pid=$_SESSION['police_id'];
extract($_GET);

if (isset($_POST['criminals'])) {
	extract($_POST);


	$dir = "image/";
	$file = basename($_FILES['imgg']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("image_").".".$file_type;
	if(move_uploaded_file($_FILES['imgg']['tmp_name'], $target))
	{
		
		$q="insert into criminals values(null,'$cid','$pass','$fname','$lname','$gen','$age','$target')";
		insert($q);
		alert(' Successfully');
		return redirect('police_managecriminals.php');

	}
	else
	{
		echo "file uploading error occured";
	}
}


if (isset($_GET['did'])) {
	extract($_GET);

	$q="delete from criminals where criminal_id='$did'";
	delete($q);
	alert(' Successfully');
	return redirect('police_managecriminals.php');

}
if (isset($_GET['uid'])) {
	extract($_GET);

	$q="select * from criminals inner join crimes using(crime_id) where criminal_id='$uid'";
	$res=select($q);

}
if (isset($_POST['update'])) {
	extract($_POST);


	$dir = "image/";
	$file = basename($_FILES['imgg']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("image_").".".$file_type;
	if(move_uploaded_file($_FILES['imgg']['tmp_name'], $target))
	{
		
		$q="update criminals set crime_id='$cid', passport_no='$pas',first_name='$fname', last_name='$lname',gender='$gen',photo='$target',age='$age' where criminal_id='$uid'";
	update($q);
	alert(' Successfully');
	return redirect('police_managecriminals.php');


	}
	else
	{
		echo "file uploading error occured";
	}
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
							<h1 style="color: white">Manage Criminals</h1>
							<form method="post" enctype="multipart/form-data">
								<?php if (isset($_GET['uid'])) { ?>
									<table class="table" style="width: 500px;color: white">
										<tr>
											<th>Crime Name</th>
											<td><select name="cid" class="form-control" required="">
												<option value="<?php echo $res[0]['crime_id'] ?>"><?php echo $res[0]['crime_name'] ?></option>
												<option>select</option>
												<?php 

												$q="select * from crimes";
												$r=select($q);
												foreach ($r as $row) {
													?>
													<option value="<?php echo $row['crime_id'] ?>"><?php echo $row['crime_name'] ?></option>
													<?php  
												}


												?>
											</select></td>
										</tr>
										<tr>
											<th>Passport No</th>
											<td><input type="text" name="pas" class="form-control" required="" value="<?php echo $res[0]['passport_no'] ?>"></td>
										</tr>
										<tr>
											<th>First Name</th>
											<td><input type="text" name="fname" class="form-control" required="" value="<?php echo $res[0]['first_name'] ?>"></td>
										</tr>
										<tr>
											<th>Last Name</th>
											<td><input type="text" name="lname" class="form-control" required="" value="<?php echo $res[0]['last_name'] ?>"></td>
										</tr>
										<tr>
											<th>Gender</th>
											<td><input type="radio"  class="btn btn-success"  required="" name="gen" value="male">male
												<input type="radio"  class="btn btn-success" required=""  name="gen" value="female">female</td>
											</tr>
											<tr>
												<th>Age</th>
												<td><input type="number" name="age" class="form-control" required="" value="<?php echo $res[0]['age'] ?>"></td>
											</tr>
                                             <tr>
													<th>Image</th>
													<td><input type="file" class="form-control" required="" value="<?php echo $res[0]['photo'] ?>" name="imgg"></td>
												</tr>

											<tr>
												<td align="center" colspan="2"><input type="submit" name="update" class="btn btn-success" value="submit"></td>
											</tr>
										</table>
									<?php }else{ ?>

										<table class="table" style="width: 500px;color: white">
											<tr>
												<th>Crime Name</th>
												<td><select name="cid" class="form-control" required="">
													<option>select</option>
													<?php 

													$q="select * from crimes";
													$r=select($q);
													foreach ($r as $row) {
														?>
														<option value="<?php echo $row['crime_id'] ?>"><?php echo $row['crime_name'] ?></option>
														<?php  
													}


													?>
												</select></td>
											</tr>
											<tr>
												<th>Passport No</th>
												<td><input type="text" class="form-control" required="" name="pass"></td>
											</tr>
											<tr>
												<th>First Name</th>
												<td><input type="text" class="form-control" required="" name="fname"></td>
											</tr>
											<tr>
												<th>Last Name</th>
												<td><input type="text" class="form-control" required="" name="lname"></td>
											</tr>
											<tr>
												<th>Gender</th>
												<td><input type="radio" class="btn btn-success" required=""  name="gen" value="male">male
													<input type="radio" class="btn btn-success" required="" name="gen" value="female">female</td>
												</tr>
												<tr>
													<th>Age</th>
													<td><input type="number" class="form-control" required="" name="age"></td>
												</tr>
												<tr>
													<th>Image</th>
													<td><input type="file" class="form-control" required="" name="imgg"></td>
												</tr>


												<tr>
													<td align="center" colspan="2"><input type="submit" name="criminals" class="btn btn-success" value="submit"></td>
												</tr>
											</table>
										<?php } ?>
									</form>
								</center>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<center>
			<h1>View Criminals</h1>
			<table class="table" style="width: 500px">
				<tr>
					<th>Sino</th>
					<th>crime</th>
					<th>Passport no</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Gender</th>
					<th>Age</th>
					<th>Image</th>

				</tr>
				<?php 

				$q="SELECT * FROM criminals INNER JOIN crimes USING(crime_id) INNER JOIN police USING(police_id) WHERE police_id='$pid' ";
				$res=select($q);
				$sino=1;
				foreach ($res as $row) {
					?>
					<tr>
						<td><?php echo $sino++; ?></td>
						<td><?php echo $row['crime_name'] ?></td>
						<td><?php echo $row['passport_no'] ?></td>
						<td><?php echo $row['first_name'] ?></td>
						<td><?php echo $row['last_name'] ?></td>
						<td><?php echo $row['gender'] ?></td>
						<td><?php echo $row['age'] ?></td>
						<td><img src="<?php echo $row['photo'] ?>" width="100" height="100"></td>

						<td><a class="btn btn-success" href="?did=<?php echo $row['criminal_id'] ?>">Delete</a></td>
						<td><a class="btn btn-success" href="?uid=<?php echo $row['criminal_id'] ?>">Update</a></td>

					</tr>
					<?php 
				}

				?>
			</table>

		</center>
		<?php include 'footer.php' ?>