<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Computer Engineering Contact Tracing</title>
    <style type="text/css">
     body{
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        background: url(Contact_Tracing_Animated.gif);
        background-size: cover;
    }
    </style>    

</head>
<body>
    <center>  
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Student Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID Number</th>
                                    <th>Name</th>
                                    <th>Province</th>
                                    <th>City/Town</th>
                                    <th>Barangay</th>
                                    <th>Number</th>
                                    <th>Email Address</th>
                                    <th>Time In</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","contactdb");

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM students WHERE CONCAT(id_number,name,province,citytown,barangay,number,email,time_in) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['id_number']; ?></td>
                                                    <td><?= $items['name']; ?></td>
                                                    <td><?= $items['province']; ?></td>
                                                    <td><?= $items['citytown']; ?></td>
                                                    <td><?= $items['barangay']; ?></td>
                                                    <td><?= $items['number']; ?></td>
                                                    <td><?= $items['email']; ?></td>
                                                    <td><?= $items['time_in']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="8">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        $query = "SELECT * FROM students";
                                        $query_run = mysqli_query($con, $query);
                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['id_number']; ?></td>
                                                    <td><?= $items['name']; ?></td>
                                                    <td><?= $items['province']; ?></td>
                                                    <td><?= $items['citytown']; ?></td>
                                                    <td><?= $items['barangay']; ?></td>
                                                    <td><?= $items['number']; ?></td>
                                                    <td><?= $items['email']; ?></td>
                                                    <td><?= $items['time_in']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="8">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                    
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </center></table>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>