<!-- Sidebar -->
<link rel="stylesheet" href="style.css">
<div class="sidebar" id="mySidebar">
<div class="side-header">
    <img src="logo.png" width="120" height="120"> 
    <h5 style="margin-top:10px;">Hello, Admin</h5>
</div>

    <hr style="border:1px solid; background-color:#8a7b6d; border-color:#3B3131;">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="index.php"><i class="fa fa-home"></i> Dashboard</a>
        <a href="viewAllProducts.php" onclick="showProductItems()" ><i class="fa fa-th"></i> Products</a>
        <a href="viewAllOrders.php" onclick="showOrders()"><i class="fa fa-list"></i> Orders</a>
</div>
 
<div id="main">
    <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i></button>
</div>