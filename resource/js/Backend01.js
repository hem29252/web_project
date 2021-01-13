                          

                            $(document).ready(function(){
                              
                                $('#insert_auth').click(function(){
                                  $('#form_add_auth').submit();
                                });
  
                                $(".add_data_form_edit").click(function(){
                                  var view_auth_id = $(this).attr('id');
                                  $.ajax({
                                    url: "config/Authorities.php",
                                    method: "POST",
                                    data: {view_auth_id:view_auth_id},
                                    dataType: "json",
                                    success:function(data){
                                      $('#fname').val(data.FirstName);
                                      $('#lname').val(data.LastName);
                                      $('#department').val(data.Department);
                                      $('#tel').val(data.Tel);
                                      $('#fax').val(data.Fax);
                                      $('#email').val(data.Email);
                                      $('#edit_auth_id').val(data.Id);
                                      $('#filename_delete').val(data.image);
                                      $('#edit_image').attr('src','resource/images/upload/'+data.image)
                                    }
                                  });
                                });
  
                                $('#btn_edit_auth').click(function(){
                                  $('#form_editAuth').submit();
                                });
  
                              });
  
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