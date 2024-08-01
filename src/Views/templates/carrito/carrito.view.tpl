<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compra</title>
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/grid.css">
</head>
<body>
    <section class="grid">
        <section class="row">
            <h2 class="col-12 col-m-6 offset-m-3 depth-1 p-4">Carrito de Compra</h2>
        </section>
    </section>
    <section class="grid">
        <section class="row my-4">
            <div class="col-12 col-m-6 offset-m-3 depth-1">
                <div class="carrito grid">
                    {{foreach carrito}}
                    <div class="detalle col-12 col-m-6 col-l-4 depth-1 p-4">
                        <h3>{{nombre}}</h3>
                        <p>Cantidad: {{cantidad}}</p>
                        <p>Precio: {{precio}}</p>
                        <p>Total: {{total}}</p>
                    </div>
                    {{endfor carrito}}
                    <div class="row flex-end">
                        <form action="index.php?page=Carrito-ProcesarPago" method="post">
                            <button type="submit" class="primary mx-2">
                                <i class="fa-solid fa-credit-card"></i>&nbsp;
                                Procesar Pago
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </section>
</body>
</html>
