CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, image_id INT DEFAULT NULL, logement_id INT DEFAULT NULL, username VARCHAR(255) NOT NULL, username_canonical VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, email_canonical VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, locked TINYINT(1) NOT NULL, expired TINYINT(1) NOT NULL, expires_at DATETIME DEFAULT NULL, confirmation_token VARCHAR(255) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT '(DC2Type:array)', credentials_expired TINYINT(1) NOT NULL, credentials_expire_at DATETIME DEFAULT NULL, family_name VARCHAR(255) DEFAULT NULL, first_name VARCHAR(255) DEFAULT NULL, created DATETIME NOT NULL, lastActivity DATETIME NOT NULL, UNIQUE INDEX UNIQ_8D93D64992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_8D93D649A0D96FBF (email_canonical), UNIQUE INDEX UNIQ_8D93D6493DA5256D (image_id), INDEX IDX_8D93D64958ABF955 (logement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE Block (id INT AUTO_INCREMENT NOT NULL, logement_id INT NOT NULL, name VARCHAR(255) NOT NULL, floors VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_42DAB82658ABF955 (logement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE Config (id INT AUTO_INCREMENT NOT NULL, the_key VARCHAR(255) NOT NULL, the_value LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, path VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE Logement (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, place_etranger INT NOT NULL, place_ancien INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE Person (id INT AUTO_INCREMENT NOT NULL, logement_id INT DEFAULT NULL, etablissement_id INT DEFAULT NULL, family_name VARCHAR(255) DEFAULT NULL, first_name VARCHAR(255) DEFAULT NULL, family_name_ar VARCHAR(255) DEFAULT NULL, first_name_ar VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, cin VARCHAR(255) DEFAULT NULL, cne VARCHAR(255) DEFAULT NULL, bird_day DATE DEFAULT NULL, gender VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, contry VARCHAR(255) DEFAULT NULL, tel VARCHAR(255) DEFAULT NULL, parents_revenu DOUBLE PRECISION NOT NULL, bro_sis_number INT NOT NULL, n_dossier VARCHAR(255) NOT NULL, distance DOUBLE PRECISION NOT NULL, condition_special VARCHAR(255) DEFAULT NULL, ancientete VARCHAR(255) DEFAULT NULL, niveau_etude INT DEFAULT NULL, diplome VARCHAR(255) DEFAULT NULL, remarque LONGTEXT DEFAULT NULL, passport VARCHAR(255) DEFAULT NULL, carte_sejour VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, exellence VARCHAR(255) DEFAULT NULL, note DOUBLE PRECISION NOT NULL, INDEX IDX_3370D44058ABF955 (logement_id), INDEX IDX_3370D440FF631228 (etablissement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE Reservation (id INT AUTO_INCREMENT NOT NULL, person_id INT NOT NULL, room_id INT NOT NULL, date_payement DATE NOT NULL, date_from DATE NOT NULL, date_to DATE NOT NULL, status VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_C454C682217BBB47 (person_id), INDEX IDX_C454C68254177093 (room_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE Room (id INT AUTO_INCREMENT NOT NULL, block_id INT NOT NULL, name VARCHAR(255) NOT NULL, floor INT NOT NULL, capacity INT NOT NULL, free INT NOT NULL, INDEX IDX_D2ADFEA5E9ED820C (block_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE University (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, logement_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_EF27863C727ACA70 (parent_id), INDEX IDX_EF27863C58ABF955 (logement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
ALTER TABLE user ADD CONSTRAINT FK_8D93D6493DA5256D FOREIGN KEY (image_id) REFERENCES image (id);
ALTER TABLE user ADD CONSTRAINT FK_8D93D64958ABF955 FOREIGN KEY (logement_id) REFERENCES Logement (id) ON DELETE SET NULL;
ALTER TABLE Block ADD CONSTRAINT FK_42DAB82658ABF955 FOREIGN KEY (logement_id) REFERENCES Logement (id);
ALTER TABLE Person ADD CONSTRAINT FK_3370D44058ABF955 FOREIGN KEY (logement_id) REFERENCES Logement (id);
ALTER TABLE Person ADD CONSTRAINT FK_3370D440FF631228 FOREIGN KEY (etablissement_id) REFERENCES University (id) ON DELETE SET NULL;
ALTER TABLE Reservation ADD CONSTRAINT FK_C454C682217BBB47 FOREIGN KEY (person_id) REFERENCES Person (id);
ALTER TABLE Reservation ADD CONSTRAINT FK_C454C68254177093 FOREIGN KEY (room_id) REFERENCES Room (id);
ALTER TABLE Room ADD CONSTRAINT FK_D2ADFEA5E9ED820C FOREIGN KEY (block_id) REFERENCES Block (id);
ALTER TABLE University ADD CONSTRAINT FK_EF27863C727ACA70 FOREIGN KEY (parent_id) REFERENCES University (id) ON DELETE SET NULL;
ALTER TABLE University ADD CONSTRAINT FK_EF27863C58ABF955 FOREIGN KEY (logement_id) REFERENCES Logement (id) ON DELETE SET NULL;


INSERT INTO `config` (`id`, `the_key`, `the_value`) VALUES
(2, 'app_logo', 'uploads/img/af28c5cce7fd0c1de575c139fedf7ccda7e8bad6.png'),
(3, 'app_name', 'ONOUSC'),
(4, 'app_description', 'description :)'),
(5, 'app_address', 'lot charaf salé'),
(6, 'app_cp', '11060'),
(7, 'app_city', 'RABAT'),
(8, 'app_tel', '0644435561'),
(9, 'app_gsm', '056515214'),
(10, 'app_email', 'onousc@gmail.com'),
(11, 'app_website', 'http://onousc.com'),
(12, 'app_map_lat', '33'),
(13, 'app_map_lng', '33'),
(14, 'app_lang', 'en_US'),
(15, 'rows_per_page', '10'),
(16, 'app_css', '/* css */'),
(17, 'allow_registration', 'on'),
(18, 'defaut_logement', '1');

-- --------------------------------------------------------

INSERT INTO `image` (`id`, `path`) VALUES
(1, '43d4f17e5b4d0bd5056ee6630389179f4767ea21.jpeg'),
(2, '6e8ac8444d8eacae529d6a5a3861294f9a39bba7.jpeg'),
(4, 'anonymous.jpg');

-- --------------------------------------------------------

INSERT INTO `logement` (`id`, `name`, `city`, `place_etranger`, `place_ancien`) VALUES
(1, 'Cité Universitaire Souissi II', 'Rabat', 120, 150);

-- --------------------------------------------------------

INSERT INTO `user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `created`, `lastActivity`, `image_id`, `family_name`, `first_name`, `logement_id`) VALUES
(1, 'admin', 'admin', 'benaich.med@gmail.com', 'benaich.med@gmail.com', 1, 'cjooq91lu5kokookkowwowgkcow08g0', 'QvKJ2JNFZ4WIlUbtZgu5NpBue/SZ8M4ozqg2x/xfRV5U3BUahUGu42AP6u3/WPQBowH/w8uFyVgKFtoGTH7NWg==', '2014-05-15 20:01:31', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, '2014-05-03 21:13:54', '2014-05-15 20:41:42', 2, 'benaich', 'mohamed', 1),
(2, 'manager', 'manager', 'soadnane@gmail.com', 'soadnane@gmail.com', 0, 'tf5gzrys8a8sokcwgk0ggs44804kgok', 'GM6UMoF1zkCynFdITLWn+ssrj/tO9/soqasSMakLoctAjwbm2cRS1lzpXvw0TomQaPK3TbRvwZWDeq3t2Pts7A==', '2014-05-05 19:27:44', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, '2014-05-04 12:40:54', '2014-05-05 22:50:48', 1, 'moustaid', 'fatiha', 1),
(4, 'souad', 'souad', 'souad@gmail.com', 'souad@gmail.com', 0, '1ubba1pb58m8k8c84oggkgg0w8k8k4k', 'HkNUbNRxHqNXOLOt0vz5A+HaGa/ZACk+Kr9lfA/M5onG1Z0nBod+uZAkRIS0MWXVmBm5mGfkPMXEluuyjvzGyw==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '2014-05-10 17:59:17', '2014-05-10 17:59:17', 4, 'fadil', 'souad', 1);

-- --------------------------------------------------------

INSERT INTO `university` (`id`, `parent_id`, `name`, `type`, `logement_id`) VALUES
(391, NULL, 'Université Abdelmalek Essaâdi Tétouan', 'university', NULL),
(392, NULL, 'Université Cadi Ayyad Marrakech', 'university', NULL),
(393, NULL, 'Université Chouaïb Doukkali El Jadida', 'university', NULL),
(394, NULL, 'Université Hassan I Settat', 'university', NULL),
(395, NULL, 'Université Hassan II Aïn Chock/Casablanca', 'university', NULL),
(396, NULL, 'Université Hassan II Mohammadia', 'university', NULL),
(397, NULL, 'Université Ibn Tofaïl Kenitra', 'university', NULL),
(398, NULL, 'Université Ibnou Zohr Agadir', 'university', NULL),
(399, NULL, 'Université Mohammed Premier Oujda', 'university', NULL),
(400, NULL, 'Université Mohammed V Agdal/Rabat', 'university', NULL),
(401, NULL, 'Université Mohammed V Souissi/Rabat', 'university', NULL),
(402, NULL, 'Université Moulay Ismaïl Meknès', 'university', NULL),
(403, NULL, 'Université Quaraouiyine Fès', 'university', NULL),
(404, NULL, 'Université Sidi Mohammed Ben Abdellah Fès', 'university', NULL),
(405, NULL, 'Université Sultan My Slimane Beni Mellal', 'university', NULL),
(406, 391, 'Faculté des Sciences Juridiques, Economiques et Sociales Tanger', 'etablissement', NULL),
(407, 391, 'Faculté des Lettres et des Sciences Humaines Tétouan', 'etablissement', NULL),
(408, 391, 'Faculté des Sciences Tétouan', 'etablissement', NULL),
(409, 391, 'Faculté des Sciences et Techniques Tanger', 'etablissement', NULL),
(410, 391, 'Ecole Nationale des Sciences Appliquées Tanger', 'etablissement', NULL),
(411, 391, 'Ecole Nationale des Sciences Appliquées Tétouan', 'etablissement', NULL),
(412, 391, 'Ecole Nationale de Commerce et de Gestion Tanger', 'etablissement', NULL),
(413, 391, 'Ecole Supérieure Roi Fahd de Traduction Tanger', 'etablissement', NULL),
(414, 391, 'Faculté polydisciplinaire -Tetouan', 'etablissement', NULL),
(415, 391, 'Faculté Polydisciplinaire Larache', 'etablissement', NULL),
(416, 391, 'Ecole Normale Supérieure Tétouan', 'etablissement', NULL),
(417, 392, 'Faculté des Sciences Juridiques, Economiques et Sociales Marrakech', 'etablissement', NULL),
(418, 392, 'Faculté des Lettres et des Sciences Humaines Marrakech', 'etablissement', NULL),
(419, 392, 'Faculté des Sciences As-Samlalia/Marrakech', 'etablissement', NULL),
(420, 392, 'Faculté des Sciences et Techniques Guéliz/Marrakech', 'etablissement', NULL),
(421, 392, 'Faculté de Médecine et de Pharmacie Marrakech', 'etablissement', NULL),
(422, 392, 'Ecole Nationale des Sciences Appliquées Marrakech', 'etablissement', NULL),
(423, 392, 'Ecole Nationale des Sciences Appliquees Safi', 'etablissement', NULL),
(424, 392, 'Ecole Nationale de Commerce et de Gestion Marrakech', 'etablissement', NULL),
(425, 392, 'Ecole Supérieure de Technologie Safi', 'etablissement', NULL),
(426, 392, 'Ecole Supérieure de Technologie Essaouira', 'etablissement', NULL),
(427, 392, 'Faculté polydisciplinaire - Safi', 'etablissement', NULL),
(428, 392, 'Faculté Polydisciplinaire Kalaat Sraghna', 'etablissement', NULL),
(429, 392, 'Ecole Normale Supérieure Marrakech', 'etablissement', NULL),
(430, 393, 'Faculté des Lettres et des Sciences Humaines El Jadida', 'etablissement', NULL),
(431, 393, 'Faculté des Sciences El Jadida', 'etablissement', NULL),
(432, 393, 'Ecole Nationale des Sciences Appliquées Eljadida', 'etablissement', NULL),
(433, 393, 'Ecole Nationale de Commerce et de Gestion El Jadida', 'etablissement', NULL),
(434, 393, 'Faculté polydisciplinaire - Eljadida', 'etablissement', NULL),
(435, 394, 'Faculté des Sciences Juridiques, Economiques et Sociales Settat', 'etablissement', NULL),
(436, 394, 'Faculté des Sciences et Techniques Settat', 'etablissement', NULL),
(437, 394, 'Ecole Nationale des Sciences Appliquées Khouribga', 'etablissement', NULL),
(438, 394, 'Ecole Nationale de Commerce et de Gestion Settat', 'etablissement', NULL),
(439, 394, 'Ecole supérieur de Technologie Berrechid', 'etablissement', NULL),
(440, 394, 'Faculté polydisciplinaire - Khouribga', 'etablissement', NULL),
(441, 395, 'Faculté des Sciences Juridiques, Economiques et Sociales Casablanca', 'etablissement', NULL),
(442, 395, 'Faculté des Lettres et des Sciences Humaines Aïn Chock/Casablanca', 'etablissement', NULL),
(443, 395, 'Faculté des Sciences Aïn Chock/Casablanca', 'etablissement', NULL),
(444, 395, 'Faculté de Médecine et de Pharmacie Casablanca', 'etablissement', NULL),
(445, 395, 'Faculté de Médecine Dentaire Casablanca', 'etablissement', NULL),
(446, 395, 'Ecole Nationale Supérieure d''Electricité et de Mécanique Casablanca', 'etablissement', NULL),
(447, 395, 'Ecole Supérieure de Technologie Casablanca', 'etablissement', NULL),
(448, 395, 'Ecole Normale Supérieure de casablanca', 'etablissement', NULL),
(449, 396, 'Faculté des Sciences Juridiques, Economiques et Sociales Mohammadia', 'etablissement', NULL),
(450, 396, 'Faculté des Sciences Juridiques, Economiques et Sociales Aïn Sebaa', 'etablissement', NULL),
(451, 396, 'Faculté des Lettres et des Sciences Humaines Ben M''Sick/Casablanca', 'etablissement', NULL),
(452, 396, 'Faculté des Lettres et des Sciences Humaines Mohammadia', 'etablissement', NULL),
(453, 396, 'Faculté des Sciences Ben M''Sick/Casablanca', 'etablissement', NULL),
(454, 396, 'Faculté des Sciences et Techniques Mohammadia', 'etablissement', NULL),
(455, 396, 'Ecole Nationale Supérieure des Arts et Métiers Casablanca', 'etablissement', NULL),
(456, 396, 'Ecole Nationale de Commerce et de Gestion Casablanca', 'etablissement', NULL),
(457, 396, 'Ecole Normale Supérieure de l''Enseignement Technique Mohammadia', 'etablissement', NULL),
(458, 397, 'Faculté des Sciences Juridiques, Economiques et Sociales Kenitra', 'etablissement', NULL),
(459, 397, 'Faculté des Lettres et des Sciences Humaines Kenitra', 'etablissement', NULL),
(460, 397, 'Faculté des Sciences Kenitra', 'etablissement', NULL),
(461, 397, 'Ecole Nationale des Sciences Appliquées de Kénitra', 'etablissement', NULL),
(462, 397, 'Ecole Nationale de Commerce et de Gestion Kenitra', 'etablissement', NULL),
(463, 398, 'Faculté des Sciences Juridiques, Economiques et Sociales Agadir', 'etablissement', NULL),
(464, 398, 'Faculté des Lettres et des Sciences Humaines Agadir', 'etablissement', NULL),
(465, 398, 'Faculté des Sciences Agadir', 'etablissement', NULL),
(466, 398, 'Ecole Nationale des Sciences Appliquées Agadir', 'etablissement', NULL),
(467, 398, 'Ecole Nationale de Commerce et de Gestion Agadir', 'etablissement', NULL),
(468, 398, 'Ecole Supérieure de Technologie Agadir', 'etablissement', NULL),
(469, 398, 'Ecole Supérieure de Technologie Guelmim', 'etablissement', NULL),
(470, 398, 'Faculté Polydisciplinaire Ouarzazate', 'etablissement', NULL),
(471, 398, 'Faculté Polydisciplinaire Taroudant', 'etablissement', NULL),
(472, 399, 'Faculté des Sciences Juridiques, Economiques et Sociales Oujda', 'etablissement', NULL),
(473, 399, 'Faculté des Lettres et des Sciences Humaines Oujda', 'etablissement', NULL),
(474, 399, 'Faculté des Sciences Oujda', 'etablissement', NULL),
(475, 399, 'Faculté de Médecine et de Pharmacie Oujda', 'etablissement', NULL),
(476, 399, 'Ecole Nationale des Sciences Appliquées Oujda', 'etablissement', NULL),
(477, 399, 'Ecole Nationale des Sciences Appliquées d''Al Hoceima', 'etablissement', NULL),
(478, 399, 'Ecole Nationale de Commerce et de Gestion Oujda', 'etablissement', NULL),
(479, 399, 'Ecole Supérieure de Technologie Oujda', 'etablissement', NULL),
(480, 399, 'Faculté Polydisciplinaire Nador', 'etablissement', NULL),
(481, 400, 'Faculté des Sciences Juridiques, Economiques et Sociales Agdal/Rabat', 'etablissement', 1),
(482, 400, 'Faculté des Lettres et des Sciences Humaines Rabat', 'etablissement', 1),
(483, 400, 'Faculté des Sciences Rabat', 'etablissement', 1),
(484, 400, 'Ecole Mohammadia d''Ingénieurs Rabat', 'etablissement', 1),
(485, 400, 'Ecole Supérieure de Technologie Salé', 'etablissement', NULL),
(486, 400, 'Institut Scientifique Rabat', 'etablissement', 1),
(487, 400, 'Institut des Etudes Hispano- Lusophones', 'etablissement', NULL),
(488, 400, 'Ecole Normale Supérieure de Rabat', 'etablissement', 1),
(489, 401, 'Faculté des Sciences Juridiques, Economiques et Sociales Souissi/Rabat', 'etablissement', 1),
(490, 401, 'Faculté des Sciences Juridiques, Economiques et Sociales Salé', 'etablissement', NULL),
(491, 401, 'Faculté de Médecine et de Pharmacie Rabat', 'etablissement', 1),
(492, 401, 'Faculté de Médecine Dentaire Rabat', 'etablissement', 1),
(493, 401, 'Ecole Nationale Supérieure d''Informatique et d''Analyse des Systèmes Rabat', 'etablissement', 1),
(494, 401, 'Faculté des Sciences de l''Education Rabat', 'etablissement', 1),
(495, 401, 'Institut d''Etudes et de Recherches pour l''Arabisation Rabat', 'etablissement', 1),
(496, 401, 'Institut des Etudes Africaines Rabat', 'etablissement', 1),
(497, 401, 'Institut Universitaire de la Recherche Scientifique Rabat', 'etablissement', 1),
(498, 401, 'Ecole Normale Supérieure de l''Enseignement Technique Rabat', 'etablissement', 1),
(499, 402, 'Faculté des Sciences Juridiques, Economiques et Sociales Meknès', 'etablissement', NULL),
(500, 402, 'Faculté des Lettres et des Sciences Humaines Meknès', 'etablissement', NULL),
(501, 402, 'Faculté des Sciences Meknès', 'etablissement', NULL),
(502, 402, 'Faculté des Sciences et Techniques Errachidia', 'etablissement', NULL),
(503, 402, 'Ecole Nationale Supérieure des Arts et Métiers Meknès', 'etablissement', NULL),
(504, 402, 'Ecole Supérieure de Technologie Meknès', 'etablissement', NULL),
(505, 402, 'Faculté Polydisciplinaire Errachidia', 'etablissement', NULL),
(506, 402, 'Ecole Normale Supérieure de Meknès', 'etablissement', NULL),
(507, 403, 'Faculté Al-Charia Agadir', 'etablissement', NULL),
(508, 403, 'Faculté Al-Charia Fès', 'etablissement', NULL),
(509, 403, 'Faculté Al-Logha Al Arabia Marrakech', 'etablissement', NULL),
(510, 403, 'Faculté Ossol Ad-dine Tétouan', 'etablissement', NULL),
(511, 404, 'Faculté des Sciences Juridiques, Economiques et Sociales Fès', 'etablissement', NULL),
(512, 404, 'Faculté des Lettres et des Sciences Humaines Dhar El Mahraz/Fès', 'etablissement', NULL),
(513, 404, 'Faculté des Lettres et des Sciences Humaines Saïs/Fès', 'etablissement', NULL),
(514, 404, 'Faculté des Sciences Dhar El Mahraz/Fès', 'etablissement', NULL),
(515, 404, 'Faculté des Sciences et Techniques Saïs/Fès', 'etablissement', NULL),
(516, 404, 'Faculté de Médecine et de Pharmacie Fès', 'etablissement', NULL),
(517, 404, 'Ecole Nationale des Sciences Appliquées Fès', 'etablissement', NULL),
(518, 404, 'Ecole Nationale de Commerce et de Gestion Fès', 'etablissement', NULL),
(519, 404, 'Ecole Supérieure de Technologie Fès', 'etablissement', NULL),
(520, 404, 'Institut Des plantes Medicinales et Aromatiques Taounate', 'etablissement', NULL),
(521, 404, 'Faculté polydisciplinaire -Taza', 'etablissement', NULL),
(522, 404, 'Ecole Normale Supérieure Fès', 'etablissement', NULL),
(523, 405, 'Faculté des Lettres et des Sciences Humaines Beni Mellal', 'etablissement', NULL),
(524, 405, 'Faculté des Sciences et Techniques Beni Mellal', 'etablissement', NULL),
(525, 405, 'Faculté polydisciplinaire -Beni Mellal', 'etablissement', NULL);
