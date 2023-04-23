<!DOCTYPE html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS is installed already if you know how to use Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <!-- Bootstrap Font Icon CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
      <link rel = "stylesheet" href="style.css">
      <link rel = "shortcut icon" type = "x-icon" href="../images/superIcon.png">
    <title>Mag Comic Expo</title>
</head>
<body>
<!-- My attempt at PHP, but I've had trouble testing to see if it will work since my macbook is having trouble simulating a live
server that is needed.-->
<?php 

   if(!empty($_POST["submitForm"])){
    $firstName = $_POST["firstName"];
    $lastName  = $_POST["lastName"];
    $businessName = $_POST["businessName"];
    $phoneNum = $_POST["phoneNum"];
    $requestArea = $_POST["requestArea"];
    $toEmail = "#"; // just replace the hashtag with the Expo's main email address here.

    $mailHeaders = "First Name: " . $firstName .
	"\r\n Last Name: ". $lastName  . 
	"\r\n Business Name: ". $businessName  . 
  "\r\n Phone Number: ". $phoneNum .
	"\r\n Help Message: " . $requestArea . "\r\n";


  if(mail($toEmail, $firstName, $lastName, $mailHeaders)) {
    $message = "Your help request has been received successfully.";
}
   }
    ?>


    <!--This will control the navbar-->
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <img class="d-inline-block align-top" src="../images/superIcon.png" id="NavIcon">
        <a class="navbar-brand" href="../Home page V2(current)/index.html">Mag Expo</a>  
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#superNav" aria-controls="superNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"><i class="bi bi-caret-down-fill"></i></span>
        </button>    
        <div class="collapse navbar-collapse" id = "superNav">
          <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="../Home page V2(current)/index.html">Home</a>
            <a class="nav-link" href="../Blog Page(current)/blogPage.html">Blog</a>
            <a class="nav-link" href="../Contact Page/contact.html">Contact</a>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item text-primary" href= "../Gallery(current)/gallery.html">Gallery</a></li>
                  <li><a class="dropdown-item text-primary" href="../About Us/about.html">About Us</a></li>
                  <li><a class="dropdown-item text-primary" href="../Partners/partner.html">Partners</a></li>
                </ul>
              </li>
            </ul>
          </div>
            <a href="../signInPg/signIn.html" class="btn" id = "signInBtn">Sign In</a>
            <a href="../signUpPg/signUp.html" class="btn" id = "signUpBtn">Sign Up</a>
        </div>
      </div>
      </nav>

<!-- This section will cover a quick form that will email a response to the organizers from whoever requests help -->

<div class="container mt-5">
  <h1 style="text-align: center;">We're happy to help.</h1>
  <!-- this is the form elelment. Replace the # in the action part to get the desired effect. -->
  <form class="row g-3" method="POST" name="helpForm">
    <div class="col-md-6">
    <i class="bi bi-person-circle"></i>  <label for = "firstName" class="form-label">First Name</label>
      <input type="text" class="form-control" name ="firstName" id = "firstName" required>
    </div>
    <div class="col-md-6">
    <i class="bi bi-people-fill"></i> <label for = "lastName" class="form-label">Last Name</label>
      <input type="text" class="form-control" name = "lastName" id = "lastName" required>
    </div>
    <div class="col-md-6">
    <i class="bi bi-building-fill"></i> <label for = "businessName" class="form-label">Business Name</label>
      <input type="text" class="form-control" name = "businessName" id = "businessName" required>
    </div>
    <div class="col-md-4">
    <i class="bi bi-hash"></i>  <label for = "phoneNum" class="form-label">Phone Number</label>
      <input type="text" class="form-control" name = "phoneNum" id = "phoneNum" required placeholder="555-555-5555">
    </div>
    <div class="col-md-12">
      <label for="requestArea">Help Area</label>
      <textarea class="form-control" name="requestArea" id="requestArea" rows="4" placeholder="What seems to be the problem?"></textarea>
    </div>
    <div class="d-grid gap-2 col-6 mx-auto">
      <button class="btn btn-warning" type="submit" name = "submitForm" id = "submitForm">Submit</button>
      <?php if (! empty($message)) {?>
      <div class='success'>
        <strong><?php echo $message; ?>	</strong>
      </div>
      <?php } ?>
    </div>
  </form>
</div>


    <footer class="container-fluid text-center">
      <a href="#">Social media links maybe.</a>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</body>
</html>