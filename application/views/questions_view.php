<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Mosaddek">
        <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <link rel="shortcut icon" href="img/favicon.png">

        <title>Q&A_IT - Questions</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>css/bootstrap-reset.css" rel="stylesheet">
        <!--external css-->
        <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <!--<link href="<?php echo base_url();?>css/navbar-fixed-top.css" rel="stylesheet">-->

        <!-- Custom styles for this template -->
        <link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
        <link href="<?php echo base_url();?>css/style-responsive.css" rel="stylesheet" />

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="<?php echo base_url();?>js/html5shiv.js"></script>
          <script src="<?php echo base_url();?>js/respond.min.js"></script>
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
                            <li><a class="active" href="<?php echo base_url(); ?>questions">Question</a></li>
                            <li><a href="<?php echo base_url();?>questions/ask">Ask Question</a></li>
                            <li><a href="<?php echo base_url();?>search">Advanced Search</a></li>
                            
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
                                    <img alt="" src="<?php echo base_url();?>img/avatar1_small.jpg">
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
                                <li><a href="#"><i class="icon-home"></i> Home</a></li>
                                <li><a href="#">Search</a></li>
                            </ul>
                            <!--breadcrumbs end -->
                        </div>
                    </div>
                    <section class="panel">
                        <header class="panel-heading">
                            Questions
                        </header>
                        <div class="panel-body">
                            
                            <div class="col-lg-1 col-sm-1 statscontainer">
                                
                            </div>
                            <div class="col-lg-11 col-sm-11 search-results"><!--
                                <h4><a href="#">lol</a></h4>
                                <a href="#">#</a>
                                <p>lol.</p>-->
                                <?php //echo $questions; ?>
                            </div>  
                            
                            <div class="text-center">
                                <ul class="pagination">
                                    <li><a href="#">«</a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">»</a></li>
                                </ul>
                            </div>
                        </div>    
                    </section>
                    </div>
                    <!-- page end-->
                </section>
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
        <script src="<?php echo base_url();?>js/jquery.js"></script>
        <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="<?php echo base_url();?>js/jquery.dcjqaccordion.2.7.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/hover-dropdown.js"></script>
        <script src="<?php echo base_url();?>js/jquery.scrollTo.min.js"></script>
        <script src="<?php echo base_url();?>js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>js/respond.min.js" ></script>

        <!--common script for all pages-->
        <script src="<?php echo base_url();?>js/common-scripts.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $("#form-search").submit(function(e) {
                        $.ajax({
                            url : $(this).attr("action"),
                            type: $(this).attr("method"),
                            data: $(this).serializeArray(),
                            dataType: "html",
                            success: function(data) {
                                //setTimeout(function() {  
                                console.log(data);
                                //alert(data);
                                //var result = document.getElementsByClassName("classic-search")[0];
                                $(".search-results").html(data);
                                //var items = data.items;
//                                for(var i = 0; i < data[0].length; i++) {
//                                    var h5 = document.createElement("h5");
//                                    h5.innerHTML = data[i].title;
//                                    result.appendChild(h5);
//                                    var p = document.createElement("p");
//                                    p.innerHTML = data[i].content;
//                                    result.appendChild(p);
//
//                                }
                                //window.location='home'; 
                                //$("#searchresults").html(data);
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
