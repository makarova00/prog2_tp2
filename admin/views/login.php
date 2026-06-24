<section class="login-section">
    <div class="login-box">

        <h1>Iniciar sesión</h1>

        <p class="login-subtitulo">Usuarios administradores</p>

        <div>
            <?= Alerta::get_alertas(); ?>
        </div>

        <form action="actions/auth_login.php" method="POST">
            <div class="login-campo">
                <label for="username">Nombre de usuario</label>
                <input type="text" id="username" name="username">
            </div>

            <div class="login-campo">
                <label for="pass">Password</label>
                <input type="password" id="pass" name="pass">
            </div>

            <button type="submit" class="login-btn">Login</button>
        </form>

    </div>
</section>