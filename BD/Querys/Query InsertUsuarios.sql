use databaseingexis;
--======================================--
INSERT Log_usuarios (correo, contra, img_log) values ('jesus120190240.8@gmail.com', '1234', 'no img');
INSERT usuarios values(last_insert_id(), 'jesus', '', 'villavicencio', 'osuna', 'JesusWhite', '612171121', 'Jefe De Laboratorio', 'aaaa111111bccddd23', 'aaaa111111b2c', 'pinon', 'avellana,limon', '201', 'indeco', '23070');
--======================================--
INSERT Log_usuarios (correo, contra, img_log) values ('Rtapiz@gmail.com', '1234', 'no img');
INSERT usuarios values(last_insert_id(), 'raul', 'jesus', 'ruiz', 'tapiz', 'RTapiz', '6121123422', 'Administrador', 'aaaa111111bccddd23', 'aaaa111111b2c', 'forjadores', 'tecnologico,terminal', '512', 'forjadores', '23098');
--======================================--
-- call agregaUsuario( 'Meli@gmail.com', '1234', 'noImg', 'Melisa', 'samanta', 'cesena', 'rodrigez', 'Meli', '6121458795', 'Laboratorista 1', 'aaaa111111bccddd23', 'aaaa111111b2c', 'pitaya', 'mango,semilla', '564', 'indeco', '23071');
--======================================--
-- call agregaUsuario( 'Luis@gmail.com', '1234', 'noImg', 'Luis', 'Enrrique', 'Villavicencio', 'Lucero', '', '6128962147', 'Laboratorista 2', 'aaaa111111bccddd23', 'aaaa111111b2c', 'pitaya', 'mango,semilla', '564', 'indeco', '23071');
--======================================--
-- call agregaUsuario( 'ñonga@gmail.com', '1234', 'noImg', 'La', 'ñonga', 'peres', 'prado', '', '6124558796', 'Laboratorista 2', 'aaae111111bccddd23', 'aaae111111b2c', 'paya', 'forja,martillo', '879', 'ferreteria', '85047');