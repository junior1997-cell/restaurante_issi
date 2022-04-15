/*
 Navicat Premium Data Transfer

 Source Server         : Postgre
 Source Server Type    : PostgreSQL
 Source Server Version : 90610
 Source Host           : localhost:5432
 Source Catalog        : nombres
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 90610
 File Encoding         : 65001

 Date: 10/04/2021 06:12:06
*/


-- ----------------------------
-- Sequence structure for nombres_idnombre_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."nombres_idnombre_seq";
CREATE SEQUENCE "public"."nombres_idnombre_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Table structure for nombres
-- ----------------------------
DROP TABLE IF EXISTS "public"."nombres";
CREATE TABLE "public"."nombres" (
  "idnombre" int2 NOT NULL DEFAULT nextval('nombres_idnombre_seq'::regclass),
  "nombre" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of nombres
-- ----------------------------
INSERT INTO "public"."nombres" VALUES (1, 'MARIA LILA IRIGOIN');
INSERT INTO "public"."nombres" VALUES (2, 'INVERSIONES MULTISERVICIOS J & K PEREZ SOCIEDAD ANONIMA CERRADA');
INSERT INTO "public"."nombres" VALUES (3, 'SHIRLEY MISHELL CUBAS MONSALVE');
INSERT INTO "public"."nombres" VALUES (4, 'MARCIA CONQUI EGUIZABAL');
INSERT INTO "public"."nombres" VALUES (5, 'NILDA PAZ VILCHEZ');
INSERT INTO "public"."nombres" VALUES (6, 'CESAR (DIRECTOR UPEU)');
INSERT INTO "public"."nombres" VALUES (7, 'BREINER TAPIA');
INSERT INTO "public"."nombres" VALUES (8, 'ESTER VILLANUEVA HUAMAN');
INSERT INTO "public"."nombres" VALUES (9, 'RITA MAR MENDOZA');
INSERT INTO "public"."nombres" VALUES (10, 'ALESSANDRO BARBIERI GOMEZ');
INSERT INTO "public"."nombres" VALUES (11, 'MIRIAM PORTILLA FERNANDEZ');
INSERT INTO "public"."nombres" VALUES (12, 'PERSY QUIROZ');
INSERT INTO "public"."nombres" VALUES (13, 'MARKET PIERO MAURICIO');
INSERT INTO "public"."nombres" VALUES (14, 'ALICIA ESPINOZA CACERES');
INSERT INTO "public"."nombres" VALUES (15, 'JHAN CARLOS SIGUENAS VEGA');
INSERT INTO "public"."nombres" VALUES (16, 'EVILA LLAJA TARILLO');
INSERT INTO "public"."nombres" VALUES (17, 'CYNTHIA VITON PEREZ');
INSERT INTO "public"."nombres" VALUES (18, 'ALISSON TAPULLIMA VISALOT');
INSERT INTO "public"."nombres" VALUES (19, 'ROSITA BUSTAMANTE MUÑOZ');
INSERT INTO "public"."nombres" VALUES (20, 'JOSSELINE ALEXANDRA HUAMAN RAMOS');
INSERT INTO "public"."nombres" VALUES (21, 'DIEGO LEONARDO VILLACORTA CISNEROS');
INSERT INTO "public"."nombres" VALUES (22, 'UNIVERSIDAD PERUANA UNION');
INSERT INTO "public"."nombres" VALUES (23, 'SOL PERUANO & SERVICIOS LOGISTICOS SOCIEDAD ANONIMA CERRADA');
INSERT INTO "public"."nombres" VALUES (24, 'RAQUEL CHAVEZ HOYOS');
INSERT INTO "public"."nombres" VALUES (25, 'DAVID ASCONA CARRANZA');
INSERT INTO "public"."nombres" VALUES (26, 'CAFETIN');
INSERT INTO "public"."nombres" VALUES (27, 'WELDER PEZO RUIZ');
INSERT INTO "public"."nombres" VALUES (28, 'MIRIAM QUISPE CHAMAYA');
INSERT INTO "public"."nombres" VALUES (29, 'KENY MACEDO HIDALGO');
INSERT INTO "public"."nombres" VALUES (30, 'CRISTINA SILVA PEREZ');
INSERT INTO "public"."nombres" VALUES (31, 'INMACULADA JIMENES PIMENTEL');
INSERT INTO "public"."nombres" VALUES (32, 'HERRERA CHUQUILIN XIOMARA KATHERINE');
INSERT INTO "public"."nombres" VALUES (33, 'VARIOS');
INSERT INTO "public"."nombres" VALUES (34, 'GESSICA MABEL PIMEDO ZUMAETA');
INSERT INTO "public"."nombres" VALUES (35, 'PIÑA GATICA GREICI GLEDITH');
INSERT INTO "public"."nombres" VALUES (36, 'JENNIFER GARCIA TORRES');
INSERT INTO "public"."nombres" VALUES (37, 'YONY YHON PAYEHUANCA MAMANI');
INSERT INTO "public"."nombres" VALUES (38, 'CAMBIOS DE BIGOTE');
INSERT INTO "public"."nombres" VALUES (39, 'ANGEL FRANDER GARCIA PEREZ');

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."nombres_idnombre_seq"
OWNED BY "public"."nombres"."idnombre";
SELECT setval('"public"."nombres_idnombre_seq"', 40, true);

-- ----------------------------
-- Primary Key structure for table nombres
-- ----------------------------
ALTER TABLE "public"."nombres" ADD CONSTRAINT "nombres_pkey" PRIMARY KEY ("idnombre");
