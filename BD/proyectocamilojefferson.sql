//INSERTA TUS PROPIOS DATOS Y HAS PRUEBAS, PUEDES PEGAR ESTA EN MYSQL WORKBENCH Y CORRER EL PROYECTO, PRONTO IMPLEMENTARE DOCKER PARA UN MEJOR MANEJO DE VERSIONES
create database proyectocamilojefferson
USE proyectocamilojefferson 


CREATE TABLE Usuario (
    Id_Usuario INT AUTO_INCREMENT PRIMARY KEY,
    tipo_Documento VARCHAR(30) NOT NULL,
    noDoc_Usuario VARCHAR(50) NOT NULL,
    nombre_Usuario VARCHAR(50) NOT NULL,
    apellido_Usuario VARCHAR(50) NOT NULL, 
    direccion_Usuario VARCHAR(80) NOT NULL,
    telefono_Usuario VARCHAR(20) NOT NULL,
    correo_Usuario VARCHAR(70) NOT NULL,
    password_Usuario VARCHAR(20) NOT NULL,
    estado_usuario VARCHAR(30) NOT NULL,
    idRol_UsuarioFK INT
    );
    

CREATE TABLE Pedido (
    Id_Pedido INT AUTO_INCREMENT PRIMARY KEY,
    fecha_Pedido DATE NOT NULL,
    hora_Pedido TIME NOT NULL,
    total_Pedido DOUBLE NOT NULL,
    estado_Pedido VARCHAR(30) NOT NULL,
    pedido_Domicilio CHAR(3) NOT NULL,
    id_UsuarioFK INT
);


CREATE TABLE detallespedido (
    idDetalle_Pedido INT AUTO_INCREMENT PRIMARY KEY,
    id_ProductoFK INT NOT NULL,
    cantidad_Producto INT NOT NULL,
    precio_Producto DOUBLE,
    subtotal_Producto DOUBLE,
    id_PedidoFK INT
);

CREATE TABLE Producto (
    id_Producto INT AUTO_INCREMENT PRIMARY KEY, 
    descrip_Producto VARCHAR(100) NOT NULL,
    precio_Producto DOUBLE NOT NULL, 
    categoria_Producto VARCHAR(40) NOT NULL,
    estado_Producto VARCHAR(30) NOT NULL 
);



CREATE TABLE Domicilio (
    id_Domicilio INT AUTO_INCREMENT PRIMARY KEY,
    hora_Domicilio TIME NOT NULL,
    estado_Domicilio VARCHAR(30) NOT NULL,
    id_PedidoFK INT,
    idDomiclio_UsuarioFK INT
);


CREATE TABLE rolUsuario (
    idrol_Usuario INT AUTO_INCREMENT PRIMARY KEY,
    descripcionrol_Usuario VARCHAR(30) NOT NULL,
    estadorol_Usuario VARCHAR(30) NOT NULL
);

//RELACIONES//

ALTER TABLE Usuario ADD CONSTRAINT fk_Usuario_RolUsuario FOREIGN KEY (idRol_UsuarioFK) REFERENCES rolUsuario(idrol_Usuario);
ALTER TABLE Domicilio ADD CONSTRAINT fk_Domicilio_Usuario FOREIGN KEY (idDomiclio_UsuarioFK) REFERENCES Usuario(Id_Usuario);
ALTER TABLE Pedido ADD CONSTRAINT fk_Pedido_Usuario FOREIGN KEY (id_UsuarioFK) REFERENCES Usuario(Id_Usuario);
ALTER TABLE Domicilio ADD CONSTRAINT fk_Domicilio_Pedido FOREIGN KEY (id_PedidoFK) REFERENCES Pedido(Id_Pedido);
ALTER TABLE detallespedido ADD CONSTRAINT fk_detallespedido_Pedido FOREIGN KEY (id_PedidoFK) REFERENCES Pedido(Id_Pedido);
ALTER TABLE detallespedido ADD CONSTRAINT fk_detallespedido_Producto FOREIGN KEY (id_ProductoFK) REFERENCES Producto(id_Producto);



//INSERTAR//

INSERT INTO Usuario (Id_Usuario, tipo_Documento, noDoc_Usuario, nombre_Usuario, apellido_Usuario, direccion_Usuario, telefono_Usuario, correo_Usuario, password_Usuario, estado_usuario, idRol_UsuarioFK) VALUES
('1', 'T.I', '', '', '', ' ', '', '', '', '', ''),
('2', 'T.I', '', '', '', '', '', '', '', '', ''),
('3', 'C.C', '', '', '', '', '', '', '', '', ''),
('4', 'C.C', '', '', '', '', '', '', '', '', ''),
('5', 'T.I', '', '', '', '', '', '', '', '', '');


INSERT INTO Pedido (Id_Pedido, fecha_Pedido, hora_Pedido, total_Pedido, estado_Pedido, pedido_Domicilio, id_UsuarioFK) VALUES
('978', '2023/08/25', '15:15:00', '53.000', 'Bueno', '5', '1'),
('966', '2023/03/25', '13:10:00', '173.000', 'Bueno', '2', '2'),
('945', '2022/11/25', '09:25:00', '34.000', 'Regular', '4', '3'),
('934', '2023/06/25', '17:54:00', '93.000', 'Bueno', '3', '4'),
('923', '2023/12/25', '07:18:00', '110.000', 'Bueno', '1', '5');




INSERT INTO detallespedido (idDetalle_Pedido, id_ProductoFK, cantidad_Producto, precio_Producto, subtotal_Producto, id_PedidoFK) VALUES
('99', '001', '5', '83.000', '25.400', '978'),
('98', '002', '2', '78.900', '13.200', '966'),
('97', '003', '1', '91.600', '27.800', '945'),
('96', '004', '3', '65.790', '19.400', '934'),
('95', '005', '2', '35.000', '18.600', '923');


INSERT INTO Producto (id_Producto, descrip_Producto, Precio_producto, categoria_Producto, estado_Producto) VALUES
('001', 'leche', '1000', 'lacteos', 'bueno'),
('002', 'manzanas', '2500', 'frutas', 'bueno'),
('003', 'platano', '1500', 'paquetes', 'bueno'),
('004', 'fresas', '1000', 'frutas', 'bueno'),
('005', 'lechuga', '3000', 'verduras', 'bueno');



INSERT INTO Domicilio (id_Domicilio, hora_Domicilio, estado_Domicilio, id_PedidoFK, idDomiclio_UsuarioFK) VALUES
('08239684', '3:12', 'Bueno', '978', '1'),
('08982683', '3:37', 'Bueno', '966', '2'),
('08734689', '3:22', 'Bueno', '945', '3'),
('08799452', '3:12', 'Bueno', '934', '4'),
('85859630', '4:56', 'Bueno', '923', '5');


INSERT INTO rolusuario (idrol_Usuario, descripcionrol_Usuario, estadorol_Usuario) VALUES
('101', 'Administrador', 'Activo'),
('102', 'Domiciliario', 'Activo'),
('103', 'Cliente', 'Activo');


//PROCEDIMIENTOS//
DELIMITER //
CREATE PROCEDURE InsertarDomicilio (
     IN id_Domicilio INT(11),
     IN horahora_Domicilio TIME,
     IN estadoestado_Domicilio VARCHAR (30),
     IN pedidoPedido_Fk INT (11)
     IN idDomiDomi_UsuarioFk INT (11);
     
     

DELIMITER //

CREATE PROCEDURE InsertarUsuario(
    IN p_Id_Usuario INT,
    IN p_tipo_Documento VARCHAR(30),
    IN p_noDoc_Usuario VARCHAR(50),
    IN p_nombre_Usuario VARCHAR(50),
    IN p_apellido_Usuario VARCHAR(50),
    IN p_direccion_Usuario VARCHAR(80),
    IN p_telefono_Usuario VARCHAR(20),
    IN p_correo_Usuario VARCHAR(70),
    IN p_password_Usuario VARCHAR(20),
    IN p_estado_usuario VARCHAR(30),
    IN p_idRol_UsuarioFK INT
)
BEGIN
    INSERT INTO Usuario (Id_Usuario, tipo_Documento, noDoc_Usuario, nombre_Usuario, apellido_Usuario, direccion_Usuario, telefono_Usuario, correo_Usuario, password_Usuario, estado_usuario, idRol_UsuarioFK)
    VALUES (p_Id_Usuario, p_tipo_Documento, p_noDoc_Usuario, p_nombre_Usuario, p_apellido_Usuario, p_direccion_Usuario, p_telefono_Usuario, p_correo_Usuario, p_password_Usuario, p_estado_usuario, p_idRol_UsuarioFK);
END //

DELIMITER ;

===============================

DELIMITER //

CREATE PROCEDURE InsertarPedido(
    IN p_Id_Pedido INT,
    IN p_fecha_Pedido DATE,
    IN p_hora_Pedido TIME,
    IN p_total_Pedido DOUBLE,
    IN p_estado_Pedido VARCHAR(30),
    IN p_pedido_Domicilio CHAR(3),
    IN p_id_UsuarioFK INT
)
BEGIN
    INSERT INTO Pedido (Id_Pedido, fecha_Pedido, hora_Pedido, total_Pedido, estado_Pedido, pedido_Domicilio, id_UsuarioFK)
    VALUES (p_Id_Pedido, p_fecha_Pedido, p_hora_Pedido, p_total_Pedido, p_estado_Pedido, p_pedido_Domicilio, p_id_UsuarioFK);
END //

DELIMITER ;
===========================
DELIMITER //

CREATE PROCEDURE InsertarDetallePedido(
    IN p_idDetalle_Pedido INT,
    IN p_id_ProductoFK INT,
    IN p_cantidad_Producto INT,
    IN p_precio_Producto DOUBLE,
    IN p_subtotal_Producto DOUBLE,
    IN p_id_PedidoFK INT
)
BEGIN
    INSERT INTO detallespedido (idDetalle_Pedido, id_ProductoFK, cantidad_Producto, precio_Producto, subtotal_Producto, id_PedidoFK)
    VALUES (p_idDetalle_Pedido, p_id_ProductoFK, p_cantidad_Producto, p_precio_Producto, p_subtotal_Producto, p_id_PedidoFK);
END //

DELIMITER ;
===================================
DELIMITER //

CREATE PROCEDURE InsertarProducto(
    IN p_id_Producto INT,
    IN p_descrip_Producto VARCHAR(100),
    IN p_Precio_producto DOUBLE,
    IN p_categoria_Producto VARCHAR(40),
    IN p_estado_Producto VARCHAR(30)
)
BEGIN
    INSERT INTO Producto (id_Producto, descrip_Producto, Precio_producto, categoria_Producto, estado_Producto)
    VALUES (p_id_Producto, p_descrip_Producto, p_Precio_producto, p_categoria_Producto, p_estado_Producto);
END //

DELIMITER ;
===================================
DELIMITER //

CREATE PROCEDURE InsertarRolUsuario(
    IN apodo_idrol_Usuario INT,
    IN apodo_descripcionrol_Usuario VARCHAR(30),
    IN apodo_estadorol_Usuario VARCHAR(30)
)
BEGIN
    INSERT INTO rolusuario (idrol_Usuario, descripcionrol_Usuario, estadorol_Usuario)
    VALUES (apodo_idrol_Usuario, apodo_descripcionrol_Usuario, apodo_estadorol_Usuario);
END //

DELIMITER ;
=================================
DELIMITER //

CREATE PROCEDURE InsertarDomicilio(
    IN apodo_id_Domicilio INT,
    IN apodo_hora_Domicilio TIME,
    IN apodo_estado_Domicilio VARCHAR(30),
    IN apodo_id_PedidoFK INT,
    IN apodo_idDomiclio_UsuarioFK INT
)
BEGIN
    INSERT INTO Domicilio (id_Domicilio, hora_Domicilio, estado_Domicilio, id_PedidoFK, idDomiclio_UsuarioFK)
    VALUES (apodo_id_Domicilio, apodo_hora_Domicilio, apodo_estado_Domicilio, apodo_id_PedidoFK, apodo_idDomiclio_UsuarioFK);
END //

DELIMITER ;



--ACTUALIZAR--

DELIMITER //

CREATE PROCEDURE ActualizarRolUsuario(
    IN apodo_idrol_Usuario INT,
    IN apodo_descripcionrol_Usuario VARCHAR(30),
    IN apodo_estadorol_Usuario VARCHAR(30)
)
BEGIN
    UPDATE rolUsuario
    SET descripcionrol_Usuario = apodo_descripcionrol_Usuario,
        estadorol_Usuario = apodo_estadorol_Usuario
    WHERE idrol_Usuario = apodo_idrol_Usuario;
END //

DELIMITER ;
============================
DELIMITER //

CREATE PROCEDURE ActualizarDomicilio(
    IN apodo_id_Domicilio INT,
    IN apodo_hora_Domicilio TIME,
    IN apodo_estado_Domicilio VARCHAR(30),
    IN apodo_id_PedidoFK INT,
    IN apodo_idDomiclio_UsuarioFK INT
)
BEGIN
    UPDATE Domicilio
    SET hora_Domicilio = apodo_hora_Domicilio,
        estado_Domicilio = apodo_estado_Domicilio,
        id_PedidoFK = apodo_id_PedidoFK,
        idDomiclio_UsuarioFK = apodo_idDomiclio_UsuarioFK
    WHERE id_Domicilio = apodo_id_Domicilio;
END //

DELIMITER ;
======================================

DELIMITER //

CREATE PROCEDURE ActualizarUsuario(
    IN p_Id_Usuario INT,
    IN p_tipo_Documento VARCHAR(30),
    IN p_noDoc_Usuario VARCHAR(50),
    IN p_nombre_Usuario VARCHAR(50),
    IN p_apellido_Usuario VARCHAR(50),
    IN p_direccion_Usuario VARCHAR(80),
    IN p_telefono_Usuario VARCHAR(20),
    IN p_correo_Usuario VARCHAR(70),
    IN p_password_Usuario VARCHAR(20),
    IN p_estado_usuario VARCHAR(30),
    IN p_idRol_UsuarioFK INT
)
BEGIN
    UPDATE Usuario
    SET tipo_Documento = p_tipo_Documento,
        noDoc_Usuario = p_noDoc_Usuario,
        nombre_Usuario = p_nombre_Usuario,
        apellido_Usuario = p_apellido_Usuario,
        direccion_Usuario = p_direccion_Usuario,
        telefono_Usuario = p_telefono_Usuario,
        correo_Usuario = p_correo_Usuario,
        password_Usuario = p_password_Usuario,
        estado_usuario = p_estado_usuario,
        idRol_UsuarioFK = p_idRol_UsuarioFK
    WHERE Id_Usuario = p_Id_Usuario;
END //

DELIMITER ;
========================================================
DELIMITER //

CREATE PROCEDURE ActualizarProducto(
    IN apodo_id_Producto INT,
    IN apodo_descrip_Producto VARCHAR(100),
    IN apodo_Precio_producto DOUBLE,
    IN apodo_categoria_Producto VARCHAR(40),
    IN apodo_estado_Producto VARCHAR(30)
)
BEGIN
    UPDATE Producto
    SET descrip_Producto = apodo_descrip_Producto,
        Precio_producto = apodo_Precio_producto,
        categoria_Producto = apodo_categoria_Producto,
        estado_Producto = apodo_estado_Producto
    WHERE id_Producto = apodo_id_Producto;
END //

DELIMITER ;
===========================================
DELIMITER //

CREATE PROCEDURE ActualizarDetallePedido(
    IN apodo_idDetalle_Pedido INT,
    IN apodo_id_ProductoFK INT,
    IN apodo_cantidad_Producto INT,
    IN apodo_precio_Producto DOUBLE,
    IN apodo_subtotal_Producto DOUBLE,
    IN apodo_id_PedidoFK INT
)
BEGIN
    UPDATE detallespedido
    SET id_ProductoFK = apodo_id_ProductoFK,
        cantidad_Producto = apodo_cantidad_Producto,
        precio_Producto = apodo_precio_Producto,
        subtotal_Producto = apodo_subtotal_Producto,
        id_PedidoFK = apodo_id_PedidoFK
    WHERE idDetalle_Pedido = apodo_idDetalle_Pedido;
END //

DELIMITER ;
================================================
DELIMITER //

CREATE PROCEDURE ActualizarPedido(
    IN apodo_Id_Pedido INT,
    IN apodo_fecha_Pedido DATE,
    IN apodo_hora_Pedido TIME,
    IN apodo_total_Pedido DOUBLE,
    IN apodo_estado_Pedido VARCHAR(30),
    IN apodo_pedido_Domicilio CHAR(3),
    IN apodo_id_UsuarioFK INT
)
BEGIN
    UPDATE Pedido
    SET fecha_Pedido = apodo_fecha_Pedido,
        hora_Pedido = apodo_hora_Pedido,
        total_Pedido = apodo_total_Pedido,
        estado_Pedido = apodo_estado_Pedido,
        pedido_Domicilio = apodo_pedido_Domicilio,
        id_UsuarioFK = apodo_id_UsuarioFK
    WHERE Id_Pedido = apodo_Id_Pedido;
END //

DELIMITER ;
======================================

--ELIMINAR--

DELIMITER //

CREATE PROCEDURE EliminarUsuario(
    IN p_Id_Usuario INT
)
BEGIN
    DELETE FROM Usuario WHERE Id_Usuario = p_Id_Usuario;
END //

DELIMITER ;

======================================

DELIMITER //

CREATE PROCEDURE EliminarPedido(
    IN apod_Id_Pedido INT
)
BEGIN
    DELETE FROM Pedido WHERE Id_Pedido = apod_Id_Pedido;
END //

DELIMITER ;

=================================
DELIMITER //

CREATE PROCEDURE EliminarDetallePedido(
    IN apodo_idDetalle_Pedido INT
)
BEGIN
    DELETE FROM detallespedido WHERE idDetalle_Pedido = apodo_idDetalle_Pedido;
END //

DELIMITER ;
============================
DELIMITER //

CREATE PROCEDURE EliminarProducto(
    IN apdo_id_Producto INT
)
BEGIN
    DELETE FROM Producto WHERE id_Producto = apdo_id_Producto;
END //

DELIMITER ;
=============================
DELIMITER //

CREATE PROCEDURE EliminarDomicilio(
    IN apodo_id_Domicilio INT
)
BEGIN
    DELETE FROM Domicilio WHERE id_Domicilio = apodo_id_Domicilio;
END //

DELIMITER ;
=========================


SELECT 
pedido.Id_Pedido,
pedido.hora_Pedido,
pedido.fecha_Pedido,
usuario.Id_Usuario,
usuario.tipo_Documento
FROM pedido INNER JOIN usuario ON pedido.id_UsuarioFK = usuario.id_Usuario;

CREATE VIEW PEDIDODOMI AS SELECT id_Domicilio, hora_Domicilio, id_PedidoFK FROM Domicilio;

create view pedidousu AS SELECT id_Pedido, fecha_Pedido, estado_Pedido, id_UsuarioFK FROM  pedido;
DROP VIEW pedidousu;

DROP VIEW PEDIDODOMI;


SELECT 
pedido.Id_Pedido,
pedido.fecha_Pedido,
usuario.Id_Usuario,
usuario.nombre_Usuario,
usuario.correo_Usuario
FROM pedido INNER JOIN usuario ON pedido.id_UsuarioFK = usuario.id_Usuario;

CREATE VIEW PEDIDODOMICILIO AS SELECT id_Domicilio, hora_Domicilio, id_PedidoFK FROM domicilio;

SELECT * FROM PEDIDODOMICILIO;

DELIMITER //

CREATE PROCEDURE InsertarNuevoUsuario(
    IN p_tipo_Documento VARCHAR(30),
    IN p_noDoc_Usuario VARCHAR(50),
    IN p_nombre_Usuario VARCHAR(50),
    IN p_apellido_Usuario VARCHAR(50),
    IN p_direccion_Usuario VARCHAR(80),
    IN p_telefono_Usuario VARCHAR(20),
    IN p_correo_Usuario VARCHAR(70),
    IN p_password_Usuario VARCHAR(20),
    IN p_estado_usuario VARCHAR(30),
    IN p_idRol_UsuarioFK INT
)
BEGIN
    INSERT INTO Usuario (
        tipo_Documento, noDoc_Usuario, nombre_Usuario, apellido_Usuario, 
        direccion_Usuario, telefono_Usuario, correo_Usuario, 
        password_Usuario, estado_usuario, idRol_UsuarioFK
    )
    VALUES (
        p_tipo_Documento, p_noDoc_Usuario, p_nombre_Usuario, p_apellido_Usuario, 
        p_direccion_Usuario, p_telefono_Usuario, p_correo_Usuario, 
        p_password_Usuario, p_estado_usuario, p_idRol_UsuarioFK
    );
END //

DELIMITER ;
//PRUEBA DE INSERCIÒN DE NUEVO USUARIO CON PROCEDIMIENTOS ALMACENADOS
CALL InsertarNuevoUsuario('C.C','','','','','','','123','ACTIVO',101);
SELECT * FROM usuario;
//ACTUALIZAR//
DELIMITER //

CREATE PROCEDURE ActualizarUsuario(
    IN p_Id_Usuario INT,
    IN p_tipo_Documento VARCHAR(30),
    IN p_noDoc_Usuario VARCHAR(50),
    IN p_nombre_Usuario VARCHAR(50),
    IN p_apellido_Usuario VARCHAR(50),
    IN p_direccion_Usuario VARCHAR(80),
    IN p_telefono_Usuario VARCHAR(20),
    IN p_correo_Usuario VARCHAR(70),
    IN p_password_Usuario VARCHAR(20),
    IN p_estado_usuario VARCHAR(30),
    IN p_idRol_UsuarioFK INT
)
BEGIN
    UPDATE Usuario
    SET tipo_Documento = p_tipo_Documento,
        noDoc_Usuario = p_noDoc_Usuario,
        nombre_Usuario = p_nombre_Usuario,
        apellido_Usuario = p_apellido_Usuario,
        direccion_Usuario = p_direccion_Usuario,
        telefono_Usuario = p_telefono_Usuario,
        correo_Usuario = p_correo_Usuario,
        password_Usuario = p_password_Usuario,
        estado_usuario = p_estado_usuario,
        idRol_UsuarioFK = p_idRol_UsuarioFK
    WHERE Id_Usuario = p_Id_Usuario;
END //

DELIMITER ;

//LLAMADO//

CALL ActualizarUsuario(13,'C.C','41431','','','','','','123','ACTIVO',101);

//ELIMINAR USUARIO//

DELIMITER //

CREATE PROCEDURE EliminarUsuario(
    IN p_Id_Usuario INT
)
BEGIN
    DELETE FROM Usuario WHERE Id_Usuario = p_Id_Usuario;
END //

DELIMITER ;

//LLAMADO//

CALL EliminarUsuario(13);


