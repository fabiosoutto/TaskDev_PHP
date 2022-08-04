CREATE TABLE tb_user(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	  username varchar(50) NOT NULL,
    birthdate date NOT NULL,
    gender char(2) NOT NULL,
    pronouns char(1) NOT NULL,
    email varchar(255) NOT NULL,
    passwd varchar(50) NOT NULL
);

CREATE TABLE tb_task (
  id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  id_user int NOT NULL,
  task varchar(100) NOT NULL,
  task_description text NOT NULL DEFAULT "",
  done boolean NOT NULL DEFAULT 0,
  register_date datetime NOT NULL DEFAULT current_timestamp,
  
  FOREIGN KEY(id_user) REFERENCES tb_user(id)
);