<form name='entrada' method="POST">
<table>
<tr>
<td>Nombre:</td><td> <input type="text" name="user" 
    value="<?=(isset($_REQUEST['user']))?$_REQUEST['user']:''?>"></td></tr>
<tr>
<td>Contraseña: </td><td><input type="password" name="password"
    value="<?=(isset($_REQUEST['password']))?$_REQUEST['password']:''?>"></td>
</tr>
</table>
<input type="submit" name="orden" value="Entrar">
</form>
