<?php session_start(); ?>
<?php
mysql_connect("localhost","root") or die(mysql_error());
mysql_select_db("trip") or die(mysql_error());

$user=$_SESSION['username'];
$api=mysql_query("select * from admin where user='".$user."' ");
$key=mysql_fetch_row($api);

$query=mysql_query("select * from strength");
$row=mysql_fetch_row($query);

?> 
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
<script type="text/javascript">
  window.onload = function() {
  filter1("list")
};

  var key="<?php echo $key[3]; ?>";
  function filter1(str) {
   if(str){
                 
                $.ajax({
                    url:"strength.php",
                    type:"post",
                    data:{
                        "str":str
                    },
                    success:function(data){
                        var obj=JSON.parse(data);
                        var table_content=""
                        $('#list').find( 'tr:not(:first)' ).remove();
                        $.each(obj,function(index,value){
                            table_content+="<tr>";
                            table_content+="<td contenteditable=\"true\"><center>"+value.name+"</center></td>";
                            table_content+="<td contenteditable=\"true\"><center>"+value.phone+"</center></td>";
                            table_content+="<td><span class=\"btn btn-info\" style=\"color:#fff\"  onclick=\"pay('"+value.usn+"','"+value.phone+"')\">Pay</span></td>";
                        });
                        $("#list").append(table_content);

                    }
                });
            }
            else{
                location.reload();
            }
   }

   function pay(id,phone) {
                    if (confirm("Do you want to make Payment of Rs.3200/- ?")) 
        {
                    var hold=id;
                    $.ajax({
                    url:"strength.php",
                    type:"post",
                    data:{
                        "str":"pay",
                        "id":id,
                        "phone":phone
                    },
                    success:function(data){
                        filter1();

                    }
                });  
                window.open('http://api.clobous.com/'+key+'/sendmsg/'+phone+'/Dear friend,Payment of Rs 3200 received for class trip','_top');            

        }  
}   

function notify(id,phone)
{
  window.open('http://api.clobous.com/'+key+'/sendmsg/'+phone+'/Dear friend,Please make the Payment of Rs 3200 for class trip','_top');
} 

   </script>
</head>
<body id="mobile_wrap">  
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
                      <li><a href="admin.php" class="close-panel"><img src="images/icons/white/briefcase.png" alt="" title="" /><span>Total Strength</span></a></li>
                      <li><a href="#" class="close-panel"><img src="images/icons/white/message.png" alt="" title="" /><span>Class List</span><strong>12</strong></a></li>
                      <li><a href="?????" class="close-panel"><img src="images/icons/white/love.png" alt="" title="" /><span>Final List</span><strong>5</strong></a></li>
                      <li><a href="index-2.html" onclick="signout()" class="close-panel"><img src="images/icons/white/lock.png" alt="" title="" /><span>Logout</span></a></li>
                    </ul>
                  </nav>
      </div>
    </div><br><br><br><br>

    
        <div id="pages_maincontent">
      
          <h2 class="page_title">Class List</h2>
          
              <div class="page_single layout_fullwidth_padding">
                   
                    <div class="videocontainer"><center><strong style="text-align: right;">COUNT : <?php echo ($row[0] + $row[1]); ?></strong></center>
                      <table width="629" class="table table-bordered " id="list">
                            <tr>
                              <th style="text-align: center">Name</th>
                              <th style="text-align: center">Phone No</th>
                              <th style="text-align: center">Payment</th>                             
                            </tr>
                        </table>
                    </div>
     
              </div>
      
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