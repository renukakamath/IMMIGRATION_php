<?php include 'adminheader.php';

if (isset($_POST['police'])) {
	extract($_POST);

	$q2="select * from login where username='$uname' and Password='$pwd'";
	$r=select($q2);
	if (sizeof($r)>0) {
		alert('already exist');
	}else{
		$q1="insert into login values(null,'$uname','$pwd','police')";
		$id=insert($q1);

		$q="insert into police values(null,'$id','$fname','$lname','$phone','$email')";
		insert($q);
		alert(' Successfully');
		return redirect('admin_managepolice.php');

	}
}
if (isset($_GET['did'])) {
	extract($_GET);

	$q="delete from police where police_id='$did'";
	delete($q);
	alert(' Successfully');
	return redirect('admin_managepolice.php');

}
if (isset($_GET['uid'])) {
	extract($_GET);

	$q="select * from police where police_id='$uid'";
	$res=select($q);

}
if (isset($_POST['update'])) {
	extract($_POST);

	$q="update police set first_name='$fname',last_name='$lname',phone='$phone',email='$email' where police_id='$uid'";
	update($q);
	alert(' Successfully');
	return redirect('admin_managepolice.php');

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
							<h1 style="color: white">Police Registration</h1>
							<form method="post">
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
											<th>Phone</th>
											<td><input type="text" name="phone" class="form-control" required=""  pattern="[0-9]{10}" value="<?php echo $res[0]['phone'] ?>"></td>
										</tr>
										<tr>
											<th>Email</th>
											<td><input type="email" name="email" class="form-control" required="" value="<?php echo $res[0]['email'] ?>"></td>
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
											<td><input type="text" class="form-control" required="" pattern="[0-9]{10}" name="phone"></td>
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
											<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="police" value="submit"></td>
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
	<h1>View Police</h1>
	<table class="table" style="width: 500px">
		<tr>
			<th>Sino</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Phone</th>
			<th>Email</th>
		</tr>
		<?php 

		$q="select * from police";
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
				<td><a class="btn btn-success" href="?did=<?php echo $row['police_id'] ?>">Delete</a></td>
				<td><a class="btn btn-success" href="?uid=<?php echo $row['police_id'] ?>">Update</a></td>

			</tr>
			<?php 
		}

		?>
	</table>

</center>
<?php include 'footer.php' ?>