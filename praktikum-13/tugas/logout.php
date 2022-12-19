<form action="" method="post">
    <input type="hidden" name="logout" value="1">
    <button type="submit">Logout</button>
</form>
<?php
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location:login_form.php");
}
?>
