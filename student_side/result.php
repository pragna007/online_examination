<?php
session_start(); 
include('../db.php');

require '../vendor/autoload.php';
use Dompdf\Dompdf as Pdf;
 
 $id=$_GET['id'];
$qry=mysqli_query($con,"select * from exam as e join class as c on c.id=e.class_id where e.id='$id'");
$row=mysqli_fetch_array($qry);
$student_id=$_SESSION['student_id'];
 $student_qry=mysqli_query($con,"select * from student  where  id='$student_id'");
$student_row=mysqli_fetch_array($student_qry);
 
	$output = '
		<h3 align="center">'.$row['exam_name'].' </h3><br /><br />
		<table width="100%" border="0" cellpadding="5" cellspacing="0">
			<tr>
				<td width="50%">
				<b>Student Name : </b>'.$student_row['s_name'].' <br /><br />
				<b>Email. : </b> '.$student_row['s_email'].'<br /><br />
				<b>Class : </b> '.$row['class_name'].'<br /><br />
				</td>
				<td width="50%" align="right">
					<img src="../uploads/'.$student_row['s_image'].'" width="100" />
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<table width="100%" border="1" cellpadding="5" cellspacing="0">
						<tr>
							<th>Subject</th>
							<th>Total Marks</th>
							<th>Marks Obtain</th>
						</tr>
		';



  
 $marks_qry=mysqli_query($con,"select *,es.id as esid  from exam_subject as es join subjects as s on s.id=es.subject_id where es.exam_id='$id'");
	 		
$total=0;
$obt=0;
	 		while($mark_row=mysqli_fetch_array($marks_qry)){
	 			$esid=$mark_row['esid'];
	 		 				 $obt_qry=mysqli_query($con,"select sum(se.marks_obtained) as marks_obtained from student_exam_answers as se  join exam_subject as es on es.id=se.exam_subject_id  where  se.student_id='$student_id' and es.id='$esid'");
				 $obt_row=mysqli_fetch_array($obt_qry);
$total+=$mark_row['tot_q']*$mark_row['correct_ans'];
$obt+=$obt_row['marks_obtained'];
		$output .= '
			<tr>
				<td>'.$mark_row['subject_name'].'</td>
				<td>'.$mark_row['tot_q']*$mark_row['correct_ans'].'</td>
				<td>'.$obt_row['marks_obtained'].'</td>
			</tr>
			';
	 
	 }

	$output .= '
			<tr>
				<td align="right"><b>Total Marks</b></td>
				<td>'.$total.'</td>
				<td>'.$obt.'</td>
			</tr>
	';

	$output .= '</table></td></tr></table>';

	 // echo $output;

	$pdf = new Pdf();

	$pdf->set_paper('letter', 'A4');

	$file_name = 'Exam Result.pdf';

	$pdf->loadHtml($output);
	$pdf->render();
	$pdf->stream($file_name, array("Attachment" => false));
	exit(0);

 

?>