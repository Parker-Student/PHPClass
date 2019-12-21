<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=asset_url()?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=asset_url()?>css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=asset_url()?>css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <?php
        $this->load->view('includes/header');
        $this->load->view('includes/menu');

        ?>

        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->

                <div class="row">
                    <div class="col-lg-12">
                        <h2>Manage Runners</h2><div class="form-group">
                     <label>Select Marathon</label>
                       <select class="form-control">
                         <option>1</option>
                       <option>2</option>
                       <option>3</option>
                        <option>4</option>
                        <option>5</option>
                         </select>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Page</th>
                                        <th>Visits</th>
                                        <th>% New Visits</th>
                                        <th>Revenue</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                     foreach($races as $race){
                                      $name = $race['raceName'];
                                         $location = $race['raceLocation'];
                                          $date = $race['raceDateTime'];
                                           $id = $race['raceID'];

                                      echo " <tr> <td> $name</td> <td>$id</td> <td>$email</td> <td> <a href='/site/admin/update_runner/". $id . "'>  Edit </a> | <a href='/site/admin/delete_runner/" .$id."'> Delete</a></td> </tr>";

                                 }
                            ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?=asset_url()?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=asset_url()?>js/bootstrap.min.js"></script>

</body>

</html>
