<?php
    require_once 'Listdb.inc.php';
    require_once 'function.php';

    $datas = get_pay_data();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>數據分析</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div class="jumbotron">
    <h1 class="text-center">數據分析</h1>      
    <div class="container">
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link" href="First.php">首頁</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">數據</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="pay_data.php">新資行情</a>
        <a class="dropdown-item" href="TC_Accident_data.php">台中易肇事路段</a>
        <!--<a class="dropdown-item" href="#">Link 3</a>-->
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#">Disabled</a>
    </li>
  </ul>
</div>
  </div>  
    <a type="button" class="btn btn-primary btn-md" href="TC_Accident_chart.php" style="position: relative; top: 50px; left: 1300px">圖表分析</a>
</div>
<div  id="alt" class="" style=" position: fixed;top: 1px; left:2%;width: 96%;text-align:center;">
   
    
</div>    
<div class="container" >
  <button id="bt" type="button" class="btn btn-outline-info" style="position: relative;top: -20px; left: 110px ;height:50px;width :500px;letter-spacing: 20px;border">最多肇事件數</button>    
</div>    
 <!--------------------------------以下為表個------------------------------------------>   
 <table id="DG" class="table table-condensed">
	<thead>
		<tr>
			<th>路口名稱</th>
			<th>肇事件數</th>
			<th>主要肇因</th>
		</tr>
	</thead>
	<tbody id="AG">
        
	</tbody>
     
</table>   
    
    
    
    
 <!--------------------------------以下為資料傳遞---------------------------------------> 
 
    <script>
        $(document).ready(function(){
            
             
          $.ajax({
             
             type : 'GET',
             url : 'https://datacenter.taichung.gov.tw/swagger/OpenData/04318b65-490d-487b-a80a-c54c9d48a5b3',
             datatype : 'json',
             
         }).done(function(msg){ 
              var y = [];
              var i;
              var x=0;
              for(i=0;i<msg.length;i++)
              {
                   
                    $('#AG').append("<tr>"+
                                    
                                    "<td>"+
                                    msg[i].路口名稱+
                                    "</td>"+
                                    "<td>"+
                                    msg[i].肇事件數+
                                    "</td>"+
                                    "<td>"+
                                    msg[i].主要肇因+
                                    "</td>"+
                                    
                                    "</tr>");
                  y[i] = msg[i].肇事件數;
                           
              }
              $('#bt').on('click',function(){
                  $('#alt').html("最多肇事件數:"+" "+Math.max(...y)).addClass("alert alert-success").hide().fadeIn("slow").fadeOut(4000);
              });
              //console.log(Math.max(...y));
              
         }).fail(function(){
             console.log('fail');
         });
         
     });
    </script>
    
</body>
</html>