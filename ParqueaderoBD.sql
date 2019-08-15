
CREATE TABLE cliente(
    cedula_cliente INT(10) UNSIGNED PRIMARY KEY, 
    nombre_cliente VARCHAR(40) NOT NULL, 
    telefono VARCHAR(20) NOT NULL, 
    direccion VARCHAR(30) NOT NULL, 
    genero VARCHAR(10) NOT NULL,

    cedula_empleado INT(10) UNSIGNED NOT NULL,

    CHECK (genero = 'masculino' OR genero = 'femenino')
)ENGINE = InnoDB;


CREATE TABLE empleado(
    cedula_empleado INT(10) UNSIGNED PRIMARY KEY, 
    nombre_empleado VARCHAR(40) NOT NULL, 
    genero VARCHAR(10) NOT NULL, 
    correo_electronico VARCHAR(40) NOT NULL UNIQUE,
    tipo VARCHAR(10),

    CHECK (genero = 'masculino' OR genero = 'femenino'),
    CHECK ((tipo = 'administrador' AND titulo_academico IS NOT NULL AND certificacion_lavado IS NULL) OR (tipo = 'raso' AND titulo_academico IS NULL AND certificacion_lavado IS NOT NULL))
)ENGINE = InnoDB;


CREATE TABLE administrador(
    cedula_empleado INT(10) UNSIGNED PRIMARY KEY,
    titulo_academico VARCHAR(40) NOT NULL
)ENGINE = InnoDB;


CREATE TABLE raso(
    cedula_empleado INT(10) UNSIGNED PRIMARY KEY,
    certificacion_lavado VARCHAR(40) NOT NULL
)ENGINE = InnoDB;


CREATE TABLE vehiculo(
    placa VARCHAR(8) PRIMARY KEY,
    marca VARCHAR(20) NOT NULL,
    modelo VARCHAR(4) NOT NULL,
    tipo VARCHAR(10),

    cedula_cliente INT(10) UNSIGNED NOT NULL,

    CHECK ((tipo = 'automovil' AND cantidad_puertas IS NOT NULL AND cantidad_cascos IS NULL) OR (tipo = 'motocicleta' AND cantidad_puertas IS NULL AND cantidad_cascos IS NOT NULL))
)ENGINE = InnoDB;


CREATE TABLE automovil(
    placa VARCHAR(8) PRIMARY KEY,
    cantidad_puertas INT(2) UNSIGNED NOT NULL,

    CHECK (cantidad_puertas >= 1)
)ENGINE = InnoDB;


CREATE TABLE motocicleta(
    placa VARCHAR(8) PRIMARY KEY,
    cantidad_cascos INT(1) UNSIGNED NOT NULL
)ENGINE = InnoDB;


CREATE TABLE turno(
    numero_turno INT(10) UNSIGNED,
    fecha_atencion DATE NOT NULL,
    placa VARCHAR(8) NOT NULL,
    hora_atencion TIME NOT NULL,
    PRIMARY KEY (numero_turno, fecha_atencion, placa),

    codigo_lavado VARCHAR(10) NOT NULL
)ENGINE = InnoDB;


CREATE TABLE lavado(
    codigo_lavado VARCHAR(10) PRIMARY KEY,
    tipo_de_lavado VARCHAR(10) NOT NULL,
    repuesto VARCHAR(2) NOT NULL,

    cedula_empleado INT(10) NOT NULL,

    CHECK (repuesto = 'SI' OR repuesto = 'NO'),
    CHECK (tipo_de_lavado = 'regular' OR repuesto = 'completo')
)ENGINE = InnoDB;


CREATE TABLE parqueo(
    codigo_parqueo VARCHAR(10) PRIMARY KEY,
    fecha_ingreso DATE NOT NULL,
    niveles VARCHAR(2) NOT NULL,

    codigo_celda VARCHAR(5) NOT NULL,
    placa VARCHAR(8) NOT NULL,

    CHECK (niveles = 'SI' OR niveles = 'NO')
)ENGINE = InnoDB;


CREATE TABLE factura(
    codigo_factura VARCHAR(10),
    fecha_de_generacion DATE NOT NULL,
    hora_de_generacion TIME NOT NULL,
    costo_total INT(10) UNSIGNED NOT NULL,
    PRIMARY KEY (codigo_factura, fecha_de_generacion),

    cedula_empleado INT(10) UNSIGNED NOT NULL,
    cedula_cliente INT(10) UNSIGNED NOT NULL
)ENGINE = InnoDB;


CREATE TABLE detalle(
    codigo_detalle VARCHAR(10),
    valor INT(10) NOT NULL,
    codigo_factura VARCHAR(10),
    fecha_de_generacion DATE NOT NULL,
    PRIMARY KEY(codigo_detalle, codigo_factura, fecha_de_generacion),

    codigo_lavado VARCHAR(10),
    codigo_parqueo VARCHAR(10),

    CHECK ((codigo_lavado IS NULL AND codigo_parqueo IS NOT NULL) OR (codigo_lavado IS NOT NULL AND codigo_parqueo IS NULL))
)ENGINE = InnoDB;



CREATE TABLE celda(
    codigo_celda VARCHAR(5) PRIMARY KEY,
    reservada VARCHAR(2) NOT NULL,

    CHECK (reservada = 'SI' OR reservada = 'NO')

)ENGINE = InnoDB;


CREATE TABLE casillero(
    codigo_celda VARCHAR(5),
    ocupado VARCHAR(2) NOT NULL,
    PRIMARY KEY (codigo_celda),

    CHECK (ocupado = 'SI' OR ocupado = 'NO')
)ENGINE = InnoDB;

ALTER TABLE cliente ADD FOREIGN KEY (cedula_empleado) REFERENCES empleado(cedula_empleado);
ALTER TABLE administrador ADD FOREIGN KEY (cedula_empleado) REFERENCES empleado(cedula_empleado); 
ALTER TABLE raso ADD FOREIGN KEY (cedula_empleado) REFERENCES empleado(cedula_empleado); 
ALTER TABLE vehiculo ADD FOREIGN KEY (cedula_cliente) REFERENCES cliente(cedula_cliente); 
ALTER TABLE automovil ADD FOREIGN KEY (placa) REFERENCES vehiculo(placa);
ALTER TABLE motocicleta ADD FOREIGN KEY (placa) REFERENCES vehiculo(placa);
ALTER TABLE turno ADD FOREIGN KEY (placa) REFERENCES vehiculo(placa); 
ALTER TABLE turno ADD FOREIGN KEY (codigo_lavado) REFERENCES lavado(codigo_lavado);
ALTER TABLE parqueo ADD FOREIGN KEY (placa) REFERENCES automovil(placa);
ALTER TABLE factura ADD FOREIGN KEY (cedula_empleado) REFERENCES empleado(cedula_empleado);
ALTER TABLE factura ADD FOREIGN KEY (cedula_cliente) REFERENCES cliente(cedula_cliente);
ALTER TABLE detalle ADD FOREIGN KEY (codigo_factura,fecha_de_generacion) REFERENCES factura(codigo_factura, fecha_de_generacion);
ALTER TABLE detalle ADD FOREIGN KEY (codigo_lavado) REFERENCES lavado(codigo_lavado);
ALTER TABLE detalle ADD FOREIGN KEY (codigo_parqueo) REFERENCES parqueo(codigo_parqueo);
ALTER TABLE parqueo ADD FOREIGN KEY (codigo_celda) REFERENCES celda(codigo_celda);
ALTER TABLE casillero ADD FOREIGN KEY (codigo_celda) REFERENCES celda(codigo_celda);




----inserts------
-- empresa:
-- INSERT INTO `empresa`(`nit`, `nombre`, `direccion`, `pagina_web`) VALUES (1,'postobon','CR-1 Cl-2 ','www.postobon.com');
-- INSERT INTO `empresa`(`nit`, `nombre`, `direccion`, `pagina_web`) VALUES (2,'cocacola','CR-2 cl-3','www.cocacola.com');


-- persona:
-- INSERT INTO `persona`(`cedula`, `nombre`, `DIRECCION`, `telefono`) VALUES (1,'Santiago Cadavid','Girardota','302456789');
-- INSERT INTO `persona`(`cedula`, `nombre`, `DIRECCION`, `telefono`) VALUES (2,'sara Cadavid','bello','302356789');

-- Factura:
-- INSERT INTO `factura`(`codigo`, `fecha`, `valor`, `fecha_retorno`, `tipo`, `cedula_p`) VALUES (1,DATE('2010-01-01'),500,DATE('2010-02-01'),'P',1);
-- INSERT INTO `factura`(`codigo`, `fecha`, `valor`, `fecha_retorno`, `tipo`, `cedula_p`) VALUES (2,DATE('2012-05-01'),500,DATE('2016-02-01'),'P',2);

-- INSERT INTO `factura`(`codigo`, `fecha`, `valor`, `tipo`, `nit_e`) VALUES (3,DATE('2010-01-01'),50000,'C',1);
-- INSERT INTO `factura`(`codigo`, `fecha`, `valor`, `tipo`, `nit_e`) VALUES (4,DATE('2012-05-01'),50000,'C',2);