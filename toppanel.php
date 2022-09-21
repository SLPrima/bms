<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Building Management System </title>
    
<style type="text/css">

/* Google Fonts Import Link */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
.sidebar{
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  width: 260px;
  background: darkblue;
  z-index: 100;
  transition: all 0.5s ease;
}
.sidebar.close{
  width: 78px;
}
.sidebar .logo-details{
  height: 60px;
  width: 100%;
  display: flex;
  align-items: center;
}
.sidebar .logo-details i{
  font-size: 30px;
  color: #fff;
  height: 50px;
  min-width: 78px;
  text-align: center;
  line-height: 50px;
}
.sidebar .logo-details .logo_name{
  font-size: 22px;
  color: #fff;
  font-weight: 600;
  transition: 0.3s ease;
  transition-delay: 0.1s;
}
.sidebar.close .logo-details .logo_name{
  transition-delay: 0s;
  opacity: 0;
  pointer-events: none;
}
.sidebar .nav-links{
  height: 100%;
  padding: 30px 0 150px 0;
  overflow: auto;
}
.sidebar.close .nav-links{
  overflow: visible;
}
.sidebar .nav-links::-webkit-scrollbar{
  display: none;
}
.sidebar .nav-links li{
  position: relative;
  list-style: none;
  transition: all 0.4s ease;
}
.sidebar .nav-links li:hover{
  background: darkblue;
}
.sidebar .nav-links li .iocn-link{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.sidebar.close .nav-links li .iocn-link{
  display: block
}
.sidebar .nav-links li i{
  height: 50px;
  min-width: 78px;
  text-align: center;
  line-height: 50px;
  color: powderblue;
  font-size: 20px;
  cursor: pointer;
  transition: all 0.3s ease;
}
.sidebar .nav-links li.showMenu i.arrow{
  transform: rotate(-180deg);
}
.sidebar.close .nav-links i.arrow{
  display: none;
}
.sidebar .nav-links li a{
  display: flex;
  align-items: center;
  text-decoration: none;
}
.sidebar .nav-links li a .link_name{
  font-size: 14px;
  font-weight: 400;
  color: lemonchiffon;
  transition: all 0.4s ease;
}
.sidebar.close .nav-links li a .link_name{
  opacity: 0;
  pointer-events: none;
}
.sidebar .nav-links li .sub-menu{
  padding: 6px 6px 14px 80px;
  margin-top: -10px;
  background: darkblue;
  display: none;
}
.sidebar .nav-links li.showMenu .sub-menu{
  display: block;
}
.sidebar .nav-links li .sub-menu a{
  color: #fff;
  font-size: 15px;
  padding: 5px 0;
  white-space: nowrap;
  opacity: 0.6;
  transition: all 0.3s ease;
}
.sidebar .nav-links li .sub-menu a:hover{
  opacity: 1;
}
.sidebar.close .nav-links li .sub-menu{
  position: absolute;
  left: 100%;
  top: -10px;
  margin-top: 0;
  padding: 10px 20px;
  border-radius: 0 6px 6px 0;
  opacity: 0;
  display: block;
  pointer-events: none;
  transition: 0s;
}
.sidebar.close .nav-links li:hover .sub-menu{
  top: 0;
  opacity: 1;
  pointer-events: auto;
  transition: all 0.4s ease;
}
.sidebar .nav-links li .sub-menu .link_name{
  display: none;
}
.sidebar.close .nav-links li .sub-menu .link_name{
  font-size: 18px;
  opacity: 1;
  display: block;
}
.sidebar .nav-links li .sub-menu.blank{
  opacity: 1;
  pointer-events: auto;
  padding: 3px 20px 6px 16px;
  opacity: 0;
  pointer-events: none;
}
.sidebar .nav-links li:hover .sub-menu.blank{
  top: 50%;
  transform: translateY(-50%);
}
.sidebar .profile-details{
  position: fixed;
  bottom: 0;
  width: 260px;
  display: flex;
  align-items: left;
  justify-content: space-between;
  background: blue;
  padding: 12px 0;
  transition: all 0.5s ease;
}
.sidebar.close .profile-details{
  background: none;
}
.sidebar.close .profile-details{
  width: 78px;
}
.sidebar .profile-details .profile-content{
  display: flex;
  align-items: center;
}
.sidebar .profile-details img{
  height: 30px;
  width: 30px;
  object-fit: cover;
  border-radius: 16px;
  margin: 0 14px 0 12px;
  background: #1d1b31;
  transition: all 0.5s ease;
}
.sidebar.close .profile-details img{
  padding: 10px;
}
.sidebar .profile-details .profile_name,
.sidebar .profile-details .job{
  color: #fff;
  font-size: 14px;
  font-weight: 500;
  white-space: nowrap;
}
.sidebar.close .profile-details i,
.sidebar.close .profile-details .profile_name,
.sidebar.close .profile-details .job{
  display: none;
}
.sidebar .profile-details .job{
  font-size: 12px;
}
.home-section{
  position: relative;
  background: snow;
  height: 100vh;
  left: 260px;
  width: calc(100% - 260px);
  transition: all 0.5s ease;
}
.sidebar.close ~ .home-section{
  left: 78px;
  width: calc(100% - 78px);
}
.home-section .home-content{
  height: 60px;
  display: flex;
  align-items: center;
}
.home-section .home-content .bx-menu,
.home-section .home-content .text{
  color: darkblue;
  font-size: 35px;
}
.home-section .home-content .bx-menu{
  margin: 0 15px;
  cursor: pointer;
}
.home-section .home-content .text{
  font-size: 26px;
  font-weight: 600;
}
@media (max-width: 420px) {
  .sidebar.close .nav-links li .sub-menu{
    display: none;
  }
}
</style>    
    
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   
<body>
    
 <?php
   $username = (string) $_SESSION["username"];
   $usrlevel = (string) $_SESSION["level"];
 ?>
 
  <div  class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">BMS</span>
    </div>
    
    
    <ul class="nav-links">

      <li>
        <a href="#">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Preventive Maintenance</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="lap_dash_prev1.php">Dashboard</a></li>
        </ul>
      </li>


<?php
  if ($usrlevel =="1" or $usrlevel =="2" or $usrlevel =="3" )
  {
?>

       <li>

        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Schedule</span>
          </a>
            <i class='bx bxs-chevron-down arrow' ></i> 
        </div>
        

        <ul class="sub-menu">
          <li><a class="link_name" href="#">Schedule</a></li>
          <li><a href="req_prev_ac_list.php">Engineering</a></li>
          <li><a href="req_prev2_list.php">Housekeeping</a></li>
        </ul>

      </li>
      
      
      <li>

        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Progress</span>
          </a>
            <i class='bx bxs-chevron-down arrow' ></i> 
        </div>
        

        <ul class="sub-menu">
          <li><a class="link_name" href="#">Progress</a></li>
          <li><a href="prog_prev_ac_list.php">Engineering</a></li>
          <li><a href="prog_prev2_list.php">Housekeeping</a></li>
        </ul>

      </li>


      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Inquiry</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>

        <ul class="sub-menu">
          <li><a class="link_name" href="#">Inquiry</a></li>
          <li><a href="lap_prev_ac_frame.php">Engineering</a></li>
          <li><a href="lap_prev2_frame.php">Housekeeping</a></li>
          <li><a href="lap_prev3_frame.php">Work Schedule</a></li>
        </ul>

      </li>

<?php
  }
?>  


<?php
  if ($usrlevel =="4" or $usrlevel =="5")
  {
?>

       <li>

        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Schedule</span>
          </a>
            <i class='bx bxs-chevron-down arrow' ></i> 
        </div>

        <ul class="sub-menu">
          <li><a class="link_name" href="#">Schedule</a></li>
          <li><a href="req_prev_ac_list.php">Engineering</a></li>
        </ul>

      </li>

      <li>

        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Progress</span>
          </a>
            <i class='bx bxs-chevron-down arrow' ></i> 
        </div>
        

        <ul class="sub-menu">
          <li><a class="link_name" href="#">Progress</a></li>
          <li><a href="prog_prev_ac_list.php">Engineering</a></li>
        </ul>

      </li>


      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Inquiry</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>

        <ul class="sub-menu">
          <li><a class="link_name" href="#">Inquiry</a></li>
          <li><a href="lap_prev_ac_frame.php">Engineering</a></li>
        </ul>

      </li>

<?php
  }
?>  


<?php
  if ($usrlevel =="6" or $usrlevel =="9")
  {
?>

       <li>

        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Schedule</span>
          </a>
            <i class='bx bxs-chevron-down arrow' ></i> 
        </div>

        <ul class="sub-menu">
          <li><a class="link_name" href="#">Schedule</a></li>
<?php
   if ($usrlevel =="6")
   {
?>      
          <li><a href="req_prev2_leader_list.php">Housekeeping</a></li>
<?php
} else {
?>      
          <li><a href="req_prev2_list.php">Housekeeping</a></li>
<?php
} 
?>      

        </ul>

      </li>
      
      
      <li>

        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Progress</span>
          </a>
            <i class='bx bxs-chevron-down arrow' ></i> 
        </div>
        

        <ul class="sub-menu">
          <li><a class="link_name" href="#">Progress</a></li>
<?php
   if ($usrlevel =="6")
   {
?>
          <li><a href="prog_prev2_leader_list.php">Housekeeping</a></li>
<?php
 } else  {
?>

          <li><a href="prog_prev2_list.php">Housekeeping</a></li>
<?php
 }
?>

        </ul>

      </li>


      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Inquiry</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>

        <ul class="sub-menu">
          <li><a class="link_name" href="#">Inquiry</a></li>
          <li><a href="lap_prev2_frame.php">Housekeeping</a></li>
        </ul>

      </li>

<?php
  }

  if ($usrlevel == "1")
  {
?>  

      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-plug' ></i>
            <span class="link_name">Setting</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Setting</a></li>
<!--          <li><a href="paramedit.php">No.Register</a></li> -->

          <li><a href="QRcode_edit.php">QR Code</a></li>
          <li><a href="setac_list.php">Ampere AC</a></li>
          <li><a href="settegangan_edit.php">Set Parameter</a></li>
          <li><a href="sla_list.php">Set SLA</a></li>
<!--          <li><a href="libur_list.php">Hari Libur</a></li> -->
          <li><a href="gantipassedit.php">Ganti Password</a></li>
          <li><a href="gedunglist.php">Tabel Gedung</a></li>
          <li><a href="kodegedunglist.php">Tabel Kode Gedung</a></li>
          <li><a href="leaderlist.php">Tabel Leader</a></li>
          <li><a href="userlist.php">Tabel User</a></li>

        </ul>
      </li>


<?php
  } 
    if ($usrlevel =="2" or $usrlevel =="3" or $usrlevel =="4" or $usrlevel =="5" or $usrlevel =="6" or $usrlevel =="7" or $usrlevel =="8")
  {
?>      
  
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-plug' ></i>
            <span class="link_name">Setting</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Setting</a></li>
          <li><a href="gantipassedit.php">Ganti Password</a></li>
        </ul>
      </li>

<?php
  }
    if ($usrlevel =="9")
  {
?>

      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-plug' ></i>
            <span class="link_name">Setting</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Setting</a></li>
          <li><a href="leaderlist.php">Tabel Leader</a></li>
          <li><a href="gantipassedit.php">Ganti Password</a></li>
        </ul>
      </li>

<?php
  }
?>
      <li>
        <a href="logout.php">
          <i class='bx bx-compass' ></i>
          <span class="link_name">Logout</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="logout.php">Logout</a></li>
        </ul>
      </li>
      
      
  <li>
    <div class="profile-details">
      <div class="profile-content">
        <img src="images/profile.jpg" alt="">
      </div>
      <div class="name-job">
        <div class="profile_name"><?php echo "User : "; ?></div>
        <div class="job"><?php echo $username; ?></div>
      </div>
      <a href="logout.php">
       <i class='bx bx-log-out' ></i>
      </a> 
    </div>
  </li>
</ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
    </div>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<img src="images/menu2.jpg" alt="" width="800" height="170">

  </section>
  
  <script src="script.js"></script>

</body>


</html>
