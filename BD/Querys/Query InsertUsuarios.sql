use databaseingexis;
--======================================--
INSERT Log_usuarios (correo, contra, img_log) values ('jesus120190240.8@gmail.com', '1234', 'img\\user.jpg');
INSERT usuarios values(last_insert_id(), 'jesus', '', 'villavicencio', 'osuna', 'JesusWhite', '612171121', 'Jefe De Laboratorio', 'iVGaNkz3BHUkAZfCmd', '2tnDu2TmJVFek', 'pinon', 'avellana,limon', '201', 'indeco', '23070', 'La Paz');
--======================================--
INSERT Log_usuarios (correo, contra, img_log) values ('Rtapiz@gmail.com', '1234', 'img\\user2.jpg');
INSERT usuarios values(last_insert_id(), 'raul', 'jesus', 'ruiz', 'tapiz', 'RTapiz', '6121123422', 'Administrador', 'W6xruUMvmvCkrrhKHn', 'FRz2mZjQHjnFH', 'forjadores', 'tecnologico,terminal', '512', 'forjadores', '23098', 'La Paz');
--======================================--
call agregaUsuario( 'Meli@gmail.com', '1234', 'img\\user3.jpg', 'Melisa', 'samanta', 'cesena', 'rodrigez', 'Meli', '6121458795', 'Laboratorista 1', 'aXmMm4LDfWRq6muiSj', 'hXFUwgrwHKtQM', 'pitaya', 'mango,semilla', '564', 'indeco', '23071', 'La Paz');
--======================================--
call agregaUsuario( 'Luis@gmail.com', '1234', 'img\\user4.jpg', 'Luis', 'Enrrique', 'Villavicencio', 'Lucero', '', '6128962147', 'Laboratorista 2', 'qFFkAg8Dk9kP5fgZ9P', 'X4LzwXF8Nyiek', 'pitaya', 'mango,semilla', '564', 'indeco', '23071', 'La Paz');
--======================================--
call agregaUsuario( 'ñonga@gmail.com', '1234', 'img\\user5.jpg', 'La', 'ñonga', 'peres', 'prado', '', '6124558796', 'Laboratorista 2', 'c8fzCAnAcWjAtFhgDi', 'RQw6YjzLQWDvH', 'paya', 'forja,martillo', '879', 'ferreteria', '85047', 'La Paz');