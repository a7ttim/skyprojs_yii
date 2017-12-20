/*
Navicat PGSQL Data Transfer

Source Server         : postgreSQL
Source Server Version : 90603
Source Host           : localhost:5432
Source Database       : skyprojs
Source Schema         : public

Target Server Type    : PGSQL
Target Server Version : 90603
File Encoding         : 65001

Date: 2017-12-20 22:12:21
*/


-- ----------------------------
-- Sequence structure for department_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."department_id_seq";
CREATE SEQUENCE "public"."department_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 5
 CACHE 1;
SELECT setval('"public"."department_id_seq"', 5, true);

-- ----------------------------
-- Sequence structure for direction_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."direction_id_seq";
CREATE SEQUENCE "public"."direction_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 30
 CACHE 1;
SELECT setval('"public"."direction_id_seq"', 30, true);

-- ----------------------------
-- Sequence structure for grnti_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."grnti_id_seq";
CREATE SEQUENCE "public"."grnti_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 9
 CACHE 1;
SELECT setval('"public"."grnti_id_seq"', 9, true);

-- ----------------------------
-- Sequence structure for project_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."project_id_seq";
CREATE SEQUENCE "public"."project_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 10
 CACHE 1;
SELECT setval('"public"."project_id_seq"', 10, true);

-- ----------------------------
-- Sequence structure for udk_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."udk_id_seq";
CREATE SEQUENCE "public"."udk_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 14
 CACHE 1;
SELECT setval('"public"."udk_id_seq"', 14, true);

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS "public"."admin";
CREATE TABLE "public"."admin" (
"admin_login" varchar(254) COLLATE "default" NOT NULL,
"admin_password" varchar(254) COLLATE "default" NOT NULL,
"admin_token" varchar(254) COLLATE "default",
"admin_access_key" varchar(254) COLLATE "default"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO "public"."admin" VALUES ('Admin', 'e10adc3949ba59abbe56e057f20f883e', null, null);

-- ----------------------------
-- Table structure for classificate_1
-- ----------------------------
DROP TABLE IF EXISTS "public"."classificate_1";
CREATE TABLE "public"."classificate_1" (
"project_id" int4 NOT NULL,
"grnti_id" int4 NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of classificate_1
-- ----------------------------
INSERT INTO "public"."classificate_1" VALUES ('1', '6');
INSERT INTO "public"."classificate_1" VALUES ('1', '7');
INSERT INTO "public"."classificate_1" VALUES ('10', '6');

-- ----------------------------
-- Table structure for classificate_2
-- ----------------------------
DROP TABLE IF EXISTS "public"."classificate_2";
CREATE TABLE "public"."classificate_2" (
"project_id" int4 NOT NULL,
"udk_id" int4 NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of classificate_2
-- ----------------------------
INSERT INTO "public"."classificate_2" VALUES ('1', '9');
INSERT INTO "public"."classificate_2" VALUES ('10', '9');

-- ----------------------------
-- Table structure for classificate_3
-- ----------------------------
DROP TABLE IF EXISTS "public"."classificate_3";
CREATE TABLE "public"."classificate_3" (
"direction_id" int4 NOT NULL,
"project_id" int4 NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of classificate_3
-- ----------------------------

-- ----------------------------
-- Table structure for collaborator
-- ----------------------------
DROP TABLE IF EXISTS "public"."collaborator";
CREATE TABLE "public"."collaborator" (
"member_id" int4 NOT NULL,
"project_id" int4 NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of collaborator
-- ----------------------------

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS "public"."department";
CREATE TABLE "public"."department" (
"department_id" int4 DEFAULT nextval('department_id_seq'::regclass) NOT NULL,
"department_name" varchar(254) COLLATE "default" NOT NULL,
"department_parent_id" int4
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO "public"."department" VALUES ('3', 'ФСУ', null);
INSERT INTO "public"."department" VALUES ('4', 'АОИ', '3');
INSERT INTO "public"."department" VALUES ('5', 'АСУ', '3');

-- ----------------------------
-- Table structure for directions
-- ----------------------------
DROP TABLE IF EXISTS "public"."directions";
CREATE TABLE "public"."directions" (
"direction_id" int4 DEFAULT nextval('direction_id_seq'::regclass) NOT NULL,
"direction_name" varchar(254) COLLATE "default" NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of directions
-- ----------------------------
INSERT INTO "public"."directions" VALUES ('4', 'Базовые и критические военные и промышленные технологии для создания перспективных видов вооружения, военной и специальной техники');
INSERT INTO "public"."directions" VALUES ('5', 'Базовые технологии силовой электротехники');
INSERT INTO "public"."directions" VALUES ('6', 'Биокаталитические, биосинтетические и биосенсорные технологии');
INSERT INTO "public"."directions" VALUES ('7', 'Биомедицинские и ветеринарные технологии');
INSERT INTO "public"."directions" VALUES ('8', 'Геномные, протеомные и постгеномные технологии');
INSERT INTO "public"."directions" VALUES ('9', 'Клеточные технологии');
INSERT INTO "public"."directions" VALUES ('10', 'Компьютерное моделирование наноматериалов, наноустройств и нанотехнологий');
INSERT INTO "public"."directions" VALUES ('11', 'Нано-, био-, информационные, когнитивные технологии');
INSERT INTO "public"."directions" VALUES ('12', 'Технологии атомной энергетики, ядерного топливного цикла, безопасного обращения с радиоактивными отходами и отработавшим ядерным топливом');
INSERT INTO "public"."directions" VALUES ('13', 'Технологии биоинженерии');
INSERT INTO "public"."directions" VALUES ('14', 'Технологии диагностики наноматериалов и наноустройств');
INSERT INTO "public"."directions" VALUES ('15', 'Технологии доступа к широкополосным мультимедийным услугам');
INSERT INTO "public"."directions" VALUES ('16', 'Технологии информационных, управляющих, навигационных систем');
INSERT INTO "public"."directions" VALUES ('17', 'Технологии наноустройств и микросистемной техники');
INSERT INTO "public"."directions" VALUES ('18', 'Технологии новых и возобновляемых источников энергии, включая водородную энергетику');
INSERT INTO "public"."directions" VALUES ('19', 'Технологии получения и обработки конструкционных наноматериалов');
INSERT INTO "public"."directions" VALUES ('20', 'Технологии получения и обработки функциональных наноматериалов');
INSERT INTO "public"."directions" VALUES ('21', 'Технологии и программное обеспечение распределенных и высокопроизводительных вычислительных систем');
INSERT INTO "public"."directions" VALUES ('22', 'Технологии мониторинга и прогнозирования состояния окружающей среды, предотвращения и ликвидации ее загрязнения');
INSERT INTO "public"."directions" VALUES ('23', 'Технологии поиска, разведки, разработки месторождений полезных ископаемых и их добычи');
INSERT INTO "public"."directions" VALUES ('24', 'Технологии предупреждения и ликвидации чрезвычайных ситуаций природного и техногенного характера');
INSERT INTO "public"."directions" VALUES ('25', 'Технологии снижения потерь от социально значимых заболеваний');
INSERT INTO "public"."directions" VALUES ('26', 'Технологии создания высокоскоростных транспортных средств и интеллектуальных систем управления новыми видами транспорта');
INSERT INTO "public"."directions" VALUES ('27', 'Технологии создания ракетно-космической и транспортной техники нового поколения');
INSERT INTO "public"."directions" VALUES ('28', 'Технологии создания электронной компонентной базы и энергоэффективных световых устройств');
INSERT INTO "public"."directions" VALUES ('29', 'Технологии создания энергосберегающих систем транспортировки, распределения и использования энергии');
INSERT INTO "public"."directions" VALUES ('30', 'Технологии энергоэффективного производства и преобразования энергии на органическом топливе');

-- ----------------------------
-- Table structure for grnti
-- ----------------------------
DROP TABLE IF EXISTS "public"."grnti";
CREATE TABLE "public"."grnti" (
"grnti_id" int4 DEFAULT nextval('grnti_id_seq'::regclass) NOT NULL,
"grnti_code" varchar(254) COLLATE "default" NOT NULL,
"grnti_name" text COLLATE "default" NOT NULL,
"grnti_parent_id" int4
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of grnti
-- ----------------------------
INSERT INTO "public"."grnti" VALUES ('6', '20.53.17', 'Средства хранения информации', '8');
INSERT INTO "public"."grnti" VALUES ('7', '20.53.19', 'Средства обработки и поиска информации', '8');
INSERT INTO "public"."grnti" VALUES ('8', '20.53', 'Технические средства обеспечения информационных процессов', '9');
INSERT INTO "public"."grnti" VALUES ('9', '20', 'Информатика', null);

-- ----------------------------
-- Table structure for member
-- ----------------------------
DROP TABLE IF EXISTS "public"."member";
CREATE TABLE "public"."member" (
"member_id" int4 NOT NULL,
"member_name" varchar(254) COLLATE "default" NOT NULL,
"member_surname" varchar(254) COLLATE "default" NOT NULL,
"member_patronymic" varchar(254) COLLATE "default" NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of member
-- ----------------------------

-- ----------------------------
-- Table structure for project
-- ----------------------------
DROP TABLE IF EXISTS "public"."project";
CREATE TABLE "public"."project" (
"project_id" int4 DEFAULT nextval('project_id_seq'::regclass) NOT NULL,
"project_name" varchar(254) COLLATE "default" NOT NULL,
"project_date" date NOT NULL,
"project_area" varchar(510) COLLATE "default",
"project_advantages" varchar(510) COLLATE "default",
"project_specifications" varchar(510) COLLATE "default",
"project_consumers" varchar(510) COLLATE "default",
"project_protection" varchar(510) COLLATE "default"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of project
-- ----------------------------
INSERT INTO "public"."project" VALUES ('1', 'Облачная Платформа Ведения Реестра Информационных Проектов', '2017-05-24', '', 'ПО может быть тиражировано по предприятиям занимающимися инновационными разработками.', 'Использование интернет-браузера.', 'Управление по инновациям ТУСУР.', '');
INSERT INTO "public"."project" VALUES ('10', 'Геоинформационная система электрокоммуникаций', '2017-11-22', '', '', '', '', '');

-- ----------------------------
-- Table structure for udk
-- ----------------------------
DROP TABLE IF EXISTS "public"."udk";
CREATE TABLE "public"."udk" (
"udk_id" int4 DEFAULT nextval('udk_id_seq'::regclass) NOT NULL,
"udk_code" varchar(254) COLLATE "default" NOT NULL,
"udk_name" text COLLATE "default" NOT NULL,
"udk_parent_id" int4
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of udk
-- ----------------------------
INSERT INTO "public"."udk" VALUES ('9', '004.413', 'Организация разработки программного обеспечения', '14');
INSERT INTO "public"."udk" VALUES ('12', '004', 'Информационные технологии. Компьютерные технологии. Теория вычислительных машин и систем', null);
INSERT INTO "public"."udk" VALUES ('13', '004.4', 'Программные средства', '12');
INSERT INTO "public"."udk" VALUES ('14', '004.41', 'Программотехника. Разработка вычислительных систем', '13');

-- ----------------------------
-- Table structure for working
-- ----------------------------
DROP TABLE IF EXISTS "public"."working";
CREATE TABLE "public"."working" (
"department_id" int4 NOT NULL,
"project_id" int4 NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of working
-- ----------------------------
INSERT INTO "public"."working" VALUES ('4', '1');
INSERT INTO "public"."working" VALUES ('5', '10');

-- ----------------------------
-- Alter Sequences Owned By 
-- ----------------------------

-- ----------------------------
-- Indexes structure for table admin
-- ----------------------------
CREATE UNIQUE INDEX "admin_pk" ON "public"."admin" USING btree ("admin_password", "admin_login");

-- ----------------------------
-- Primary Key structure for table admin
-- ----------------------------
ALTER TABLE "public"."admin" ADD PRIMARY KEY ("admin_password", "admin_login");

-- ----------------------------
-- Indexes structure for table classificate_1
-- ----------------------------
CREATE INDEX "classificate_1_fk" ON "public"."classificate_1" USING btree ("project_id");
CREATE INDEX "classificate_1_fk2" ON "public"."classificate_1" USING btree ("grnti_id");
CREATE UNIQUE INDEX "classificate_1_pk" ON "public"."classificate_1" USING btree ("project_id", "grnti_id");

-- ----------------------------
-- Primary Key structure for table classificate_1
-- ----------------------------
ALTER TABLE "public"."classificate_1" ADD PRIMARY KEY ("project_id", "grnti_id");

-- ----------------------------
-- Indexes structure for table classificate_2
-- ----------------------------
CREATE INDEX "classificate_2_fk" ON "public"."classificate_2" USING btree ("project_id");
CREATE INDEX "classificate_2_fk2" ON "public"."classificate_2" USING btree ("udk_id");
CREATE UNIQUE INDEX "classificate_2_pk" ON "public"."classificate_2" USING btree ("project_id", "udk_id");

-- ----------------------------
-- Primary Key structure for table classificate_2
-- ----------------------------
ALTER TABLE "public"."classificate_2" ADD PRIMARY KEY ("project_id", "udk_id");

-- ----------------------------
-- Indexes structure for table classificate_3
-- ----------------------------
CREATE INDEX "classificate_3_fk" ON "public"."classificate_3" USING btree ("direction_id");
CREATE INDEX "classificate_3_fk2" ON "public"."classificate_3" USING btree ("project_id");
CREATE UNIQUE INDEX "classificate_3_pk" ON "public"."classificate_3" USING btree ("direction_id", "project_id");

-- ----------------------------
-- Primary Key structure for table classificate_3
-- ----------------------------
ALTER TABLE "public"."classificate_3" ADD PRIMARY KEY ("direction_id", "project_id");

-- ----------------------------
-- Indexes structure for table collaborator
-- ----------------------------
CREATE INDEX "collaborator_fk" ON "public"."collaborator" USING btree ("member_id");
CREATE INDEX "collaborator_fk2" ON "public"."collaborator" USING btree ("project_id");
CREATE UNIQUE INDEX "collaborator_pk" ON "public"."collaborator" USING btree ("member_id", "project_id");

-- ----------------------------
-- Primary Key structure for table collaborator
-- ----------------------------
ALTER TABLE "public"."collaborator" ADD PRIMARY KEY ("member_id", "project_id");

-- ----------------------------
-- Indexes structure for table department
-- ----------------------------
CREATE UNIQUE INDEX "department_pk" ON "public"."department" USING btree ("department_id");

-- ----------------------------
-- Primary Key structure for table department
-- ----------------------------
ALTER TABLE "public"."department" ADD PRIMARY KEY ("department_id");

-- ----------------------------
-- Indexes structure for table directions
-- ----------------------------
CREATE UNIQUE INDEX "directions_pk" ON "public"."directions" USING btree ("direction_id");

-- ----------------------------
-- Primary Key structure for table directions
-- ----------------------------
ALTER TABLE "public"."directions" ADD PRIMARY KEY ("direction_id");

-- ----------------------------
-- Indexes structure for table grnti
-- ----------------------------
CREATE UNIQUE INDEX "grnti_pk" ON "public"."grnti" USING btree ("grnti_id");

-- ----------------------------
-- Primary Key structure for table grnti
-- ----------------------------
ALTER TABLE "public"."grnti" ADD PRIMARY KEY ("grnti_id");

-- ----------------------------
-- Indexes structure for table member
-- ----------------------------
CREATE UNIQUE INDEX "member_pk" ON "public"."member" USING btree ("member_id");

-- ----------------------------
-- Primary Key structure for table member
-- ----------------------------
ALTER TABLE "public"."member" ADD PRIMARY KEY ("member_id");

-- ----------------------------
-- Indexes structure for table project
-- ----------------------------
CREATE UNIQUE INDEX "project_pk" ON "public"."project" USING btree ("project_id");

-- ----------------------------
-- Primary Key structure for table project
-- ----------------------------
ALTER TABLE "public"."project" ADD PRIMARY KEY ("project_id");

-- ----------------------------
-- Indexes structure for table udk
-- ----------------------------
CREATE UNIQUE INDEX "udk_pk" ON "public"."udk" USING btree ("udk_id");

-- ----------------------------
-- Primary Key structure for table udk
-- ----------------------------
ALTER TABLE "public"."udk" ADD PRIMARY KEY ("udk_id");

-- ----------------------------
-- Indexes structure for table working
-- ----------------------------
CREATE INDEX "working_fk" ON "public"."working" USING btree ("department_id");
CREATE INDEX "working_fk2" ON "public"."working" USING btree ("project_id");
CREATE UNIQUE INDEX "working_pk" ON "public"."working" USING btree ("department_id", "project_id");

-- ----------------------------
-- Primary Key structure for table working
-- ----------------------------
ALTER TABLE "public"."working" ADD PRIMARY KEY ("department_id", "project_id");

-- ----------------------------
-- Foreign Key structure for table "public"."classificate_1"
-- ----------------------------
ALTER TABLE "public"."classificate_1" ADD FOREIGN KEY ("grnti_id") REFERENCES "public"."grnti" ("grnti_id") ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE "public"."classificate_1" ADD FOREIGN KEY ("project_id") REFERENCES "public"."project" ("project_id") ON DELETE RESTRICT ON UPDATE RESTRICT;

-- ----------------------------
-- Foreign Key structure for table "public"."classificate_2"
-- ----------------------------
ALTER TABLE "public"."classificate_2" ADD FOREIGN KEY ("udk_id") REFERENCES "public"."udk" ("udk_id") ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE "public"."classificate_2" ADD FOREIGN KEY ("project_id") REFERENCES "public"."project" ("project_id") ON DELETE RESTRICT ON UPDATE RESTRICT;

-- ----------------------------
-- Foreign Key structure for table "public"."classificate_3"
-- ----------------------------
ALTER TABLE "public"."classificate_3" ADD FOREIGN KEY ("direction_id") REFERENCES "public"."directions" ("direction_id") ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE "public"."classificate_3" ADD FOREIGN KEY ("project_id") REFERENCES "public"."project" ("project_id") ON DELETE RESTRICT ON UPDATE RESTRICT;

-- ----------------------------
-- Foreign Key structure for table "public"."collaborator"
-- ----------------------------
ALTER TABLE "public"."collaborator" ADD FOREIGN KEY ("member_id") REFERENCES "public"."member" ("member_id") ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE "public"."collaborator" ADD FOREIGN KEY ("project_id") REFERENCES "public"."project" ("project_id") ON DELETE RESTRICT ON UPDATE RESTRICT;

-- ----------------------------
-- Foreign Key structure for table "public"."working"
-- ----------------------------
ALTER TABLE "public"."working" ADD FOREIGN KEY ("department_id") REFERENCES "public"."department" ("department_id") ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE "public"."working" ADD FOREIGN KEY ("project_id") REFERENCES "public"."project" ("project_id") ON DELETE RESTRICT ON UPDATE RESTRICT;
