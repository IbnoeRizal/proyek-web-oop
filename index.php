<?php
    include_once "include/autoload.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
   <!-- <link rel="stylesheet" href="style/style.css"> -->
</head>

<body>
    <header>header</header>
    <main>
        <aside>sidebar</aside>
    
        <div class="main">

            <section class="section1">
                <fieldset>
                    <legend>Login</legend>
                    <form action="include/login.inc.php" method="post">
                        <label for="input ke 1">Nama</label>
                        <input type="text" name="input ke 1" id="input ke 1" placeholder="Masukkan Nama" autocomplete="off">
                        <label for="input ke 2">Email</label>
                        <input type="email" name="input ke 2" id="input ke 2" placeholder="Masukkan Email" autocomplete="off">
                        <label for="input ke 3">Sandi</label>
                        <input type="password" name="input ke 3" id="input ke 3" placeholder="Password" autocomplete="off" >
                        <button type="submit">Submit</button>
                    </form>
                </fieldset>
            </section>
            <section class="section2">
                <fieldset>
                    <legend>Sign up</legend>
                    <form action="include/signup.inc.php" method="post">
                        <label for="input ke 4">Nama</label>
                        <input type="text" name="input ke 4" id="input ke 4" placeholder="Masukkan Nama" autocomplete="off">
                        <label for="input ke 5">Email</label>
                        <input type="email" name="input ke 5" id="input ke 5" placeholder="Masukkan Email" autocomplete="off">
                        <label for="input ke 6">Sandi</label>
                        <input type="password" name="input ke 6" id="input ke 6" placeholder="Password" autocomplete="off" >
                        <label for="input ke 7">Konfirmasi Sandi</label>
                        <input type="password" name="input ke 7" id="input ke 7" placeholder="Password" autocomplete="off" >
                        <button type="submit">Submit</button>
                    </form>
                </fieldset>
            </section>
        </div>
    
    </main>
    <footer>footer</footer>
</body>

</html>