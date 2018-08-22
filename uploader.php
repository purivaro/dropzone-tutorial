<?php require $_SERVER['DOCUMENT_ROOT']."/lib/SimpleImage/src/claviska/SimpleImage.php";?>
<?php 
if($_FILES['file']['tmp_name']){
	// ["flower","jpg"]
	$ext = end(explode(".",$_FILES['file']['name']));
	$filename = uniqid().".".$ext;
	$img_path = "/learnweb/upload/dropzone/upload/".$filename;

	try {
		// Create a new SimpleImage object
		$image = new \claviska\SimpleImage();
	
		// Magic! ✨
		$image
			->fromFile($_FILES['file']['tmp_name'])                     // load image.jpg
			->autoOrient()                              // adjust orientation based on exif data
			->resize(800, 0)                          // resize to 320x200 pixels
			->toFile($_SERVER['DOCUMENT_ROOT'].$img_path);      // convert to PNG and save a copy to new-image.png
	
		echo json_encode([
			"success"=>true,
			"img_path"=>$img_path,
			"msg"=>"บันทึกเรียบร้อย"
		]);
		// And much more! 💪
	} catch(Exception $err) {
		// Handle errors
		echo json_encode([
			"success"=>false,
			"msg"=>$err->getMessage()
		]);
	}

}

?>