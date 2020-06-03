use databaseingexis;
-- =================================================
-- create VIEW muestra_usuer as
-- select 
--     muestra.id_muestra,
--     muestra.resultado,
--     muestra.fecha_prog,
--     muestra.identificador,
--     usuarios.apodo,
--     log_usuarios.img_log
-- from
--     muestra,
--     usuarios,
--     log_usuarios
-- where
--     muestra.id_usuario = log_usuarios.id_usuario AND
--     muestra.id_usuario = usuarios.id_usuario AND
--     muestra.resultado != '??';
-- =================================================
create VIEW elemento_user as
select
    elemento.id_elemento,
    elemento.nombre,
    elemento.observaciones,
    elemento.fecha_reg,
    usuarios.apodo
FROM
    elemento,
    usuarios
where
    elemento.id_usuario = usuarios.id_usuario;
-- =================================================
-- =================================================