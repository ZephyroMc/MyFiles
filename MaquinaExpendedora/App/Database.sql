create database Maquina;
use maquina;
CREATE TABLE Productos (
    id_producto INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100),
    precio DECIMAL(10, 2),
    fopre_donacion BOOLEAN,
    cantidad int
);
 
 
CREATE TABLE Compras (
    id_compra INT PRIMARY KEY AUTO_INCREMENT,
    id_cliente INT,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total DECIMAL(10, 2) DEFAULT 0.00
);
 
 
CREATE TABLE Detalles_Compras (
    id_detalle INT PRIMARY KEY AUTO_INCREMENT,
    id_compra INT,
    id_producto INT,
    cantidad INT,
    FOREIGN KEY (id_compra) REFERENCES Compras(id_compra),
    FOREIGN KEY (id_producto) REFERENCES Productos(id_producto)
);
 
 
CREATE TABLE Monedas (
    id_cliente INT PRIMARY KEY,
    credito DECIMAL(10, 2) DEFAULT 0.00
);
 
 
CREATE TABLE FOPRE_Donaciones (
    id_donacion INT PRIMARY KEY AUTO_INCREMENT,
    id_producto INT,
    monto DECIMAL(10, 2),
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_producto) REFERENCES Productos(id_producto)
);
 
 
INSERT INTO Productos (nombre, precio, fopre_donacion, cantidad) VALUES
('Producto A', 1.50, TRUE , 10),
('Producto B', 2.00, FALSE, 7),
('Producto C', 2.50, TRUE,8) ,
('Producto D', 3.00, TRUE, 3);
 
 
INSERT INTO Monedas (id_cliente, credito) VALUES
(1, 10.00)
