
<?php
$url = 'https://api.coinmarketcap.com/v1/ticker/';
$data = file_get_contents($url);
$basics = json_decode($data, true);


function upper($item)
{
    return $item['percent_change_1h'] > 40;
}
$upper = array_filter($basics, 'upper');

 if (empty($upper) && $upper!==0)
 {
    echo ('<br>DRASTISCH GESTIEGEN-->KEIN TREFFER<br>');
  }else {
    echo ('<p>----DRASTISCH GESTIEGEN----</p><br><br>');
    echo "<pre>" ,print_r($upper),"</pre>";
       }



function lower($iteml)
{
    
    return $iteml['percent_change_1h'] < -40 and $iteml['percent_change_1h'] != 0; 
    
}

$lower = array_filter($basics, 'lower');


 if (empty($lower) && $lower!==0)
 {
    echo ('<br>DRASTISCH GENUNKEN-->KEIN TREFFER<br>');
  }else {
    echo ('<p>----DRASTISCH GENUNKEN----</p><br><br>');

  
    $lower = array_merge ($lower, '<a href="http://coinmarketcap.com/currencies/"></a>');
    echo "<pre>" ,print_r($lower),"</pre>";
       }
