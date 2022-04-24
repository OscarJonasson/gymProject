drop database if exists gym;

CREATE TABLE `gym`.`workouts` ( `id` INT NOT NULL AUTO_INCREMENT , `exercise` VARCHAR(100) NOT NULL , `repetitions` INT(10) NOT NULL , `weight` INT(10) NOT NULL , `musclegroup` VARCHAR(50) NOT NULL , `rir` INT(10) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;


insert into workouts values(NULL,'Bench press', 4,8,40,'upper body', 1);
insert into workouts values(NULL,'Squat', 4,8,50,'lower body', 2);
insert into workouts values(NULL,'Pull up', 4,10,60,'upper body', 0);
insert into workouts values(NULL,'Lateral raise', 4,10,10,'upper body', 0);
insert into workouts values(NULL,'Barbell curl', 4,10,20,'upper body', 0);


CREATE TABLE `workouts2` (
 `id` int NOT NULL AUTO_INCREMENT,
 `exercise` varchar(100) NOT NULL,
 `sets` int NOT NULL,
 `repetitions` int NOT NULL,
 `weight` int NOT NULL,
 `musclegroup` varchar(50) NOT NULL,
 `rir` int NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

insert into workouts2 values(NULL,'Overhead press', 4,8,30,'upper body', 0);
insert into workouts2 values(NULL,'Deadlift', 4,8,70,'lower body', 2);
insert into workouts2 values(NULL,'Incline press', 4,10,9,'upper body', 0);
insert into workouts2 values(NULL,'Incline row', 4,10,50,'upper body', 0);
insert into workouts2 values(NULL,'Hamstring', 3,10,50,'lower body', 0);
insert into workouts2 values(NULL,'Calf raises', 3,10,15,'lower body', 0);
insert into workouts2 values(NULL,'Tricep pyramid', 2,0,35,'upper body', 0);