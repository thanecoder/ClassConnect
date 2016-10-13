<div>
<table>
<form method="get" action="FAddTopic.php" onsubmit=" return emptychk()">
<tr><td>Name of new topic:</td><td><input type="text" id="name" name="name"/></td></tr>
<tr><td>Subject:</td><td><input type="text" id="subject" name="subject"/></td></tr>
<tr><td>Description:<br>(Not more than 200 characters.)</td><td><textarea rows="3" cols="30" name="descp" id="descp"></textarea></td></tr>
<tr><td><input type="submit"></td></tr>
</table>
<script>
function emptychk()
{
var	str1=document.getElementById('name').value;
var	str2=document.getElementById('subject').value;
var	str3=document.getElementById('descp').value;
	if(str1=="")
	{
		alert("New topic MUST have a name.");
		return false;
	}
	else if(str2=="")
	{
		alert("New topic MUST have a subject.");
		return false;
	}
	else if(str3=="")
	{ 
		alert("It is recommended for new topic to have a description.")
	}
	else
	{
			return true;
	}
}
</script>
</div>