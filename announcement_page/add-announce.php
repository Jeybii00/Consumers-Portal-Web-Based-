<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements</title>
    <link rel="stylesheet" type="text/css" href="../css/admin_dashboard.css">
</head>
<body style=" overflow: hidden;">
 
<?php
        include '../include/sidebar_admin.php';
        include '../include/header_admin.php';
   ?>
   <div class="content-body">
<div class ="a-nounce">
<h1>Create Announcement</h1>
<form action="post-announce.php" method="POST" onsubmit='addNewLines();'>
    <div class = "a-type">
    <label for="choice">Type: </label>
    <select name="type" id="choice">
        <optgroup label="Type of Post">
        <option value="Activity">Activitiy</option>
        <option value="Announcement">Announcement</option>

    </div>
    <textarea name="announcement" class="announcement" id="announcement"  rows="4" cols="50">
</textarea><br>
<textarea class="new-announce" id="new-announce"></textarea>

<button type="submit" name="submit" class="add-btn">Post</button>
</div>
</form>
<script>
    function addNewLines(){
        text = document.getElementById('new-announce').value;
        text = text.replace(/  /g,"[sp][sp]");
        text = text.replace(/\n/g,"[nl]");
        document.getElementById('announcement').value = text;
        return false;
    }
</script>


</body>
</html>