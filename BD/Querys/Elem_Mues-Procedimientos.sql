use databaseingexis;
-- -- =================================================
create procedure ElemMues_agregar(
    in id_obra int,
    in id_usuario int,
    in nombre varchar(50)
)
begin
    DECLARE id_elem int;
    insert elemento(elemento.id_obra, elemento.id_usuario, elemento.nombre) values (id_obra, id_usuario, nombre);
    ------------------------------
    SELECT last_insert_id() into id_elem;
    ------------------------------
    INSERT muestra(muestra.id_elemento, muestra.resultado) values (id_elem, '??');
    ------------------------------
    INSERT muestra(muestra.id_elemento, muestra.resultado) values (id_elem, '??');
    ------------------------------
    INSERT muestra(muestra.id_elemento, muestra.resultado) values (id_elem, '??');
end
-- call ElemMues_agregar(3, 1, "prueba1");
-- -- =================================================
-- create procedure ElemMues_Fechas_ident(in id_elemento int, in fechaMues date, in id_muestra1 int, in id_muestra2 int, in id_muestra3 int, in iden1 varchar(10), in iden2 varchar(10), in iden3 varchar(10))
-- begin
--     update elemento set elemento.fecha_muestreo = fechaMues where elemento.id_elemento = id_elemento;
--     update muestra 
--     set 
--         muestra.identificador = concat(date_format(now(), '%Y-'), iden1),
--         muestra.fecha_prog = DATE_ADD(fechaMues, interval 7 day)
--     where muestra.id_muestra = id_muestra1;
--     --------------
--     update muestra 
--         set 
--         muestra.identificador = concat(date_format(now(), '%Y-'), iden2),
--         muestra.fecha_prog = DATE_ADD(fechaMues, interval 14 day)
--     where muestra.id_muestra = id_muestra2;
--     --------------
--     update muestra 
--     set 
--         muestra.identificador = concat(date_format(now(), '%Y-'), iden3),
--         muestra.fecha_prog = DATE_ADD(fechaMues, interval 28 day)
--     where muestra.id_muestra = id_muestra3;
-- end
-- -- call ElemMues_Fechas_ident(2, '2020-06-03', 1, 2, 3, '1', '2', '3');
-- -- =================================================
-- create procedure ElemMues_Eleminar(in id_elemento int)
-- begin
--     DELETE mu from elemento as el inner join muestra as mu on el.id_elemento = mu.id_elemento where el.id_elemento = id_elemento;   
--     DELETE from elemento where elemento.id_elemento = id_elemento;
-- end
-- -- =================================================
-- create procedure ElemMues_Modificar_Elemento(in id_elemento int, in correo_user varchar(50), in nombre varchar(50), in observaciones text, in fechaMues date)
-- begin 
--     update elemento SET elemento.id_usuario = id_by_correo(correo_user), elemento.nombre = nombre, elemento.observaciones = observaciones, elemento.fecha_muestreo = fechaMues WHERE elemento.id_elemento = id_elemento;
--     update muestra set muestra.fecha_prog = DATE_ADD(fechaMues, interval 28 day) where muestra.id_elemento = id_elemento ORDER BY muestra.id_muestra desc;
--     update muestra set muestra.fecha_prog = DATE_ADD(fechaMues, interval 14 day) where muestra.id_elemento = id_elemento ORDER BY muestra.id_muestra desc LIMIT 2;
--     update muestra set muestra.fecha_prog = DATE_ADD(fechaMues, interval 7 day)  where muestra.id_elemento = id_elemento ORDER BY muestra.id_muestra desc LIMIT 1;
-- end
-- -- call ElemMues_Modificar_Elemento(2, 'jesus120190240.8@gmail.com', 'prueba11', 'ya las agrege', '2020-04-01');
-- -- =================================================
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
-- -- =================================================