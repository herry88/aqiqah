<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<script>document.location='index.php';</script>";
}else{
include "../../../config/connection.php";
include "../../../config/fungsi_thumbnail.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Update identitas
if ($module=='identitas' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadFavicon($nama_file);
    mysqli_query($koneksi, "UPDATE identitas SET nama_ pemilik  = '$_POST[nama_pemilik]',
	                                             email          = '$_POST[email]',
	                                             nama_website   = '$_POST[judul_website]',
                								 facebook       = '$_POST[facebook]',
                								 twitter_widget = '$_POST[twitter_widget]',
												 twitter		= '$_POST[twitter]',
												 googleplus	 	= '$_POST[googleplus]',	
                                                 meta_deskripsi = '$_POST[meta_deskripsi]',
                                                 meta_keyword   = '$_POST[meta_keyword]',
                                                 favicon        = '$nama_file',
									             googlemap      = '$_POST[googlemap]' 
							WHERE id_identitas   = '$_POST[id]'");
  }else{
    mysqli_query($koneksi, "UPDATE identitas SET nama_website   = '$_POST[nama_website]',
	                                             email   		= '$_POST[email]',
											     url       		= '$_POST[url]',
												 facebook   	= '$_POST[facebook]',
                								 rekening  		= '$_POST[rekening]',
                								 no_telp        = '$_POST[no_telp]',  
												 meta_deskripsi = '$_POST[meta_deskripsi]',
											     meta_keyword   = '$_POST[meta_keyword]',
									             googlemap      = '$_POST[googlemap]' 
							WHERE id_identitas   = '$_POST[id]'");
  }
  header('location:../../media.php?module='.$module);
}
}

