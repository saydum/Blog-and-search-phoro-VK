<?php
$arrData = $_GET["urlVk"];

$data = file_get_contents($arrData);



$urlLink = json_decode($data, true);

foreach ($urlLink as $key => $value) {
	foreach ($value as $key => $val) {
		foreach ($val as $key => $photoLink) {
			$arrPhoto_807[] = $photoLink['photo_807'];
		}
	}
}
?>
<div class="container">
	<div class="row row-cols-1 row-cols-md-3 g-4">
		<?php foreach ($arrPhoto_807 as $photoUrl):?>
			<div class="card-deck">
				<div class="card">
					<a href="<?php echo $photoUrl?>">
						<img src="<?php echo $photoUrl?>" class="card-img-top" alt="фото вк" width="336" height="400">
					</a>
				</div>
			</div>
		<?php endforeach;?>
	</div>
</div>
