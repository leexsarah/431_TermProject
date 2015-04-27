# 431_TermProject
Possible Queries:

Prints out 111111111's infor from scwid and course grades:
select * 
from student 
inner join course_grades 
where student.scwid = course_grades.fk_scwid and student.scwid=111111111;

select * 
from student 
inner join student_section, section  
where student_section.fk_scwid = 111111111 and student_section.fk_scwid = student.scwid and student_section.fk_section_number = section.section_number and student_section.fk_course_id = section.fk_course_id;