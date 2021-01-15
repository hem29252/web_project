<?php 
    include("config/CheckUser.php");
    include('config/Operation.php');
    $query1 = $mysql->FetchStarData($con,'operation');
 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Web Suranaree</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="shortcut icon" href="resource/images/icon.png" type="image/x-icon">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="resource/css/styles.css">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    </head>
    <body>
        <div class=header>
          <div class="text-image">
            <img src="resource/images/sut.jpg" width="100%" height="460px">
            <div class="centered">งานโครงการและกิจกรรมทางวิชาการ</div>
            </div>
          </div>
          <div class=menu>
              <div class="head-menu">
                งานโครงการและกิจกรรมทางวิชาการ
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
                        <div class=head><B>ขั้นตอนการดำเนินงาน</B> </div>
                        <div class=detail>
                          <table>
                            <tr> 
                              ส่วนส่งเสริมวิชาการ / งานธุรการและสนับสนุนวิชาการ / <a href="index.html" class="a" target="_blank" >หน้าแรก</a> / <a href="page2.html" class="a1" target="_blank">ขั้นตอนการดำเนินงาน</a>
                            </tr>
                           </table>
                            <br/>
                            <button class="btn btn-success " data-toggle="modal" data-target="#add_modal_operation">เพิ่มรายการใหม่</button>
                             <div class="detail-content" style="word-wrap: break-word;">
                               <?php
                                 while($opera = $query1->fetch_assoc()){
                               ?>
                                  <button class="btn btn-warning btn_edit_operation" id="<?php echo $opera['Id'];?>" data-toggle="modal" data-target="#edit_modal_operation">แก้ไข</button>
                                  <a onclick="return confirm('ลบข้อมูล?')" class="btn btn-danger text-white" href="config/Operation.php?delete_operation_id=<?php echo $opera['Id'];?>">ลบ</a>
                                  <button class="accordion">
                                   <b><?php echo $opera['Name']; ?></b>
                                  </button>
                                  <div class="panel">
                                  <br>
                                  &nbsp;&nbsp;<button class="btn btn-success btn_add_content" data-toggle="modal" id="<?php echo $opera['Id'];?>" data-target="#add_modal_contentOfoperation">เพิ่มรายการใหม่</button><br/><br/>
                                  <?php 
                                    $query2 = $mysql->ViewByOneColumn($con,'contentofoperation','operation_id',$opera['Id']);
                                    while($content = $query2->fetch_assoc()){
                                  ?>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button class="btn btn-warning btn_edit_content" id="<?php echo $content['Id']; ?>"  data-toggle="modal" data-target="#edit_modal_contentOfoperation">แก้ไข</button>
                                    <a onclick="return confirm('ลบข้อมูล?')" class="btn btn-danger text-white" href="config/Content.php?delete_content_id=<?php echo $content['Id']; ?>&&filename_delete=<?php echo $content['PDF']; ?>">ลบ</a>&nbsp;&nbsp;&nbsp;
                                    <a target="_blank" href="pdf.php?fielname=<?php echo "resource/pdf/".$content['PDF']; ?>"><?php echo $content['Name']; ?></a> <br><br> 
                                    <?php } ?>
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
                        <div class="modal fade" id="add_modal_operation">
                         <div class="modal-dialog">
                          <div class="modal-content">
                           <div class="modal-header">
                            <h5 class="modal-title" id="1staticBackdropLabel">เพิ่มรายการใหม่</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                            </button>
                           </div>
                           <div class="modal-body">
                            <form id="form_insert_oparation" action="config/Operation.php" method="POST">
                             <div class="form-group">
                              <label class="col-form-label">ชื่อรายการ</label>
                              <textarea class="form-control" name="name" ></textarea>
                              <input type="hidden" name="check_status_add_operation" value="1">
                             </div>
                            </form>
                           </div>
                           <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                            <button type="button"  class="btn btn-primary" id="btn_add_insert_operation">ตกลง</button>
                           </div>
                          </div>
                         </div>
                        </div>

                        <!--Modal แก้ไขรายการหลัก-->
                        <div class="modal fade" id="edit_modal_operation">
                         <div class="modal-dialog">
                          <div class="modal-content">
                           <div class="modal-header">
                            <h5 class="modal-title" id="1staticBackdropLabel">แก้ไข</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                            </button>
                           </div>
                           <div class="modal-body">
                            <form id="form_edit_oparation" action="config/Operation.php" method="POST">
                             <div class="form-group">
                              <label for="message-text" class="col-form-label">ชื่อรายการ</label>
                              <textarea class="form-control" name="name" id="get_text_edit_operation_name"></textarea>
                              <input type="hidden" value="1" name="check_status_edit_operation"/>
                              <input type="hidden" id="set_id_edit_operation" name="id"/>
                             </div>
                            </form>            
                           </div>
                           <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                            <button type="button" id="btn_edit_operation" class="btn btn-primary">ตกลง</button>
                           </div>
                          </div>
                         </div>
                        </div>

                        <!--Modal เพิ่มรายการย่อย-->
                        <div class="modal fade" id="add_modal_contentOfoperation">
                         <div class="modal-dialog">
                          <div class="modal-content">
                           <div class="modal-header">
                            <h5 class="modal-title" id="1staticBackdropLabel">เพิ่มรายการใหม่</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                            </button>
                           </div>
                           <div class="modal-body">
                            <form id="form_insert_Content" action="config/Content.php" method="POST" enctype="multipart/form-data">
                             <div class="form-group">
                              <label for="message-text" class="col-form-label">ชื่อรายการ</label>
                              <textarea class="form-control" name="name" ></textarea>
                              <label class="col-form-label">ไฟล์ PDF</label><br>
                              <input type="file" name="file" id="file" class="from-control">
                              <input type="hidden" name="operation_id" id="operation_id">
                              <input  type="hidden" value="1" name="chcek_status_insert_content">
                             </div>
                            </form>
                           </div>
                           <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                            <button type="button" id="btn_insert_content"  class="btn btn-primary">ตกลง</button>
                           </div>
                          </div>
                         </div>
                        </div>

                        <!--Modal แก้ไขรายการย่อย-->
                        <div class="modal fade" id="edit_modal_contentOfoperation">
                         <div class="modal-dialog">
                          <div class="modal-content">
                           <div class="modal-header">
                            <h5 class="modal-title" id="1staticBackdropLabel">แก้ไข</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                            </button>
                           </div>
                           <div class="modal-body">
                            <form id="form_edit_Content" action="config/Content.php" method="POST" enctype="multipart/form-data">
                             <div class="form-group">
                              <label for="message-text" class="col-form-label">ชื่อรายการ</label>
                              <textarea class="form-control" name="name" id="text_name_edit_content"></textarea>
                              <label class="col-form-label">ไฟล์ PDF</label><br>
                              <p id="pdf_name"></p>
                              <input type="file" name="file" id="file" class="from-control">
                              <input type="hidden" name="id" id="edit_content_id">
                              <input type="hidden" name="delete_file" id="edt_pdf_name">
                              <input type="hidden" name="check_status_edit_content" value="1">
                             </div>
                            </form>
                           </div>
                           <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                            <button type="button" id="btn_edit_content"  class="btn btn-primary">ตกลง</button>
                           </div>
                          </div>
                         </div>
                        </div>

                        <script>

                          $(document).ready(function(){
                              $('.btn_edit_operation').click(function(){
                                  var check_edit_operation_id = $(this).attr('id');
                                  $.ajax({
                                      url: "config/Operation.php",
                                      method: "POST",
                                      data: {check_edit_operation_id:check_edit_operation_id},
                                      dataType: "json",
                                      success:function(data){
                                          $('#set_id_edit_operation').val(data.Id);
                                          $('#get_text_edit_operation_name').val(data.Name);
                                      }
                                  }); 
                              });

                              $('.btn_edit_content').click(function(){
                                  var check_edit_content_id = $(this).attr('id');
                                  $.ajax({
                                      url: "config/Content.php",
                                      method: "POST",
                                      data: {check_edit_content_id:check_edit_content_id},
                                      dataType: "json",
                                      success:function(data){
                                          $('#text_name_edit_content').val(data.Name);
                                          //$('#set_id_edit_operation').val(data.Id);
                                          $('#pdf_name').text(data.PDF);
                                          $('#edit_content_id').val(data.Id);
                                          $('#edt_pdf_name').val(data.PDF)
                                      } 
                                  });
                              });

                              $('#btn_add_insert_operation').click(function(){
                                  $('#form_insert_oparation').submit();
                              });

                              $('#btn_edit_operation').click(function(){
                                $('#form_edit_oparation').submit();
                              });

                              $('.btn_add_content').click(function(){
                                var id = $(this).attr('id');
                                $('#operation_id').val(id);
                              });

                              $('#btn_insert_content').click(function(){
                                $('#form_insert_Content').submit();
                              });

                              $('#btn_edit_content').click(function(){
                                $('#form_edit_Content').submit();
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