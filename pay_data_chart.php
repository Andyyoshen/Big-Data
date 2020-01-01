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
  <h2>Pills with Dropdown</h2>
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link" href="First.php">首頁</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">數據</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="pay_data.php">新資行情</a>
        <a class="dropdown-item" href="#">房屋價格</a>
        <a id="yy" class="dropdown-item" href="#">55</a></div>
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
</div>
    
<!----------------------------------以下為圖表----------------------------------------->
    
    
    
    <canvas id="chart" width="100" height="20"></canvas>    
    
    <script>
        $(document).ready(function(){    // 使用jquery語法 
           

             /*用jquery中的post方法來取得pay_data.php當中的資料*/
                $.post("pay_data.php",function(msg){  //mag為提取的資料
                    
                    kk = $(msg).find('#CP');
                    pp = $(msg).find('#PD'); //提取id為rr的資料
                    
                    console.log(kk[0]);
                    
               
           
            var ctx = $('#chart') ;
            var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [],
            datasets: [{
                label: '# of Votes',
                data: [],
                 backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
                
                
                
            }]
                
                
                
            }
     
        });
             //console.log(pp[0].innerHTML); 
                    //console.log(a);
                   // console.log(d);
                //pp[0].innerHTML = pp[0].innerHTML.concat(pp[1].innerHTML);
                    //console.log(pp[0].innerHTML);
             //console.log(chart.data.datasets[0].data.push(pp[0].innHTML));
             //console.log(chart.data.datasets[0].data.push(d[0].innerHTML));
            //chart.data.datasets[0].data = chart.data.datasets[0].data.concat(pp);
                    
             //console.log(chart.data.datasets[0].data); 
                    
            //console.log(chart.data.datasets[0].data) 
                    
             //chart.data.datasets[0].data = chart.data.datasets[0].data.concat(pp);
            //chart.data.datasets[0].data.push(pp[0].innerHTML)
             //chart.data.datasets[0].data.push(pp[0][0].innerHTML)
                    //console.log(chart.data.datasets[0].data= chart.data.datasets[0].data.concat(pp[0].innerHTML));
                    
                    //console.log(chart.data.datasets[0].data);
                    var i,x;
                    for(i=0;i<pp.length;i++)
                    {
                        chart.data.datasets[0].data.push(pp[i].innerHTML);
                        
                    }
                    
                    for(x=0;x<kk.length;x++)
                    {
                        chart.data.labels.push(kk[x].innerHTML);
                        
                    }
                    
                        chart.update();
                    }); 
    });
    
    
    
    </script>   
</body>
</html>  
    
    