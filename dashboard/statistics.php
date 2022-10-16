<link rel="stylesheet" href="../static/stat.css">
<?php include_once('./header.php');?>
<div class="ref d-none" ><?php echo $_SESSION['ref'];?></div>
<div class="table p-3">
    <h4 class="text-success mb-2 p-3 bg-light border rounded-2">STATISTICS</h4>
    <div>
        <div class="barchart">

            <div  class="mb-2 p-2 bg-light border rounded-2 d-flex justify-content-between">
                <h4 >Line Graph</h4>
                <input type="search" name="month" id="month" class="getdb px-2 me-1" style="width:200px;border-radius:6px; outline:none;" placeholder="2022/08 (yyyy/mm)">
            </div>
            <canvas id="dream"class="charts mb-2 p-3 bg-light border rounded-2" >
            </canva>

        </div>
    </div>

</div>

<script src="../js/chart.min.js"></script>

<script src="../js/jquery.min.js"></script>
<script src="../js/line.js"></script>

</script>








<?php include_once('./footer.php')?>