<!DOCTYPE html>
<html>
    <head>
      <title>Web Suranaree</title>
        
    </head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="resource/css/styles.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="shortcut icon" href="resource/images/icon.png" type="image/x-icon">
    <body>
        <div class=header>
          <div class="text-image">
            <img src="resource/images/sut.jpg" width="100%">
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
                  <a href="Page4.php">งานและภาระหน้าที่</a>
                </div>
                <a href="page2.php">ขั้นตอนการดำเนินงาน</a>
                
                <a href="page3.php">ทำเนียบดุษฎีบัณฑิตกิตติมศักดิ์</a>
                  <a href="contact.php">ติดต่อเรา</a>
               
                <a href="#contact">กลับสู่หน้าหลัก</a>
             </div>
                 
                    <div class=content>
                      <div class=head><B>ติดต่อเรา</B></div>
                      <div class= detail>
                      <table>
                        <tr> 
                          ส่วนส่งเสริมวิชาการ / งานธุรการและสนับสนุนวิชาการ / <a href="index.html" class="a" target="_blank" >หน้าแรก</a> / <a href="page4.html" class="a1" target="_blank">ติดต่อเรา</a>
                        </tr>
                       </table>
                       <br/>
                       <table border="0">
                         <tr>
                           <td >

                            <img src="resource/images/map.png" style="width: 300px;">
                           </td>
                             <td class="con">
                              งานธุรการและสนับสนุนวิชาการ ส่วนส่งเสริมวิชาการ <br/>

                              ชั้น 2 อาคารบริหาร มหาวิทยาลัยเทคโนโลยีสุรนารี<br/>
                              
                              111 ถนนมหาวิทยาลัย ตำบลสุรนารี อำเภอเมือง จังหวัดนครราชสีมา<br/>
                              
                              โทรศัพท์ : 0-4422-4029 โทรสาร : 0-4422-4040<br/>
                              
                              e-mail : thipsuda@sut.ac.th<br/>
                           </td>
                         </tr>
                       </table>
                    </div>
                    <div class=static>
                        </div>
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