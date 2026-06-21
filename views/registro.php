<section class="login-section">
    <div class="login-box">

        <h1>Registrarse</h1>

        <div>
            <?= Alerta::get_alertas(); ?>
        </div>

        <form action="admin/actions/auth_register.php" method="POST">
            <div class="login-campo">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="login-campo">
                <label for="nombre_usuario">Nombre de usuario</label>
                <input type="text" id="nombre_usuario" name="nombre_usuario" required>
            </div>

            <div class="login-campo">
                <label for="nombre_completo">Nombre completo</label>
                <input type="text" id="nombre_completo" name="nombre_completo" required>
            </div>

            <div class="login-campo">
                <label for="pass">Password</label>
                <input type="password" id="pass" name="pass" required>
            </div>

            <button type="submit" class="login-btn">Registrarse</button>
        </form>

        <p class="login-registro">
            ¿Ya tenés perfil?
            <a href="index.php?sec=login">Iniciar sesión</a>
        </p>

    </div>
</section>