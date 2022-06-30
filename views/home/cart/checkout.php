<body>
    <h1>en checkout</h1>
    <div class="hola">Click here</div>

    <?php
    session_start();
    echo $_SESSION['DIRECCION'];
    echo $_SESSION['FECHA'];
    ?>
</body>