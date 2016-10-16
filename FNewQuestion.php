<?php
$sid=$_GET['sid'];
echo "<table>";
echo '<tr><td><input type="hidden" id="sid" value="'.$sid.'"/></td></tr>';
echo "<tr><td>Question:</td><td><input type='text' id='qstn' name='qstn'/></td></tr>";
echo "<tr><td><input type='button' id='submit' value='Submit' onclick='add()'/></td></tr>";
echo "</table>";
?>