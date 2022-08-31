
DROP TABLE IF EXISTS registro;
DROP TABLE IF EXISTS producto;
CREATE TABLE producto(
    id INT AUTO_INCREMENT primary KEY,
    nombre varchar(40),
    codigo varchar(30));

    INSERT INTO producto  (nombre, codigo)
values("CANAL 8","01"),
("CANAL 10","02"),
("CANAL 12","03"),
("CANAL 14","04"),
("CANAL 16","05"),
("CANAL B8","06"),
("CANAL 8","07"),
("CANAL B10","08"),
("CANAL B12","09"),
("CANAL B14","10"),
("CANAL B16","11"),
("PATA","12"),
("PATA ROSTICERO","13"),
("PESCUEZO","14"),
("MOLLEJA","15"),
("HIGADO","16"),
("CABEZA","17"),
("DECOMISO DE DESHUESE","18"),
("CANAL AMARILLO TERCERA","19"),
("PULPA DE PIERNA Y MUSLO","20"),
("PECHUGA SIN HUESO","21"),
("PECHUGA SIN HUESO SEG.","22"),
("PECHUGA C.HUESO AMER","23"),
("PECHUGA C.HUESO AMER SEG.","24"),
("PUNTA DE ALA","25"),
("ALA COMPLETA","26"),
("ALA MISCUT","27"),
("ALA MISCUT SEG","28"),
("RABADILLA","29"),
("HUACAL","30"),
("CANAL TROCEO","31"),
("PASTA","32"),
("R00","33"),
("R1","34"),
("R2","35"),
("R3","36"),
("R4","37"),
("R5","38"),
("R6","39"),
("R7","40"),
("R8","41"),
("R9","42"),
("RB00","43"),
("RB0","44"),
("RB1","45"),
("RB2","46"),
("RB3","47"),
("RB4","48"),
("RB5","49"),
("RG6","50"),
("RG7","51"),
("RG8","52"),
("RG9","53");

CREATE TABLE registro(
    id INT AUTO_INCREMENT primary KEY,
    id_producto int,
    peso varchar(10),
    barCode varchar(50),
    fecha date,
    FOREIGN KEY (id_producto) REFERENCES producto(id));


/*
CONSULTA PARA OBTENER TODOS LOS PESOS CON SU NOMBRE DE PRODUCTO
SELECT peso, nombre FROM producto INNER JOIN registro ON producto.id = registro.id_producto ORDER BY nombre;

CONSULTA PARA OBTENER SOLO LOS PESOS DE DETERMINADO PRODUCTO POR NOMBRE
SELECT peso, nombre FROM producto INNER JOIN registro ON producto.id = registro.id_producto WHERE nombre = 'CANAL8';

CONSULTA SOLO LOS PRIMERO 8 CARACTERES DE BARCODE EN ESTE CASO LA FECHA DEL CODIGO DE BARRAS
SELECT left(barCode, 8) FROM `registro`;

CONSULTA SOLO LOS REGISTROS DEL DIA ACTUAL
SELECT * FROM registro WHERE YEAR(fecha) = YEAR(NOW()) AND MONTH(fecha) = MONTH(NOW()) AND DAY(fecha) = DAY(NOW());
SELECT peso FROM registro WHERE id_producto = 8 AND YEAR(fecha) = YEAR(NOW()) AND MONTH(fecha) = MONTH(NOW()) AND DAY(fecha) = DAY(NOW());

CONSULTA REGISTRO DEL DIA ACTUAL POR NOMBRE Y PESO CODIGO
SELECT nombre, peso FROM registro INNER JOIN producto WHERE producto.id = registro.id_producto AND producto.id = 2 AND YEAR(fecha) = YEAR(NOW()) AND MONTH(fecha) = MONTH(NOW()) AND DAY(fecha) = DAY(NOW());

COSULTA POR MES CON INNER PARA PRODUCTOS
select * from registro INNER JOIN producto where producto.id = registro.id_producto AND MONTH(fecha) = :fe ORDER BY fecha ASC

CONSULTA POR MES Y ID DE PRODUCTO
select * from registro INNER JOIN producto where producto.id = registro.id_producto AND id_producto = 1 AND MONTH(fecha) = :fe ORDER BY fecha ASC
*/