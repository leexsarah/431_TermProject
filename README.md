# 431_TermProject

TODO LIST:
	Functionalities for Faculty
			1.	List all the course sessions being taught by the faculty.
			2.	Review the detail of a particular course. 
			3.	Upload the course material (/syllabus) for a course session. 
			4.	Download students’ homework/term project for a course session. 
			5.	Enter students’ scores for each student. 
	Functionalities for Students
			1.	List all the course sessions being offered. 
			2.	Review the details of a course session. 
			3.	Enroll to a particular session. 	
			4.	Upload the homework/term project for a course session. 
			5.	Review the course material for a course session. 
			6.	Review student’s grades. 
	Administrative Functionalities 
			1.	Review the course schedule. 
			2.	Make changes to the course schedule: add a course to the course schedule, delete a course from the course schedule.
			3.	Review/modify the details of a given course.  
			4.	List all course sessions. 
			5.	Add/delete a course session to/from a course. 







Possible Queries:

Prints out 111111111's infor from scwid and course grades:
select * 
from student 
inner join course_grades 
where student.scwid = course_grades.fk_scwid and student.scwid=111111111;


Prints out the list of classes student 111111111 has: 
select * 
from student 
inner join student_section, section  
where student_section.fk_scwid = 111111111 and student_section.fk_scwid = student.scwid and student_section.fk_section_number = section.section_number and student_section.fk_course_id = section.fk_course_id;
