<?php
    	if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
            echo "<link href=\"../../css/style.css\" rel=\"stylesheet\" type=\"text/css\"  media=\"all\" />
                <!--start-wrap--->
                <div class=\"wrap\">
                    <!---start-header---->
                        <div class=\"header\">
                            <div class=\"logo\">
                                <h1><a href=\"#\">ATTENTION !!!</a></h1>
                            </div>
                        </div>
                    <!---End-header---->
                    <!--start-content------>
                    <div class=\"content\">
                        <img src=\"../../images/error-img.png\" title=\"error\" />
                        <p><span><label>O</label>hh.....</span>Please Login, Before Access This Page !!!</p>
                        <a href=\"index.php\">Back To Home</a>
                        <div class=\"copy-right\">
                            <p>&copy; 2018 Ohh. All Rights Reserved</p>
                        </div>
                       </div>
                    <!--End-Cotent------>
                </div>
                <!--End-wrap--->";
        }
        else{
        $aksi="modul/mod_identitas/aksi_identitas.php";
        $act = isset($_GET['act']) ? $_GET['act'] : '';
  switch($act){
  // Tampil identitas
  default:
    $record  = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM identitas LIMIT 1"));
    echo "
    <!-- Content Header (Page header) -->
    <section class=\"content-header\">
      <h1>
        Data Identitas Web</h1>
      <ol class=\"breadcrumb\">
        <li><a href=\"?module=beranda\"><i class=\"fa fa-dashboard\"></i> Home</a></li>
        <li class=\"active\">Data Identitas</li>
      </ol>
    </section>
    <section class='content'>
    <div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Identitas Website</h3>
            </div>
              <div class='box-body'>
              <form class='form-horizontal' role='form' method=POST enctype='multipart/form-data' action=$aksi?module=identitas&act=update>
              <input type=hidden name=id value=$record[id_identitas]>
              <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Nama Pemilik</th>   <td><input type='text' class='form-control' name='nama_pemilik' value='$record[nama_pemilik]'></td></tr>
                    <tr><th scope='row'>Nama Website</th>                        <td><input type='text' class='form-control' name='nama_website' value='$record[judul_website]'></td></tr>
                    <tr><th scope='row'>Domain</th>                 <td><input type='text' class='form-control' name='alamat_website' value='$record[alamat_website]'></td></tr>
                    <tr><th scope='row'>Email</th><td><input name='email' class='form-control' type='text' value=\"$record[email]\"></td></tr>
                    <tr><th scope='row'>Sosial Network</th>               <td><input type='text' class='form-control' name='facebook' value='$record[facebook]'></td></tr>
                    <tr><th scope='row'>Twitter Widget</th>               <td><input type='text' class='form-control' name='twitter_widget' value='$record[twitter_widget]'></td></tr> 
                    <tr><th scope='row'>Twitter</th>               <td><input type='text' class='form-control' name='twitter' value='$record[twitter]'></td></tr> 
                    <tr><th scope='row'>Google +</th>               <td><input type='text' class='form-control' name='googleplus' value='$record[googleplus]'></td></tr>    
                    <tr><th scope='row'>Meta Deskripsi</th>               <td><input type='text' class='form-control' name='meta_deskripsi' value='$record[meta_deskripsi]'></td></tr>
                    <tr><th scope='row'>Meta Keyword</th>                 <td><input type='text' class='form-control' name='meta_keyword' value='$record[meta_keyword]'></td></tr>
                    <tr><th scope='row'>Google Maps</th>                  <td><textarea class='form-control' name='maps' style='height:80px'>$record[googlemap]</textarea></td></tr>
                    <tr><th scope='row'>Ganti Favicon</th>                      <td><input type='file' class='form-control' name='fupload' value='$record[favicon]'>
                    <hr style='margin:2px'>Favicon Saat ini : <img src=../$record[favicon] width=30></td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='upload' class='btn btn-info'>Update</button>
                    <button type=\"button\" class=\"btn btn-default pull-right\" onclick=\"self.history.back()\">Cancel</button>
                    
                  </div>
            </div>
        </div>
        </section>";

    break;  
        }

}