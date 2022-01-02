<!DOCTYPE html>
<html>
<head>
	<title>creating text box</title>
</head>
<body>
	<h2>Please provide following informaion</h2>
<div>
 <form action="receive_form.php"> 
<fieldset><legend>name_password</legend>
	<p>Enter your name:<input autofocus id="username" type="text" name="urname" size="10" maxlength="10" placeholder="name">
		<!-- if we define value to the input then apply readonly attribute then user cant change that value -->
		<label for="username"></label>
	<p>Enter your password:<input type="password" name="password" size="10" maxlength="10" placeholder="password">
		<p>class:<input id="class" type="text" name="class" value="XII" readonly><label for="class"></label>
	</fieldset>
	<br><fieldset><legend>country info</legend>
			<select name="country[]" multiple>
			  <optgroup label="asian">asian
				<option value="india">india</option>
			 	<option value="sri lanka">sri lanka</option>
				<option value="pakistan">pakistan</option>
			  </optgroup>
			  <optgroup label="western">western
				<option value="brazil">brazil</option>
				<option value="us">us</option>
				<option value="uk">uk</option>
			</optgroup>
			</select>
		</fieldset>
		<fieldset ><legend>
	<p>select station name</p></legend>
			<input type="radio" name="station" value="bagb" id="bagb"><label for="bagb"> bgb</label>
		<input type="radio" name="station" value="pqs" id="pqs"><label for="pqs">pqs</label>
		<input type="radio" name="station" value="sdah" id="sdah"><label for="sdah">sdah</label>
		</fieldset>
		<br>
		<div><p>form validation part</p>
		<div><p>Enter the mail id:<input type="email" name="email" required></div>
		<div><p>Enter the website:<input type="url" name="url" required></div>
		<div><p>enter pincode:<input type="number" name="pincode" required></div>
		<br>
		</div>
	<button>send</button>
</form>
</div>
</body>
</html>