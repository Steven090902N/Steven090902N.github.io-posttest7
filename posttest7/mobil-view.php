<?php
require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Cars View</title>
    <link rel="stylesheet" href="mobil.css">
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Cars View Details 
                            <a href="index6.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $mobil_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM mobil WHERE id='$mobil_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $mobil = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>NAMA UNIT</label>
                                        <p class="form-control">
                                            <?=$mobil['name'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>BRAND UNIT</label>
                                        <p class="form-control">
                                            <?=$mobil['brand'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>TAHUN UNIT</label>
                                        <p class="form-control">
                                            <?=$mobil['tahun'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>JARAK TEMPUH UNIT</label>
                                        <p class="form-control">
                                            <?=$mobil['jarak'];?>   
                                        </p>
                                    <div class="mb-3">
                                        <label>TIME</label>
                                        <p class="form-control">
                                            <?=$mobil['time'];?>   
                                        </p>
                                    <div class="mb-3">
                                        <label>FOTO UNIT</label>
                                        <p class="inputFile">
                                        <img src="image/<?php echo $mobil["img"]; ?>" alt="simple" width="100px" height="100px"></td>  
                                        </p>
                                    </div>

                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>