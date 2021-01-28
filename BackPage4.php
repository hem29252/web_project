<?php
   
   include("config/CheckUser.php");
   include('config/Works.php');
   $query = $mysql->FetchStarData($con,'works')

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Web Suranaree</title>
        <link rel="shortcut icon" href="resource/images/icon.png" type="image/x-icon">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="resource/css/styles.css">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>

    <body>
        <div class=header>
          <div class="text-image">
            <img src="resource/images/sut.jpg" width="100%" height="460px">
            <div class="centered">งานธุรการและสนับสนุนวิชาการ</div>
            </div>
          </div>
          <div class=menu>
              <div class="head-menu">
                งานธุรการและสนับสนุนวิชาการ
              </div>
                <a href="Backend01.php">หน้าแรก</a>
                <button class="dropdown-btn">เกี่ยวกับเรา
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-container">
                  <a href="Backend01.php">บุคลากร</a>
                  <a href="BackPage4.php">งานและภาระหน้าที่</a>
                </div>
                <a href="BackPage2.php">ขั้นตอนการดำเนินงาน</a>
                
                <a href="BackPage3.php">ทำเนียบดุษฎีบัณฑิตกิตติมศักดิ์</a>
                  <a href="BackContact.php">ติดต่อเรา</a>
               
                  <a href="config/logout.php">ออกจากระบบ</a>
             </div>
                 
                    <div class=content>
                        <br>
                        <div class=head><B>งานและภาระหน้าที่</B> </div>
                        <div class= detail>
                          <table>
                            <tr> 
                              ส่วนส่งเสริมวิชาการ / งานธุรการและสนับสนุนวิชาการ / <a href="index.html" class="a" target="_blank" >หน้าแรก</a> / <a href="work.html" class="a1" target="_blank">งานและภาระหน้าที่</a>
                            </tr>
                           </table>
                           <br><br>
                           <div class="detail-head1"> <i class='fas fa-angle-right' style='font-size:16px;'></i>&nbsp;&nbsp; <B style="font-size: 17px;">มีหน้าที่ในการประสานงานการประชุม</B></div>
                             
                             <br/>
                             <button class="btn btn-success" data-toggle="modal" data-target="#add_modal_work">เพิ่ม</button>
                             <div class="detail-content">
                                  <?php 
                                     while($work = $query->fetch_assoc()){
                                  ?>
                                  <button class="btn btn-warning btn_edit_works" id="<?php echo $work['Id'];?>" data-toggle="modal" data-target="#edit_modal_works">แก้ไข</button>
                                  <a href="config/Works.php?check_delete_id=<?php echo $work['Id'];?>" onclick="return confirm('ลบข้อมูล?');" class="btn btn-danger text-white">ลบ</a>
                                  <button class="accordion"><b><?php echo $work['Name']; ?></b></button>
                                  <div class="panel">
                                  <br>
                                  &nbsp;&nbsp;&nbsp;
                                  <button class="btn btn-success btn_add_contentOfworks" id="<?php echo $work['Id'];?>" data-toggle="modal" data-target="#add_modal_contentOfworks">เพิ่ม</button>
                                  <br>
                                  <?php 
                                   $id = $work['Id'];
                                   $query1 = $mysql->ViewByOneColumn($con,'contentofworks','works_id',$id);
                                   while($content = $query1->fetch_assoc()){
                                  ?>
                                    <br>
                                    <div style="margin-left: 5%;">
                                    <button class="btn btn-warning btn_edit_ContentOfWorks" id="<?php echo $content['Id'];?>" data-toggle="modal" data-target="#edit_modal_contentofwork">แก้ไข</button>
                                    <a href="config/ContentOfWork.php?check_delete_contentofwork_id=<?php echo $content['Id'];?>&&file_deletename=<?php echo $content['PDF'];?>" class="btn btn-danger text-white" onclick="return confirm('ลบข้อมูล?');">ลบ</a>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="pdf.php?fielname=resource/pdf/<?php echo $content['PDF'];?>" target="_blank"><?php echo $content['Name'];?></a> <br>
                                   </div>
                                  <?php } ?><br>
                                  </div>
                                  <?php 
                                     }
                                  ?>
                            </div>

                        </div>
                        <div class=images-detail>
                            <img src="resource/images/sut1.jpg" width="50%">
                        </div>
                    </div>
                    <div class=static>
                        </div>
                           <!-- <div class="footer">
                          <div class="contact-1">
                              <b>ติดต่อ งานสภาวิชาการ</b>
                              <div class="detail-contact-1">
                                 อาคารบริหาร ชั้น 2 111 มหาวิทยาลัยเทคโนโลยีสุรนารี<br>
                                 ถ.มหาวิทยาลัย ต.สุรนารี อ.เมือง จ.นครราชสีมา 30000
                                </div>
                          </div>
                        </div>-->

                        <!--Modal เพิ่มรายการหลัก-->
                        <div class="modal fade" id="add_modal_work">
                         <div class="modal-dialog">
                          <div class="modal-content">
                           <div class="modal-header">
                            <h5 class="modal-title" id="1staticBackdropLabel">เพิ่มรายการใหม่</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                            </button>
                           </div>
                           <div class="modal-body">
                            <form id="form_insert_work" action="config/Works.php" method="POST">
                             <div class="form-group">
                              <label class="col-form-label">ชื่อรายการ</label>
                              <textarea class="form-control" name="name" ></textarea>
                              <input type="hidden" name="check_status_add_work" value="1">
                             </div>
                            </form>
                           </div>
                           <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                            <button type="button"  class="btn btn-primary" id="btn_add_insert_work">ตกลง</button>
                           </div>
                          </div>
                         </div>
                        </div>

                        <!--Modal แก้ไขรายการหลัก-->
                        <div class="modal fade" id="edit_modal_works">
                         <div class="modal-dialog">
                          <div class="modal-content">
                           <div class="modal-header">
                            <h5 class="modal-title" id="1staticBackdropLabel">แก้ไข</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                            </button>
                           </div>
                           <div class="modal-body">
                            <form id="form_edit_work" action="config/Works.php" method="POST">
                             <div class="form-group">
                              <label  class="col-form-label">ชื่อรายการ</label>
                              <textarea class="form-control" name="name" id="get_text_edit_work_name"></textarea>
                              <input type="hidden" value="1" name="check_status_edit_work"/>
                              <input type="hidden" id="set_id_edit_work" name="id"/>
                             </div>
                            </form>            
                           </div>
                           <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                            <button type="button" id="btn_edit_work" class="btn btn-primary">ตกลง</button>
                           </div>
                          </div>
                         </div>
                        </div>

                        <!--Modal เพิ่มรายการย่อย-->
                        <div class="modal fade" id="add_modal_contentOfworks">
                         <div class="modal-dialog">
                          <div class="modal-content">
                           <div class="modal-header">
                            <h5 class="modal-title" id="1staticBackdropLabel">เพิ่มรายการใหม่</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                            </button>
                           </div>
                           <div class="modal-body">
                            <form id="form_insert_Content" action="config/ContentOfWork.php" method="POST" enctype="multipart/form-data">
                             <div class="form-group">
                              <label class="col-form-label">ชื่อรายการ</label>
                              <textarea class="form-control" name="name" ></textarea>
                              <label class="col-form-label">ไฟล์ PDF</label><br>
                              <input type="file" name="file" id="file" class="from-control">
                              <input type="hidden" name="work_id" id="work_id">
                              <input  type="hidden" value="1" name="chcek_status_insert_contentofwork">
                             </div>
                            </form>
                           </div>
                           <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                            <button type="button" id="btn_insert_contentofwork"  class="btn btn-primary">ตกลง</button>
                           </div>
                          </div>
                         </div>
                        </div>

                        <!--Modal แก้ไขรายการย่อย-->
                        <div class="modal fade" id="edit_modal_contentofwork">
                         <div class="modal-dialog">
                          <div class="modal-content">
                           <div class="modal-header">
                            <h5 class="modal-title" id="1staticBackdropLabel">แก้ไข</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                            </button>
                           </div>
                           <div class="modal-body">
                            <form id="form_edit_Contentofwork" action="config/ContentOfWork.php" method="POST" enctype="multipart/form-data">
                             <div class="form-group">
                              <label for="message-text" class="col-form-label">ชื่อรายการ</label>
                              <textarea class="form-control" name="name" id="text_name_edit_contentofwork"></textarea>
                              <label class="col-form-label">ไฟล์ PDF</label><br>
                              <p id="pdf_name"></p>
                              <input type="file" name="file" id="file" class="from-control">
                              <input type="hidden" name="id" id="edit_contentofwork_id">
                              <input type="hidden" name="delete_file" id="edit_pdf_name">
                              <input type="hidden" name="check_status_edit_contentofwork" value="1">
                             </div>
                            </form>
                           </div>
                           <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                            <button type="button" id="btn_edit_contentofwork"  class="btn btn-primary">ตกลง</button>
                           </div>
                          </div>
                         </div>
                        </div>
                        
                        <script>

                          $(document).ready(function(){
                            $('.btn_edit_works').click(function(){
                              var chek_view_works_id = $(this).attr('id');
                              $.ajax({
                                url: "config/Works.php",
                                method: "POST",
                                data:  {chek_view_works_id:chek_view_works_id},
                                dataType: "json",
                                success:function(data){
                                  $('#set_id_edit_work').val(data.Id);
                                  $('#get_text_edit_work_name').val(data.Name);
                                }
                              });
                            });

                            $('.btn_edit_ContentOfWorks').click(function(){
                              var check_view_contentofwork_id = $(this).attr('id');
                              $.ajax({
                                url: "config/ContentOfWork.php",
                                method: "POST",
                                data: {check_view_contentofwork_id:check_view_contentofwork_id},
                                dataType: "json",
                                success:function(data){
                                  $('#text_name_edit_contentofwork').val(data.Name);
                                  $('#edit_contentofwork_id').val(data.Id);
                                  $('#edit_pdf_name').val(data.PDF);
                                  $('#pdf_name').text(data.PDF);
                                }
                              });
                            });

                            $('.btn_add_contentOfworks').click(function(){
                              var id = $(this).attr('id');
                              $('#work_id').val(id);
                            });

                            $('#btn_add_insert_work').click(function(){
                              $('#form_insert_work').submit();
                            });

                            $('#btn_edit_work').click(function(){
                              $('#form_edit_work').submit();
                            });

                            $('#btn_insert_contentofwork').click(function(){
                              $('#form_insert_Content').submit();
                            });

                            $('#btn_edit_contentofwork').click(function(){
                              $('#form_edit_Contentofwork').submit();
                            });

                          });

                          var acc = document.getElementsByClassName("accordion");
                          var a;
                          
                          for (a = 0; a < acc.length; a++) {
                            acc[a].addEventListener("click", function() {
                              this.classList.toggle("active1");
                              var panel = this.nextElementSibling;
                              if (panel.style.maxHeight) {
                                panel.style.maxHeight = null;
                              } else {
                                panel.style.maxHeight = panel.scrollHeight + "px";
                              } 
                            });
                          }
                          </script>
                           <script>
                            var dropdown = document.getElementsByClassName("dropdown-btn");
                            var i;
                            
                            for (i = 0; i < dropdown.length; i++) {
                              dropdown[i].addEventListener("click", function() {
                              this.classList.toggle("active");
                              var dropdownContent = this.nextElementSibling;
                              if (dropdownContent.style.display === "block") {
                              dropdownContent.style.display = "none";
                              } else {
                              dropdownContent.style.display = "block";
                              }
                              });
                            }
                            </script>
 
    </body>
    </html>
    <?php $mysql->CloseDb($con);?>