<?php

require_once("connection.php");

$theWork = findWork();


?>

<!DOCTYPE html>

<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php foreach ($theWork as $piece) { ?>
  <div class="work">
  <h2><?php echo $piece['title']; ?></h2>
  <h3><?php echo $piece['name']; ?></h3>
  <h5><?php echo $piece['portfolioWebsite']; ?></h5>
  <p><?php echo $piece['description']; ?></p>
  </div>


<?php } ?>
</body>
</html>