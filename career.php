

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Recruitment SiRekTa</title>

	<link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap4/css/custom.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
<body style="background-image: url(bootstrap4/img/bg.png");">

<style>
  @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap');

html,
body {
  height: 100vh;
  display: grid;
  place-items: center;
  background-color: #F9FAFB;
}

section {
  max-width: 80rem;
  background: linear-gradient(to right, #4C1D95 30%,  #8B5CF6);
  color: white;
  line-height: 1.5;
  font-family: 'Nunito', sans-serif;
}

@media (min-width: 600px) {
  section {
    display: grid;
    grid-template-columns: 1fr 1fr;
  }
  
  .about-us {
    padding: 3vw 0 3vh 3vw;
  }
  
  .image-wrapper {
    filter: hue-rotate(20deg);
    clip-path: polygon(0 100%, 50% 0, 100% 0, 100% 100%);
  }
}

.about-us {
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 2rem;
  
  h2 {
    font-weight: 600;
    white-space: nowrap;
    font-size: clamp(2rem, 5vw, 4rem);
    margin-block-end: .5rem;
  }
  
  p {
    font-size: clamp(1rem, 1.5vw, 3rem);
  }
}

.image-wrapper {
  height: 100%;
  width: 100%;
  clip-path: polygon(0, 0, 0, 0);

  img {
    display: block;
    height: 100%;
    width: 100%;
    object-fit: cover;
    object-position: right center;
  }
}

</style>
<section>
  <div class="about-us">
    <h2>We are hiring.</h2>
    <p>Are you looking for a new challenge? You are passionate about innovation and enjoy working with people? Then you've come to the right place.</p>
   </div>
    <div class="image-wrapper">
    <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2940&q=80" />
  </div>
</section>

<?php 
	include "navbarb4.php";
 ?>




 	<div class="container">
 		<!-- awal posting -->
  <?php
  error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
  include"koneksi.php";
  $post = $_GET["post"];
  if (!$post) {
  $ambil_berita = mysqli_query($connect,"SELECT * from lowongan order by id_lowongan desc"); 
  while($hasil = mysqli_fetch_array($ambil_berita)){ 
  ?> 
   <div class="row-fluid"> 
  
     <div class="span8 text-center"> 
       <h2><?=$hasil['posisi_pekerjaan'];?></h2>
		<h4> <?=$hasil['tgl_mulai'];?> s/d <?=$hasil['tgl_selesai'];?> </h4>
        <br> 
        <p> 
          <a href="career.php?post=<?=$hasil['id_lowongan'];?>" class="btn magictime openDownLeftReturn btn-primary	">Baca Selengkapnya</a>

     <!--      <a href="#" class="btn magictime openDownLeftReturn btn-inverse"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Diposkan pada <?=$hasil['tgl_berita'];?></a>  -->
        </p> 

      </div>   
    </div> 
    <hr style="height: 10px; border: 0; box-shadow: 0 10px 10px -10px #1e88e5 inset;"> 


 <?php 
  }  }

  else
  {

 
  $ambil_berita = mysqli_query($connect, "SELECT * from lowongan where id_lowongan ='$post'"); 
 $hasil = mysqli_fetch_array($ambil_berita); 
 ?> 
  <div class="paragraphs"> 
   <div class="row"> 
    <div class="panel-body">
      <div class="tambahan"> 
          <div class="content-heading">
             <h3 class="text-center" style="color: black; font-weight: bold;"><?=$hasil['posisi_pekerjaan'];?></h3>
             <h6 class="text-center"><?=$hasil['tgl_mulai']; ?> s/d <?=$hasil['tgl_selesai']; ?></h6>
          </div> 
          <hr>
          <p class="text-center"><b><?=$hasil['tgl_mulai'];?> s/d <?=$hasil['tgl_selesai'];?></b></p>
          <p><?=$hasil['deskripsi_pekerjaan'];?></p>
          <br>
          <p><b>Jurusan Akademik : </b><?=$hasil['jurusan_akademik'];?></p>
          <p><b>Lokasi Pekerjaan : </b><?=$hasil['lokasi_pekerjaan'];?></p>
          <p><b>Lokasi Seleksi :</b><?=$hasil['lokasi_seleksi'];?></p>
          <br>

      



          <hr style="height: 10px; border: 0; box-shadow: 0 10px 10px -10px #1e88e5 inset;"> 

        

        <div style="clear: both;"></div>

          

    </div> 
    </div>
   </div> 
  </div> 


    <?php
  $ambil_recent = mysqli_query($connect,"SELECT * from lowongan "); 
 ?> 
  <div class="panel-berita"> 
    
     <div class="panel-heading">Baca Juga</div> 
      <ul type="square"> 
       <?php 
    while($hasil_recent= mysqli_fetch_array($ambil_recent)){ 
       echo "<li><a href='career.php?link=lihatDetailtnt.php&id=$hasil_recent[id_lowongan]'>Lowongan ".$hasil_recent['posisi_pekerjaan']."</a></li>"; 
    } 
    ?> 
      </ul> 
  
  </div>

<?php 
  }
 ?>  
 	</div>




<?php 
	include "footerb4.php";
 ?>



	<script src="bootstrap4/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>



