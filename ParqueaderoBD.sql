CREATE DATABASE parqueadero;
use parqueadero;
CREATE TABLE persona(
    cedula_persona INT(10) UNSIGNED PRIMARY KEY, 
    nombre_persona VARCHAR(40) NOT NULL, 
    telefono_persona VARCHAR(20) NOT NULL, 
    direccion VARCHAR(30) NOT NULL, 
    genero VARCHAR(10) NOT NULL,

    cedula_empleado INT(10) UNSIGNED NOT NULL,

    CHECK (genero = 'masculino' OR genero = 'femenino')
)ENGINE = InnoDB;


CREATE TABLE empresa(
    nit INT(10) UNSIGNED PRIMARY KEY, 
    nombre_empresa VARCHAR(40) NOT NULL, 
    telefono_empresa VARCHAR(20) NOT NULL, 
    nombre_gerente VARCHAR(20) NOT NULL

)ENGINE = InnoDB;


CREATE TABLE empleado(
    cedula_empleado INT(10) UNSIGNED PRIMARY KEY, 
    nombre_empleado VARCHAR(40) NOT NULL, 
    genero VARCHAR(10) NOT NULL, 
    correo_electronico VARCHAR(40) NOT NULL UNIQUE,
    tipo VARCHAR(13),

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
    cantidad_puertas INT(2) UNSIGNED,
    cantidad_cascos INT(1) UNSIGNED,
    tipo VARCHAR(10),

    cedula_persona INT(10) UNSIGNED,
    nit INT(20) UNSIGNED,

    CHECK (tipo = 'automovil' OR tipo = 'motociclieta'),
    CHECK ((tipo = 'automovil' AND cantidad_puertas IS NOT NULL AND cantidad_cascos IS NULL) OR (tipo = 'motocicleta' AND cantidad_puertas IS NULL AND cantidad_cascos IS NOT NULL))
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
    CHECK (tipo_de_lavado = 'regular' OR tipo_de_lavado = 'completo')
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

    cedula_persona INT(10) UNSIGNED,
    nit INT(25) UNSIGNED,

    CHECK ((cedula_persona IS NULL AND nit IS NOT NULL) OR (cedula_persona IS NOT NULL AND nit IS NULL))

)ENGINE = InnoDB;



CREATE TABLE detalle(
    codigo_detalle VARCHAR(10),
    valor INT(10) NOT NULL,
    descripcion VARCHAR(141),
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

ALTER TABLE persona ADD FOREIGN KEY (cedula_empleado) REFERENCES empleado(cedula_empleado);
ALTER TABLE administrador ADD FOREIGN KEY (cedula_empleado) REFERENCES empleado(cedula_empleado); 
ALTER TABLE raso ADD FOREIGN KEY (cedula_empleado) REFERENCES empleado(cedula_empleado); 
ALTER TABLE vehiculo ADD FOREIGN KEY (cedula_persona) REFERENCES persona(cedula_persona); 
ALTER TABLE vehiculo ADD FOREIGN KEY (nit) REFERENCES empresa(nit);
ALTER TABLE turno ADD FOREIGN KEY (placa) REFERENCES vehiculo(placa); 
ALTER TABLE turno ADD FOREIGN KEY (codigo_lavado) REFERENCES lavado(codigo_lavado);
ALTER TABLE parqueo ADD FOREIGN KEY (placa) REFERENCES vehiculo(placa);
ALTER TABLE factura ADD FOREIGN KEY (cedula_empleado) REFERENCES empleado(cedula_empleado);
ALTER TABLE factura ADD FOREIGN KEY (cedula_persona) REFERENCES persona(cedula_persona) ON DELETE CASCADE;
ALTER TABLE factura ADD FOREIGN KEY (nit) REFERENCES empresa(nit) ON DELETE CASCADE;
ALTER TABLE detalle ADD FOREIGN KEY (codigo_factura,fecha_de_generacion) REFERENCES factura(codigo_factura, fecha_de_generacion);
ALTER TABLE detalle ADD FOREIGN KEY (codigo_lavado) REFERENCES lavado(codigo_lavado);
ALTER TABLE detalle ADD FOREIGN KEY (codigo_parqueo) REFERENCES parqueo(codigo_parqueo);
ALTER TABLE parqueo ADD FOREIGN KEY (codigo_celda) REFERENCES celda(codigo_celda);

-- pruebas
SELECT       `cedula_persona`
    FROM     `factura`
    where 'cedula_persona' is not null
    GROUP BY `cedula_persona`
    ORDER BY COUNT(*) DESC
    LIMIT    1;

select max(count(*)) from cheques where 
city='Toronto' group by region

select cedula_persona from factura where cedula_persona is not null group by cedula_persona select max(count(*)) desc;


select cedula_persona from factura where cedula_persona is not null GROUP by cedula_persona ;

select count(*) as Count, cedula_persona
FROM factura where cedula_persona is not null

GROUP BY cedula_persona;

SELECT cedula_persona, COUNT(*) as con
FROM factura where cedula_persona is not null
group by cedula_persona
;

select cedula_persona
from   factura
where  cedula_persona is not null
group by cedula_persona
having count(*) = (select count(*) from factura);

select cedula_persona, count(cedula_persona) as con from factura where cedula_persona = 0 group by cedula_persona ;