<?php
   include('config/Works.php');
   $query = $mysql->FetchStarData($con,'works')

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Web Suranaree</title>
    </head>
    <link rel="shortcut icon" href="resource/images/icon.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="resource/css/styles.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
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
              <a href="index.php">หน้าแรก</a>
              <button class="dropdown-btn">เกี่ยวกับเรา
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-container">
                <a href="index.php">บุคลากร</a>
                <a href="page4.php">งานและภาระหน้าที่</a>
              </div>
              <a href="page2.php">ขั้นตอนการดำเนินงาน</a>
              <a href="page3.php">ทำเนียบดุษฎีบัณฑิตกิตติมศักดิ์</a>
               
              <a href="contact.php">ติดต่อเรา</a>
             
              <a href="#contact">กลับสู่หน้าหลัก</a>
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
                           <div class= detail-head> <i class='fas fa-angle-right' style='font-size:24px'></i>&nbsp;&nbsp; <B>มีหน้าที่ในการประสานงานการประชุม</B></div>
                               
                             <div class="detail-content">
                                  <?php 
                                     while($work = $query->fetch_assoc()){
                                  ?>


                                  <button class="accordion"><b><?php echo $work['Name']; ?></b></button>
                                  <div class="panel">
                                  <?php 
                                   $id = $work['Id'];
                                   $query1 = $mysql->ViewByOneColumn($con,'contentofworks','works_id',$id);
                                   while($content = $query1->fetch_assoc()){
                                  ?>
                                    <br>&nbsp;&nbsp;&nbsp;&nbsp;<a href="pdf.php?fielname=resource/pdf/<?php echo $content['PDF'];?>" target="_blank"><?php echo $content['Name'];?></a> <br><br>
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
                        <script>
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