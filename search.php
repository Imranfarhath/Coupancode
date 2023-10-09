
<?php
include("config.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VV - Voucher Verse</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="icon" href="istockphoto-1478868474-612x612.jpg" type="image">
</head>
<body>
    
    
    <!-----------    Navbar      -------------->

    <div class="container-fluid col-10">
        <nav class="navbar navbar-expand-lg" id="navbar">
            <img src="istockphoto-1478868474-612x612.jpg" width="200" height="200"><h1><a href="index.html" style="text-decoration: none; color: black;">Voucher Verse</a></h1>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                  </svg>

            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html"><b style="color:black;font-size: large;">Home</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.html"><b style="color:black;font-size: large;">About</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=""><b style="color:black;font-size: large;">Search Offers</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logins.php"><b style="color:black;font-size: large;">Login</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php"><b style="color:black;font-size: large;">Register</b></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>


    <div class="modal fade" id="addoffers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Offers</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="savecoupon">
            <div class="modal-body">

                <div id="errorparentsMessage" class="alert alert-warning d-none"></div>
				<div class="mb-3">
					  <label for="email">Email* : </label>
                      <br>
					  <input type="email" name="email" id="email" required>
				</div>
				
				<div class="mb-3">
                    <label for="title">Title* : </label>
                    <br>
                    <input type="text" name="title" id="title" required>
                </div>
				
				<div class="mb-3">
                    <label for="description">Description* : </label>
                    <br>
                    <textarea cols="55" rows="5" name="description" id="description" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="expdate">Expiry Date* : </label>
                    <br>
                    <input type="date" name="expdate" id="expdate" required>
                </div>

                <div class="mb-3">
                    <label for="code">Coupon Code* : </label>
                    <input type="text" name="code" id="code" required>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save details</button>
            </div>
        </form>
        </div>
    </div>
</div>

    <div class="container-fluid col-8" id="ref">
        <h1 style="text-align:center">Offers<button type="button" class="btn btn-primary" style="float:right" data-bs-toggle="modal" data-bs-target="#addoffers">ADD OFFERS</button></h1>
        <?php 
         $query2 = "SELECT * FROM couponcode";
         $query_run2 = mysqli_query($db, $query2);
         
										if(mysqli_num_rows($query_run2) > 0)
										{
											$sn=1;
											foreach($query_run2 as $student2)
											{
                                    ?>

                                                <h2 style="margin-top:5%"><?=$sn.'.'.$student2['title'] ?></h2>
												 <p><?= $student2['description'] ?></p> 
												 <p><b>Expiry Date:</b><?= $student2['expirydate'] ?></p>
												  <p><b>Code:</b><?= $student2['code'] ?></p>
                                                  <button type="button" value="<?=$student2['uid'];?>" class="deletecoupon btn btn-success" style="margin-bottom:5%">
                                                  USED</button>
                                                
										

                                     <?php
                                     $sn=$sn+1;
											}
                            }
                            ?>
</div>

<div class="container-fluid bg-dark text-light" style="bottom:0;width:100%;margin-top:10%">
        <footer style="padding: 5%;margin-left: 30%;" class="col-6">

            <p style="margin-left: 20%;">Last Updated : 11 Aug 2023</p>

            <span style="margin-left: 12%;margin-right: 3%;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
              </svg><a href="" style="text-decoration: none;color: white;"> Facebook</a></span>

              <span style="margin-right: 3%;">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
              </svg><a href="" style="text-decoration: none;color: white;"> Instagram</a>
            </span>

        <span style="margin-right: 3%;">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
              </svg><a href="" style="text-decoration: none;color: white;"> Twitter</a>
            </span>

            <br><br>
            <div style="margin-left:4%;">Copyright &copy; 2023<b>Voucher Verse</b>. All rights reserved.</div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>

$(document).on('submit', '#savecoupon', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_offers", true);
            console.log(formData);
            $.ajax({
                type: "POST",
                url: "code.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorparentsMessage').removeClass('d-none');
                        $('#errorparentsMessage').text(res.message);

                    }else if(res.status == 200){

                        $('#errorparentsMessage').addClass('d-none');
                        $('#addoffers').modal('hide');
                        $('#savecoupon')[0].reset();

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);

                        location.reload();
                        

                    }else if(res.status == 500) {
						$('#errorparentsMessage').addClass('d-none');
                        $('#addoffers').modal('hide');
                        $('#savecoupon')[0].reset();
                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);
                    }
                }
            });

        });	



        $(document).on('click', '.deletecoupon', function (e) {
            e.preventDefault();
                console.log("hii");
                var student_id3 = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: {
                        'delete_coupon': true,
                        'student_id3': student_id3
                    },
                    success: function (response) {

                        var res = jQuery.parseJSON(response);
                        if(res.status == 500) {

                            alert(res.message);
                        }else{
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(res.message);
                            location.reload();
                            //$('#ref').load(location.href + " #ref");
                        }
                    }
                });
        });
    </script>
</body>
</html>