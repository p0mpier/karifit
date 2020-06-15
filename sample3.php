<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>karifit</title>
</head>
<body>
<form name="frm">
    <input type="text" name="name" id="nameid">
    <input type="button" id="btn" value="OK">
</form>
<div id="form-text"></div>
<?php print?>
<script>
    var name = document.frm.name.value;
    document.getElementById("btn").onclick = function() {
        document.getElementById("form-text").innerHTML = "こんにちは " + document.getElementById("nameid").value + " さん！";
    }
</script>
<?php include('./common/footer.php');?>