<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Website</title>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
  </head>
  <body>
   <p> Welcome</p> 

    <a href="data.php">Data</a>
    
    <script type="text/javascript">
      $.getJSON('https://ipapi.co/json/', function(ip){
        var data = {
          ip: ip.ip,
          isp: ip.org,
          country: ip.country_name,
          city: ip.region
        };
        
        if(data.country=='India')
      {
        console.log(data.country);
        $("#d1").text("hello world");
        $("#myimg").attr("src", "cn.png");
      }


        $.ajax({
          url: 'index.php',
          type: 'post',
          data: data
        })
      } )


      
      // $(document).ready(function())
      // {

      //   console.log("hi");
      //   console.log(data.country);
      //   if(data.country=='India')
      //   {
      //      $("#d1").text("hello world");
      //   }

      // } 

    </script>



  </body>

  <p id ='d1'> Normal </p>
  
  <div>
         
         <img  id = "myimg" src="a11.png" alt="Girl in a jacket" width="500" height="600">
      </div>

</html>
<?php
require 'config.php';
if(isset($_POST["ip"])){
  $ip = $_POST["ip"];
  $isp = $_POST["isp"];
  $country = $_POST["country"];
  $city = $_POST["city"];

  $query = "INSERT INTO tb_data VALUES('', '$ip', '$isp', '$country', '$city')";
  mysqli_query($conn, $query);
}
?>
