<?php include 'publicheader.php';
if (isset($_POST['login'])) 
{
	extract($_POST);

	$q="select * from login where username='$uname' and Password='$pwd'";
	$res=select ($q);

	if (sizeof($res)>0)
	{
		$_SESSION['log_id']=$res[0]['log_id'];
		$lid=$_SESSION['log_id'];
		if ($res[0]['type']=="admin") 
		{
			return redirect('admin_home.php');

		}elseif ($res[0]['type']=="user") 
		{
		$q="select * from user where log_id='$lid'";
			$r=select($q);
			if (sizeof($r)>0) {
				$_SESSION['user_id']=$r[0]['user_id'];
				echo$uid=$_SESSION['user_id'];
			}
		
			return redirect('user_home.php');

		}elseif($res[0]['type']=="police")
		{
			$q="select * from police where log_id='$lid'";
			$r=select($q);
			if (sizeof($r)>0) {
				$_SESSION['police_id']=$r[0]['police_id'];
				echo$pid=$_SESSION['police_id'];
		}
			return redirect('police_home.php');

		}elseif ($res[0]['type']=="officer")
		{
			echo$q="select * from immigrationofficer where log_id='$lid'";
			$r=select($q);
			if (sizeof($r)>0)
			{
				$_SESSION['officer_id']=$r[0]['officer_id'];
				echo$oid=$_SESSION['officer_id'];
			}
			return redirect('officer_home.php');
		}
	}else{
		alert('Invalid Username & Password');
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
							<h1 style="color: white">Login</h1>
							<form method="post">
								<table class="table" style="width: 500px;color: white">
									<tr>
										<th>User Name</th>
										<td><input type="text" class="form-control" required="" name="uname"></td>
									</tr>
									<tr>
										<th>Password</th>
										<td><input type="Password" class="form-control" required="" name="pwd"></td>
									</tr>
									<tr>
										<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="login"></td>
									</tr>
								</table>
							</form>
						</center>
					</div>
				</div>
			</div>
		</div></div></div>
		<?php include 'footer.php' ?>