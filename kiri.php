<table width=100% cellspacing=5>
<?php
include "config/koneksi.php";

// Form Pencarian
echo "<tr><td colspan=2><img src=images/search.jpg></td></tr>
      <tr><td colspan=2>
      <form method=POST action='?module=hasilcari'>    
        <input name=kata type=text size=23>
        <input type=submit value=Cari>
      </form>
      <hr color=#265180></td></tr>";

// Menu Utama
echo "<tr><td colspan=2><img src=images/mainmenu.jpg></td></tr>";
$menu=mysqli_query($conn,"SELECT * FROM modul 
                   WHERE publish='Y' and aktif='Y' 
                   ORDER BY urutan");
echo "<tr><td class=bullet>&bull; </td>
      <td><div id=menu><a href=?module=home> Home</a></div></td></tr>";
while($r=mysqli_fetch_array($menu)){
  echo "<tr><td class=bullet>&bull; </td>
        <td><div id=menu><a href=$r[link]> $r[nama_modul]</a></div></td></tr>";
}
echo "<tr><td colspan=2><hr color=#265180></td></tr>";

// Berita Terpopuler
echo "<tr><td colspan=2><img src=images/populer.jpg></td></tr>";
$populer=mysqli_query($conn,"SELECT * FROM berita ORDER BY counter DESC LIMIT 10");
while($p=mysqli_fetch_array($populer)){
  echo "<tr valign=top><td class=bullet>&bull; </td>
        <td><div id=kiri><a href=?module=detailberita&id=$p[id_berita]>
        $p[judul]</a> ($p[counter])</div></td></tr>";
}
echo "<tr><td colspan=2><hr color=#265180></td></tr>";

// Tampilkan banner dalam bentuk gambar
$banner=mysqli_query($conn,"SELECT * FROM banner 
                    ORDER BY id_banner DESC");
while($b=mysqli_fetch_array($banner)){
  echo "<tr align=center><td colspan=2><br>
        <a href=$b[url]><img src='admin/foto_berita/$b[gambar]' border=0></a>
        </td></tr>";
}
?>
</table>
