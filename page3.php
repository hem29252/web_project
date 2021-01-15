<?php 
    include('config/Degree.php');
    $query = $mysql->FetchStarDataOrderByDESC($con,'degree','Dates');
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
            <div class="centered">งานโครงการและกิจกรรมทางวิชาการ</div>
            </div>
          </div>
          <div class=menu>
            <div class="head-menu">
              งานโครงการและกิจกรรมทางวิชาการ
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
                        <div class=head><B>ทำเนียบดุษฎีบัณฑิตกิตติมศักดิ์</B> </div>
                        <div class= detail>
                          <table>
                            <tr> 
                              ส่วนส่งเสริมวิชาการ / งานโครงการและกิจกรรมทางวิชาการ / <a href="index.html" class="a" target="_blank" >หน้าแรก</a> / <a href="page3.html" class="a1" target="_blank">ทำเนียบดุษฎีบัณฑิตกิตติมศักดิ์</a>
                            </tr>
                           </table>
                           <br/>  <br/>
                           <div style="overflow-x:auto;">
                            <table >
                              <tr>
                                <th>ปีการศึกษา</th>
                                <th> รายนาม </th>
                                <th>ชื่อปริญญา</th>
                              </tr>
                              <?php 
                              while($degree = $query->fetch_assoc()){
                               ?>
                              <tr>
                                <td><?php echo $degree['Dates']; ?></td>
                                <td><img src="resource/images/upload/<?php echo $degree['FullName'];?>"></td>
                                <td style="text-align: left;"><?php echo $degree['image']; ?></td>
                                <td><a href="<?php echo $degree['link']; ?>"><?php echo $degree['DegreeName']; ?></a></td>
                              </tr>
                              <?php
                               }
                              ?>
                              </table>
                        
                             
                        
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