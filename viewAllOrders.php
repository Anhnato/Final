<head>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<div id="ordersBtn" >
  <h2>Order Details</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>O.N.</th>
        <th>Customer</th>
        <th>Contact</th>
        <th>OrderDate</th>
        <th>Payment Method</th>
        <th>Order Status</th>
        <th>Payment Status</th>
        <th>More Details</th>
     </tr>
    </thead>
     <?php
      include_once "config.php";
      include "adminHeader.php";
      include "sidebar.php";
      $sql="SELECT * from orders";
      $result=$conn-> query($sql);
      $count = $result -> num_rows;
      
      while ($row=$result-> fetch_assoc()) {
    ?>
       <tr>
          <td><?=$row["order_id"]?></td>
          <td><?=$row["delivered_to"]?></td>
          <td><?=$row["phone_no"]?></td>
          <td><?=$row["order_date"]?></td>
          <td><?=$row["pay_method"]?></td>
           <?php 
                if($row["order_status"]==0){
                            
            ?>
                <td><button class="btn btn-danger" onclick="ChangeOrderStatus('<?=$row['order_id']?>')">Pending </button></td>
            <?php
                        
                }else{
            ?>
                <td><button class="btn btn-success" onclick="ChangeOrderStatus('<?=$row['order_id']?>')">Delivered</button></td>
        
            <?php
            }
                if($row["pay_status"]==0){
            ?>
                <td><button class="btn btn-danger"  onclick="ChangePay('<?=$row['order_id']?>')">Unpaid</button></td>
            <?php
                        
            }else if($row["pay_status"]==1){
            ?>
                <td><button class="btn btn-success" onclick="ChangePay('<?=$row['order_id']?>')">Paid </button></td>
            <?php
                }
            ?>
              
        <td><a class="btn btn-primary openPopup" data-href="./adminView/viewEachOrder.php?orderID=<?=$row['order_id']?>" href="javascript:void(0);">View</a></td>
        </tr>
    <?php
            $count=$count+1;
        }
    ?>
     
  </table>
   
</div>
<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Order Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="order-view-modal modal-body">
        
        </div>
      </div>
    </div>
  </div>
<script>
    $(document).ready(function(){
      $('.openPopup').on('click',function(){
        var dataURL = $(this).attr('data-href');
    
        $('.order-view-modal').load(dataURL,function(){
          $('#viewModal').modal({show:true});
        });
      });
    });
 </script>

<script type="text/javascript" src="ajaxWork-1.js"></script>    
<script type="text/javascript" src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script> 