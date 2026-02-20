<div class="container">
    <h2>Notificaciones</h2>
    <p>Total de notificaciones: <?php echo $contador; ?></p>
    <ul>
        <?php foreach ($notificaciones as $notificacion){ ?>
            <li><?php echo $notificacion['asunto']; ?></li>
        <?php } ?>
    </ul>
</div>