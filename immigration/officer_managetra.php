<?php include 'officerheader.php';

if (isset($_POST['user'])) {
	extract($_POST);
	$q="SELECT * FROM login INNER JOIN `user` USING (log_id) where username='$uname' OR passport_no='$pass'";
	$r=select($q);
	if (sizeof($r)>0) {
		alert('already exist');
	}else{ 
		$dir = "image/";
		$file = basename($_FILES['imgg']['name']);
		$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
		$target = $dir.uniqid("image_").".".$file_type;
		if(move_uploaded_file($_FILES['imgg']['tmp_name'], $target))
		{

			$q1="insert into login values(null,'$uname','$pwd','user')";
			$id=insert($q1);

			$q="insert into user values(null,'$id','$fname','$lname','$add','$target','$place','$phone','$email','$tfrom','$tto','$lug','$flname','$flno','$pass')";
			insert($q);
			alert(' Successfully');
			return redirect('officer_managetra.php');
		}
		else
		{
			echo "file uploading error occured";
		}
	}
}

if (isset($_GET['did'])) {
	extract($_GET);

	$q="delete from user where user_id='$did'";
	delete($q);
	alert(' Successfully');
	return redirect('officer_managetra.php');

}
if (isset($_GET['uid'])) {
	extract($_GET);

	$q="select * from user where user_id='$uid'";
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
		$q="update user set first_name='$fname',last_name='$lname',address='$add',photo='$target',place='$place',phone='$phone',email='$email',travelling_from='$tfrom',travelling_to='tto',luggage_weight='$lug',flight_name='$flname',flight_no='$flno',passport_no='$pass' where user_id='$uid'";
	update($q);
	alert(' Successfully');
	return redirect('officer_managetra.php');



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
			<div class="carousel-item position-relative active" style="height: 100vh; min-height: 1200px;">
				<img class="position-absolute w-100 h-100" src="img/carousel-1.jpg" style="object-fit: cover;">
				<div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
					<div class="p-3" style="max-width: 900px;">
						<center>
							<h1 style="color: white">Manage Travelling</h1>
							<form method="post" enctype="multipart/form-data">
								<?php if (isset($_GET['uid'])) { ?>
									<table class="table" style="width: 500px;color: white">
										<tr>
											<th>First Name</th>
											<td><input type="text" name="fname" class="form-control" required="" value="<?php echo $res[0]['first_name'] ?>"></td>
										</tr>
										<tr>
											<th>Last Name</th>
											<td><input type="text" name="lname" class="form-control" required="" value="<?php echo $res[0]['last_name'] ?>"></td>
										</tr>
										<tr>
											<th>Address</th>
											<td><textarea name="add" required="" class="form-control"><?php echo $res[0]['address'] ?></textarea></td>
										</tr>
										<tr>
											<th>Photo</th>
											<td><input type="file" required="" class="form-control" alue="<?php echo $res[0]['photo'] ?>"  name="imgg"></td>
										</tr>

										<tr>
											<th>Place</th>
											<td><input type="text" name="place" required="" class="form-control" value="<?php echo $res[0]['place'] ?>"></td>
										</tr>
										<tr>
											<th>Phone</th>
											<td><input type="text" name="phone" required="" class="form-control" pattern="[0-9]{10}" value="<?php echo $res[0]['phone'] ?>"></td>
										</tr>
										<tr>
											<th>Email</th>
											<td><input type="email" name="email" required="" class="form-control" value="<?php echo $res[0]['email'] ?>"></td>
										</tr>
										<tr>
											<th>Travelling From</th>
											<td><input type="text" name="tfrom" required="" class="form-control" value="<?php echo $res[0]['travelling_from'] ?>"></td>
										</tr>
										<tr>
											<th>Travelling To</th>
											<td><input type="text" name="tto" required="" class="form-control" value="<?php echo $res[0]['travelling_to'] ?>"></td>
										</tr>
										<tr>
											<th>Luggage Weight</th>
											<td><input type="text" name="lug" required="" class="form-control" value="<?php echo $res[0]['luggage_weight'] ?>"></td>
										</tr>
										<tr>
											<th>Filght Name</th>
											<td><input type="text" name="flname" required="" class="form-control" value="<?php echo $res[0]['flight_name'] ?>"></td>
										</tr>
										<tr>
											<th>Flight No.</th>
											<td><input type="text" name="flno" required="" class="form-control"  value="<?php echo $res[0]['flight_no'] ?>"></td>
										</tr>
										<tr>
											<th>Passport No</th>
											<td><input type="text" name="pass" required="" class="form-control" title="ENTER 8 DIGIT OF Passport NUMBER" pattern="[0-9]{8}" value="<?php echo $res[0]['passport_no'] ?>"></td>
										</tr>
										<tr>
											<td align="center" colspan="2"><input type="submit" name="update"  class="btn btn-success" value="submit"></td>
										</tr>
									</table>
								<?php }else{ ?>
									<table class="table" style="width: 500px;color: white">
										<tr>
											<th>First Name</th>
											<td><input type="text" required="" class="form-control" name="fname"></td>
										</tr>
										<tr>
											<th>Last Name</th>
											<td><input type="text" required="" class="form-control" name="lname"></td>
										</tr>
										<tr>
											<th>Address</th>
											<td><textarea name="add" required="" class="form-control"></textarea></td>
										</tr>
										<tr>
											<th>Photo</th>
											<td><input type="file" required="" class="form-control"  name="imgg"></td>
										</tr>
										<tr>
											<th>Place</th>
											<td><input type="text" required="" class="form-control" name="place"></td>
										</tr>
										<tr>
											<th>Phone</th>
											<td><input type="text" required="" class="form-control" pattern="[0-9]{10}" name="phone"></td>
										</tr>
										<tr>
											<th>Email</th>
											<td><input type="email" required="" class="form-control" name="email"></td>
										</tr>
										<tr>
											<th>Travelling From</th>
											<td><input type="text" required="" class="form-control" name="tfrom"></td>
										</tr>
										<tr>
											<th>Travelling To</th>
											<td><input type="text" required="" class="form-control" name="tto"></td>
										</tr>
										<tr>
											<th>Luggage Weight</th>
											<td><input type="text" required="" class="form-control" name="lug"></td>
										</tr>
										<tr>
											<th>Filght Name</th>
											<td><input type="text" required="" class="form-control" name="flname"></td>
										</tr>
										<tr>
											<th>Flight No.</th>
											<td><input type="text" required="" class="form-control"  name="flno"></td>
										</tr>
										<tr>
											<th>Passport No</th>
											<td><input type="text"  class="form-control"  title="ENTER 8 DIGIT OF Passport NUMBER" pattern="[0-9]{8}" name="pass"></td>
										</tr>
										<tr>
											<th>User Name</th>
											<td><input type="text" required="" class="form-control" name="uname"></td>
										</tr>
										<tr>
											<th>Password</th>
											<td><input type="Password" required="" class="form-control" name="pwd"></td>
										</tr>
										<tr>
											<td align="center" colspan="2"><input type="submit" name="user"  class="btn btn-success" value="submit"></td>
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
						<h1>View User</h1>
						<table class="table" style="width: 500px">
							<tr>
							   <th>Sino</th>
    <th> Name</th>
    
    <th>Address</th>
    <th>Photo</th>
    <th>details</th>
    
    <th>Travelling From and to</th>
   
    <th>Luggage Weight</th>
    <th>Flight Name and No:</th>
    
    <th>Passport No</th>
</tr>
<?php 

$q="SELECT *,CONCAT (first_name,'- ',last_name) AS `name`,CONCAT (travelling_from,'- ',travelling_to) AS fromandto ,concat (place,' , ',phone,', ', email) as details ,concat (flight_name,' ,','flight_no') as flight_name_no FROM USER";
$res=select($q);
$sino=1;
foreach ($res as $row) {
 ?>
 <tr>
  <td><?php echo $sino++; ?></td>
  <td><?php echo $row['name'] ?></td>
 
  <td><?php echo $row['address'] ?></td>
  <td><img src="<?php echo $row['photo'] ?>" width="100" heigth="100"	></td>
  <td><?php echo $row['details'] ?></td>
  
  
  <td><?php echo $row['fromandto'] ?></td>
  
  <td><?php echo $row['luggage_weight'] ?></td>
  <td><?php echo $row['flight_name_no'] ?></td>
  
  <td><?php echo $row['passport_no'] ?></td>
									<td><a  class="btn btn-success" href="?did=<?php echo $row['user_id'] ?>">Delete</a></td>
									<td><a  class="btn btn-success" href="?uid=<?php echo $row['user_id'] ?>">Update</a></td>

								</tr>
								<?php 
							}

							?>
						</table>

					</center>
					<?php include 'footer.php' ?>