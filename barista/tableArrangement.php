<?php

$con = mysqli_connect('localhost:3307', 'root', '', 'coffeeshop');

$que="SELECT * FROM `tables`";
$result = mysqli_query($con, $que);
$result1 = mysqli_query($con, $que);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Baristas Page
  </title>
</head>

<body class="">
  <div class="wrapper " style="background-color:#98aaec;">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo" style="background-color:#b3d8f1;">
        <a href="#" class="simple-text logo-mini">
          
        </a>
        <a href="#" class="simple-text logo-normal">
          
        </a>
      </div>
      <div class="sidebar-wrapper" style="background-color:#b3d8f1;">
        <ul class="nav">
          <li>
            <a href="./orderTable.php" style="background-color:#98aaec;">
              <i class="nc-icon nc-diamond text-light"></i>
              <h4 class="my-0 text-light">Orders</h4>
            </a>
          </li>
          <li class="active">
            <a href="./tableArrangement.php" style="background-color:#98aaec;">
              <i class="nc-icon nc-diamond text-light"></i>
              <h4 class="my-0 text-light">Table Status</h4>
            </a>
          </li>
          <li>
            <a href="./paymentTable.php"  style="background-color:#98aaec;">
              <i class="nc-icon nc-diamond text-light"></i>
              <h4 class="my-0 text-light">Payments</h4>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" style="background-color:#98aaec;">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid col-md-7 ml-1" style="background-color:#f8d560;">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Tables</a>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content" style="background-color:#98aaec;">
        <div class="row">
          <div class="col-md-12">
            <div class="card col-md-7" style="background-color:#f8d560;">
              <div class="card-body">
                <h3 class="table-head">Unoccupied Tables</h3>
                <div class="places-buttons">
                  <div class="row">
                    <div class="col-lg-12">
                      <?php
                        while($rows = mysqli_fetch_assoc($result))
                        {
                          if($rows['availability']=="Unoccupied"){
                      ?>
                            <h2 class="btn btn-success"><?php echo $rows['table_no']; ?></h2>
                      <?php
                          }
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card col-md-7" style="background-color:#f8d560;">
              <div class="card-body">
                <h3 class="table-head">Occupied Tables</h3>
                <div class="places-buttons">
                  <div class="row">
                    <div class="col-lg-12">
                      <?php
                        while($rows1 = mysqli_fetch_assoc($result1))
                        {
                          if($rows1['availability']=="Occupied"){
                      ?>
                            <h2 class="btn btn-danger"><?php echo $rows1['table_no']; ?></h2>
                      <?php
                          }
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    function SelectText(element) {
      var doc = document,
        text = element,
        range, selection;
      if (doc.body.createTextRange) {
        range = document.body.createTextRange();
        range.moveToElementText(text);
        range.select();
      } else if (window.getSelection) {
        selection = window.getSelection();
        range = document.createRange();
        range.selectNodeContents(text);
        selection.removeAllRanges();
        selection.addRange(range);
      }
    }
    window.onload = function() {
      var iconsWrapper = document.getElementById('icons-wrapper'),
        listItems = iconsWrapper.getElementsByTagName('li');
      for (var i = 0; i < listItems.length; i++) {
        listItems[i].onclick = function fun(event) {
          var selectedTagName = event.target.tagName.toLowerCase();
          if (selectedTagName == 'p' || selectedTagName == 'em') {
            SelectText(event.target);
          } else if (selectedTagName == 'input') {
            event.target.setSelectionRange(0, event.target.value.length);
          }
        }

        var beforeContentChar = window.getComputedStyle(listItems[i].getElementsByTagName('i')[0], '::before').getPropertyValue('content').replace(/'/g, "").replace(/"/g, ""),
          beforeContent = beforeContentChar.charCodeAt(0).toString(16);
        var beforeContentElement = document.createElement("em");
        beforeContentElement.textContent = "\\" + beforeContent;
        listItems[i].appendChild(beforeContentElement);

        //create input element to copy/paste chart
        var charCharac = document.createElement('input');
        charCharac.setAttribute('type', 'text');
        charCharac.setAttribute('maxlength', '1');
        charCharac.setAttribute('readonly', 'true');
        charCharac.setAttribute('value', beforeContentChar);
        listItems[i].appendChild(charCharac);
      }
    }
  </script>
</body>

</html>