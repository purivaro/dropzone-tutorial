<?php require $_SERVER['DOCUMENT_ROOT']."/inc/db/db_webdev.php";?>
<?php
$sql = "
	SELECT
		nId_post,
		cPost,
		dCreated
	FROM
		tb_post
	ORDER BY
		nId_post DESC
";
$data = $db->select($sql);
foreach($data AS $key=>$value){
	$sql = "
		SELECT
			cImg_path
		FROM
			tb_post_img
		WHERE
			tb_post_img.nId_post = '{$value['nId_post']}'
		ORDER BY
			nId_post_img
	";
	$data_img = $db->select($sql);
	$data[$key]['img'] = $data_img;
	$data[$key]['img_count'] = count($data_img);
}
echo json_encode([
	"success"=>true,
	"posts"=>$data
]);
?>