<?php
	if (!defined('EIS'))
	{
		die('No direct access to these files');
	}
	@include_once("./lib/classes/Validator.php");
	@include_once("./lib/classes/DBConnection.php");
	@include_once("./lib/classes/Download.class.php");
	
	if (isset($_GET['download_id']))
	{
		$dl = new Download();
		$dl_id = is_numeric($_GET['download_id'])?$_GET['download_id']:1;
		$arr = $dl->viewDownload($dl_id);
		if (is_bool($arr) || empty($arr))
		{
			echo "Invalid download ID selected";
			return;
		}
		//print_r($arr);
	?>
		<div id="tutbox">
			<div id="tut_title">
				<span class="title"><?php echo $arr[0]['download_title']; ?></span>
				<span class="author">Uploaded by - <?php echo $arr[0]['uploaded_by'];?></span>
			</div>
			
			<div id="tut_body">
				<div style=""><?php echo $arr[0]['download_desc']; ?></div>
				<br />
				<?php
					echo "<a href='./downloads/".$arr[0]['download_path']."' title='".$arr[0]['download_title']."'>";
				?>
				<span class="button" style="margin-top: 10px;">
					Download
				</span></a>
				<?php
					
				?>
			</div>
		</div>	
	<?php
	}
?>