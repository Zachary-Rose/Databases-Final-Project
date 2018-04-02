
create database final_theaterdb;

CREATE TABLE TheaterComplex (
ComplexName			        VARCHAR(50)	    NOT NULL,
NumberOfTheaters			INTEGER		    NOT NULL,
PhoneNumber			        INTEGER		    NOT NULL,
StreetNumber			    INTEGER  	    NOT NULL,
Street			            VARCHAR(15)   	NOT NULL,
City			            VARCHAR(15)  	NOT NULL,
PostalCode			        VARCHAR(8)  	NOT NULL,
PRIMARY KEY(ComplexName)
);

CREATE TABLE TheaterRoom (
ComplexName			        VARCHAR(50)	    NOT NULL,
TheaterNumber			    INTEGER		    NOT NULL,
NumberOfSeats			    INTEGER		    NOT NULL,
ScreenSize			        VARCHAR(6)	    NOT NULL,  # "small" or "medium" or "Large"
PRIMARY KEY(ComplexName, TheaterNumber),
FOREIGN KEY(ComplexName) REFERENCES TheaterComplex(ComplexName));

CREATE TABLE User (
AccountNumber 	 VARCHAR(8) 		NOT NULL,
FNAME 			 VARCHAR(30) 		NOT NULL,
LNAME 			 VARCHAR (30) 		NOT NULL,
StreetNumber 	 INTEGER 			NOT NULL,
Street 			 VARCHAR(15) 		NOT NULL,
City 			 VARCHAR(15) 		NOT NULL,
PhoneNumber 	 INTEGER 			NOT NULL,  #phone numbers are different lenghts in different countries
Email 			 VARCHAR(30) 		NOT NULL,
Password 		 VARCHAR(20) 		NOT NULL,
CreditCardNumber VARCHAR(16) 		,
ExpDate 		 NUMERIC(4,0) 		,        # month(2)  and year(2)
# {Purchases} remouved because we do it threw reservations
IsAdmin          NUMERIC(1,0)       NOT NULL,
PRIMARY KEY (AccountNumber) # or email
);


CREATE TABLE MovieSupplier (
NameOfSupplier			    VARCHAR(15)	    NOT NULL,
ContactPersonName           VARCHAR(15)	    NOT NULL,
PhoneNumber			        INTEGER		    NOT NULL,
StreetNumber			    INTEGER  	    NOT NULL,
Street			            VARCHAR(15)   	NOT NULL,
City			            VARCHAR(15)  	NOT NULL,
PostalCode			        VARCHAR(8)  	NOT NULL,
PRIMARY KEY(NameOfSupplier)
);

CREATE TABLE Movie (
MovieTitle			        VARCHAR(30)	    NOT NULL,
RunningTime      			INTEGER		    NOT NULL,    #in min
Rating   			        VARCHAR(5)	    NOT NULL,
PlotSynopsis			    VARCHAR(800)   	NOT NULL,    # max 400 char done by admin
DirectorName                VARCHAR(15)	    NOT NULL,
ProductionCompany           VARCHAR(30)	    NOT NULL,
NameOfSupplier              VARCHAR(15)	    NOT NULL,
StartDay                    NUMERIC(8,0)	NOT NULL,  # year(4) - month(2) - day(2)
EndDate                     NUMERIC(8,0)	NOT NULL,  # year(4) - month(2) - day(2)
PRIMARY KEY(MovieTitle),
FOREIGN KEY(NameOfSupplier) REFERENCES MovieSupplier(NameOfSupplier)

);


CREATE TABLE MovieActors(
MovieTitle                  VARCHAR(30)	    NOT NULL,
ActorFNAME                  VARCHAR(30) 	NOT NULL,
ActorLNAME                  VARCHAR(30)	    NOT NULL,
PRIMARY KEY (MovieTitle, ActorFNAME, ActorLNAME),
FOREIGN KEY (MovieTitle) references Movie(MovieTitle)
);

CREATE TABLE Reviews(
MovieTitle  	VARCHAR(30)			NOT NULL,
AccountNumber 	CHAR(8) 			NOT NULL,
Review  		VARCHAR(500) 		NOT NULL,
PRIMARY KEY (AccountNumber, MovieTitle),
FOREIGN KEY(AccountNumber) REFERENCES User(AccountNumber) ON DELETE CASCADE,
FOREIGN KEY(MovieTitle) REFERENCES Movie(MovieTitle)
);


CREATE TABLE Showing (
ShowingNumber               INTEGER         NOT NULL,   # ID number
MovieTitle			        VARCHAR(30)	    NOT NULL,
ComplexName			        VARCHAR(50)	    NOT NULL,
StartTime			        VARCHAR(30) 	NOT NULL,   # hour(2) and min(2) in 24 hour time
StartDate			        VARCHAR(30)     NOT NULL,   # year(4) - month(2) - day(2)
TheaterNumber			    INTEGER		    NOT NULL,
NumberOfSeatsAvailable      INTEGER		    NOT NULL,
PRIMARY KEY(ShowingNumber, MovieTitle),
FOREIGN KEY(MovieTitle) REFERENCES Movie(MovieTitle),
FOREIGN KEY(ComplexName, TheaterNumber) REFERENCES TheaterRoom(ComplexName,TheaterNumber)
);

CREATE TABLE Reservations (
AccountNumber 	    CHAR(8) 			NOT NULL,
ReservationNumber   INTEGER             NOT NULL,   # ID number
ShowingNumber       INTEGER             NOT NULL,   # ID number
Quantity 		    INTEGER     	    NOT NULL,
PRIMARY KEY(ReservationNumber),
FOREIGN KEY(ShowingNumber) REFERENCES Showing(ShowingNumber),
FOREIGN KEY(AccountNumber) REFERENCES User(AccountNumber) ON DELETE CASCADE
);

insert into Movie values
('Black Panther',145,'PG-13','After the death of his father he becomes the black Panther','Ryan Coogler' , 'Marvel', 'SupplierThatIsReal',20180126,20180315),
('Sherlock Gnomes',86,'R', 'After Gnomeo comes home from work and catches his wife with the neighbor, he must hire Sherlock Gnomes (Samuel Jackson) to find dirt on his wife in order to win custody of his son', 'Mel Gibson', 'Paramount','SupplyGuy',20180202,20180227),
('Avengers Age of Ultron',135,'PG-13','Ironman and Captian America look for legal documants to prove Ultron is of age to enter the club for Thors bachelor party','Michael Bay', 'Marvel', 'CouchTime', 20180301,20180428);

insert into User values
(00000000,'Zach','Rose', 73, 'Princess Street', 'Kingston',9053341994, '13zmr@queensu.ca', 'passwordtest', 4724090203239999, 0521,  0),
(00001111,'John','Smith', 71, 'Derp Street', 'Kingston',9063341454, 'demo@gmail.com', 'demo', 1111990203239999, 1121, 0),
(00003333,'Scott','Waters', 44, 'Johnson Street', 'Kingston',4163341454, 'admin@gmail.com', 'admin', 11156789999, 1191, 1),
(00002222,'JP','McCluskey', 224, 'Earl Street', 'Kingston',9063341454, '13zzz@queensu.ca', 'passwordAAAA', 1111990203239998, 1128, 0);

insert into Reviews values
('Black Panther',00000000,'Almost died watching movie, fire alarm went off '),
('Black Panther',00003333,'I liked this movie because my favourite amimal is a panther! '),
('Black Panther',00002222,'Five stars!'),
('Avengers Age of Ultron', 00001111,'Movie was very bad fell asleep'),
('Sherlock Gnomes', 00002222,'This movie changed my life, I wish I could hire someone as intelligent as Sherlock Gnomes to help me get my kids back'),
('Sherlock Gnomes', 00001111, 'Amazing Movie!!! I mortgaged my house so I could see it a few more times!!');

insert into Reservations values
(00000000,1234,1 ,2),
(00001111,4567,3 ,3),
(00001111,6942,1 ,3),
(00002222,8910,2, 4),
(00002222,9110,4,10);



insert into TheaterComplex values
('The Screening Room',2,6133341994,120,'Princess St','Kingston','K7L5M6'),
('Landmark Cinemas 10 Kingston',3,6134546767,120,'Dalton Ave','Kingston',' K7K0C3'),
('Cineplex Odeon Gardiners Road Cinemas',4,6139992018,626,'Gardiners Rd','Kingston','K7M3X9');

insert into TheaterRoom values
('The Screening Room',1,60,'Small'),
('The Screening Room',2,100,'Medium'),
('Landmark Cinemas 10 Kingston',1,40,'Small'),
('Landmark Cinemas 10 Kingston',2,140,'Large'),
('Landmark Cinemas 10 Kingston',3,200,'Large'),
('Cineplex Odeon Gardiners Road Cinemas',1,100,'Medium'),
('Cineplex Odeon Gardiners Road Cinemas',2,100,'Medium'),
('Cineplex Odeon Gardiners Road Cinemas',3,120,'Large'),
('Cineplex Odeon Gardiners Road Cinemas',4,120,'Large');


insert into MovieSupplier values
('SupplierThatIsReal','James Ready',7874446666, 1919,'Verdugo Blvd','Los Angeles','91011'),
('SupplyGuy','Sam Smith',4167773333, 13,'Bloor Street','Toronto','M4W3Z5'),
('CouchTime', 'Cpt Morgan', 4168884545, 420, 'Blaze Ave','Toronto','M4W2H9');

insert into Showing values
(1, 'Black Panther','The Screening Room', '17:30', 'March 10th 2017', 1, 27),
(5, 'Black Panther','The Screening Room', '15:30', 'March 10th 2017', 1, 5),
(2, 'Avengers Age of Ultron','The Screening Room', '17:30', 'December 25th 2199' , 1, 50),
(3, 'Sherlock Gnomes', 'Landmark Cinemas 10 Kingston', '09:00','February 29th 3015',2,70),
(4, 'Sherlock Gnomes', 'Landmark Cinemas 10 Kingston', '12:00', 'Febuary 31st 1942',2,70);

insert into MovieActors values
('Black Panther', 'John', 'Doe'),
('Black Panther', 'Michael', 'Cera'),
('Sherlock Gnomes','Samuel', 'Jackson'),
('Sherlock Gnomes', 'John', 'Cena'),
('Avengers Age of Ultron', 'Robert', 'Downy Jr'),
('Avengers Age of Ultron', 'Chris', 'Evans');
