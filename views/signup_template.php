<?php
return " <form method='post' action='index.php'>
<h1>Create New User</h1>
<label>E-mail</label><input type='email' name='email' placeholder='Email' required />
<label>Username</label><input type='text' name='username' placeholder='Username' required />
<label>Password</label><input type='password' name='password' placeholder='Password' required />
<input type='submit' value='Sign Up!' name='signup' class='submit'/>
</form>";