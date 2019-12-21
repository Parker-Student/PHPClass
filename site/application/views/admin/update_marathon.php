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
                        <h1 class="page-header">
                            Update Race
                        </h1>

                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">

                        <form method="post" action="/site/admin/edit_race" role="form">


  <div class="form-group">
                                <label>Race Name</label>
                                <input name="txtName" value="<?=$race[0]["raceName"]?>" class="form-control" placeholder="Enter text">
                            </div>
  <div class="form-group">
                                <label>Race Location</label>
                                <input name="txtLocation" value="<?=$race[0]["raceLocation"]?>" class="form-control" placeholder="Enter text">
                            </div>
  <div class="form-group">
                                <label>Race Description</label>
                                <textarea name="txtDescription"  class="form-control"> <?=$race[0]["raceDescription"]?> </textarea>
                            </div>
  <div class="form-group">
                                <label>Race Date and Time</label>
                                <input name="txtDate" class="form-control" value="<?=$race[0]["raceDateTime"]?>" placeholder="Enter text">
                            </div>
                            <button type="submit" class="btn btn-default"> Update Race </button>
                            <button type="reset" class="btn btn-default"> Reset </button>

<input type="hidden" name"txtID" value="<?=$race[0]["raceID"]?>">
                        </form>


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
