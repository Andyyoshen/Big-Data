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
      <a class="nav-link" href="First.html">首頁</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">數據</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="pay_data.php">新資行情</a>
        <a class="dropdown-item" href="TC_Accident_data.php">台中易肇事路段</a>
        <!--<a class="dropdown-item" href="#">Link 3</a>-->
      </div>
    </li>
<!--
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
-->
<!--
    <li class="nav-item">
      <a class="nav-link disabled" href="#">Disabled</a>
    </li>
-->
  </ul>
</div>
  </div>  
    <a type="button" class="btn btn-primary btn-md" href="pay_data_chart.php" >圖表分析</a>
</div>
<div  id="alt" class="" style=" position: fixed;top: 1px; left:2%;width: 96%;text-align:center;"> 
</div>    
<div class="container" >
  <button id="bt" type="button" class="btn btn-outline-info" style="position: relative;top: -40px; left: 110px ;height:50px;width :200px;letter-spacing: 20px;border" >最高薪</button>    
</div>    
 <!--------------------------------以下為表格------------------------------------------> 
 <table class="table table-condensed">
	<thead>
		<tr>
			<th>公司</th>
			<th>薪水</th>
			<th>產業</th>
		</tr>
	</thead>
	<tbody>
        <?php if(!empty($datas)):?>
        <?php foreach($datas as $a_data):?>
		<tr>
			<td id="CP"><?php echo $a_data['company'];?></td>
			<td id="PD"><?php echo $a_data['paydata'];?></td>
            <td id="JB"><?php echo $a_data['job'];?></td>
			<!--<td>560001</td>-->
		</tr>
        <?php endforeach;?>
        <?php else:?>
        <?php endif;?>
	</tbody>
     
</table>
   
    <script>
        $(document).ready(function(){
            
            $.ajax({
                type : 'GET',
                url : 'get_max_min.php',
                dataType : 'html',
                
                
            }).done(function(msg){
                
                $('#bt').click(function(){

                   $('#alt').html("最高薪資與公司:"+" "+msg).addClass("alert alert-success").hide().fadeIn("slow").fadeOut(4000);
                    
            });
                
                
                console.log(msg);
            }).fail(function(){
                
                console.log("f");
            });
            
            //$('#alt').fadeOut();
            
        });
        
    </script>
    
    
    
</body>
</html>