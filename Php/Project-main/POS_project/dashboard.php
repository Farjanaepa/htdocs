<?php
 session_start();

  $sessioninfo = $_SESSION["sname"];
if (empty($sessioninfo)){
    header('location:index.php');
}
?>

<?php 
    include("includes/header.php");
    include("includes/sidebar.php");
    include("includes/nav.php");
?>
  <main class="main-container">

            <div class="main-cards">
    
                <div class="card">
                    <div class="card-inner">
                        <h3>PRODUCTS</h3>
                        <span class="material-icons-outlined">inventory_2</span>
                    </div>
                    <h1>249</h1>
                </div>
    
                
                <div class="card">
                    <div class="card-inner">
                        <h3>CATEGORIES</h3>
                        <span class="material-icons-outlined">category</span>
                    </div>
                    <h1>249</h1>
                </div>
    
                
                <div class="card">
                    <div class="card-inner">
                        <h3>CUSTOMERS</h3>
                        <span class="material-icons-outlined">groups</span>
                    </div>
                    <h1>2490</h1>
                </div>
    
                
                <div class="card">
                    <div class="card-inner">
                        <h3>ALERTS</h3>
                        <span class="material-icons-outlined">notification_important</span>
                    </div>
                    <h1>2</h1>
                </div>
    
            </div>

            <div class="charts">
                <div class="charts-card">
                    <h2 class="chart-title">Top 5 products</h2>
                    <div id="bar-chart"></div>

                </div>

                <div class="charts-card">
                    <h2 class="chart-title">Purchase and sales orders</h2>
                    <div id="area-chart"></div>

                </div>

            </div>
            </main>
<?php 
    include("includes/footer.php");
   
?>