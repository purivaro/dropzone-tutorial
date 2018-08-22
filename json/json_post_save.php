<?php require $_SERVER['DOCUMENT_ROOT']."/inc/db/db_webdev.php";?>
<?php
if($_REQUEST['post']){
	$sql = "
		INSERT INTO tb_post (
			cPost
		) VALUES (
			'{$_REQUEST['post']}'
		)
	";
	$nId_post = $db->insert($sql);

	foreach($_REQUEST['img_path'] AS $img_path){
		$sql = "
			INSERT INTO tb_post_img (
				nId_post,
				cImg_path
			) VALUES (
				'{$nId_post}',
				'{$img_path}'
			)
		";
		$nId_post_img = $db->insert($sql);
	}
	echo json_encode([
		"success"=>true,
		"msg"=>"บันทึกแล้ว"
	]);
}
?>