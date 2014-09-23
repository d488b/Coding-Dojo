<?php 
require("notesconnection.php");
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Notes</title>
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script type="text/javascript">
    $(document).ready(function(){
		$(document).on('submit',"#new_note", function(){
            var new_note_form = $(this);
            $.post(new_note_form.attr('action'),new_note_form.serialize(),function(data){
             		$('#notes').append(data);
            	},
            	"json");
            return false;
        });

    });
	</script>
</head>
<body>
	<h4>Notes</h4>
	<div id="notes"></div>
	<form action="notesprocess.php" method="post" id="new_note">
		<textarea placeholder="Enter description here..." name="description" rows="10"cols="30"></textarea><br>
		<input type="text" name="title" placeholder="Insert note title here..." ><br>
		<input type="submit" value="Add Note">
	</form>

</body>
</html>