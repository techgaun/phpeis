<?php
	if (!isset($_SESSION['user_name']))
	{
		echo "<div id='dlheader'>You are not allowed to access the forums because you are not logged in. Please login or register to view the forum.</div>";
	}
	else 
	{
		@include_once '../lib/classes/Categories.class.php';
		@include_once '../lib/classes/Forum.class.php';
		
		$categ = new Categories();
		
		$cats = $categ->ListCategories();
		//print_r($cats);
?>
<div id="categorybox">
	<div id="catdesc">
		Select one of the categories to add or update forum of that category.
	</div>
	
	<?php
		if ($cats == false)
			echo "No categories yet";
		else
		{
	?>
	<select name="selCat" id="selCat" onchange="onchange="if (this.options[this.selectedIndex].value != '0') {ajaxHandler('forum/viewforumbyid.php'), 'forumsel'}">
		<option value="0">Categories</option>
		<?php
			foreach ($cats as $cat)
			{
				echo "<option value='".$cat['cat_id']."'>".$cat['cat_name']."</option>";
			}
		?>
	</select>
	<?php } ?>
	
	<div id="addcat">
		Add category: <input type="text" name="txtCat" id="txtCat" /><input type="button" class="button" name="sbtAddCat" id="sbtAddCat" value="Add Category" onclick="ajaxHandler('forum/addcategory.php', 'none')" style="width: 76px; margin-left: 10px;" />
	</div>
</div>

<div id="forumbox">
	<div id="forumdesc">
		
	</div>
	<div id="forumsel">
	<select id="selForum" name="selForum">
		<option value="0">Forums</option>
	</select>
	</div>
	<div id="addforum">
		Add Forum: <input type="text" name="txtForum" id="txtForum" /> <input type="button" class="button" name="sbtAddForum" id="sbtAddForum" value="Add Forum" onclick="ajaxHandler('forum/addforum.php', 'none')" style="width: 70px; margin-left: 10px;" />
	</div>
	
</div>
<?php } ?>