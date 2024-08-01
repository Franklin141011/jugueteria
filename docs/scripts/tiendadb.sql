create database tiendadb;
use tiendadb;
CREATE TABLE Usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    correo_electronico VARCHAR(255) UNIQUE NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    rol ENUM('cliente', 'administrador') NOT NULL
);
CREATE TABLE Productos (
    id_producto INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL,
    categoria VARCHAR(255) NOT NULL
);
CREATE TABLE CarritoDeCompras (
    id_carrito INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario)
);
CREATE TABLE DetallesDelCarrito (
    id_detalle INT AUTO_INCREMENT PRIMARY KEY,
    id_carrito INT NOT NULL,
    id_producto INT NOT NULL,
    cantidad INT NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (id_carrito) REFERENCES CarritoDeCompras(id_carrito),
    FOREIGN KEY (id_producto) REFERENCES Productos(id_producto)
);
CREATE TABLE Transacciones (
    id_transaccion INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    tipo ENUM('compra') NOT NULL,
    monto DECIMAL(10, 2) NOT NULL,
    fecha_transaccion DATETIME DEFAULT CURRENT_TIMESTAMP,
    estado ENUM('pendiente', 'completada', 'reembolsada') NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario)
);
CREATE TABLE HistorialDeTransacciones (
    id_historial INT AUTO_INCREMENT PRIMARY KEY,
    id_transaccion INT NOT NULL,
    detalle TEXT,
    FOREIGN KEY (id_transaccion) REFERENCES Transacciones(id_transaccion)
);



-- Usuarios
INSERT INTO Usuarios (nombre, correo_electronico, contrasena, rol) VALUES 
('Juan Pérez', 'juan.perez@example.com', '$2y$10$0fv0fn.lE/4w...1KkEzEGjB8f8j2eVtKwR8OEu', 'cliente'),
('María López', 'maria.lopez@example.com', '$2y$10$W9NnbkM2G3r...2h8MPulXAlZUtFv7K8JeaMei', 'administrador');

-- Productos
INSERT INTO Productos (nombre, descripcion, precio, stock, categoria) VALUES 
('Lego Star Wars', 'Set de construcción de Lego Star Wars', 1200, 50, 'Construcción'),
('Barbie Dreamhouse', 'Casa de ensueño de Barbie con accesorios', 3500, 20, 'Muñecas'),
('Hot Wheels Track', 'Pista de carreras de Hot Wheels', 800, 75, 'Vehículos'),
('Play-Doh Fun Factory', 'Fábrica de diversión Play-Doh', 400, 100, 'Manualidades'),
('Monopoly Classic', 'Juego de mesa Monopoly clásico', 600, 30, 'Juegos de Mesa');

-- CarritoDeCompras
INSERT INTO CarritoDeCompras (id_usuario, fecha_creacion) VALUES 
(1, NOW());

-- DetallesDelCarrito
INSERT INTO DetallesDelCarrito (id_carrito, id_producto, cantidad, precio) VALUES 
(1, 1, 2, 1200),
(1, 3, 1, 800);

-- Transacciones
INSERT INTO Transacciones (id_usuario, tipo, monto, fecha_transaccion, estado) VALUES 
(1, 'compra', 3200, NOW(), 'completada');
