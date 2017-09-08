<!DOCTYPE html>

<?php if(!file_exists("loginCode.php")){
    header("Location: error404.php");
}
else{
    require "loginCode.php";
}
?>
<?php
$headers = getallheaders();
if(preg_match("/windows|win/i",$headers["User-Agent"])){
    echo "Running Windows Machine!<br>";
}
if(preg_match("/Chrome/i",$headers["User-Agent"])){
    echo "Running Chrome!";
}
else if(preg_match("/firefox/i",$headers["User-Agent"])){
    echo "Running Firefox!";
}
?>
<html>
<head>
<link href="stylesheet.css" type="text/css" rel="stylesheet"/>
<title>Login</title>
</head>
<body>
<p class="errorClass">
<?php 
if(count($_GET)>0){
    if($_GET["jumpedPages"])
        echo "Fill this form first!";
}?>
</p>
<form name="redirect" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
<table>
<tr>
<td>Name:</td>
<td><input type="text" name="name" value="<?php echo htmlspecialchars($name)?>">
<td><span class = "errorClass"><?php echo $nameErr ?></span></td>
</tr>
<tr>
    <td>Password:</td>
    <td><input type="password" name ="pass" value="<?php echo htmlspecialchars($pass)?>"></input></td>
    <td rowspan = "2"><span class = "errorClass"><?php echo $passErr ?></span></td>
</tr>

<tr>
    <td>Confirm</td>
    <td><input type="password" name="confirm" value="<?php echo htmlspecialchars($confirm)?>"></input></td>
</tr>

<tr>
    <td>Email:</td>
    <td><input type="text" name="email" value="<?php echo $email?>"></td>
    <td><span class = "errorClass"><?php echo $emailErr ?></span></td>
</tr>

<tr>
    <td colspan="2"><input type="submit" value="Enter"></td>
</tr>

<input type="hidden" name="valid" value="<?php echo getValid($name,$pass,$confirm);?>"></input>
<input type="hidden" name="filledOnce" value="true"></input>
</table>
</form>

</body>
</html>
