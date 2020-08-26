CREATE Table Proveedor(
	id serial PRIMARY KEY,
	nombre varchar(200),
	telefono varchar(200),
	direccion varchar(200),
	correo varchar(200)
);


INSERT 
INTO Proveedor(nombre,telefono,direccion,correo)
VALUES ('Pepsi', '96772623', 'Picarte 303', 'coca-cola@hotmail.com')

INSERT 
INTO Proveedor(nombre,telefono,direccion,correo)
VALUES ('Iansa', '96772623', 'Arauco 404', 'Iansa@hotmail.com')


select * from Proveedor