<?php
	class Student{
		private $student_information = array();
		private $student_class_list = array();


		public function __construct($username){
			$host = "localhost";
			$user = "root";
			$pword = "root";
			$db = "school";

			$link = mysqli_connect($host, $user, $pword, $db);

			if(mysqli_connect_errno()){
				echo "Connection failed: " . mysqli_connect_error();
				exit();
			}

			$student_query = "select username, cwid, ssn, fname, lname, dob, city, state, zip_code, phone_number, status from student join csuf_member, account where username = '". $username ."' and scwid = cwid and fk_cwid = cwid;";
			$result = $link->query($student_query) or die("ERROR: Failed query. ". mysqli_error($link));

			$row = mysqli_fetch_assoc($result);
			$this->student_information = array_merge($row);

			$result->free();

			//Setup class_list
			$cwid = (int)$this->student_information["cwid"];
			$class_list_query = "select fk_course_id, fk_section_number from student_section where fk_scwid = ". $cwid .";";

			$result = $link->query($class_list_query) or die("ERROR: Failed query. ". mysqli_error($link));

			while($row = mysqli_fetch_assoc($result)){
				array_push($this->student_class_list, $row);
			}
			$result->free();
			mysqli_close($link);
		}

		public function getStudent_information(){
			return $this->student_information;
		}

		public function getStudent_class_list(){
			return $this->student_class_list;
		}
	}
?>