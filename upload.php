<?php
session_start();
?>

<?php
$_SESSION['uploaded'] = 1;

$allowedExts = array("mp3");
$tmp = explode(".", $_FILES["file"]["name"]);
$extension = end($tmp);
if (($_FILES["file"]["type"] == "audio/mp3")
	&& ($_FILES["file"]["size"] < 1000000)
	&& in_array($extension, $allowedExts)) {
	if ($_FILES["file"]["error"] > 0) {
		echo "Error: " . $_FILES["file"]["error"];
	} else {
		echo "Upload: " . $_FILES["file"]["name"] . "<br>";
		echo "Type: " . $_FILES["file"]["type"] . "<br>";
        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        if (!is_dir("./audio/user_" . session_id() . "/")) {
        if (!mkdir("./audio/user_" . session_id() . "/")) {
          echo session_id();
          die('hello world');
        }
        }
        rename($_FILES["file"]["tmp_name"], "audio/user_" . session_id() ."/in.mp3");
		chmod("audio/user_" . session_id() . "/in.mp3", 0755);
	}
} else {
	echo "Upload: " . $_FILES["file"]["name"] . "<br>";
	echo "Type: " . $_FILES["file"]["type"] . "<br>";
	echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
	echo "Invalid file";
}

header('Location: display.php')
?>
