create table managers (
	id INT AUTO_INCREMENT PRIMARY KEY,
	first_name VARCHAR(50),
	last_name VARCHAR(50),
	email VARCHAR(50),
	gender VARCHAR(50),
	address VARCHAR(50),
	education VARCHAR(50),
	date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE user_accounts (
    username VARCHAR (50),
	first_name VARCHAR (50),
	last_name VARCHAR (50),
    password VARCHAR (255),
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
insert into managers (id, first_name, last_name, email, gender, address, education) values (1, 'Leo', 'Ownsworth', 'lownsworth0@wired.com', 'Male', '248 Memorial Terrace', 'University of Management and Technology ');
insert into managers (id, first_name, last_name, email, gender, address, education) values (2, 'Winthrop', 'Cossington', 'wcossington1@elpais.com', 'Male', '7 Barby Avenue', 'University of Al-Qadisiyah');
insert into managers (id, first_name, last_name, email, gender, address, education) values (3, 'Chilton', 'Aylesbury', 'caylesbury2@yandex.ru', 'Male', '72809 Hayes Alley', 'St. Petersburg State Mountain Institut');
insert into managers (id, first_name, last_name, email, gender, address, education) values (4, 'Mart', 'Junes', 'mjunes3@comcast.net', 'Male', '394 Kipling Junction', 'Tabriz University of Medical Sciences');
insert into managers (id, first_name, last_name, email, gender, address, education) values (5, 'Horatio', 'Bygrove', 'hbygrove4@bizjournals.com', 'Male', '9 Hauk Place', 'École Polytechnique de Montréal, Université de Montréal');
insert into managers (id, first_name, last_name, email, gender, address, education) values (6, 'Upton', 'Sayles', 'usayles5@moonfruit.com', 'Male', '46421 Rigney Crossing', 'Universidad Experimental Felix Adam');
insert into managers (id, first_name, last_name, email, gender, address, education) values (7, 'Sharron', 'Kleinsmuntz', 'skleinsmuntz6@barnesandnoble.com', 'Female', '12 Maple Crossing', 'Sakhalin State University');
insert into managers (id, first_name, last_name, email, gender, address, education) values (8, 'Chancey', 'Musson', 'cmusson7@mysql.com', 'Male', '7533 Lyons Crossing', 'Marymount Manhattan College');
insert into managers (id, first_name, last_name, email, gender, address, education) values (9, 'Corena', 'Clarricoates', 'cclarricoates8@jimdo.com', 'Genderfluid', '2 Artisan Drive', 'Kentucky Wesleyan College');
insert into managers (id, first_name, last_name, email, gender, address, education) values (10, 'Carie', 'Slobom', 'cslobom9@icio.us', 'Female', '6929 Oak Valley Terrace', 'University of Science, Arts and Technology');
insert into managers (id, first_name, last_name, email, gender, address, education) values (11, 'Ike', 'Klosser', 'iklossera@upenn.edu', 'Bigender', '04720 Tony Alley', 'Belgorod State Agricultural Academy');
insert into managers (id, first_name, last_name, email, gender, address, education) values (12, 'Lindy', 'Hopfner', 'lhopfnerb@google.it', 'Male', '5840 Hovde Way', 'Barclay College');
insert into managers (id, first_name, last_name, email, gender, address, education) values (13, 'Erich', 'Starling', 'estarlingc@youku.com', 'Male', '22012 Mccormick Street', 'Nyack College');
insert into managers (id, first_name, last_name, email, gender, address, education) values (14, 'Tate', 'MacNamara', 'tmacnamarad@deliciousdays.com', 'Female', '8859 Morning Trail', 'Emily Carr Institute of Art + Design');
insert into managers (id, first_name, last_name, email, gender, address, education) values (15, 'Carlie', 'Burke', 'cburkee@netscape.com', 'Male', '371 Troy Park', 'Skrjabin Moscow State Academy of Veterinary Medicine and Biotechnology');
insert into managers (id, first_name, last_name, email, gender, address, education) values (16, 'Benn', 'Brokenbrow', 'bbrokenbrowf@sogou.com', 'Male', '649 Carioca Way', 'Universidad del Norte');
insert into managers (id, first_name, last_name, email, gender, address, education) values (17, 'Marleen', 'Larder', 'mlarderg@vimeo.com', 'Female', '4139 Norway Maple Avenue', 'Nile University');
insert into managers (id, first_name, last_name, email, gender, address, education) values (18, 'Thomasin', 'Newick', 'tnewickh@seattletimes.com', 'Female', '40 Porter Drive', 'Adekunle Ajasin University');
insert into managers (id, first_name, last_name, email, gender, address, education) values (19, 'Em', 'Chesterfield', 'echesterfieldi@nsw.gov.au', 'Male', '0039 Michigan Point', 'Tikrit University');
insert into managers (id, first_name, last_name, email, gender, address, education) values (20, 'Dominique', 'Gravatt', 'dgravattj@cornell.edu', 'Female', '7741 Mccormick Drive', 'Adamson University');
insert into managers (id, first_name, last_name, email, gender, address, education) values (21, 'Olga', 'Pietzner', 'opietznerk@skyrock.com', 'Female', '086 Waxwing Point', 'Basilicata University Potenza');
insert into managers (id, first_name, last_name, email, gender, address, education) values (22, 'Malvina', 'Althrop', 'malthropl@dropbox.com', 'Female', '59 Sachs Circle', 'Texas Woman''s University');
insert into managers (id, first_name, last_name, email, gender, address, education) values (23, 'Emory', 'Banner', 'ebannerm@irs.gov', 'Male', '0 Meadow Vale Pass', 'Ecole Nationale d''Ingénieurs de Saint-Etienne');
insert into managers (id, first_name, last_name, email, gender, address, education) values (24, 'Paolo', 'Dewhurst', 'pdewhurstn@cafepress.com', 'Male', '3 Bluestem Trail', 'Ecole Supérieure des Sciences et Technologie de l''Ingénieur de Nancy');
insert into managers (id, first_name, last_name, email, gender, address, education) values (25, 'Lyman', 'Trodden', 'ltroddeno@nydailynews.com', 'Male', '79 2nd Crossing', 'ITT Technical Institute Maitland');
