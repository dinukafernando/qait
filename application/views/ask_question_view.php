<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Mosaddek">
        <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <link rel="shortcut icon" href="img/favicon.png">

        <title>Q&A_IT - Ask Question</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/bootstrap-reset.css" rel="stylesheet">
        <!--external css-->
        <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet">
        <!--<link href="<?php echo base_url(); ?>css/navbar-fixed-top.css" rel="stylesheet">-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap-wysihtml5/wysiwyg-color.css" />

        <!-- Custom styles for this template -->
        <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/style-responsive.css" rel="stylesheet" />

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="<?php echo base_url(); ?>js/html5shiv.js"></script>
          <script src="<?php echo base_url(); ?>js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="full-width">

        <section id="container" class="">
            <!--header start-->
            <header class="header white-bg">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!--logo start-->
                    <a href="<?php echo base_url(); ?>" class="logo" >Q&A<span>_IT</span></a>
                    <!--logo end-->
                    <div class="horizontal-menu navbar-collapse collapse ">
                        <ul class="nav navbar-nav">
                            <li><a href="<?php echo base_url(); ?>questions">Question</a></li>
                            <li class="active"><a href="<?php echo base_url(); ?>questions/ask">Ask Question</a></li>
                            <li><a href="<?php echo base_url(); ?>search">Advanced Search</a></li>

                        </ul>

                    </div>
                    <div class="top-nav ">
                        <ul class="nav pull-right top-menu">
                            <li>
                                <input type="text" class="form-control search" placeholder=" Search">
                            </li>
                            <!-- user login dropdown start-->
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <img alt="" src="<?php echo base_url(); ?>img/avatar1_small.jpg">
                                    <span class="username"><?php echo $name; ?></span>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu extended logout">
                                    <div class="log-arrow-up"></div>
                                    <li><a href="#"><i class=" icon-suitcase"></i>Profile</a></li>
                                    <li><a href="#"><i class="icon-cog"></i> Settings</a></li>
                                    <li><a href="#"><i class="icon-bell-alt"></i> Notification</a></li>
                                    <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
                                </ul>
                            </li>
                            <!-- user login dropdown end -->
                        </ul>
                    </div>

                </div>

            </header>
            <!--header end-->
            <!--sidebar start-->

            <!--sidebar end-->
            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">
                    <!-- page start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <!--breadcrumbs start -->
                            <ul class="breadcrumb">
                                <li><a href="<?php echo base_url() ?>"><i class="icon-home"></i> Home</a></li>
                                <li><a href="<?php echo base_url() ?>questions">Questions</a></li>
                                <li><a href="<?php echo base_url() ?>questions/ask">Ask Question</a></li>
                            </ul>
                            <!--breadcrumbs end -->
                        </div>
                    </div>


                    <!--wysihtml5 start-->
                    <div class="row">
                        <div class="col-md-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    Ask Question                                   
                                </header>
                                <div class="panel-body">
                                    <div class=" form">
                                        <form class="cmxform form-horizontal tasi-form" id="post-question-form" method="POST" action="<?php echo base_url(); ?>questions/post">
                                            <div class="form-group ">
                                                <label for="ccategory" class="control-label col-lg-2">Category (required)</label>
                                                <div class="col-lg-4">
                                                    <select class="form-control" id="ccategory" name="category" required>
                                                        <option value=""></option>
                                                        <?php foreach ($category as $record) { ?>
                                                            <option value="<?php echo $record['categoryID'] ?>"><?php echo $record['name'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>  
                                            <div class="form-group ">
                                                <label for="ctitle" class="control-label col-lg-2">Title (required)</label>
                                                <div class="col-lg-10">
                                                    <input class=" form-control" id="ctitle" name="title" minlength="2" type="text" required />
                                                </div>
                                            </div>                                          
                                            <div class="form-group">
                                                <label for="cbody" class="control-label col-lg-2">Body (required)</label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control wysihtml5" id="cbody" rows="10" name="body" required></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="keywords" class="control-label col-lg-2">Tag(s) (required)</label>
                                                <div class="col-lg-10">
                                                    <input name="keywords" id="keywords" class="keywords form-control" value="" required/>
                                                </div>
                                            </div>  
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button class="btn btn-danger" type="submit">Ask Question</button>
                                                    <button class="btn btn-default" type="button">Clear</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <!--wysihtml5 end-->

                </section>
                <!--main content end-->
                <!--footer start-->
                <footer class="site-footer">
                    <div class="text-center">
                        2013 &copy; Q&A_IT by Dinuka Vindula Fernando.
                        <a href="#" class="go-top">
                            <i class="icon-angle-up"></i>
                        </a>
                    </div>
                </footer>
                <!--footer end-->
            </section>

            <!-- js placed at the end of the document so the pages load faster -->
            <script src="<?php echo base_url(); ?>js/jquery.js"></script>
            <script type='text/javascript' src='<?php echo base_url(); ?>js/jquery-ui-1.9.2.custom.min.js'></script>
            <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
            <script class="include" type="text/javascript" src="<?php echo base_url(); ?>js/jquery.dcjqaccordion.2.7.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>js/hover-dropdown.js"></script>
            <script src="<?php echo base_url(); ?>js/jquery.scrollTo.min.js"></script>
            <script src="<?php echo base_url(); ?>js/jquery.nicescroll.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>js/respond.min.js" ></script>

            <!--this page plugins-->
            <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script> 

            <!--common script for all pages-->
            <script src="<?php echo base_url(); ?>js/common-scripts.js"></script>

            <!--this page  script only-->
            <!--custom tagsinput-->
            <script src="<?php echo base_url(); ?>js/jquery.tagsinput.js"></script>
            <script type="text/javascript">
                //wysihtml5 start
                $('.wysihtml5').wysihtml5();
                //wysihtml5 end 
            </script>
            <script type="text/javascript">
//                $.validator.setDefaults({
//                    submitHandler: function() {
//                        //alert("Posting? nuhh..Still have to code!");
//                        $.ajax({
//                            url: $(this).attr("action"),
//                            type: $(this).attr("method"),
//                            data: $(this).serializeArray(),
//                            dataType: "html",
//                            success: function(data) {
//                                //setTimeout(function() {  
//                                console.log(data);
//                                alert('button click :P');
//                                //}, 2000);
//                            },
//                            error: function() {
//                                alert("Ooops! Something went wrong!");
//                            }
//                        });
//                    }
//                });
//
//                $().ready(function() {
//                    // validate the comment form when it is submitted
//                    $("#post-question-form").validate();
//                });
            </script>
            <script type="text/javascript">
                var keywords = <?php $array = array();
                                                        foreach ($keywords as $keyword) {
                                                            $array[] .= $keyword['name'];
                                                        } echo json_encode($array); ?>;
                // Tags Input 
                $('#keywords').tagsInput({
                    autocomplete_url: 'http://localhost/qait/api/tag',
                    autocomplete: {
                        source: keywords
                    }
                });
            </script>          
            <script type="text/javascript">
                $(document).ready(function() {
                    $("#post-question-form").submit(function(e) {
                        $.ajax({
                            url: $(this).attr("action"),
                            type: $(this).attr("method"),
                            data: $(this).serializeArray(),
                            dataType: "html",
                            success: function(data) {
                                //setTimeout(function() {  
                                console.log(data);
                                alert(data);
                                //}, 2000);
                            },
                            error: function() {
                                alert("Ooops! Something went wrong!");
                            }
                        });
                        e.preventDefault();
                    });
                });
            </script>
    </body>
</html>

