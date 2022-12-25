<?php
if (!session_id()) session_start();
if (!isset($_SESSION['user'])) {
    header("Location:login_form.php");
}
include 'template_atas.php';
?>
<div class="kotak">
    <h2>INPUT PENGGUNA</h2>
    <hr>
    <form action="pengguna_simpan.php" method="post">
        <table>
            <tr>
                <td>Nama Lengkap</td>
                <td><input type="text" name="nama_lengkap"></td>
            </tr>
            <tr>
                <td>User</td>
                <td><input type="text" name="user"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>Akses</td>
                <td><select name="akses">
                        <option value="petugas">Petugas</option>
                        <option value="pengunjung">Pengunjung</option>
                    </select></td>
            </tr>
        </table>
        <hr>
        <button type="submit" name="aksi" value="SIMPAN">Simpan</button>
        <button type="reset" name="reset">Reset</button>
    </form>
</div>
<?php
include 'template_bawah.php';
?>
