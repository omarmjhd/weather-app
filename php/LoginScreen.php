<form name="reg" action="code_exec.php" onsubmit="return validateForm()" method="post">
<table width="274" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td colspan="2">
		<div align="center">
		  <?php
		$remarks=$_GET['remarks'];
		if ($remarks==null and $remarks=="")
		{
		echo 'Register Here';
		}
		if ($remarks=='success')
		{
		echo 'Registration Success';
		}
		?>
	    </div></td>
  </tr>
    <tr>
        <td>First Name: </td>
        <td><input type="text" class="userText" name="firstName" ></td>
    </tr>
    <tr>
        <td>Last Name: </td>
        <td><input type="text" class="userText" name="lastName" ></td>
    </tr>
    <tr>
        <td>User ID:</td>
        <td><input type="text" class="userText" name="userID"> (8-15 characters with no spaces)</td>
    </tr>
    <tr>
        <td>Password: </td>
        <td><input type="password" class="userText" name="password1"> (8-15 characters with no spaces)</td>
    </tr>
    <tr>
        <td>Confirm Password: </td>
        <td><input type="password" class="userText" name="password2"></td>
    </tr>
    <tr>
        <td>Email Address: </td>
        <td><input type="text" class="userText" name="email"></td>
    </tr>
    <tr>
        <td>Favorite City: </td>
        <td><select id="city" name="city" form="signUp" required>
                <option value="noselect">--Please select--</option>
                <option value="Atlanta">Atlanta</option>
                <option value="Denver">Denver</option>
                <option value="Houston">Houston</option>
                <option value="NewOrleans">New Orleans</option>
                <option value="NewYork">New York</option>
                <option value="Seattle">Seattle</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Favorite Color: </td>
        <td><select id="color" name="color" form="signUp" required>
                <option value="noselect">--Please select--</option>
                <option value="Red">Red</option>
                <option value="Orange">Orange</option>
                <option value="Yellow">Yellow</option>
                <option value="Green">Green</option>
                <option value="Blue">Blue</option>
                <option value="Indigo">Indigo</option>
                <option value="Violet">Violet</option>
            </select></td>
    </tr>
</table>
</form>