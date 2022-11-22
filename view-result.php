<?php
include('db.php');

require 'vendor/autoload.php';
use Dompdf\Dompdf as Pdf;
use Dompdf\Options;
$id=$_GET['id'];
$qry=mysqli_query($con,"select * from exam as e join class as c on c.id=e.class_id where e.id='$id'");
$row=mysqli_fetch_array($qry);
 	$output = '
	<h3 align="center">Exam -  '.$row['exam_name'].'</h3> 
	<h3 align="center">Class - '.$row['class_name'].'</h3>
	<br />
	<table width="100%" border="1" cellpadding="5" cellspacing="0">
		<tr>
			<td>Image</td>
		 
			<td>Student Name</td>
			<th>Total Marks</th>
			<th>Marks Obtain</th>
		</tr>
	';
$class_id=$row['class_id'];
 $result_qry=mysqli_query($con,"select * from student as s join asign_student as a on a.student_id=s.id where a.class_id='$class_id' ");
			while($r= mysqli_fetch_array($result_qry)){
				 ;
				$student_id=$r['student_id'];
				

				 $mark_qry=mysqli_query($con,"select sum(se.marks_obtained) as marks_obtained from student_exam_answers as se  join exam_subject as es on es.id=se.exam_subject_id  where  se.student_id='$student_id' and es.exam_id='$id'");
				 $mark_row=mysqli_fetch_array($mark_qry);

				  $total_mark_qry=mysqli_query($con,"select sum( tot_q* correct_ans) as total_marks from  exam_subject    where    exam_id='$id'");
				 $total_mark_row=mysqli_fetch_array($total_mark_qry);
		$output .= '
		<tr>
			<td><img src="uploads/'.$r['s_image'].'" width="50" ></td>
	 
			<td>'.$r['s_name'].'</td>
			<td>'.$total_mark_row['total_marks'].'</td>
			<td>'.$mark_row['marks_obtained'].'</td>
		</tr>
		';		
 
		}

	$output .= '</table></td></tr></table>';
 
	$pdf = new Pdf();

	$pdf->set_paper('letter', 'portrait');


	$file_name = 'Exam Result.pdf';
 
	$pdf->loadHtml($output);
	 
 

	$pdf->render();

	$pdf->stream($file_name, array("Attachment" => false));
 

?>