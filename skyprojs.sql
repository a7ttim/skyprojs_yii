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

Date: 2017-04-05 23:33:34
*/


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
"department_id" int4 NOT NULL,
"department_name" varchar(254) COLLATE "default" NOT NULL,
"department_parent_id" int4
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO "public"."department" VALUES ('1', 'ФСУ', null);

-- ----------------------------
-- Table structure for directions
-- ----------------------------
DROP TABLE IF EXISTS "public"."directions";
CREATE TABLE "public"."directions" (
"direction_id" int4 NOT NULL,
"direction_name" varchar(254) COLLATE "default" NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of directions
-- ----------------------------

-- ----------------------------
-- Table structure for grnti
-- ----------------------------
DROP TABLE IF EXISTS "public"."grnti";
CREATE TABLE "public"."grnti" (
"grnti_id" int4 NOT NULL,
"grnti_code" varchar(254) COLLATE "default" NOT NULL,
"grnti_name" text COLLATE "default" NOT NULL,
"grnti_parent_id" int4
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of grnti
-- ----------------------------

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
"project_id" int4 NOT NULL,
"project_name" varchar(254) COLLATE "default" NOT NULL,
"project_date" date NOT NULL,
"project_area" varchar(254) COLLATE "default" NOT NULL,
"project_advantages" varchar(254) COLLATE "default" NOT NULL,
"project_specifications" varchar(254) COLLATE "default" NOT NULL,
"project_consumers" varchar(254) COLLATE "default" NOT NULL,
"project_protection" varchar(254) COLLATE "default" NOT NULL
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of project
-- ----------------------------
INSERT INTO "public"."project" VALUES ('1', 'ОПВРИВ', '2017-04-05', '1', '1', '1', '1', '1');

-- ----------------------------
-- Table structure for udk
-- ----------------------------
DROP TABLE IF EXISTS "public"."udk";
CREATE TABLE "public"."udk" (
"udk_id" int4 NOT NULL,
"udk_code" varchar(254) COLLATE "default" NOT NULL,
"udk_name" text COLLATE "default" NOT NULL,
"udk_parent_id" int4
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of udk
-- ----------------------------
INSERT INTO "public"."udk" VALUES ('1', '01.01', 'A', null);

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
INSERT INTO "public"."working" VALUES ('1', '1');

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
ALTER TABLE "public"."classificate_2" ADD FOREIGN KEY ("project_id") REFERENCES "public"."project" ("project_id") ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE "public"."classificate_2" ADD FOREIGN KEY ("udk_id") REFERENCES "public"."udk" ("udk_id") ON DELETE RESTRICT ON UPDATE RESTRICT;

-- ----------------------------
-- Foreign Key structure for table "public"."classificate_3"
-- ----------------------------
ALTER TABLE "public"."classificate_3" ADD FOREIGN KEY ("project_id") REFERENCES "public"."project" ("project_id") ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE "public"."classificate_3" ADD FOREIGN KEY ("direction_id") REFERENCES "public"."directions" ("direction_id") ON DELETE RESTRICT ON UPDATE RESTRICT;

-- ----------------------------
-- Foreign Key structure for table "public"."collaborator"
-- ----------------------------
ALTER TABLE "public"."collaborator" ADD FOREIGN KEY ("project_id") REFERENCES "public"."project" ("project_id") ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE "public"."collaborator" ADD FOREIGN KEY ("member_id") REFERENCES "public"."member" ("member_id") ON DELETE RESTRICT ON UPDATE RESTRICT;

-- ----------------------------
-- Foreign Key structure for table "public"."working"
-- ----------------------------
ALTER TABLE "public"."working" ADD FOREIGN KEY ("project_id") REFERENCES "public"."project" ("project_id") ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE "public"."working" ADD FOREIGN KEY ("department_id") REFERENCES "public"."department" ("department_id") ON DELETE RESTRICT ON UPDATE RESTRICT;
