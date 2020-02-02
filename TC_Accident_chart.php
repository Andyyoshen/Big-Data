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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
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
        </div>
    </li>
<!--
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#">Disabled</a>
    </li>
-->
  </ul>
</div>
  </div>  
</div>
    
<!----------------------------------以下為圖表----------------------------------------->
    
    
    
    <canvas id="chart" width="100" height="20"></canvas>    
    
    <script>
        $(document).ready(function(){    // 使用jquery語法 
           

             /*用jquery中的post方法來取得pay_data.php當中的資料*/
                $.get("https://datacenter.taichung.gov.tw/swagger/OpenData/04318b65-490d-487b-a80a-c54c9d48a5b3",function(msg){  //mag為提取的資料
                    
                    var y = []
                    var i,x=0;
                    //console.log(typeof(y));
                    //console.log(msg[0].路口名稱)
                    for( i = 0;i<msg.length;i++)
                        {   
                            
                          y[i] = msg[i].肇事件數;
                            
                            //x+=1;
                            console.log(y[i]);
                        }
                    console.log(Math.max(...y));
                    
               
           
            var ctx = $('#chart') ;
            var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [],
            datasets: [{
                label: '# of Votes',
                data: [],
                 backgroundColor: [ ],
                borderColor: [],
                borderWidth: 1
                
                
                
            }]
                
                
                
            }
     
        });     
                    var n,p;
                    for(n=0;n<msg.length;n++)
                    {
                        chart.data.datasets[0].data.push(msg[n].肇事件數);
                        chart.data.labels.push(msg[n].路口名稱);
                        chart.data.datasets[0]. backgroundColor.push('rgba(255, 99, 132, 0.2)');
                    chart.data.datasets[0]. borderColor.push('rgba(255,99,132,1)');
                    }
                    

                        chart.update();
                    }); 
    });
    
    
    
    </script>   
</body>
</html>  
    
    