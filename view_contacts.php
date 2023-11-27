<script src="assets/js/jquery-3.5.1.js"></script> 
<?php
echo '<div class="jumbotron">';
echo '<h1>Contact Form Entries</h1>';
echo '<table>';
echo '<tr><td>First Name</td><td>Last Name</td><td>email</td><td>phone number</td><td>comments</td></tr>';
echo '<tbody id="results">'; /* "id" now makes "tbody" explicitly viewable to the DOM via an ID*/
echo'</tbody';
echo '</table>';
?>

<script>
	function refresh_data()
	{
		$.ajax({
			type: 'post',
			url: 'https://ec2-18-223-133-190.us-east-2.compute.amazonaws.com/hw20/query_contacts.php',
			success: function(data) {
				$('#results').html(data);
			}
		});
	}
setInterval(function(){ refresh_data(); }, 500); //500ms =half a second
</script>
