<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Productos</title>
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/grid.css">
</head>
<body>
    <section class="grid">
        <section class="row">
            <h2 class="col-12 col-m-6 offset-m-3 depth-1 p-4">Catálogo de Productos</h2>
        </section>
    </section>
    <section class="grid">
        <section class="row my-4">
            <div class="col-12 col-m-6 offset-m-3 depth-1">
                <div class="productos grid">
                    {{foreach productos}}
                    <div class="producto col-12 col-m-6 col-l-4 depth-1 p-4">
                        <h3>{{nombre}}</h3>
                        <p>{{descripcion}}</p>
                        <p>Precio: {{precio}}</p>
                        <p>Stock: {{stock}}</p>
                        <form action="index.php?page=Carrito-AgregarProducto" method="post">
                            <input type="hidden" name="id_producto" value="{{id_producto}}">
                            <div class="row my-4">
                                <label class="col-4" for="cantidad">Cantidad:</label>
                                <input class="col-8" type="number" id="cantidad" name="cantidad" min="1" max="{{stock}}" required>
                            </div>
                            <div class="row flex-end">
                                <button type="submit" class="primary mx-2">
                                    <i class="fa-solid fa-cart-plus"></i>&nbsp;
                                    Agregar al Carrito
                                </button>
                            </div>
                        </form>
                    </div>
                    {{endfor productos}}
                </div>
            </div>
        </section>
    </section>
</body>
</html>
