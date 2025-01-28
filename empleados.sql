CREATE TABLE empleado (
    idempleado INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(32) NOT NULL,
    departamento VARCHAR(40) NOT NULL,
    sueldo DOUBLE,
    PRIMARY KEY (idempleado)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO empleado (idempleado, nombre, departamento, sueldo) VALUES (1, 'Juan Perez', 'Informatica', 500.00);
INSERT INTO empleado (idempleado, nombre, departamento, sueldo) VALUES (2, 'Laura Morales', 'Contabilidad', 550.00);
INSERT INTO empleado (idempleado, nombre, departamento, sueldo) VALUES (3, 'Luis Gutierrez', 'Administracion', 850.00);
INSERT INTO empleado (idempleado, nombre, departamento, sueldo) VALUES (4, 'Pedro Solar', 'Informatica', 500.00);
INSERT INTO empleado (idempleado, nombre, departamento, sueldo) VALUES (5, 'David Vilchez', 'Contabilidad', 550.00);
