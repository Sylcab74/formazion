-- Adminer 4.7.1 PostgreSQL dump

DROP TABLE IF EXISTS "companies";
DROP SEQUENCE IF EXISTS formazion.companies_id_sequence;
CREATE SEQUENCE formazion.companies_id_sequence INCREMENT  MINVALUE  MAXVALUE  START 1 CACHE ;

CREATE TABLE "formazion"."companies" (
    "id" integer DEFAULT nextval('formazion.companies_id_sequence') NOT NULL,
    "name" character varying(45) NOT NULL,
    "number_address" integer NOT NULL,
    "street" character varying(125) NOT NULL,
    "postal_code" integer NOT NULL,
    "city" character varying(125) NOT NULL,
    "country" character varying(60) NOT NULL,
    CONSTRAINT "companies_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "companies" ("id", "name", "number_address", "street", "postal_code", "city", "country") VALUES
(27,	'Armstrong and Sons',	8058,	'Patience Via',	17767,	'Lake Antonettafort',	'United Arab Emirates'),
(28,	'Langosh Group',	7262,	'Cremin View',	4569,	'Gilbertville',	'Suriname'),
(60,	'Klein Group',	973,	'Metz Dam',	123,	'West Caden',	'Andorra'),
(61,	'Armstrong-Huel',	44540,	'Heller Hill',	87345,	'Kemmerchester',	'Maldives');

DROP TABLE IF EXISTS "formations";
DROP SEQUENCE IF EXISTS formazion.formations_id_sequence;
CREATE SEQUENCE formazion.formations_id_sequence INCREMENT  MINVALUE  MAXVALUE  START 1 CACHE ;

CREATE TABLE "formazion"."formations" (
    "id" integer DEFAULT nextval('formazion.formations_id_sequence') NOT NULL,
    "name" character varying(45) NOT NULL,
    "responsible_professor_id" integer NOT NULL,
    CONSTRAINT "formations_pkey" PRIMARY KEY ("id"),
    CONSTRAINT "fk_formations_persons1" FOREIGN KEY (responsible_professor_id) REFERENCES persons(id) NOT DEFERRABLE
) WITH (oids = false);

INSERT INTO "formations" ("id", "name", "responsible_professor_id") VALUES
(131,	'Pacocha, Dooley and Wunsch',	411),
(132,	'Cassin, Schmidt and Hegmann',	412),
(133,	'Blick, Mante and O''Conner',	413),
(134,	'Smitham, Collins and Daugherty',	414),
(135,	'Cronin-Carroll',	415),
(136,	'Kozey and Sons',	416),
(137,	'Hirthe-Heaney',	417),
(138,	'Koch, Abshire and Langosh',	418),
(139,	'Casper-Gerhold',	419),
(140,	'Rogahn-Mitchell',	420),
(164,	'Gerlach and Sons',	444),
(165,	'Hudson, Sawayn and Kling',	445),
(166,	'Fadel, Klein and Kuhlman',	446),
(167,	'Steuber-VonRueden',	447),
(168,	'Goodwin Group',	448),
(169,	'Hahn PLC',	449),
(170,	'Wiegand, Rohan and Metz',	450),
(171,	'Hane, Thompson and Mayer',	451),
(172,	'Swaniawski, Dietrich and Considine',	452),
(173,	'Harris, Steuber and Sporer',	453);

DROP TABLE IF EXISTS "persons";
DROP SEQUENCE IF EXISTS formazion.persons_id_sequence;
CREATE SEQUENCE formazion.persons_id_sequence INCREMENT  MINVALUE  MAXVALUE  START 1 CACHE ;

CREATE TABLE "formazion"."persons" (
    "id" integer DEFAULT nextval('formazion.persons_id_sequence') NOT NULL,
    "firstname" character varying(45) NOT NULL,
    "lastname" character varying(45) NOT NULL,
    "role" character varying(45) NOT NULL,
    "companies_id" integer,
    CONSTRAINT "persons_pkey" PRIMARY KEY ("id"),
    CONSTRAINT "fk_customers_companies1" FOREIGN KEY (companies_id) REFERENCES companies(id) NOT DEFERRABLE
) WITH (oids = false);

INSERT INTO "persons" ("id", "firstname", "lastname", "role", "companies_id") VALUES
(391,	'Camilla',	'Gleason',	'ROLE_EMPLOYEE',	27),
(392,	'Joaquin',	'Gulgowski',	'ROLE_EMPLOYEE',	28),
(393,	'Ryder',	'Olson',	'ROLE_EMPLOYEE',	27),
(394,	'Mariana',	'Hayes',	'ROLE_EMPLOYEE',	28),
(395,	'Earnestine',	'Kreiger',	'ROLE_EMPLOYEE',	27),
(396,	'Emmanuelle',	'Treutel',	'ROLE_EMPLOYEE',	28),
(397,	'Grace',	'Kilback',	'ROLE_EMPLOYEE',	27),
(398,	'Ena',	'Terry',	'ROLE_EMPLOYEE',	28),
(399,	'Adela',	'Bartoletti',	'ROLE_EMPLOYEE',	27),
(400,	'Karley',	'Kuhic',	'ROLE_EMPLOYEE',	28),
(401,	'Kiana',	'Funk',	'ROLE_EMPLOYEE',	27),
(402,	'Dane',	'Gulgowski',	'ROLE_EMPLOYEE',	28),
(403,	'Ilene',	'Blanda',	'ROLE_EMPLOYEE',	27),
(404,	'Jamaal',	'Altenwerth',	'ROLE_EMPLOYEE',	28),
(405,	'Constantin',	'Turcotte',	'ROLE_EMPLOYEE',	27),
(406,	'Alena',	'Nitzsche',	'ROLE_EMPLOYEE',	28),
(407,	'Kyle',	'Bins',	'ROLE_EMPLOYEE',	27),
(408,	'Gretchen',	'Hodkiewicz',	'ROLE_EMPLOYEE',	28),
(409,	'Kira',	'Block',	'ROLE_EMPLOYEE',	27),
(410,	'Lempi',	'Kris',	'ROLE_EMPLOYEE',	28),
(411,	'Annie',	'Cummerata',	'ROLE_TEACHER',	NULL),
(412,	'Arnold',	'Okuneva',	'ROLE_TEACHER',	NULL),
(413,	'Aric',	'Gutmann',	'ROLE_TEACHER',	NULL),
(414,	'Therese',	'Lockman',	'ROLE_TEACHER',	NULL),
(415,	'Colleen',	'Raynor',	'ROLE_TEACHER',	NULL),
(416,	'Emmy',	'Feeney',	'ROLE_TEACHER',	NULL),
(417,	'Lessie',	'Bechtelar',	'ROLE_TEACHER',	NULL),
(418,	'Charles',	'Homenick',	'ROLE_TEACHER',	NULL),
(419,	'Eladio',	'Macejkovic',	'ROLE_TEACHER',	NULL),
(420,	'Hailie',	'Kuvalis',	'ROLE_TEACHER',	NULL),
(424,	'Randi',	'Moen',	'ROLE_EMPLOYEE',	60),
(425,	'Dayton',	'Prohaska',	'ROLE_EMPLOYEE',	61),
(426,	'Marietta',	'Witting',	'ROLE_EMPLOYEE',	60),
(427,	'Jamel',	'Nicolas',	'ROLE_EMPLOYEE',	61),
(428,	'Delfina',	'Christiansen',	'ROLE_EMPLOYEE',	60),
(429,	'Letha',	'McGlynn',	'ROLE_EMPLOYEE',	61),
(430,	'Florencio',	'Rolfson',	'ROLE_EMPLOYEE',	60),
(431,	'Kim',	'Hagenes',	'ROLE_EMPLOYEE',	61),
(432,	'Ewald',	'Rowe',	'ROLE_EMPLOYEE',	60),
(433,	'Cloyd',	'Erdman',	'ROLE_EMPLOYEE',	61),
(434,	'Ariane',	'Feeney',	'ROLE_EMPLOYEE',	60),
(435,	'Marisa',	'Hauck',	'ROLE_EMPLOYEE',	61),
(436,	'Rico',	'Berge',	'ROLE_EMPLOYEE',	60),
(437,	'Taryn',	'Nitzsche',	'ROLE_EMPLOYEE',	61),
(438,	'Bret',	'Reichert',	'ROLE_EMPLOYEE',	60),
(439,	'Beaulah',	'Breitenberg',	'ROLE_EMPLOYEE',	61),
(440,	'Maybelle',	'Aufderhar',	'ROLE_EMPLOYEE',	60),
(441,	'Tavares',	'Abbott',	'ROLE_EMPLOYEE',	61),
(442,	'Michel',	'Kautzer',	'ROLE_EMPLOYEE',	60),
(443,	'Cecile',	'Ziemann',	'ROLE_EMPLOYEE',	61),
(444,	'Roxane',	'Marks',	'ROLE_TEACHER',	NULL),
(445,	'Barney',	'Hill',	'ROLE_TEACHER',	NULL),
(446,	'Maynard',	'Frami',	'ROLE_TEACHER',	NULL),
(447,	'Thalia',	'Dach',	'ROLE_TEACHER',	NULL),
(448,	'Benjamin',	'Wolf',	'ROLE_TEACHER',	NULL),
(449,	'Catharine',	'O''Conner',	'ROLE_TEACHER',	NULL),
(450,	'Vallie',	'Bogisich',	'ROLE_TEACHER',	NULL),
(451,	'Melisa',	'Sporer',	'ROLE_TEACHER',	NULL),
(452,	'Violet',	'Swaniawski',	'ROLE_TEACHER',	NULL),
(453,	'Torey',	'Jacobi',	'ROLE_TEACHER',	NULL);

DROP TABLE IF EXISTS "rooms";
DROP SEQUENCE IF EXISTS formazion.rooms_id_sequence;
CREATE SEQUENCE formazion.rooms_id_sequence INCREMENT  MINVALUE  MAXVALUE  START 1 CACHE ;

CREATE TABLE "formazion"."rooms" (
    "id" integer DEFAULT nextval('formazion.rooms_id_sequence') NOT NULL,
    "number" integer NOT NULL,
    CONSTRAINT "rooms_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "rooms" ("id", "number") VALUES
(131,	7),
(132,	3),
(133,	7),
(134,	1),
(135,	8),
(136,	'0'),
(137,	3),
(138,	'0'),
(139,	2),
(140,	6),
(164,	7),
(165,	9),
(166,	4),
(167,	5),
(168,	7),
(169,	9),
(170,	5),
(171,	7),
(172,	6),
(173,	4);

DROP TABLE IF EXISTS "sessions";
DROP SEQUENCE IF EXISTS formazion.sessions_id_sequence;
CREATE SEQUENCE formazion.sessions_id_sequence INCREMENT  MINVALUE  MAXVALUE  START 1 CACHE ;

CREATE TABLE "formazion"."sessions" (
    "id" integer DEFAULT nextval('formazion.sessions_id_sequence') NOT NULL,
    "starting" timestamp NOT NULL,
    "ending" timestamp NOT NULL,
    "hours_performed" integer,
    "report" character varying(255),
    "formations_id" integer NOT NULL,
    "rooms_id" integer NOT NULL,
    "teacher_id" integer NOT NULL,
    CONSTRAINT "sessions_pkey" PRIMARY KEY ("id"),
    CONSTRAINT "fk_sessions_customers1" FOREIGN KEY (teacher_id) REFERENCES persons(id) NOT DEFERRABLE,
    CONSTRAINT "fk_sessions_formations1" FOREIGN KEY (formations_id) REFERENCES formations(id) NOT DEFERRABLE,
    CONSTRAINT "fk_sessions_rooms1" FOREIGN KEY (rooms_id) REFERENCES rooms(id) NOT DEFERRABLE
) WITH (oids = false);

INSERT INTO "sessions" ("id", "starting", "ending", "hours_performed", "report", "formations_id", "rooms_id", "teacher_id") VALUES
(241,	'2018-08-22 11:45:00',	'2018-07-24 03:17:37',	2,	'Unde quia dolorem suscipit maxime sequi sint est voluptatem. Sint rem omnis nobis facilis non. Officiis error architecto sequi quas.',	133,	132,	416),
(242,	'2018-07-15 15:22:44',	'2019-03-06 04:57:25',	NULL,	NULL,	132,	136,	415),
(243,	'2018-04-28 12:55:35',	'2018-07-10 22:17:49',	2,	'Corporis qui rerum molestias qui et mollitia. Sunt minima assumenda pariatur cumque quo ea dolores. Ea architecto est omnis ea.',	139,	139,	415),
(244,	'2018-11-23 15:45:04',	'2019-01-17 14:20:35',	NULL,	NULL,	139,	132,	417),
(245,	'2018-07-24 23:58:01',	'2018-07-10 13:31:34',	2,	'Ut ullam aliquid et quia non corrupti tenetur. Voluptatibus numquam quis ab quia dolorem repudiandae.',	133,	137,	419),
(246,	'2018-12-16 12:28:09',	'2018-07-16 03:34:13',	NULL,	NULL,	135,	136,	412),
(247,	'2018-12-13 10:20:49',	'2019-01-26 01:36:08',	2,	'Reprehenderit quasi error minima dolorum omnis rerum. Deleniti officia perspiciatis est voluptas. Voluptates est et minus distinctio quos quod. Unde quae sequi veniam harum veniam iure.',	136,	137,	415),
(248,	'2018-10-25 23:46:49',	'2019-01-14 12:16:36',	NULL,	NULL,	131,	135,	411),
(249,	'2018-09-02 09:12:42',	'2018-08-25 04:33:19',	2,	'Nobis sit vel nemo sed reprehenderit earum excepturi. Ad eos ea assumenda autem et nihil ipsam voluptatem. Similique et earum laudantium non occaecati minima. Aut eum nulla neque ducimus dolor.',	138,	136,	416),
(250,	'2018-07-30 12:36:38',	'2018-03-28 21:00:22',	NULL,	NULL,	135,	134,	416),
(251,	'2018-11-05 21:19:37',	'2019-02-22 15:48:20',	2,	'Labore accusantium quibusdam eaque nostrum aut perspiciatis quos neque. Soluta laborum deserunt ab est fugiat dignissimos sunt.',	131,	132,	416),
(252,	'2018-05-11 14:24:21',	'2018-07-14 07:24:52',	NULL,	NULL,	134,	137,	419),
(253,	'2018-06-15 06:57:21',	'2018-10-23 19:16:26',	2,	'Odit itaque unde quae blanditiis. Accusantium id repellat totam. Rem facilis deserunt quam aliquid.',	140,	135,	414),
(254,	'2018-12-25 07:15:28',	'2018-12-24 11:35:01',	NULL,	NULL,	137,	132,	417),
(255,	'2018-07-04 16:47:53',	'2018-10-01 13:16:21',	2,	'Ad id ratione cupiditate et. Est accusantium laborum totam nihil et dolorum et. Officia iure rerum temporibus aut quibusdam quia excepturi. Fugiat ea ut eligendi pariatur at debitis harum.',	133,	138,	419),
(256,	'2018-06-25 03:46:08',	'2018-07-24 19:22:54',	NULL,	NULL,	133,	132,	412),
(257,	'2018-07-27 18:58:08',	'2018-05-19 09:43:49',	2,	'Sunt est hic praesentium et alias. Non et illum natus enim ut porro assumenda modi. Praesentium inventore velit reiciendis optio.',	133,	137,	416),
(258,	'2018-08-31 15:30:52',	'2019-02-11 21:11:08',	NULL,	NULL,	140,	136,	411),
(259,	'2018-05-31 22:51:18',	'2019-02-08 16:35:58',	2,	'Placeat aut facere dolorem id mollitia sit. Est harum aliquam sed hic nesciunt exercitationem exercitationem. Eveniet ut voluptates quos perspiciatis molestias.',	136,	136,	414),
(260,	'2019-03-16 19:31:32',	'2019-03-11 16:46:38',	NULL,	NULL,	140,	140,	411),
(274,	'2019-01-19 14:14:22',	'2019-03-08 16:12:10',	2,	'Reiciendis ratione dolorum veritatis hic est. Nihil repudiandae voluptas enim. Et voluptatibus blanditiis odit tempora. Quia ut minus accusantium repellat ullam et voluptatem.',	165,	170,	444),
(275,	'2019-03-24 23:29:34',	'2019-01-14 01:52:45',	NULL,	NULL,	169,	170,	450),
(276,	'2018-10-22 09:47:33',	'2019-02-12 07:31:22',	2,	'Nulla ad quis voluptatem ipsum qui. Quo culpa qui quae provident non magni repellendus. Et sint ea error enim vel eveniet. Est possimus quia iste mollitia maiores culpa.',	172,	173,	445),
(277,	'2019-01-13 15:26:32',	'2018-06-05 03:49:48',	NULL,	NULL,	171,	170,	444),
(278,	'2018-11-14 17:32:02',	'2018-06-02 21:25:32',	2,	'Exercitationem et et ut asperiores ratione sunt cumque. Et nisi consequatur ut. Eos commodi nulla provident.',	169,	164,	447),
(279,	'2018-04-01 02:56:17',	'2018-04-29 04:21:45',	NULL,	NULL,	170,	169,	445),
(280,	'2019-02-19 12:32:48',	'2019-03-10 02:24:04',	2,	'Dolor autem magni omnis numquam error aut. Explicabo voluptatibus voluptate nobis placeat.',	167,	168,	447),
(281,	'2019-02-06 17:32:29',	'2018-10-17 02:36:30',	NULL,	NULL,	166,	168,	451),
(282,	'2018-11-16 19:45:18',	'2018-09-19 04:07:27',	2,	'Laboriosam eaque provident et quae ipsa fugit. Et ducimus aliquam id animi culpa. Deleniti dolor veniam facere qui explicabo.',	169,	172,	453),
(283,	'2018-12-08 00:37:43',	'2018-06-16 13:10:38',	NULL,	NULL,	167,	169,	450),
(284,	'2018-06-16 15:39:50',	'2018-04-23 21:53:03',	2,	'Occaecati voluptatem vitae odio qui sed aut. Minus et labore laborum nemo aut molestias earum. Consequatur optio officiis quasi odit magni molestias.',	167,	166,	453),
(285,	'2019-01-23 13:28:00',	'2019-02-16 05:07:08',	NULL,	NULL,	172,	164,	449),
(286,	'2018-12-20 19:45:47',	'2018-05-02 16:35:11',	2,	'Ea dolores sit quidem eligendi ut molestiae recusandae. Magnam et odio exercitationem recusandae qui assumenda autem. Nesciunt molestiae quam earum est impedit.',	166,	170,	449),
(287,	'2018-07-11 02:24:35',	'2018-04-20 16:11:49',	NULL,	NULL,	173,	164,	452),
(288,	'2018-08-24 17:03:15',	'2019-01-16 19:09:49',	2,	'Non voluptate iusto dolorum. Id commodi ut praesentium nesciunt nulla veritatis quos. Accusamus ut reprehenderit cumque est maxime. Et saepe itaque aliquam ipsa ipsam dolore voluptates quas.',	167,	166,	446),
(289,	'2019-02-02 05:07:00',	'2019-03-18 02:28:46',	NULL,	NULL,	167,	172,	447),
(290,	'2018-07-17 00:10:34',	'2019-02-23 11:32:43',	2,	'Consectetur illum aliquam molestiae assumenda excepturi beatae autem. Fugiat ipsam maxime enim architecto et. Non nobis et vel est. Ipsum praesentium et doloribus error ratione est.',	165,	173,	453),
(291,	'2018-04-10 23:41:01',	'2019-02-13 06:46:04',	NULL,	NULL,	164,	164,	450),
(292,	'2019-02-03 21:45:34',	'2018-06-13 05:57:36',	2,	'Inventore nihil voluptates beatae enim ut eum deleniti. Provident consequatur libero maiores aliquam aliquid. Enim nostrum nemo sint consequuntur omnis eius porro. Nisi debitis officia et quis.',	168,	169,	450),
(293,	'2018-05-24 02:31:09',	'2019-01-30 03:23:30',	NULL,	NULL,	170,	164,	451);

DROP TABLE IF EXISTS "students_sessions";
DROP SEQUENCE IF EXISTS formazion.students_sessions_id_sequence;
CREATE SEQUENCE formazion.students_sessions_id_sequence INCREMENT  MINVALUE  MAXVALUE  START 1 CACHE ;

CREATE TABLE "formazion"."students_sessions" (
    "id" integer DEFAULT nextval('formazion.students_sessions_id_sequence') NOT NULL,
    "students_id" integer NOT NULL,
    "sessions_id" integer NOT NULL,
    "note" integer NOT NULL,
    CONSTRAINT "students_sessions_pkey" PRIMARY KEY ("id"),
    CONSTRAINT "fk_customers_formations_customers1" FOREIGN KEY (students_id) REFERENCES persons(id) NOT DEFERRABLE,
    CONSTRAINT "fk_students_sessions_sessions1" FOREIGN KEY (sessions_id) REFERENCES sessions(id) NOT DEFERRABLE
) WITH (oids = false);

INSERT INTO "students_sessions" ("id", "students_id", "sessions_id", "note") VALUES
(481,	393,	251,	7),
(482,	405,	252,	12),
(483,	400,	247,	20),
(484,	401,	255,	9),
(485,	403,	257,	16),
(486,	393,	243,	9),
(487,	394,	247,	9),
(488,	401,	247,	16),
(489,	395,	246,	9),
(490,	403,	253,	19),
(491,	404,	260,	1),
(492,	403,	249,	17),
(493,	393,	247,	10),
(494,	404,	247,	19),
(495,	402,	259,	9),
(496,	407,	256,	11),
(497,	396,	246,	'0'),
(498,	403,	251,	12),
(499,	407,	258,	12),
(500,	403,	256,	9),
(501,	402,	255,	3),
(502,	392,	249,	11),
(503,	392,	254,	3),
(504,	403,	247,	15),
(505,	395,	247,	12),
(506,	410,	248,	5),
(507,	403,	253,	15),
(508,	403,	244,	3),
(509,	403,	241,	7),
(510,	392,	257,	14),
(511,	398,	247,	2),
(512,	401,	257,	3),
(513,	397,	242,	14),
(514,	405,	254,	15),
(515,	404,	257,	14),
(516,	403,	245,	7),
(517,	396,	253,	10),
(518,	398,	255,	2),
(519,	393,	247,	16),
(520,	401,	247,	18),
(547,	426,	284,	10),
(548,	424,	277,	2),
(549,	434,	281,	20),
(550,	440,	274,	15),
(551,	442,	293,	2),
(552,	434,	279,	20),
(553,	439,	283,	6),
(554,	433,	281,	5),
(555,	424,	289,	8),
(556,	433,	278,	2),
(557,	430,	280,	10),
(558,	440,	275,	18),
(559,	433,	277,	'0'),
(560,	434,	281,	19),
(561,	434,	274,	15),
(562,	434,	274,	2),
(563,	437,	289,	17),
(564,	431,	292,	4),
(565,	439,	285,	12),
(566,	434,	287,	6),
(567,	429,	293,	1),
(568,	429,	284,	3),
(569,	436,	281,	5),
(570,	443,	281,	4),
(571,	432,	274,	9),
(572,	428,	290,	5),
(573,	430,	278,	17),
(574,	431,	280,	13),
(575,	431,	278,	7),
(576,	439,	288,	10),
(577,	436,	292,	5),
(578,	430,	291,	20),
(579,	431,	289,	1),
(580,	443,	289,	13),
(581,	433,	289,	20),
(582,	432,	293,	7),
(583,	439,	280,	2),
(584,	443,	274,	7),
(585,	432,	282,	13),
(586,	426,	293,	8);

-- 2019-03-25 19:45:09.244461+00
