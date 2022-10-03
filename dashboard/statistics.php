<link rel="stylesheet" href="../static/stat.css">
<?php include_once('./header.php');?>
<div class="ref d-none" ><?php echo $_SESSION['ref'];?></div>
<div class="table p-3">
    <h4 class="text-success mb-2 p-3 bg-light border rounded-2">STATISTICS</h4>
    <div>
        <div class="barchart  ">
            <div  class="mb-2 p-2 bg-light border rounded-2 d-flex justify-content-between">
                <h4 >Line Graph</h4>
                <form action="" method="post" class="d-flex">
                    <select name="yr" id="yr" class="me-1" style="width:200px;border-radius:6px;" >
                        <option value=2021>2021</option>
                        <option value=2022 selected>2022</option>
                        <option value=2023>2023</option>
                    </select>
                    <select name="month" id="month" class="me-1" style="width:200px;border-radius:6px;">
                        <option value=1>Jan</option>
                        <option value=2>Feb</option>
                        <option value=3 >Mar</option>
                        <option value=4>Apr</option>
                        <option value=5>May</option>
                        <option value=6>Jun</option>
                        <option value=7>July</option>
                        <option value=8 selected>Aug</option>
                        <option value=9>Sep</option>
                        <option value=10>Oct</option>
                        <option value=11>Nov</option>
                        <option value=12 id="d">Dec</option>
                    </select>
                <button class="btn btn-danger border-0 rounded-circle"><i class="fa fa-search" type="submit" id="search"></i></button>
        </form>
            </div>
            
            <canvas id="dream"class="charts mb-2 p-3 bg-light border rounded-2" >
            </canva>

        </div>
    </div>

</div>

<script src="../js/chart.min.js"></script>
<!-- <script src="../pie.js"> -->
<!-- <script src="../pie.js"> -->
<script src="../js/jquery.min.js"></script>
<script src="../js/line.js"></script>

</script>








<?php include_once('./footer.php')?>