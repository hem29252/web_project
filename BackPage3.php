<?php 
    
    include("config/CheckUser.php");
    include('config/Degree.php');
    $query = $mysql->FetchStarDataOrderByDESC($con,'degree','Dates');
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
                 
                    <div class="content">
                        <br>
                        <div class=head><B>ทำเนียบดุษฎีบัณฑิตกิตติมศักดิ์</B> </div>
                        <div class= detail>
                          <table>
                            <tr> 
                              ส่วนส่งเสริมวิชาการ / งานธุรการและสนับสนุนวิชาการ / <a href="index.html" class="a" target="_blank" >หน้าแรก</a> / <a href="page3.html" class="a1" target="_blank">ทำเนียบดุษฎีบัณฑิตกิตติมศักดิ์</a>
                            </tr>
                           </table>
                           <br/>  <br/>
                           <button class="btn btn-success mb-2" data-toggle="modal" data-target="#add_modal_degree">เพิ่ม</button>
                           <div style="overflow-x:auto;">
                            <div class="table-responsive">
                            <table >
                              <tr>
                                <th class="text-center">ปีการศึกษา</th>
                                <th>รูปภาพ</th>
                                <th class="text-center"> รายนาม </th>
                                <th class="text-center">ชื่อปริญญา</th>
                                <th></th>
                                <th></th>
                              </tr>
                              <?php 
                              while($degree = $query->fetch_assoc()){
                               ?> 
                              <tr>
                                <td><?php echo $degree['Dates']; ?></td>
                                <td><img style="border: solid 1px #f26522;" src="resource/images/upload/<?php echo $degree['image'];?>" width="100px" height="100px"></td>
                                <td style="text-align: left;"><?php echo $degree['FullName']; ?></td>
                                <td><a href="<?php echo $degree['link']; ?>"><?php echo $degree['DegreeName']; ?></a></td>
                                <td>
                                  <button class="btn btn-warning btn_edit_degree" data-toggle="modal" data-target="#edit_modal_degree" id="<?php echo $degree['Id']; ?>">แก้ไข</button>                               
                                </td>
                                <td>
                                <a onclick="return confirm('ลบข้อมูล?')" href="config/Degree.php?check_delete_degree_id=<?php echo $degree['Id'];?>&&delete_image=<?php echo $degree['image']; ?>" class="btn btn-danger text-white"> ลบ </a>
                                </td>
                              </tr>
                              <?php
                               }
                              ?>
                              </table>
                              </div>
                       <!--Modal เพิ่ม-->
                        <div class="modal fade" id="add_modal_degree">
                         <div class="modal-dialog">
                          <div class="modal-content">
                           <div class="modal-header">
                            <h5 class="modal-title" id="1staticBackdropLabel">เพิ่มรายการใหม่</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                            </button>
                           </div>
                           <div class="modal-body">
                            <form id="form_insert_degree" action="config/Degree.php" method="POST" enctype="multipart/form-data">
                             <div class="form-group">
                              <labe>ปีการศึกษา</labe><br/>
                              <input type="text" name="dates" class="form-control w-50" placeholder="พ.ศ."><br/>
                              <hr>
                              <label>รูปภาพ 150 x 250</label><br>
                              <input type="file" name="file">
                              <hr>
                              <labe>ชื่อ-นามสกุล</labe>
                              <input type="text" name="fullname" class="form-control w-100" placeholder="ชื่อ-นามสกุล">
                              <label class="col-form-label">ชื่อปริญญา</label>
                              <textarea class="form-control" name="name_degree" placeholder="ชื่อปริญญา"></textarea>
                              <label class="col-form-label">ลิงค์</label>
                              <input type="text" name="link" placeholder="ใส่ลิงค์ เช่น http://www.domain.com" class="form-control w-100">
                              <input type="hidden" name="check_status_add_degree" value="1">
                             </div>
                            </form>
                           </div>
                           <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                            <button type="button"  class="btn btn-primary" id="btn_add_insert_degree">ตกลง</button>
                           </div>
                          </div>
                         </div>
                        </div>
                        <!---->

                       <!--Modal แก้ไข-->
                       <div class="modal fade" id="edit_modal_degree">
                         <div class="modal-dialog">
                          <div class="modal-content">
                           <div class="modal-header">
                            <h5 class="modal-title" id="1staticBackdropLabel">เพิ่มรายการใหม่</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                            </button>
                           </div>
                           <div class="modal-body">
                            <form id="form_eidt_degree" action="config/Degree.php" method="POST" enctype="multipart/form-data">
                             <div class="form-group">
                              <labe>ปีการศึกษา</labe><br/>
                              <input type="text" name="dates" id="edit_date" class="form-control w-50" ><br/>
                              <input type="hidden" id="filename_delete" name="filename_delete">
                              <labe>รูปภาพ</labe><br>
                              <img id="image_edit" width="95px" height="100px">
                              <input type="file" name="file"><br>
                              <labe>ชื่อ-นามสกุล</labe>
                              <input type="text" name="fullname" class="form-control w-100" id="edit_fullname">
                              <label class="col-form-label">ชื่อปริญญา</label>
                              <textarea class="form-control" name="name_degree" id="edit_degree_name"></textarea>
                              <label class="col-form-label">ลิงค์</label>
                              <input type="text" name="link" placeholder="ใส่ลิงค์ www" id="edit_get_link" class="form-control w-100">
                              <input type="hidden" name="check_status_edit_degree" value="1">
                              <input type="hidden" name="id" id="edit_degree_id">
                             </div>
                            </form>
                           </div>
                           <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
                            <button type="button"  class="btn btn-primary" id="btn_add_edit_degree">ตกลง</button>
                           </div>
                          </div>
                         </div>
                        </div>
                        <!---->
                        
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




                        <script>

                          $(document).ready(function(){
                            
                            $('.btn_edit_degree').click(function(){
                              var check_view_edit_id = $(this).attr('id');
                              $.ajax({
                                url: "config/Degree.php",
                                method: "POST",
                                data: {check_view_edit_id:check_view_edit_id},
                                dataType: "json",
                                success:function(data){
                                  $('#edit_degree_id').val(data.Id);
                                  $('#edit_date').val(data.Dates);
                                  $('#edit_fullname').val(data.FullName);
                                  $('#edit_degree_name').val(data.DegreeName)
                                  $('#edit_get_link').val(data.link)
                                  $('#filename_delete').val(data.image)
                                  $('#image_edit').attr('src',"resource/images/upload/"+data.image)
                                }
                              });
                            });

                            $('#btn_add_insert_degree').click(function(){
                              $('#form_insert_degree').submit();
                            });

                            $('#btn_add_edit_degree').click(function(){
                              $('#form_eidt_degree').submit();
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