<?php
   include('../db.php') ;

if($_GET['action']=='showQuestion'){
	$question_id=$_GET['question_id'];
	$exam_subject_id=$_GET['exam_subject_id'];
		$student_id=$_GET['student_id'];

		if($question_id==''){
		
	$qry=mysqli_query($con,"select q.*,se.user_option from question as q  left join student_exam_answers as se on q.id=se.question_id and se.student_id='$student_id' where q.exam_subject_id='$exam_subject_id' order by q.id asc limit 1 ");	
		}
		else{
$qry=mysqli_query($con,"select q.*,se.user_option from question as q  left join student_exam_answers as se on q.id=se.question_id and se.exam_subject_id='$exam_subject_id' and se.student_id='$student_id' where q.id='$question_id'  and q.exam_subject_id='$exam_subject_id' order by q.id asc limit 1 ");	
		}

			$row=mysqli_fetch_array($qry);
			$question_id=$row['id'];
			$prev_question=mysqli_query($con,"select q.id  from question as q  left join student_exam_answers as se on q.id=se.question_id and se.exam_subject_id='$exam_subject_id' and se.student_id='$student_id' where q.id<'$question_id' and q.exam_subject_id='$exam_subject_id' order by q.id desc limit 1 ");
			$prev_id=mysqli_fetch_array($prev_question);
			$next_question=mysqli_query($con,"select q.id from question as q  left join student_exam_answers as se on q.id=se.question_id and se.exam_subject_id='$exam_subject_id' and se.student_id='$student_id' where q.id>'$question_id' and q.exam_subject_id='$exam_subject_id' order by q.id asc limit 1 ");	
			$next_id=mysqli_fetch_array($next_question);

			 $first_question=mysqli_query($con,"select q.id from question as q  left join student_exam_answers as se on q.id=se.question_id and se.exam_subject_id='$exam_subject_id' and se.student_id='$student_id'   where   q.exam_subject_id='$exam_subject_id' order by q.id asc limit 1 ");	
			$first_id=mysqli_fetch_array($first_question);


			 $last_question=mysqli_query($con,"select q.id from question as q  left join student_exam_answers as se on q.id=se.question_id and se.exam_subject_id='$exam_subject_id' and se.student_id='$student_id'    where   q.exam_subject_id='$exam_subject_id' order by q.id desc limit 1 ");	
			$last_id=mysqli_fetch_array($last_question);


	echo json_encode(array('prev_id'=>@$prev_id['id'],'next_id'=>@$next_id['id'],'first_id'=>@$first_id['id'],'last_id'=>@$last_id['id'],'data'=>$row));			

}


if($_GET['action']=='answerQuestion'){
	$question_id=$_GET['question_id'];
	$exam_subject_id=$_GET['exam_subject_id'];
		$student_id=$_GET['student_id'];
		$answer=$_GET['answer'];
				$question_qry=mysqli_query($con,"Select * from question where id='$question_id'");
				$question_row=mysqli_fetch_array($question_qry);

				$exam_sub_qry=mysqli_query($con,"Select * from exam_subject where id='$exam_subject_id'");
				$exam_sub_row=mysqli_fetch_array($exam_sub_qry);
		 $qry=mysqli_query($con,"select  * from student_exam_answers as se where   se.exam_subject_id='$exam_subject_id' and se.student_id='$student_id' and se.question_id='$question_id'  ");	
		 		$row=mysqli_fetch_array($qry);
		 			$is_correct=0;
		 		if($answer==$question_row['ans']){
		 			$is_correct=1;
		 			$marks=$exam_sub_row['correct_ans'];

		 		}
		 		else{
					$marks=$exam_sub_row['wrong_ans'];
		 		}

 		if(mysqli_num_rows($qry)>0){
 			$id=$row['id'];
 				mysqli_query($con,"update student_exam_answers  set `exam_subject_id`='$exam_subject_id',`student_id`='$student_id',`question_id`='$question_id',`user_option`='$answer',`marks_obtained`='$marks',`is_correct`='$is_correct' where id='$id' ");
 		}
 		else{
 				mysqli_query($con,"insert into student_exam_answers  (`exam_subject_id`,`student_id`,`question_id`,`user_option`,`marks_obtained`,`is_correct`) values ('$exam_subject_id','$student_id','$question_id','$answer','$marks','$is_correct') ");
 		}

}


 ?>