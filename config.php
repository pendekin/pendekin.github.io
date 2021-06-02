<?php
// Membuat variabel
$host = "localhost";
$user = "root";
$pass = "";
$db = "database_shorten";
// menyatukan variabel menjadi sebuah koneksi
mysql_connect($host,$user,$pass);
// memilih database yang akan digunakan
mysql_select_db($db);
// variabel web
$site['root'] 	= "http://localhost/shorten/"; // isi dengan alamat domain kamu, jika didalam localhost maka gunakan http://localhost/nama-folder/.
$site['judul'] 	= "Pendekin"; // isikan dengan judul situs kamu.
$site['deskripsi'] = "Pendekan URL kamu disini!"; // isikan dengan deskripsi situs kamu.
?>