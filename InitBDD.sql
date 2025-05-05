CREATE TABLE IF NOT EXISTS user(
login varchar(50) NOT NULL,
mdp varchar(100) NOT NULL,
role varchar(50) NOT NULL,
valide tinyint(1) NOT NULL,
PRIMARY KEY (login)
)ENGINE=InnoDB; 

CREATE TABLE IF NOT EXISTS formation(
idFormation int NOT NULL UNIQUE AUTO_INCREMENT,
nom varchar(50) NOT NULL,
description text NOT NULL,
age int NOT NULL,
niveau varchar(20) NOT NULL,
image varchar(150) NOT NULL,
createur varchar(50) NOT NULL,
PRIMARY KEY (idFormation),
CONSTRAINT fk_createur FOREIGN KEY (createur) REFERENCES user(login)
) ENGINE=InnoDB; 

CREATE TABLE IF NOT EXISTS documentation(
idDocumentation int NOT NULL,
idFormation int NOT NULL,
titre varchar(100) NOT NULL,
type varchar(50) NOT NULL,
PRIMARY KEY (idDocumentation, idFormation),
CONSTRAINT fk_idFormation FOREIGN KEY (idFormation) REFERENCES formation(idFormation)
) ENGINE=InnoDB; ; 

CREATE TABLE IF NOT EXISTS inscription(
login varchar(50) NOT NULL,
idFormation int NOT NULL,
PRIMARY KEY (login, idFormation),
CONSTRAINT fk_etud FOREIGN KEY (login) REFERENCES user(login),
CONSTRAINT fk_inscrit FOREIGN KEY (idFormation) REFERENCES formation(idFormation)
) ENGINE=InnoDB; ; 