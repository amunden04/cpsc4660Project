create table student
(
    StudentID int not null auto_increment,
    Usernames varchar(40),
    Passwords varchar(30),
    fName varchar(20),
    lName varchar(20),
    streetName varchar(30),
    city varchar(20),
    province varchar(20),
    postCode char(7),
    Phone char(14),
    DOB char(10),
    gender char(1),
    enrolledCourses varchar(25),
    primary key (StudentID)
);

create table faculty
(
    StaffID int not null auto_increment, 
    Usernames varchar(40),
    Passwords varchar(30),
    fName varchar(20),
    lName varchar(20),
    streetName varchar(30),
    city varchar(20),
    province varchar(20),
    postCode char(7),
    Phone char(14),
    DOB char(10),
    gender char(1),
    coursesTaught varchar(25),
    primary key (StaffID)
);

create table course 
(
    courseID int not null auto_increment,
    courseNum varchar(10),
    courseName varchar(80),
    section char(1),
    daysTaught varchar(5),
    timeTaught varchar(11),
    classroom varchar(8),
    primary key (courseID)
);