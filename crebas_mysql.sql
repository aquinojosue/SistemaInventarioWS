/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     05/06/2020 10:58:00 a.m.                     */
/*==============================================================*/


drop table if exists ACCESOUSUARIO;

drop table if exists AUTOR;

drop table if exists CATALOGOEQUIPO;

drop table if exists CATEGORIAS;

drop table if exists DESCARGOS;

drop table if exists DETALLEAUTOR;

drop table if exists DETALLEDESCARGOS;

drop table if exists DETALLERESERVA;

drop table if exists DIAS;

drop table if exists DOCENTE;

drop table if exists DOCUMENTO;

drop table if exists EQUIPOINFORMATICO;

drop table if exists HORACLASE;

drop table if exists HORARIOS;

drop table if exists IDIOMAS;

drop table if exists MARCA;

drop table if exists MOTIVO;

drop table if exists MOVIMIENTOINVENTARIO;

drop table if exists OBSERVACION;

drop table if exists OPCIONCRUD;

drop table if exists PARTICIPACIONDOCENTE;

drop table if exists SUSTITUCIONES;

drop table if exists TIPOMOVIMIENTO;

drop table if exists TIPOPARTICIPACION;

drop table if exists TIPOPRODUCTO;

drop table if exists TOMAFISICA;

drop table if exists UBICACIONES;

drop table if exists USUARIO;

/*==============================================================*/
/* Table: ACCESOUSUARIO                                         */
/*==============================================================*/
create table ACCESOUSUARIO
(
   ID_OPCION            char(3) not null,
   USUARIO              varchar(7) not null,
   ID_ACCESOUSUARIO     int not null,
   primary key (ID_OPCION, USUARIO, ID_ACCESOUSUARIO)
);

/*==============================================================*/
/* Table: AUTOR                                                 */
/*==============================================================*/
create table AUTOR
(
   IDAUTOR              numeric(6,0) not null,
   NOMAUTOR             varchar(50) not null,
   APEAUTOR             varchar(50) not null,
   primary key (IDAUTOR)
);

/*==============================================================*/
/* Table: CATALOGOEQUIPO                                        */
/*==============================================================*/
create table CATALOGOEQUIPO
(
   CATALOGO_ID          char(6) not null,
   MARCA_ID             char(3),
   MODELO_EQUIPO_GENERICO varchar(30) not null,
   MEMORIA              int,
   CANTIDAD_EQUIPO      int,
   primary key (CATALOGO_ID)
);

/*==============================================================*/
/* Table: CATEGORIAS                                            */
/*==============================================================*/
create table CATEGORIAS
(
   CATEGORIA_ID         numeric(6,0) not null,
   CATEGORIA_NOMBRE     varchar(50) not null,
   primary key (CATEGORIA_ID)
);

/*==============================================================*/
/* Table: DESCARGOS                                             */
/*==============================================================*/
create table DESCARGOS
(
   DESCARGO_ID2         numeric(6,0) not null,
   UBICACION_ORIGEN_ID  int,
   UBICACION_DESTINO_ID int,
   DESCARGO_FECHA       date not null,
   primary key (DESCARGO_ID2)
);

/*==============================================================*/
/* Table: DETALLEAUTOR                                          */
/*==============================================================*/
create table DETALLEAUTOR
(
   ESCRITO_ID           int not null,
   IDAUTOR              int not null,
   ESPRINCIPAL          smallint not null,
   primary key (ESCRITO_ID, IDAUTOR)
);

/*==============================================================*/
/* Table: DETALLEDESCARGOS                                      */
/*==============================================================*/
create table DETALLEDESCARGOS
(
   EQUIPO_ID            int not null,
   DESCARGO_ID2         int not null,
   primary key (EQUIPO_ID, DESCARGO_ID2)
);

/*==============================================================*/
/* Table: DETALLERESERVA                                        */
/*==============================================================*/
create table DETALLERESERVA
(
   HORA_ID              int not null,
   DIA_COD              char(3) not null,
   PRESTAMO_ID          int not null,
   primary key (HORA_ID, DIA_COD, PRESTAMO_ID)
);

/*==============================================================*/
/* Table: DIAS                                                  */
/*==============================================================*/
create table DIAS
(
   DIA_COD              char(3) not null,
   DIA_NOMBRE           varchar(15) not null,
   primary key (DIA_COD)
);

/*==============================================================*/
/* Table: DOCENTE                                               */
/*==============================================================*/
create table DOCENTE
(
   DOCENTES_ID          numeric(6,0) not null,
   DOCENTES_NOMBRE      varchar(50) not null,
   primary key (DOCENTES_ID)
);

/*==============================================================*/
/* Table: DOCUMENTO                                             */
/*==============================================================*/
create table DOCUMENTO
(
   ESCRITO_ID           numeric(6,0) not null,
   TIPO_PRODUCTO_ID     int not null,
   IDIOMA_ID            int not null,
   ISBN                 varchar(50),
   EDICION              varchar(50),
   EDITORIAL            varchar(50),
   TITULO               varchar(75) not null,
   primary key (ESCRITO_ID)
);

/*==============================================================*/
/* Table: EQUIPOINFORMATICO                                     */
/*==============================================================*/
create table EQUIPOINFORMATICO
(
   EQUIPO_ID            numeric(6,0) not null,
   TIPO_PRODUCTO_ID     int not null,
   UBICACION_ID         int not null,
   CATALOGO_ID          char(6) not null,
   CODIGO_EQUIPO        varchar(30) not null,
   FECHA_ADQUISICION    date not null,
   ESTADO_EQUIPO        char(6) not null,
   primary key (EQUIPO_ID)
);

/*==============================================================*/
/* Table: HORACLASE                                             */
/*==============================================================*/
create table HORACLASE
(
   HORA_ID              numeric(6,0) not null,
   HORA_INICIO          time not null,
   HORA_FIN             time not null,
   primary key (HORA_ID)
);

/*==============================================================*/
/* Table: HORARIOS                                              */
/*==============================================================*/
create table HORARIOS
(
   HORA_ID              int not null,
   DIA_COD              char(3) not null,
   primary key (HORA_ID, DIA_COD)
);

/*==============================================================*/
/* Table: IDIOMAS                                               */
/*==============================================================*/
create table IDIOMAS
(
   IDIOMA_ID            numeric(6,0) not null,
   IDIOMA_NOMBRE        varchar(15) not null,
   primary key (IDIOMA_ID)
);

/*==============================================================*/
/* Table: MARCA                                                 */
/*==============================================================*/
create table MARCA
(
   MARCA_ID             char(3) not null,
   MARCA_NOMBRE         varchar(20) not null,
   primary key (MARCA_ID)
);

/*==============================================================*/
/* Table: MOTIVO                                                */
/*==============================================================*/
create table MOTIVO
(
   MOTIVO_ID            numeric(6,0) not null,
   MOTIVO_NOMBRE        varchar(50) not null,
   primary key (MOTIVO_ID)
);

/*==============================================================*/
/* Table: MOVIMIENTOINVENTARIO                                  */
/*==============================================================*/
create table MOVIMIENTOINVENTARIO
(
   PRESTAMO_ID          numeric(6,0) not null,
   TIPO_MOVIMIENTO_ID   int not null,
   DOCENTES_ID          int not null,
   EQUIPO_ID            int not null,
   DESCRIPCION          varchar(255) not null,
   PRESTAMO_FECHA_INI   date not null,
   PRESTAMO_DECHA_FIN   date not null,
   PRESTAMO_PERMANENTE  smallint not null,
   PRESTAMO_ACTIVO      smallint not null,
   primary key (PRESTAMO_ID)
);

/*==============================================================*/
/* Table: OBSERVACION                                           */
/*==============================================================*/
create table OBSERVACION
(
   CATALOGO_ID          char(6) not null,
   TOMA_ID              int not null,
   CANT_SUPUESTA        int not null,
   CANT_REAL            int,
   primary key (CATALOGO_ID, TOMA_ID)
);

/*==============================================================*/
/* Table: OPCIONCRUD                                            */
/*==============================================================*/
create table OPCIONCRUD
(
   ID_OPCION            char(3) not null,
   DESOPCION            varchar(30) not null,
   NUMCRUD              int not null,
   primary key (ID_OPCION)
);

/*==============================================================*/
/* Table: PARTICIPACIONDOCENTE                                  */
/*==============================================================*/
create table PARTICIPACIONDOCENTE
(
   ESCRITO_ID           int not null,
   DOCENTES_ID          int not null,
   PARTICIPACION_ID     int not null,
   primary key (ESCRITO_ID, DOCENTES_ID)
);

/*==============================================================*/
/* Table: SUSTITUCIONES                                         */
/*==============================================================*/
create table SUSTITUCIONES
(
   SUSTITUCION_ID       numeric(6,0) not null,
   MOTIVO_ID            int not null,
   EQUIPO_OBSOLETO_ID   int not null,
   EQUIPO_REEMPLAZO_ID  int,
   DOCENTES_ID          int not null,
   primary key (SUSTITUCION_ID)
);

/*==============================================================*/
/* Table: TIPOMOVIMIENTO                                        */
/*==============================================================*/
create table TIPOMOVIMIENTO
(
   TIPO_MOVIMIENTO_ID   numeric(6,0) not null,
   TIPO_MOVIMIENTO_NOMBRE varchar(50) not null,
   primary key (TIPO_MOVIMIENTO_ID)
);

/*==============================================================*/
/* Table: TIPOPARTICIPACION                                     */
/*==============================================================*/
create table TIPOPARTICIPACION
(
   PARTICIPACION_ID     numeric(6,0) not null,
   PARTICIPACION_NOMBRE varchar(50) not null,
   primary key (PARTICIPACION_ID)
);

/*==============================================================*/
/* Table: TIPOPRODUCTO                                          */
/*==============================================================*/
create table TIPOPRODUCTO
(
   TIPO_PRODUCTO_ID     numeric(6,0) not null,
   CATEGORIA_ID         int not null,
   NOMBRE_TIPO_PRODUCTO varchar(50) not null,
   primary key (TIPO_PRODUCTO_ID)
);

/*==============================================================*/
/* Table: TOMAFISICA                                            */
/*==============================================================*/
create table TOMAFISICA
(
   TOMA_ID              numeric(6,0) not null,
   UBICACION_ID         int,
   TOMA_FECHA           date not null,
   primary key (TOMA_ID)
);

/*==============================================================*/
/* Table: UBICACIONES                                           */
/*==============================================================*/
create table UBICACIONES
(
   UBICACION_ID         numeric(6,0) not null,
   UBICACION_NOMBRE     varchar(50) not null,
   primary key (UBICACION_ID)
);

/*==============================================================*/
/* Table: USUARIO                                               */
/*==============================================================*/
create table USUARIO
(
   USUARIO              varchar(7) not null,
   CONTRASENA           varchar(10) not null,
   NOMBRE_USUARIO       varchar(255) not null,
   primary key (USUARIO)
);


