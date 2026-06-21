<section class="login-section">
    <div class="login-box">

        <h1>Iniciar sesión</h1>

        <div>
            <?= Alerta::get_alertas(); ?>
        </div>

        <form action="admin/actions/auth_login.php" method="POST">
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

        <p class="login-registro">
            ¿No tenés perfil?
            <a href="index.php?sec=registro">Registrate</a>
        </p>

    </div>
</section>