<?php

print_r($_FILES);

if(!empty($_FILES)) {
	$file = new SplFileObject($_FILES["fileToUpload"]["tmp_name"]);

	while ($row = $file->fgetcsv()) {
		print("<pre>");
		print_r($row);
		print("</pre>");
	}
}
?>
<!DOCTYPE html>
<html>
<body>

<form action="index.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload" name="submit">
</form>

</body>
</html>