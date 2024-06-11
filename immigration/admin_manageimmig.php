<?php include 'adminheader.php';

if (isset($_POST['immg'])) 
{
	extract($_POST);
	$q="select * from login where username='$uname' and Password='$pwd'";
	$r=select($q);
	if (sizeof($r)>0) {
		alert('already Exist');
	}else{

		$q1="insert into login values(null,'$uname','$pwd','officer')";
		$id=insert($q1);

		$q="insert into immigrationofficer values(null,'$id','$fname','$lname','$phone','$email')";
		insert($q);
		alert(' Successfully');
		return redirect('admin_manageimmig.php');
	}
}
if (isset($_GET['did'])) 
{
	extract($_GET);

	$q="delete from immigrationofficer where officer_id='$did'";
	delete($q);
	alert(' Successfully');
	return redirect('admin_manageimmig.php');

}
if (isset($_GET['uid'])) 
{
	extract($_GET);

	$q="select * from immigrationofficer where officer_id='$uid'";
	$res=select($q);

}
if (isset($_POST['update'])) 
{
	extract($_POST);

$q="update immigrationofficer set first_name='$fname',last_name='$lname',phone='$phone',email='$email' where officer_id='$uid'";
	update($q);
	alert(' Successfully');
	return redirect('admin_manageimmig.php');

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
							<h1 style="color: white">Officer Registration</h1>
							<form method="post">
								<?php if (isset($_GET['uid'])) { ?>
									<table class="table" style="width: 500px;color: white">
										<tr>
											<th>First Name</th>
											<td><input type="text" name="fname" required="" class="form-control" value="<?php echo $res[0]['first_name'] ?>"></td>
										</tr>
										<tr>
											<th>Last Name</th>
											<td><input type="text" name="lname" required="" class="form-control" value="<?php echo $res[0]['last_name'] ?>"></td>
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
											<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="update" value="submit"></td>
										</tr>
									</table>
								<?php }else{ ?>
									<table class="table" style="width: 500px;color: white">
										<tr>
											<th>First Name</th>
											<td><input type="text" class="form-control" required="" name="fname"></td>
										</tr>
										<tr>
											<th>Last Name</th>
											<td><input type="text" class="form-control" required="" name="lname"></td>
										</tr>
										<tr>
											<th>Phone</th>
											<td><input type="text" class="form-control" required=""  pattern="[0-9]{10}" name="phone"></td>
										</tr>
										<tr>
											<th>Email</th>
											<td><input type="email" class="form-control" required="" name="email"></td>
										</tr>
										<tr>
											<th>User Name</th>
											<td><input type="text" class="form-control" required="" name="uname"></td>
										</tr>
										<tr>
											<th>Password</th>
											<td><input type="Password" class="form-control" required="" name="pwd"></td>
										</tr>
										<tr>
											<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="immg" value="submit"></td>
										</tr>
									</table>
								<?php } ?>
							</form>
						</center>
					</div>
				</div></div></div></div></div>
				<center>
					<h1>View Immigration Officer</h1>
					<table class="table" style="width: 500px">
						<tr>
							<th>Sino</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Phone</th>
							<th>Email</th>
						</tr>
						<?php 

						$q="select * from immigrationofficer";
						$res=select($q);
						$sino=1;
						foreach ($res as $row) {
							?>
							<tr>
								<td><?php echo $sino++; ?></td>
								<td><?php echo $row['first_name'] ?></td>
								<td><?php echo $row['last_name'] ?></td>
								<td><?php echo $row['phone'] ?></td>
								<td><?php echo $row['email'] ?></td>
								<td><a class="btn btn-success" href="?did=<?php echo $row['officer_id'] ?>">Delete</a></td>
								<td><a class="btn btn-success" href="?uid=<?php echo $row['officer_id'] ?>">Update</a></td>

							</tr>
							<?php 
						}

						?>
					</table>
					
				</center>
				<?php include 'footer.php' ?>