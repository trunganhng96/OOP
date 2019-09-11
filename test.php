<!DOCTYPE html>
<html>
<h1>Kiểm tra domain web</h1>
<body>
  <?php
  if (!empty($_SERVER['https'])) {
    echo "trang được gọi từ https";
  }
  else  {
    echo "trang được gọi từ http";
  
  }
  ?>

</body>
</html>