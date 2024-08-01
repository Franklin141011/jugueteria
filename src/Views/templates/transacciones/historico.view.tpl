<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Histórico de Transacciones</title>
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/grid.css">
</head>
<body>
    <section class="grid">
        <section class="row">
            <h2 class="col-12 col-m-6 offset-m-3 depth-1 p-4">Histórico de Transacciones</h2>
        </section>
    </section>
    <section class="grid">
        <section class="row my-4">
            <div class="col-12 col-m-6 offset-m-3 depth-1">
                <div class="transacciones grid">
                    {{foreach transacciones}}
                    <div class="transaccion col-12 col-m-6 col-l-4 depth-1 p-4">
                        <p>ID Transacción: {{id_transaccion}}</p>
                        <p>Fecha: {{fecha_transaccion}}</p>
                        <p>Monto: {{monto}}</p>
                        <p>Estado: {{estado}}</p>
                    </div>
                    {{endfor transacciones}}
                </div>
            </div>
        </section>
    </section>
</body>
</html>
