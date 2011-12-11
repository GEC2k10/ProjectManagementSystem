<html>
<head></head>
<body>
<?php
require_once("../classes/showfile.class.php");
$file = new ShowFile($_GET['filename']);
$file->show_file();
?>
</body>
</html>


