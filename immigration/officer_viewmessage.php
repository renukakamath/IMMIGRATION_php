<?php include 'officerheader.php' ?>
<div class="container-fluid p-0 mb-5 pb-5">
  <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item position-relative active"  style="height: 50vh; min-height: 10px;">
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
	<h1>View Message</h1>
	<table class="table" style="width:500px">
		<tr>
			<th>Sino</th>
			<th>Police</th>
			<th>Officer</th>
			<th>Message</th>
			<th>Date & time</th>

		</tr>
		<?php 

   $q="SELECT * ,CONCAT (`police`.first_name,'-',`police`.last_name) AS police,CONCAT (`immigrationofficer`.first_name,'-',`immigrationofficer`.last_name) AS office from message inner join police using (police_id) inner join immigrationofficer using (officer_id)";
   $res=select($q);
   $sino=1;

   foreach ($res as $row) {
     ?>
     <tr>
      <td><?php echo $sino++; ?></td>
      <td><?php echo $row['police'] ?></td>
      <td><?php echo $row['office'] ?></td>
      <td><?php echo $row['message'] ?></td>
      <td><?php echo $row['datetime'] ?></td>
    </tr>
    <?php 
  }

  ?>
</table>
</center>

<?php include 'footer.php' ?>