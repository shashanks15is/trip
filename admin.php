<?php session_start(); ?>
<!DOCTYPE html>
<html>

<!-- Mirrored from sindevo.com/blix/blix-main/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 23 Mar 2018 15:54:31 GMT -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="apple-touch-icon" href="images/apple-touch-icon.png" />
<link href="images/apple-touch-startup-image-320x460.png" media="(device-width: 320px)" rel="apple-touch-startup-image">
<link href="images/apple-touch-startup-image-640x920.png" media="(device-width: 320px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
<title>Class ISE Trip</title>
<link rel="stylesheet" href="css/framework7.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link type="text/css" rel="stylesheet" href="css/swipebox.css" />
<link type="text/css" rel="stylesheet" href="css/animations.css" />
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,900" rel="stylesheet"> 

<script type="text/javascript">
  function display()
  {
    alert("Coming Soon......!!")
  }

  
  if(!(localStorage['login']=="success")){
        window.location.replace("index.html");
    }
    function signout(){
      localStorage.removeItem("login");
      window.location.replace("index.html");
    }
</script>

<!-- piechart -->
<script type="text/javascript">
window.onload = function () {
                $.ajax({
                    url:"strength.php",
                    type:"post",
                    data:{
                        "str":"strength"
                    },
                    success:function(data){
                      var obj=JSON.parse(data);
                      var m,g;
                      $.each(obj,function(index,value){
                        m=value.male;
                        g=value.female;});
                      $("#m").append(m);
                      $("#f").append(g);
                      var chart = new CanvasJS.Chart("chartContainer",
                     {
                        title:{
                        text: "Total People Strength"
                        },
                        legend: {
                          maxWidth: 350,
                          itemWidth: 120
                        },
                        data: [
                        {
                          type: "pie",
                          showInLegend: true,
                          legendText: "{indexLabel}",
                          dataPoints: [
                          { y: g, indexLabel: "Girls" },
                          { y: m, indexLabel: "Boys" },
                          ]
                        }
                              ]
                    }); 
                    chart.render();
                    }
                });  
            }
</script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>
<body id="mobile_wrap">
  <?php
mysql_connect("localhost","root") or die(mysql_error());
mysql_select_db("trip") or die(mysql_error());
?>
<div class="statusbar-overlay"></div>
  <div class="panel-overlay"></div>
  <div class="pages">
    <div class="page no-toolbar no-navbar">
      <div class="page-content">
        <div class="navbarpages navbarpagesbg">
          <div class="navbar_left">
            <div class="logo_text"><a href="index-2.html">Administrator</a></div>
          </div>
          <div class="navbar_right">
            <a href="#" data-panel="right" class="open-panel"><img src="images/icons/white/user.png" alt="" title="" /></a>
          </div>                
        </div>

    <div class="panel panel-right panel-reveal">
      <div class="user_login_info">        
                  <nav class="user-nav">
                    <ul>
                      <li><a href="features.html" class="close-panel"><img src="images/icons/white/settings.png" alt="" title="" /><span>Settings</span></a></li>
                      <li><a href="#" class="close-panel"><img src="images/icons/white/briefcase.png" alt="" title="" /><span>Total Strength</span></a></li>
                      <li><a href="list.php" class="close-panel"><img src="images/icons/white/message.png" alt="" title="" /><span>Class List</span><strong>12</strong></a></li>
                      <li><a href="?????" class="close-panel"><img src="images/icons/white/love.png" alt="" title="" /><span>Final List</span><strong>5</strong></a></li>
                      <li><a href="index-2.html" onclick="signout()" class="close-panel"><img src="images/icons/white/lock.png" alt="" title="" /><span>Logout</span></a></li>
                    </ul>
                  </nav>
      </div>
    </div><br><br><br><br>

    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
    <div style="margin-top: 20px;">
      <center><button id="m" type="button" style="margin-bottom: 20px;" class="btn btn-primary btn-lg"></button></center>
      <center><button id="f" type="button" class="btn btn-danger btn-lg"></button></center>
    </div>

    
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js" ></script>
<script type="text/javascript" src="js/framework7.js"></script>
<script type="text/javascript" src="js/jquery.swipebox.js"></script>
<script type="text/javascript" src="js/jquery.fitvids.js"></script>
<script type="text/javascript" src="js/email.js"></script>
<script type="text/javascript" src="js/audio.min.js"></script>
<script type="text/javascript" src="js/my-app.js"></script>
  </body>

</html>