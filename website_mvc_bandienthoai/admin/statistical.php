<?php
require_once('../carbon/autoload.php');

use Carbon\Carbon;
use Carbon\CarbonInterval;

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../classes/cart.php');

$ct = new cart();

$statistical = $ct->statistical();
if ($statistical) {
    while ($result = $statistical->fetch_assoc()) {
        $char_data[] = array(
            'date' => '2022-12-15',
            'order' => '10',
            'sales' => '10000000',
            'quantity' => '50'
        );
    }
    
}
echo $data = json_encode($char_data);
?>
  <!-- <p>Thống kê đơn hàng theo : <span id="text-date"></span></p>
    <div id="chart" style="height: 250px;"></div>
  </div>
  <script>
    $(document).ready(function() {
          statistical_revenue();
         var char= new Morris.Area({


            element: 'myfirstchart',

            xkey: 'date',

            ykeys: ['date','order', 'sales', 'quantity'],

            labels: ['Date','Orders', 'Revenue', 'Quantity']
          });

          function statistical_revenue(){
             var text = '1 year ago';
             $('#text-date').text(text);
             $.ajax({
               url:"statistical.php",
               method:"POST",
               dataType:"JSON",
               success:function(data){
                 char.setData(data);
                 $('#chart').text(text);
               }
             });

          }
        });
        
        
  </script> -->


