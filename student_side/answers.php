<?php

//single_subject_result.php
session_start(); 
include('../db.php');

require '../vendor/autoload.php';
use Dompdf\Dompdf as Pdf;
$id=$_GET['id'];
$student_id=$_SESSION['student_id'];
  $qry=mysqli_query($con,"select * from question  as q  left join student_exam_answers as se on se.question_id=q.id and se.student_id='$student_id' where q.exam_subject_id='$id' ");





 
	$output = '
		<h3 align="center">Exam Result</h3>
		<table width="100%" border="1" cellpadding="5" cellspacing="0">
			<tr>
				<th>Question</th>
				<th>Your Answer</th>
				<th>Answer</th>
				<th>Result</th>
				<th>Marks</th>
			</tr>
		';


 $total=0;
	 while($row=mysqli_fetch_array($qry)){
		$ans='';
		if($row['ans']==1){
			$ans=$row['option_1'];
		}
		if($row['ans']==2){
			$ans=$row['option_2'];
		}
		if($row['ans']==3){
			$ans=$row['option_3'];
		}
		if($row['ans']==4){
			$ans=$row['option_4'];
		}

		$user_ans='';
		if($row['user_option']==1){
			$user_ans=$row['option_1'];
		}
		if($row['user_option']==2){
			$user_ans=$row['option_2'];
		}
		if($row['user_option']==3){
			$user_ans=$row['option_3'];
		}
		if($row['user_option']==4){
			$user_ans=$row['option_4'];
		}

		$output .= '
			<tr>
				<td>'.$row['q_title'].'</td>
				<td>'.$user_ans.'</td>
				<td>'.$ans.'</td>
				<td>'.($row['is_correct']==0?'Wrong':'Right').'</td>
				<td>'.$row['marks_obtained'].'</td>
			</tr>
			';
			$total+=$row['marks_obtained'];
		}
	 
	$output .= '
			<tr>
				<td colspan="4" align="right"><b>Total Marks</b></td>
				<td>'.$total.'</td>
			</tr>
	';

	$output .= '</table>';

	 // echo $output;

	$pdf = new Pdf();

	$pdf->set_paper('letter', 'landscape');

	$file_name = 'Exam Result.pdf';

	$pdf->loadHtml($output);
	$pdf->render();
	$pdf->stream($file_name, array("Attachment" => false));
	exit(0);
 

?>