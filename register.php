<?php
include('./db/registerdBcon.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vending System</title>
    <link rel="stylesheet" href="./static/css/bootstrap.min.css">
    <link rel="stylesheet" href="./static/css/custome.css">
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./fontawesome/css/fontawesome.min.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand text-light fw-bolder fst-italic" href="#">AGENT REGISTRATION</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <!-- <li class="nav-item">
              <a class="nav-link active text-danger fw-bolder ms-md-5" aria-current="page" href="#">ABOUT US</a>
            </li> -->
          </ul>
          <div class="d-flex list-unstyled">
                <a href="./login.php" class=" btn btn-primary rounded-pill me-3">Login</a>
                <a href="./register.php" class="btn btn-success rounded-pill">Register</a>
          </div>
        </div>
      </div>
    </nav>
    <div class="container register">
         <h2 class="text-center text-success">REGISTER WITH US</h2> 
         <hr>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="post" id="regi" class="regi">
                
                <div class="d-flex mb-1">
                    <label for="fname" class="label">First Name</label>
                    <div class="input">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" name="fname" id="fname" placeholder="John" aria-describedby="name" >
                        </div>
                    </div>
                </div>
                <div class="d-flex mb-1">
                    <label for="lname" class="label">Last Name</label>
                    <div class="input">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" id="name" placeholder="Doe" name="lname" aria-describedby="name" >
                        </div>
                    </div>
                </div>
                <div class="d-flex mb-1">
                    <label for="tel" class="label">Tel</label>
                    <div class="input">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-contact-book"></i></span>
                            <input type="text" name="tel" class="form-control" id="tel" placeholder="0734567832" >
                        </div>
                    </div>
                </div>
                <div class="d-flex mb-1">
                    <label for="email" class="label">Email</label>
                    <div class="input">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-mail-forward"></i></span>
                            <input type="text" name="email" class="form-control" id="email" placeholder="johndoe@gmail.com"  >
                        </div>
                    </div>
                </div>
                <div class="d-flex mb-1">
                    <label for="nin" class="label">Nin</label>
                    <div class="input">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                            <input type="text" name="nin" class="form-control" id="nin" placeholder="CMX00023445DX" >
                        </div>
                    </div>
                </div>
                <div class="d-flex mb-1">
                    <label for="referal" class="label">Referal</label>
                    <div class="input">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-refresh"></i></span>
                            <input type="text" name="referal" class="form-control" id="referal" placeholder="90d454" >
                        </div>
                    </div>
                </div>
                <div class="d-flex mb-1">
                    <label for="locality" class="label">Location</label>
                    <div class="input">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-location"></i></span>
                            <input type="text" name="locality" class="form-control" id="locality" placeholder="Banda" >
                        </div>
                    </div>
                </div>
                <div class="d-flex mb-1">
                    <label for="username" class="label">Username</label>
                    <div class="input">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" id="username" placeholder="don3" name="username" >
                        </div>
                    </div>
                </div>
                <div class="d-flex mb-1">
                    <label for="passcode" class="label">Password</label>
                    <div class="input">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-user-lock"></i></span>
                            <input type="text" class="form-control" id="passcode" placeholder="12qE4t" name="passcode">
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <input type="submit" role="button" class="btn px-5 mb-1 rounded-pill bg-primary text-light" href="" value="Register" name="submit">
                </div>
        </form>
    </div>
   <div class="footer bg-dark text-light text-center p-2">&copy 2022 Reserved to BCC powered by @emmaSoft</div>
    <!-- <script src="./static/js/jquery.min.js"></scrip> -->
    <script src="./js/regvalidation.js"></script>
    <script src="./static/js/bootstrap.bundle.min.js"></script>
</body>
</html>