# CISC/CMPE 332
# Project Deliverable 2
# Team 11
# Siqi Dai, 10183100, 14sd63
# Ziping Li, 10178011, 14zl63
# Yian Lin, 10187435, 14yl124 

#create database Project_Team11;
use Project_Team11;


CREATE TABLE Theatre_Complex(
name						VARCHAR(15) NOT NULL,
number_of_theatres			INTEGER		NOT NULL,
street_num					INTEGER,
street_name					VARCHAR(30),
city						VARCHAR(10),
province					VARCHAR(2),
zip							VARCHAR(6),
PRIMARY KEY(name));

CREATE TABLE Theatre_Complex_Phone_Number(
name						VARCHAR(15) NOT NULL,
phone_number				VARCHAR(15) NOT NULL,
PRIMARY KEY(name, phone_number),
FOREIGN KEY(name) REFERENCES Theatre_Complex(name));

CREATE TABLE Theatre(
theatre_num					INTEGER		NOT NULL,
theatre_complex_name		VARCHAR(15)	NOT NULL,
max_num_of_seats			INTEGER,
screen_size					VARCHAR(6),
PRIMARY KEY(theatre_num),
FOREIGN KEY(theatre_complex_name) REFERENCES Theatre_Complex(name));

CREATE TABLE Movie_Supplier(
company_name				VARCHAR(30) NOT NULL,
street_num					INTEGER,
street_name					VARCHAR(30),
city						VARCHAR(10),
province					VARCHAR(2),
zip							VARCHAR(6),
contact_person_first_name	VARCHAR(15),
contact_person_last_name	VARCHAR(15),
PRIMARY KEY(company_name));

CREATE TABLE Movie(
title							VARCHAR(30) NOT NULL,
movie_supplier_company_name		VARCHAR(30) NOT NULL,
running_time					INTEGER,
rating							VARCHAR(3), 
plot_synopsis					VARCHAR(3000),
director						VARCHAR(20),
production_company				VARCHAR(30),
start_date						DATE,
end_date						DATE,
PRIMARY KEY(title),
FOREIGN KEY(movie_supplier_company_name) REFERENCES Movie_Supplier(company_name));

CREATE TABLE Movie_Main_Actor(
title						VARCHAR(30) NOT NULL,
first_name					VARCHAR(15) NOT NULL,
last_name					VARCHAR(15) NOT NULL,
PRIMARY KEY(title, first_name, last_name),
FOREIGN KEY(title) REFERENCES Movie(title));

CREATE TABLE Daily_Showing(
start_time					TIME		NOT NULL,
movie_title					VARCHAR(30)	NOT NULL,
theatre_num					INTEGER		NOT NULL,
PRIMARY KEY(start_time),
FOREIGN KEY(theatre_num) REFERENCES Theatre(theatre_num),
FOREIGN KEY(movie_title) REFERENCES Movie(title));

CREATE TABLE Movie_supplier_phone_number(
company_name				VARCHAR(30) NOT NULL,
phone_number				VARCHAR(15) NOT NULL,
PRIMARY KEY(company_name, phone_number),
FOREIGN KEY(company_name) REFERENCES Movie_Supplier(company_name));

CREATE TABLE Customer(
account_number				VARCHAR(10) NOT NULL,
pw							VARCHAR(10) NOT NULL,
first_name					VARCHAR(15),
last_name					VARCHAR(15),
street_num					INTEGER,
street_name					VARCHAR(30),
city						VARCHAR(10),
province					VARCHAR(2),
zip							VARCHAR(6),
phone_number				VARCHAR(15),
email_address				VARCHAR(30),
credit_card_number			VARCHAR(16),
credit_card_expiry_date		VARCHAR(4),
PRIMARY KEY(account_number));

CREATE TABLE Reserves(
start_time					TIME		NOT NULL,
movie_title					VARCHAR(30) NOT NULL,
account_number				VARCHAR(10) NOT NULL,
res_date					DATE,
num_of_tickets				INTEGER,
PRIMARY KEY(start_time, movie_title, account_number, res_date, num_of_tickets),
FOREIGN KEY(start_time) REFERENCES Daily_Showing(start_time),
FOREIGN KEY(movie_title) REFERENCES Daily_Showing(movie_title),
FOREIGN KEY(account_number) REFERENCES Customer(account_number));

CREATE TABLE Wrote(
movie_title					VARCHAR(30) NOT NULL,
account_number				VARCHAR(10) NOT NULL,
review						VARCHAR(3000),
PRIMARY KEY(movie_title, account_number),
FOREIGN KEY(movie_title) REFERENCES Movie(title),
FOREIGN KEY(account_number) REFERENCES Customer(account_number));

CREATE TABLE Admin(
adid						VARCHAR(30) NOT NULL,
adpassword					VARCHAR(30) NOT NULL,
PRIMARY KEY(adid));

insert into Admin values
('admin', 'admin')
;

insert into Theatre_Complex values
('Tarragon', 3, 30, 'Bridgman Ave','Toronto','ON','M5R1X3'),
('Ed Mirvish', 2, 244, 'Victoria St','Toronto','ON','M5B1V8'),
('CAA', 4, 651, 'Yonge St','Toronto','ON','M4Y1Z9')
;

insert into Theatre_Complex_Phone_Number values
('Tarragon', '4165311827'),
('Ed Mirvish', '4168721212'),
('CAA', '4163248920')
;

insert into Theatre values
(101, 'Tarragon', 80, 'medium'),
(102, 'Tarragon', 50, 'small'),
(103, 'Tarragon', 100, 'large'),
(201, 'Ed Mirvish', 120, 'large'),
(202, 'Ed Mirvish', 75, 'medium'),
(301, 'CAA', 50, 'small'),
(302, 'CAA', 70, 'medium'),
(303, 'CAA', 110, 'large'),
(304, 'CAA', 100, 'large')
;

insert into Movie_Supplier values
('UofT', 393, 'University Ave', 'Toronto', 'ON','M5G1E6', 'Meric', 'Gertler'),
('Queens', 99, 'University Ave', 'Kingston', 'ON','K7L3N6', 'Daniel', 'Woolf')
;

insert into Movie values
('Peter Rabbit', 'UofT', 100, 'G', 
	'Peter Rabbit and his three sisters -- Flopsy, Mopsy and Cotton. Tail enjoy spending their days in Mr. McGregor\'s vegetable garden. When one of McGregor\'s relatives suddenly moves in, he\'s less than thrilled to discover a family of rabbits in his new home. A battle of wills soon breaks out as the new owner hatches scheme after scheme to get rid of Peter -- a resourceful rabbit who proves to be a worthy and wily opponent.',
	'Will Gluck', 'Animal Logic', '2018-02-28', '2018-06-20'),
('Black Panther', 'UofT', 140, 'PG', 
	'After the death of his father, T\'Challa returns home to the African, nation of Wakanda to take his rightful place as king. When a powerful enemy suddenly reappears, T\'Challa\'s mettle as king -- and as Black Panther -- gets tested when he\'s drawn into a conflict that puts the fate of Wakanda and the entire world at risk. Faced with treachery and danger, the young king must rally his allies and release the full power of Black Panther to defeat his foes and secure the safety of his people.',
	'Ryan Coogler', 'Marvel Studio', '2018-03-03', '2018-06-23'),
('Early Man', 'Queens', 99, 'G', 
	'A plucky cave man named Dug, his sidekick Hognob and the rest of their tribe face a grave threat to their simple existence. Lord Nooth plans to take over their land and transform it into a giant mine, forcing Dug and his clan to dig for precious metals. Not ready to go down without a fight, Dug and Hognob must unite their people in an epic quest to defeat a mighty enemy -- the Bronze Age.',
	'Nick Park', 'StudioCanal', '2018-02-18', '2018-06-15'),
('Operation Red Sea', 'Queens', 139, '18A', 
	'A commando force from the Chinese navy intercepts terrorists and rescues Chinese citizens in Yemen.',
	'Dante Lam', 'Polybona Films', '2018-02-25', '2018-06-18'),
('Red Sparrow', 'Queens', 139, '18A', 
	'Prima ballerina Dominika Egorova faces a bleak and uncertain future after she suffers an injury that ends her career. She soon turns to Sparrow School, a secret intelligence service that trains exceptional young people to use their minds and bodies as weapons. Egorova emerges as the most dangerous Sparrow after completing the sadistic training process. As she comes to terms with her new abilities, Dominika meets a CIA agent who tries to convince her that he is the only person she can trust.',
	'Francis Lawrence', '20th Century Fox', '2018-03-01', '2018-06-01'),
('Call Me by Your Name', 'UofT', 132, '14A', 
	'It\'s the summer of 1983, and precocious 17-year-old Elio Perlman is spending the days with his family at their 17th-century villa in Lombardy, Italy. He soon meets Oliver, a handsome doctoral student who\'s working as an intern for Elio\'s father. Amid the sun-drenched splendor of their surroundings, Elio and Oliver discover the heady beauty of awakening desire over the course of a summer that will alter their lives forever.',
	'Luca Guadagnino', 'Sony Pictures Classics', '2018-02-01', '2018-02-26')
;

insert into Movie_Main_Actor values
('Peter Rabbit', 'James', 'Corden'),
('Peter Rabbit', 'Alice', 'Chen'),
('Black Panther', 'Chadwick', 'Boseman'),
('Black Panther', 'Michael', 'Jordan'),
('Black Panther', 'Danai', 'Gurira'),
('Early Man', 'Tom', 'Hiddleston'),
('Early Man', 'Eddie', 'Redmayne'),
('Operation Red Sea', 'Yi', 'Zhang'),
('Operation Red Sea', 'Qing', 'Hai'),
('Red Sparrow', 'Jennifer', 'Lawrence'),
('Red Sparrow', 'Joel', 'Edgerton'),
('Call Me by Your Name', 'Armie', 'Edgerton'),
('Call Me by Your Name', 'Timothée', 'Chalamet')
;

insert into Daily_Showing values
('10:00:00', 'Peter Rabbit', '101'),
('13:00:00', 'Black Panther', '102'),
('17:15:00', 'Operation Red Sea', '102'),
('19:30:00', 'Peter Rabbit', '201'),
('11:45:00', 'Black Panther', '202'),
('16:15:00', 'Black Panther', '301'),
('09:45:00', 'Red Sparrow', '302'),
('12:50:00', 'Early Man', '303'),
('18:30:00', 'Operation Red Sea', '304'),
('14:15:00', 'Call Me by Your Name', '304')
;

insert into Movie_supplier_phone_number values
('UofT', '4169787228'),
('Queens', '6135332000')
;

insert into Customer values
('1001', '1001', 'John', 'Smith', 182, 'Dolores Rd', 'North York', 'ON','M3L2K8', '4169130819', 'jsmith1@gmail.com',
'5191231234567890', '1119'),
('1002', '1002', 'Franklin', 'Wong', 118, 'Denbigh Crescent', 'North York', 'ON','M3M2T5', '4169138324', 'fwong2@gmail.com',
'5191231287617219', '0120'),
('1003', '1003', 'Alicia', 'Zelaya', 47, 'Millstone Ct', 'Unionville', 'ON','L3R7M7', '4162659828', 'azelaya3@gmail.com',
'4520123456789123', '0319'),
('1004', '1004', 'Jennifer', 'Wallace', 65, 'Albacore Crescent', 'Scarborough', 'ON','M1H2L2', '4162653183', 'jwallace4@gmail.com',
'4724123456789123', '0522')
;

insert into Reserves values
('10:00:00', 'Peter Rabbit', '1001', '2018-05-01', 1),
('13:00:00', 'Black Panther', '1001', '2018-05-15', 2),
('18:30:00', 'Operation Red Sea', '1002', '2018-05-17',3),
('09:45:00', 'Red Sparrow', '1003', '2018-05-17', 2),
('18:30:00', 'Operation Red Sea', '1004', '2018-05-28', 1),
('14:15:00', 'Call Me by Your Name', '1004', '2018-02-15', 2)
;

insert into Wrote values
('Call Me by Your Name', '1004', 'Nice Movie!')
;