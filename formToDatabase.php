<html>
<body>
  <?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    require 'formHandle.php';

    $userCreated = false;
    $emailwcomma = str_replace(".",",",$_SESSION["newuserinfo"]["email"]);
    $redirectpagename = $_SESSION["newuserinfo"]["user_type"];
    $userInfo = array(
      "dob" => $_SESSION["newuserinfo"]["age"],
      "bus_num" => "N/A",
      "group_num" => "N/A",
      "cabin_num" => "N/A",
      "credit_due" => "N/A"
    );
    function alert($msg) {
      //global $userCreated, $redirectpagename;
      echo "<script type='text/javascript'>
        alert('$msg');
      </script>";
    }
    if($_POST["password"] != $_POST["password2"]) {
      //header("refresh:5; url=localhost:8000/overage_registration.php");
      alert("Retyped password must match password");
      echo "<script>
        setTimeout(function(){window.location.replace('overage_registration.php')},1500);
      </script>";
    }
    else {
      $updateFirebase($emailwcomma, $userInfo, $_POST);
      //header("refresh:5; url=localhost:8000/login.php");
      alert("Your account has been created successfully. Please log in to view your dashboard.");
      echo "<script>
        setTimeout(function(){window.location.replace('login.php')},1500);
      </script>";
    }
  ?>
</body>
</html>
