CREATE TABLE publicaciones (
  id int(10) NOT NULL,
  titulo varchar(45) NOT NULL,
  cuerpo varchar(45) NOT NULL,
  usuarios_id int(10) NOT NULL
);

CREATE TABLE usuarios (
  id int(10) NOT NULL,
  nombre varchar(45)  NOT NULL,
  email varchar(45) NOT NULL
);

INSERT INTO usuarios (id, nombre, email) VALUES
(1, 'alejandro calderon giraldo', 'alejo1997_11@hotmail.com'),
(2, 'Carlos andres bolaños', 'carlosc@hotmail.com');


ALTER TABLE publicaciones
  ADD PRIMARY KEY (id),
  ADD KEY fk_usuarios_id (usuarios_id);


ALTER TABLE usuarios
  ADD PRIMARY KEY (id);


ALTER TABLE publicaciones
  MODIFY id int(10) NOT NULL AUTO_INCREMENT;
 

ALTER TABLE usuarios
  MODIFY id int(10) NOT NULL AUTO_INCREMENT;


ALTER TABLE publicaciones
  ADD CONSTRAINT fk_usuarios_id FOREIGN KEY (usuarios_id) REFERENCES usuarios (id);
