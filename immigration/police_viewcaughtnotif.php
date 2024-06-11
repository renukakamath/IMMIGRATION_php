<?php include 'policeheader.php';
$pid=$_SESSION['police_id'];
extract($_GET);
if (isset($_GET['uid'])) {
   extract($_GET);

  echo $q="UPDATE caught SET `status`='caught' WHERE caught_id='$uid'";
   update($q);

}
if (isset($_GET['did'])) {
   extract($_GET);
  echo $q="update caught set `status`='not caught' where caught_id='$did'";
   update($q);
}





 ?>
<div class="container-fluid p-0 mb-5 pb-5">
    <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item position-relative active"  style="height: 50vh; min-height: 10px;">
                <img class="position-absolute w-100 h-100" src="img/carousel-1.jpg" style="object-fit: cover;">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                    </div></div></div></div></div></div>

                    <center>
                       <h1>View Caught Notification</h1>
                       <form>
                          <table class="table" style="width: 500px">
                             <tr>
                                <th>Sino</th>
                                <th>User passprtno:</th>
                                <th>Criminals passportno:</th>
                                <th>Date & Time</th>
                                <th>Officers</th>
                                <th>Police</th>
                                <th>Status</th>

                            </tr>
                            <?php 
                            $q="SELECT * ,CONCAT (`police`.first_name,'-',`police`.last_name) AS police,CONCAT (`immigrationofficer`.first_name,'-',`immigrationofficer`.last_name) AS office ,CONCAT(`user`.passport_no)AS users from caught inner join user using(user_id) inner join criminals using (criminal_id) inner join immigrationofficer using (officer_id) inner join police using (police_id) where police_id='$pid'";
                            $res=select($q);
                            $sino=1;
                            foreach ($res as $row) {
                               ?>
                               <tr>
                                   
                                  <td><?php echo $sino++; ?></td>
                                  <td><?php echo $row['users'] ?></td>
                                  <td><?php echo $row['passport_no'] ?></td>
                                  <td><?php echo $row['datetime'] ?></td>
                                  <td><?php echo $row['office'] ?></td>
                                  <td><?php echo $row['police'] ?></td>
                                  <?php 
                                if ($row['status']=='pending') {
                                    ?>
                                   <td><a class="btn btn-success" href="?uid=<?php echo $row['criminal_id'] ?>">accept</a></td>
                                   <td><a class="btn btn-success" href="?did=<?php echo $row['criminal_id'] ?>">delete</a></td>
                            <?php 
                        }
                        ?>
                        <?php 

                            if ($row['status']='caught') {
                                ?>
                                <td><a class="btn btn-success" href="police_sendmessage.php?pid=<?php echo $row['police_id'] ?>">Send message</a></td>
                           <?php 
                            }else{


                         ?>
                                  <td><?php echo $row['status'] ?></td>
                              </tr>
                              <?php  
                          }
}


                          ?>
                      </table>
                  </form>
              </center>
              <?php include 'footer.php' ?>