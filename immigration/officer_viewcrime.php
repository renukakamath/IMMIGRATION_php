<?php include 'officerheader.php' ?>
<div class="container-fluid p-0 mb-5 pb-5">
    <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item position-relative active" style="height: 50vh; min-height: 10px;">
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
    <h1>View Crimes</h1>
    <table class="table" style="width: 500px">
      <tr>
         <th>Sino</th>
         
         <th>Crimes</th>
         <th>Description</th>
         <th>Police</th>
         
     </tr>
     <?php 

     $q="SELECT * FROM crimes inner join police using (police_id) ";

     $res=select($q);
     $sino=1;
     foreach ($res as $row) {
       ?>
       <tr>
          <td><?php echo $sino++; ?></td>
          <td><?php echo $row['first_name'] ?></td>
          <td><?php echo $row['description'] ?></td>
          <td><?php echo $row['first_name'] ?></td>
<td><a class="btn btn-success" href="officer_sendfoundcrime.php?poid=<?php echo $row['police_id'] ?>">Send found Criminals</a></td>
      </tr>
      <?php 
  }


  ?>
</table>
</center>
<?php include 'footer.php' ?>