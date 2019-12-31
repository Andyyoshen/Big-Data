<?php
    include ('Listdb.inc.php');
        
    function get_pay_data()
    {
        $datas = array();
        $sql = "SELECT * FROM `aa` WHERE publish = 1";
        $query = mysqli_query($GLOBALS['link'],$sql);
        
        if($query)
        {
            if(mysqli_num_rows($query)>0)
            {
                while($row = mysqli_fetch_assoc($query))
                {
                    $datas[] = $row;
                }
            }
        }
        
        else
        {
            echo "{$sql}語法請求失敗:<br/>".mysqli_error($GLOBALS['link']);
        }
    
        return $datas;
    }
?>