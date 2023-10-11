<?php
header("Content-type: text/css; charset: UTF-8");
if(isset($_GET['font_familly']))
{
  $font_familly = $_GET['font_familly'];
}
else {
  $font_familly = 'Open Sans';
}
?>

html{
  font-family: <?php echo $font_familly?>;
}

body{
  font-family: <?php echo $font_familly?>;
}

h1,
h2,
h3,
h4,
h5,
h6 {
  font-family: <?php echo $font_familly?>;
}