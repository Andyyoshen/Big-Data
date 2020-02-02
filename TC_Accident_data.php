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
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
<script src="//cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script src="//cdn.bootcss.com/popper.js/1.12.5/umd/popper.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
<script src="//cdn.bootcss.com/vue/2.5.8/vue.min.js"></script>

  <script src="https://cdn.staticfile.org/axios/0.18.0/axios.min.js"></script> 
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
  </ul>
</div>
  </div>  
<!--    <a type="button" class="btn btn-primary btn-md" href="TC_Accident_chart.php">圖表分析</a>-->
 </div>
<!--
<div  id="alt" class="" style=" position: fixed;top: 1px; left:2%;width: 96%;text-align:center;"> 
</div>    
-->
<!--
<div class="container" >
  <button id="bt" type="button" class="btn btn-outline-info" style="position: relative;top: -20px; left: 110px ;height:50px;width :500px;letter-spacing: 20px;border">最多肇事件數</button>    
</div>    
-->
 <!--------------------------------以下為表個------------------------------------------>   
 <div id="DG">
 <table  class="table table-condensed">
	<thead>
		<tr>
			<th>路口名稱</th>
			<th>肇事件數</th>
			<th>主要肇因</th>
		</tr>
	</thead>
	<tbody >
        <tr v-for="info in infos">
            <td id="AG">{{info.路口名稱}}</td>
            <td id="AG">{{info.肇事件數}}</td>
            <td id="AG">{{info.主要肇因}}</td>
        </tr>
     </tbody>    
</table> 
</div>
    
    
    
 <!--------------------------------以下為資料傳遞---------------------------------------> 
 
     <script>
       var app1 = new Vue({
      
      el :"#DG",
      data : {
            infos : [],
            isActive: 'alert alert-success'
      },
      methods :{
          getAllJson : function(){
                axios
                .get("https://datacenter.taichung.gov.tw/swagger/OpenData/04318b65-490d-487b-a80a-c54c9d48a5b3")
                .then(ww =>  this.infos=ww.data)
                .catch(function(error){
                  console.log("ff");
                });
              
          }
      },
      created ()  {
         this.getAllJson() 
          
      }
      
  });
       
       
    </script>
    
</body>
</html>