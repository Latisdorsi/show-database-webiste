<?php
return " <form method='post' action='admin.php'>
<h1>Create New User</h1>
<label>E-mail</label><input type='email' name='email' placeholder='Email' required />
<label>Password</label><input type='password' name='password' placeholder='Password' required />
<input type='submit' value='Sign Up!' name='signup' class='submit'/>
</form>";