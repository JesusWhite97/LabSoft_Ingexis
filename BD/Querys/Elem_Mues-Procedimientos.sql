use databaseingexis;
-- =================================================
-- create procedure ElemMues_agregar(
--     in id_obra int,
--     in id_usuario int,
--     in nombre varchar(50),
--     in observaciones text,
--     in fecha_reg date,
--     ------------------------------
--     in iden1 varchar(10),
--     in iden2 varchar(10),
--     in iden3 varchar(10)
-- )
-- begin
--     DECLARE id_elem int;
--     insert elemento(elemento.id_obra, elemento.id_usuario, elemento.nombre, elemento.observaciones, elemento.fecha_reg)
--         values (id_obra, id_usuario, nombre, observaciones, fecha_reg);
--     ------------------------------
--     SELECT last_insert_id() into id_elem;
--     ------------------------------
--     INSERT muestra(muestra.id_elemento, muestra.identificador, muestra.resultado, muestra.fecha_prog) values (id_elem, concat(date_format(now(), '%Y-'), iden1), '??', DATE_ADD(fecha_reg, interval 7 day));
--     ------------------------------
--     INSERT muestra(muestra.id_elemento, muestra.identificador, muestra.resultado, muestra.fecha_prog) values (id_elem, concat(date_format(now(), '%Y-'), iden2), '??', DATE_ADD(fecha_reg, interval 14 day));
--     ------------------------------
--     INSERT muestra(muestra.id_elemento, muestra.identificador, muestra.resultado, muestra.fecha_prog) values (id_elem, concat(date_format(now(), '%Y-'), iden3), '??', DATE_ADD(fecha_reg, interval 28 day));
-- end
-- call ElemMues_agregar(3,1,'prueba de dias', 'ver si jala esta verga', '2020-01-01', '20', '21', '22');
-- =================================================
-- create procedure ElemMues_Eleminar(in id_elemento int)
-- begin
--     DELETE mu from elemento as el inner join muestra as mu on el.id_elemento = mu.id_elemento where el.id_elemento = id_elemento;   
--     DELETE from elemento where elemento.id_elemento = id_elemento;
-- end
-- =================================================
-- create procedure ElemMues_Modificar_Elemento(in id_elemento int, in correo_user varchar(50), in nombre varchar(50), in observaciones text)
-- begin 
--     update elemento 
--     SET 
--         elemento.id_usuario = id_by_correo(correo_user),
--         elemento.nombre = nombre,
--         elemento.observaciones = observaciones
--     WHERE 
--         elemento.id_elemento = id_elemento;
-- end
-- =================================================
-- create procedure ElemMues_Modificar_Muestra(in id_muestra int, in correo_user varchar(50), in ident varchar(10), in resultado varchar(50))
-- begin 
--     declare id_user int;
--     SELECT id_by_correo(correo_user) into id_user;
--     update muestra
--     SET
--         muestra.id_usuario = id_user,
--         muestra.identificador = concat(date_format(now(), '%Y-'), ident),
--         muestra.resultado = resultado
--     where 
--         muestra.id_muestra = id_muestra;
-- end
-- =================================================