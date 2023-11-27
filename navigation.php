<?php
$dblink=db_connect("content");
$sql="Select * from `menus` where `status`='active'";
$result=$dblink->query($sql) or
	die("<p>Something went wrong with $sql</p>".$dblink->error);
echo '<nav>';
echo'<ul class="nav nav-justified">';
while ($data=$result->fetch_array(MYSQLI_ASSOC))
{

	/*If page is equal to the current data, we draw the menu item with the active class */
	if ($_GET['page']==$data['page_variable']) 
		echo '<li class="active"><a href="index.php?page='.$data['page_variable'].'">'.$data['title'].'</a></li>';
	else /* otherwise, we draw the menu item without the active class*/
		echo '<li><a href="index.php?page='.$data['page_variable'].'">'.$data['title'].'</a></li>';
}
echo '</ul>';
echo '</nav>';
?>