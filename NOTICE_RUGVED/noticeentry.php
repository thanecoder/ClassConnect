<?php
@session_start();
echo"<title> UPLOAD NOTICE </title>
<body>
<form id='notice' action='submitnotice.php' method='POST' enctype='multipart/form-data'>
BRANCH
<select name='branch' id='branch' >
<option value='default'>Select </option>    
  <option value='comps'>comps</option>
  <option value='elec'>elec</option>
  <option value='mech'>mech</option>
  <option value='it'>it</option>
  <option value='extc'>extc</option>
  <option value='all'>all</option>
</select>
<br>
SEMESTER
<select name='sem' name='sem' >
<option value='default'>Select </option>    
<option value='1'>1</option>
<option value='2'>2</option>
<option value='3'>3</option>
<option value='4'>4</option>
<option value='5'>5</option>
<option value='6'>6</option>
<option value='7'>7</option>
<option value='8'>8</option>
<option value='0'>all</option>
</select>
<br>
TOPIC<input type='text'id='topic'name='topic'><br>
DESCRIPTION<input type='text'id='desc'name='desc'style='height:150px; width:150px;'><br>
UPLOAD(if required)<input type='file'id='file' name='file'><br>
<input type='submit' value='POST NOTICE'>
</form>
</body>";








?>