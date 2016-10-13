<?php
$tid=$_GET['tid'];
echo "<table>
<tr><td><input type='hidden' id='tid' value='".$tid."'/></td></tr>
<tr><td>Question:</td><td><input type='text' id='qstn' name='qstn'/></td><tr>
<tr><td><input type='button' id='submit' value='Submit' onclick='add()'/></td></tr>
</table>";
?>