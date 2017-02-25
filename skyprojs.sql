/*
Navicat PGSQL Data Transfer

Source Server         : localhost_5432
Source Server Version : 90503
Source Host           : localhost:5432
Source Database       : skyprojs
Source Schema         : public

Target Server Type    : PGSQL
Target Server Version : 90503
File Encoding         : 65001

Date: 2017-02-26 00:22:47
*/


-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS "public"."department";
CREATE TABLE "public"."department" (
"department_id" int4 NOT NULL,
"department_name" text COLLATE "default" NOT NULL,
"department_parent_id" int4
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO "public"."department" VALUES ('1', 'ТУСУР', null);
INSERT INTO "public"."department" VALUES ('2', 'ФСУ', '1');
INSERT INTO "public"."department" VALUES ('3', 'АОИ', '2');

-- ----------------------------
-- Table structure for department_contains
-- ----------------------------
DROP TABLE IF EXISTS "public"."department_contains";
CREATE TABLE "public"."department_contains" (
"department_id" int4 NOT NULL,
"project_id" int4 NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of department_contains
-- ----------------------------
INSERT INTO "public"."department_contains" VALUES ('3', '1');

-- ----------------------------
-- Table structure for grnti
-- ----------------------------
DROP TABLE IF EXISTS "public"."grnti";
CREATE TABLE "public"."grnti" (
"grnti_id" int4 NOT NULL,
"grnti_parent_id" int4,
"grnti_code" text COLLATE "default",
"grnti_name" text COLLATE "default" NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of grnti
-- ----------------------------

-- ----------------------------
-- Table structure for grnti_classificate
-- ----------------------------
DROP TABLE IF EXISTS "public"."grnti_classificate";
CREATE TABLE "public"."grnti_classificate" (
"grnti_id" int4 NOT NULL,
"project_id" int4 NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of grnti_classificate
-- ----------------------------

-- ----------------------------
-- Table structure for project
-- ----------------------------
DROP TABLE IF EXISTS "public"."project";
CREATE TABLE "public"."project" (
"project_id" int4 NOT NULL,
"member_id" int4,
"project_name" text COLLATE "default" NOT NULL,
"project_status" int4,
"project_definition" text COLLATE "default" NOT NULL,
"Дата подачи" date NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of project
-- ----------------------------
INSERT INTO "public"."project" VALUES ('1', '1', 'ОПВРИП', '1', 'ФФ', '2017-02-24');

-- ----------------------------
-- Table structure for udk
-- ----------------------------
DROP TABLE IF EXISTS "public"."udk";
CREATE TABLE "public"."udk" (
"udk_id" int4 NOT NULL,
"udk_parent_id" int4,
"udk_code" text COLLATE "default" NOT NULL,
"udk_name" text COLLATE "default" NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of udk
-- ----------------------------
INSERT INTO "public"."udk" VALUES ('1', null, '223', 'Инф');
INSERT INTO "public"."udk" VALUES ('2', '1', '312', 'Dss');

-- ----------------------------
-- Table structure for udk_classificate
-- ----------------------------
DROP TABLE IF EXISTS "public"."udk_classificate";
CREATE TABLE "public"."udk_classificate" (
"udk_id" int4 NOT NULL,
"project_id" int4 NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of udk_classificate
-- ----------------------------
INSERT INTO "public"."udk_classificate" VALUES ('2', '1');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS "public"."user";
CREATE TABLE "public"."user" (
"member_id" int4 NOT NULL,
"member_name" text COLLATE "default" NOT NULL,
"member_surname" text COLLATE "default" NOT NULL,
"member_patronymic" text COLLATE "default",
"member_status" int4,
"member_description" text COLLATE "default" NOT NULL,
"email" text COLLATE "default" NOT NULL,
"password" text COLLATE "default" NOT NULL,
"user_token" text COLLATE "default",
"auth_key" text COLLATE "default"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO "public"."user" VALUES ('1', 'a', 't', null, '1', 'student', 'attim', '81dc9bdb52d04dc20036dbd8313ed055', null, null);
INSERT INTO "public"."user" VALUES ('2', 'м', 'ф', null, '1', 'Student', 'assf', 'asdfadsf', null, null);

-- ----------------------------
-- Table structure for work_on_project
-- ----------------------------
DROP TABLE IF EXISTS "public"."work_on_project";
CREATE TABLE "public"."work_on_project" (
"code" int4 NOT NULL,
"member_id" int4,
"department_id" int4,
"project_id" int4,
"name" text COLLATE "default" NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of work_on_project
-- ----------------------------
INSERT INTO "public"."work_on_project" VALUES ('1', '1', '1', '1', 'St');
INSERT INTO "public"."work_on_project" VALUES ('2', '2', '1', '1', 'Svv');

-- ----------------------------
-- Alter Sequences Owned By 
-- ----------------------------

-- ----------------------------
-- Indexes structure for table department
-- ----------------------------
CREATE UNIQUE INDEX "department_pk" ON "public"."department" USING btree ("department_id");

-- ----------------------------
-- Primary Key structure for table department
-- ----------------------------
ALTER TABLE "public"."department" ADD PRIMARY KEY ("department_id");

-- ----------------------------
-- Indexes structure for table department_contains
-- ----------------------------
CREATE INDEX "department_contains2_fk" ON "public"."department_contains" USING btree ("project_id");
CREATE INDEX "department_contains_fk" ON "public"."department_contains" USING btree ("department_id");

-- ----------------------------
-- Primary Key structure for table department_contains
-- ----------------------------
ALTER TABLE "public"."department_contains" ADD PRIMARY KEY ("department_id", "project_id");

-- ----------------------------
-- Indexes structure for table grnti
-- ----------------------------
CREATE UNIQUE INDEX "grnti_pk" ON "public"."grnti" USING btree ("grnti_id");

-- ----------------------------
-- Primary Key structure for table grnti
-- ----------------------------
ALTER TABLE "public"."grnti" ADD PRIMARY KEY ("grnti_id");

-- ----------------------------
-- Indexes structure for table grnti_classificate
-- ----------------------------
CREATE INDEX "grnti_classificate_fk" ON "public"."grnti_classificate" USING btree ("grnti_id");

-- ----------------------------
-- Primary Key structure for table grnti_classificate
-- ----------------------------
ALTER TABLE "public"."grnti_classificate" ADD PRIMARY KEY ("grnti_id", "project_id");

-- ----------------------------
-- Indexes structure for table project
-- ----------------------------
CREATE UNIQUE INDEX "project_pk" ON "public"."project" USING btree ("project_id");
CREATE INDEX "Вносит данные_FK" ON "public"."project" USING btree ("member_id");

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
-- Indexes structure for table udk_classificate
-- ----------------------------
CREATE INDEX "udk_classificate_fk" ON "public"."udk_classificate" USING btree ("udk_id");

-- ----------------------------
-- Primary Key structure for table udk_classificate
-- ----------------------------
ALTER TABLE "public"."udk_classificate" ADD PRIMARY KEY ("udk_id", "project_id");

-- ----------------------------
-- Indexes structure for table user
-- ----------------------------
CREATE UNIQUE INDEX "member_pk" ON "public"."user" USING btree ("member_id");

-- ----------------------------
-- Primary Key structure for table user
-- ----------------------------
ALTER TABLE "public"."user" ADD PRIMARY KEY ("member_id");

-- ----------------------------
-- Indexes structure for table work_on_project
-- ----------------------------
CREATE INDEX "Ведёт_fk" ON "public"."work_on_project" USING btree ("project_id");
CREATE UNIQUE INDEX "Должность_pk" ON "public"."work_on_project" USING btree ("code");
CREATE INDEX "Работает_fk" ON "public"."work_on_project" USING btree ("member_id");
CREATE INDEX "Состоит_fk" ON "public"."work_on_project" USING btree ("department_id");

-- ----------------------------
-- Primary Key structure for table work_on_project
-- ----------------------------
ALTER TABLE "public"."work_on_project" ADD PRIMARY KEY ("code");

-- ----------------------------
-- Foreign Key structure for table "public"."department_contains"
-- ----------------------------
ALTER TABLE "public"."department_contains" ADD FOREIGN KEY ("department_id") REFERENCES "public"."department" ("department_id") ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE "public"."department_contains" ADD FOREIGN KEY ("project_id") REFERENCES "public"."project" ("project_id") ON DELETE RESTRICT ON UPDATE RESTRICT;

-- ----------------------------
-- Foreign Key structure for table "public"."grnti_classificate"
-- ----------------------------
ALTER TABLE "public"."grnti_classificate" ADD FOREIGN KEY ("project_id") REFERENCES "public"."project" ("project_id") ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE "public"."grnti_classificate" ADD FOREIGN KEY ("grnti_id") REFERENCES "public"."grnti" ("grnti_id") ON DELETE RESTRICT ON UPDATE RESTRICT;

-- ----------------------------
-- Foreign Key structure for table "public"."project"
-- ----------------------------
ALTER TABLE "public"."project" ADD FOREIGN KEY ("member_id") REFERENCES "public"."user" ("member_id") ON DELETE RESTRICT ON UPDATE RESTRICT;

-- ----------------------------
-- Foreign Key structure for table "public"."udk_classificate"
-- ----------------------------
ALTER TABLE "public"."udk_classificate" ADD FOREIGN KEY ("udk_id") REFERENCES "public"."udk" ("udk_id") ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE "public"."udk_classificate" ADD FOREIGN KEY ("project_id") REFERENCES "public"."project" ("project_id") ON DELETE RESTRICT ON UPDATE RESTRICT;

-- ----------------------------
-- Foreign Key structure for table "public"."work_on_project"
-- ----------------------------
ALTER TABLE "public"."work_on_project" ADD FOREIGN KEY ("project_id") REFERENCES "public"."project" ("project_id") ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE "public"."work_on_project" ADD FOREIGN KEY ("member_id") REFERENCES "public"."user" ("member_id") ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE "public"."work_on_project" ADD FOREIGN KEY ("department_id") REFERENCES "public"."department" ("department_id") ON DELETE RESTRICT ON UPDATE RESTRICT;
