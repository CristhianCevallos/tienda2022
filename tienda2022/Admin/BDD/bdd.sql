create table Usuarios(
    id int not null auto_increment primary key,
    Nombres varchar(50) not null,
    Apellidos varchar(50) not null,
    Usuario varchar(50) not null,
    Clave varchar(50) not null
);


create table Categorias(
	id int not null auto_increment primary key,
	Nombre varchar(50) not null
);


create table Productos(
    id int not null auto_increment primary key,
    Nombre varchar(50) not null,    
    Detalle varchar(500) not null,
    Precio decimal not null,
    Stock int not null,
    foto varchar(500),
	idCategorias int,
    foreign key(idCategorias) references Categorias(id)
);


create table Clientes(
    id int not null auto_increment primary key,
    Nombres varchar(50) not null,
    Apellidos varchar(50) not null,
    Cedula varchar(50) not null, 
	Usuario VARCHAR(50),
	Clave varchar(50)
);


create table Facturas(
    id int not null auto_increment primary key,
    Fecha Date,
    SubTotal decimal,
    IVA decimal,
    Apagar decimal,
    idCliente int,
    foreign key(idCliente) references Clientes(id)
);

create table Detalles(
    id int not null auto_increment primary key,
    Cantidad int,
    PrecioVenta decimal,
    Importe Decimal,    
    idFactura int,
    foreign key(idFactura) references Facturas(id),
    idProducto int,
    foreign key(idProducto) references Productos(id)
);