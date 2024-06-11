<?php include 'policeheader.php';
// $pid=$_SESSION['police_id'];
extract($_GET);
if (isset($_POST['message'])) {
	extract($_POST);
	$q="insert into message values(null,'$pid','$off','$mess',now())";
	insert($q);
	alert(' Successfully');
	return redirect('police_sendmessage.php');
	
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
							<h1 style="color: white">Send Message</h1>
							<form method="post">
								<table class="table" style="width: 500px;color: white">
									<tr>
										<th>Officer</th>
										<td><select name="off" class="form-control" required="">
											<option>select</option>
											<?php 

											$q="select * from immigrationofficer";
											$res=select($q);
											foreach ($res as $row) {
												?>
												<option value="<?php echo $row['officer_id'] ?>"><?php echo $row['first_name'] ?></option>
												<?php 
											}

											?>
										</select></td>
									</tr>
									<tr>
										<th>Message</th>
										<td><input type="text" class="form-control" required="" name="mess"></td>
									</tr>
									<tr>
										<td align="center" colspan="2"><input type="submit" name="message"  class="btn btn-success" value="submit"></td>
									</tr>
								</table>
							</form>
						</center>
					</div></div></div></div></div></div>

					<?php include 'footer.php' ?>