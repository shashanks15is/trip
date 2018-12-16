<?php
         
          session_start();
          if(isset($_POST['btt']))
          {
            mysql_connect("localhost","root") or die(mysql_error());
            mysql_select_db("trip") or die(mysql_error());


            $user=$_POST['user'];
            $pass=$_POST['pass'];
            
            
            $query=mysql_query("select * from admin where user='$user' and pass='$pass'");
    
            if(mysql_num_rows($query)==1)
            {
              
              $_SESSION['username']=$user;
              echo ("<SCRIPT LANGUAGE='JavaScript'>
                     sessionStorage.setItem('login', 'success');
              localStorage['login']='success';
              window.location.replace('admin.php');
              </SCRIPT>");
            }
            else
            {
              echo ("<SCRIPT LANGUAGE='JavaScript'>
                     window.alert('Incorrect Username or Password')
                     window.location.href='index.php';
                     </SCRIPT>");
            }
          }
          if(isset($_GET['logout']))
          {
            session_unregister('username');
            echo ("<SCRIPT LANGUAGE='JavaScript'>
                     localStorage.removeItem('login');
                     window.location.replace('index.php');
                     </SCRIPT>");
          }
?>