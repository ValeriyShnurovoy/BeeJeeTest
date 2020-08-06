<?= (!empty($message['message'])) ? $message['message'] : '' ?>

<form method="post" action="">
    <table>
        <tr>
            <td><span>Login</span></td>
            <td><input name="login"></td>
        </tr>
        <tr>
            <td><span>Password</span></td>
            <td><input type="password" name="pass"></td>
        </tr>
        <tr>
            <td><input type="reset"></td>
            <td><input type="submit" name="ok" title="OK" value="OK"></td>
        </tr>
    </table>
</form>
