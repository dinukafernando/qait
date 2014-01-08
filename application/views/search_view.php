<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Mosaddek">
        <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>img/favicon.png">

        <title>Q&A_IT - Advanced Search</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/bootstrap-reset.css" rel="stylesheet">
        <!--external css-->
        <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <!--<link href="<?php echo base_url(); ?>css/navbar-fixed-top.css" rel="stylesheet">-->

        <!-- Custom styles for this template -->
        <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/style-responsive.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/jqcloud/jqcloud.css" />
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
                            <li><a href="<?php echo base_url(); ?>questions/ask">Ask Question</a></li>
                            <li class="active"><a href="<?php echo base_url(); ?>search">Advanced Search</a></li>
                        </ul>

                    </div>
                    <div class="top-nav ">
                        <ul class="nav pull-right top-menu">
                            <li>
                                <input id="text" type="text" class="form-control search" placeholder=" Search">
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
                        <div class="col-md-3">
                            <section class="panel">
                                <div class="panel-body">
                                    <form id="form-search" class="form-horizontal search-result" action="<?php echo base_url(); ?>search/question" method="GET">
                                        <input id="search-input" type="text" name="text" placeholder="Search" class="form-control">
                                    </form>
                                </div>
                            </section>
                            <section class="panel">
                                <header class="panel-heading">
                                    Category
                                </header>
                                <div class="panel-body">
                                    <ul class="nav prod-cat">
                                        <?php foreach ($category as $record) { ?>                                        
                                            <li><a href="#"><i class=" icon-angle-right" id="<?php echo $record['categoryID'] ?>"></i> <?php echo $record['name'] ?></a></li>                                           
                                        <?php } ?>
                                    </ul>
                                </div>
                            </section>    
                            <section class="panel">
                                <header class="panel-heading">
                                    Keywords
                                </header>
                                <div id="keywords" style="height: 250px;"></div>
                            </section>
                        </div>
                        <div class="col-md-9">
                            <section class="panel">
                                <div class="panel-body">
                                    <div class="pro-sort">
                                        <label class="pro-lab">Sort By</label>
                                        <select class="styled" >
                                            <option>Default Sorting</option>
                                            <option>Popularity</option>
                                            <option>Average Rating</option>
                                            <option>Newness</option>
                                        </select>
                                    </div>
                                    <div class="pro-sort">
                                        <label class="pro-lab">Show</label>
                                        <select class="styled" >
                                            <option>Result Per Page</option>
                                            <option>2 Per Page</option>
                                            <option>4 Per Page</option>
                                            <option>6 Per Page</option>
                                            <option>8 Per Page</option>
                                            <option>10 Per Page</option>
                                        </select>
                                    </div>
                                    <div class="pull-right">
                                    </div>
                                </div>
                            </section>
                            <section class="panel">                       
                                <div class="panel-body">
                                    <div class="search-results"><?php echo $questions ?></div>

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
        <script src="<?php echo base_url(); ?>js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="<?php echo base_url(); ?>js/jquery.dcjqaccordion.2.7.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/hover-dropdown.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery.scrollTo.min.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/respond.min.js" ></script>

        <!--common script for all pages-->
        <script src="<?php echo base_url(); ?>js/common-scripts.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery.customSelect.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/jqcloud/jqcloud-1.0.4.js"></script>
        <script type="text/javascript">

        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                var word_list = [
                    {text: "php", weight: 13, link: "#"},
                    {text: "codeigniter", weight: 10.5},
                    {text: "drag-drop", weight: 9.4},
                    {text: "html5", weight: 8},
                    {text: "java", weight: 6.2},
                    {text: "css3", weight: 5},
                    {text: "android", weight: 5},
                    {text: "apache", weight: 6.2},
                    {text: "jquery-ui", weight: 5},
                    {text: "apache-tomcat", weight: 5},
                    {text: "mysql", weight: 5}
                ];
                $(function() {
                    $("#keywords").jQCloud(word_list);
                });
                $(function() {
                    $('select.styled').customSelect();
                });
                $("#form-search").submit(function(e) {
                    $.ajax({
                        url: $(this).attr("action"),
                        type: $(this).attr("method"),
                        data: $(this).serializeArray(),
                        dataType: "html",
                        success: function(data) {
                            console.log(data);
                            $(".search-results").html(data);
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
