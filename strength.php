<?php

define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'); 
    if(!IS_AJAX) {die('Restricted access');}

    mysql_connect("localhost","root") or die(mysql_error());
    mysql_select_db("trip") or die(mysql_error());
    if ($_POST['str']=="strength") {
        $query="select * from strength";
    } 
    else if ($_POST['str']=="list") {
        $query="select * from students";
    }
    else if ($_POST['str']=="pay") {
        $query1="insert into finalList select * from students where usn='".$_POST['id']."' ";
        $query2="delete from students where usn='".$_POST['id']."' ";
        
        $result1=mysql_query($query1);
        $result2=mysql_query($query2);

        $json_data1=array();
         while($row=mysql_fetch_assoc($result1)){
            $json_data1[]=$row;
        }

        $json_data2=array();
         while($row=mysql_fetch_assoc($result2)){
            $json_data2[]=$row;
        }
    
    echo json_encode($json_data1);
    echo json_encode($json_data2);
    

    
    }
    else
    {
        $query="select * from finalList";
    }

    $result=mysql_query($query);
    $json_data=array();
    while($row=mysql_fetch_assoc($result)){
        $json_data[]=$row;
    }
    
    echo json_encode($json_data);
    
?>