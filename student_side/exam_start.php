
<?php include('../db.php') ?>


<?php include('student_header.php') ?>

 
 <?php 
$student_id=$_SESSION['student_id'];
 $student_data=mysqli_query($con,"select * from student as s  left join asign_student as a on a.student_id=s.id left join class as c on c.id=a.class_id where s.id='$student_id'");

 $student_row=mysqli_fetch_array($student_data);

$id=$_GET['id'];
$exam=mysqli_query($con,"Select * from exam_subject as es join exam as e on e.id=es.exam_id join subjects as s on s.id=es.subject_id where es.id='$id' ");
 $exam_row=mysqli_fetch_array($exam);
 

  $question_qry=mysqli_query($con,"Select * from question where exam_subject_id='$id'"); 

  $subject_exam_start_time = $exam_row["exam_duraion"];
        $subject_exam_end_time = strtotime($exam_row['exam_duraion'] . '+' . $exam_row['exam_dur'] );
        $subject_exam_end_time = date('Y-m-d H:i:s', $subject_exam_end_time);
        $total_second = strtotime($subject_exam_end_time) - strtotime($subject_exam_start_time);
        $remaining_minutes = strtotime($subject_exam_end_time) - time();
  
 ?>
 
 

                    <!-- Page Heading -->
                    <h1 class="h3 mt-4 mb-4 text-gray-800"></h1>
                    
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                <b>Exam : </b><?php echo @$exam_row['exam_name']; ?>
                                </div>
                                <div class="col-md-6">
                                    <b>Subject : <?php echo $exam_row['subject_name'] ?></b> 
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div id="question_area" class="mb-2">
                                      <div class="card">
                                        <div class="card-header">
                                          <b>Question</b> - <span id="question_text"> </span>
                                          </div>
                                          <div class="card-body row" id="answer_text">
                                            
                                         
        </div>
        <div class="col-md-12 text-center pb-4">
            <button class="btn btn-warning disableBtn"   >Previous</button>
            <button class="btn btn-primary nextBtn">Next</button>
        </div>
                                      </div>

                                    </div>
                                    <div id="nav_area" class="mb-2">
  <div class="card">
        <div class="card-header"><b>Question Navigation</b></div>
        <div class="card-body">
          <div class="row">
            <?php 
            $sno=0;
            while($row=mysqli_fetch_array($question_qry)){ ?>
<div class="col-sm-1 mb-2">

          <button type="button" class="btn btn-primary question_navigation" data-id="<?php echo  $row['id'] ?>"><?php echo ++$sno ?></button>
        </div>
      <?php } ?>
  </div>
      </div></div>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="text-center mt-2 mb-2">
                                        <div id="exam_timer" data-timer="<?php echo $remaining_minutes; ?>" style="max-width:375px; width: 100%; height: 190px; margin:0 auto"></div>
                                    </div>
                                    <div class="card shadow">
                                        <div class="card-header"><b>Student Details</b></div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <p class="text-center"><img src="../uploads/<?php echo $student_row['s_image']; ?>" class="img-fluid img-thumbnail" width="100" /></p>
                                                </div>
                                                <div class="col-md-8">
                                                    <b>Name : </b><?php echo @$student_row['s_name']; ?><br />
                                                    <b>Email : </b><?php echo @$student_row['s_email']; ?><br />
                                                    <b>Class : <?php echo @$student_row['class_name']; ?></b> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="../app-assets/js/TimeCircles.js"></script>
               
<script>
$(document).ready(function(){
  showquestions();
    function showquestions(question_id='',qno='1'){
                    var student_id="<?php echo $_SESSION['student_id'] ?>";
                    var exam_subject_id="<?php echo  $id?>";
                     

                    $.ajax({
                      type:'get',
                      data:{student_id:student_id,exam_subject_id:exam_subject_id,question_id:question_id,action:'showQuestion' },
                      url:'ajax.php',
                      dataType:'json',
                      success:function(res){
                            var html="";
                                if(res.next_id=='' || res.next_id==null ){
                                      $('.nextBtn').attr('disabled',true);
                                }
                                else{
                                  $('.nextBtn').removeAttr('disabled',true); 
                                }

                                if(res.prev_id=='' || res.prev_id==null ){
                                 
                                      $('.disableBtn').attr('disabled',true);
                                }
                                else{
                                  $('.disableBtn').removeAttr('disabled',true); 
                                }

                            $('.nextBtn').attr('data-id',res.next_id);
                            $('.disableBtn').attr('data-id',res.prev_id);
                            if(res.data!=''){
                              var checked="";
                              $('#question_text').html(res.data.q_title)
                            for(var i=1;i<=4;i++){
                              if(i==1){
                                var options=res.data.option_1;
                                  if(res.data.user_option==1){
                                checked="checked";
                              }
                              else{
                                checked="";
                              }
                              }
                              if(i==2){
                                var options=res.data.option_2;
                                  if(res.data.user_option==2){
                                checked="checked";
                              }
                              else{
                                checked="";
                              }                              

                              }
                              if(i==3){
                                var options=res.data.option_3;
                                   if(res.data.user_option==3){
                                checked="checked";
                              }
                              else{
                                checked="";
                              }                              
                              }
                              if(i==4){
                                var options=res.data.option_4;
                                   if(res.data.user_option==4){
                                checked="checked";
                              }
                              else{
                                checked="";
                              }                              
                              }
                                html+='<div class="col-md-6 mb-4">'+
                                                '<div class="radio">'+
                                                  '<label><b>'+i+'&nbsp;&nbsp;</b><input type="radio" name="option_1" class="answer_option" data-question_id='+res.data.id+' data='+i+'   '+(checked!=''?'checked':"")+' >&nbsp;&nbsp;'+options+'</label>'+
                                              '</div>'+
                                              '</div>';
                              
                            }
                          }
                            $('#answer_text').html(html)
                      }

                    })

    }
$('.nextBtn').click(function(){
      showquestions($(this).attr('data-id'));
})

$('.disableBtn').click(function(){
      showquestions($(this).attr('data-id'));
})
$('.question_navigation').click(function(){
      showquestions($(this).attr('data-id'));
})



$('body').on('change','.answer_option',function(){
   var student_id="<?php echo $_SESSION['student_id'] ?>";
                    var exam_subject_id="<?php echo  $id?>";
                    var question_id=$(this).attr('data-question_id');
                    var answer=$(this).attr('data');
                    $.ajax({
                      type:'get',
                      data:{student_id:student_id,answer:answer,exam_subject_id:exam_subject_id,question_id:question_id,action:'answerQuestion' },
                      url:'ajax.php',
                      dataType:'json',
                      success:function(res){

                      }
                    })
})

    $("#exam_timer").TimeCircles({
        "animation": "smooth",
        "bg_width": 1.2,
        "fg_width": 0.1,
        "circle_bg_color": "#eee",
        "time": {
            "Days":
            {
                "show": false
            },
            "Hours":
            {
                "show": false
            },
            "Minutes": {
                "text": "Minutes",
                "color": "#ffc107",
                "show": true
            },
            "Seconds": {
                "text": "Seconds",
                "color": "#007bff",
                "show": true
            }
        }
    });

 
    $("#exam_timer").TimeCircles().addListener(function(unit, value, total) {
        if(total < 1)
        {
            $("#exam_timer").TimeCircles().destroy();
            alert('Exam Time Completed');
            location.href="exam_shedule_detail.php?id=<?php echo $exam_row['exam_id'] ?>";
        }
    });

});
</script>