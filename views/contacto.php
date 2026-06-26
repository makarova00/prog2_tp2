<section class="contacto-section">

    <div class="contacto-contenido">

        <div class="contacto-texto">
            <p class="contacto-subtitulo">Contacto</p>

            <h1>Escribinos</h1>

            <p>
                Si tenés alguna consulta sobre discos, pedidos o el catálogo, podés completar el formulario y nos pondremos en contacto.
            </p>
        </div>

        <div class="contacto-form-box">

            <form action="index.php?sec=contacto_enviado" method="POST" class="contacto-form">

                <div class="contacto-campo">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>

                <div class="contacto-campo">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="contacto-campo">
                    <label for="mensaje">Mensaje</label>
                    <textarea id="mensaje" name="mensaje" required></textarea>
                </div>

                <button type="submit" class="contacto-btn">
                    Enviar mensaje
                </button>

            </form>

        </div>

    </div>

</section>