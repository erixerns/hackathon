<!DOCTYPE html>


<form>
<table>
<tr>
<td>Name:</td>
<td><input type="text" name="name">
<td><span class = "errorClass"></span></td>
</tr>
<tr>
    <td>Password:</td>
    <td><input type="password" name ="pass" ></input></td>
    <td rowspan = "2"><span class = "errorClass"></span></td>
	</tr>


</tr>

<tr>
    <td colspan="2"><input type="submit" value="Enter"></td>
</tr>

<input type="hidden" name="valid">"></input>
<input type="hidden" name="filledOnce" value="true"></input>
</table>
</form>

</body>
</html>
