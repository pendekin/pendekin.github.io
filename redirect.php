<?php
  ob_start();
// Memanggil file config.php
  include("config.php");
  
  // Mengambil url pendek pada address bar
  $url = mysql_real_escape_string($_GET['url']);
// Mengambil data dari database "url" yang sesuai dengan variabel $url
  $sql_url 	= mysql_query("select * from url where url_pendek = '$url'");
// Menampilkan hasil $sql_url menjadi array berbentuk object
  $url_row 	= mysql_fetch_object($sql_url);
// Menampilkan hasil $sql_url menjadi angkan atau menghitung semua data yang ada pada tabel "url"
  $cek = mysql_num_rows($sql_url);
// Jika url pendek ada pada tabel url
  if($cek > 0){
    // Menambah 1 point pada field hit
    mysql_query("update url set hit = '$url_row->hit'+1 where id = '$url_row->id'");
// Mengalihkan ke url asli dari url pendek
    header("location: $url_row->url_asli");
// Jika url pendek tidak terdapat pada tabel url
  }else{
    echo "<h1>URL Tidak ditemukan :(</h1>";
  }
?>