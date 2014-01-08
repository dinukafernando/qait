<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Mosaddek">
        <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>img/favicon.png">

        <title>Q&A_IT - Sign In</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/bootstrap-reset.css" rel="stylesheet">
        <!--external css-->
        <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>css/style-responsive.css" rel="stylesheet" />

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="login-body">

        <div class="container">

            <form id="form-signin" class="form-signin" action="<?php echo base_url(); ?>login/authenticate" method="GET">
                <h2 class="form-signin-heading">sign in now</h2>
                <div class="login-wrap">
                    <input type="text" name="username" class="form-control" placeholder="User ID" autofocus>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <label class="checkbox">
                        <input type="checkbox" value="remember-me"> Remember me
                        <span class="pull-right">
                            <a data-toggle="modal" href="#myModal"> Forgot Password?</a>

                        </span>
                    </label>
                    <button id="btn-signin" class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
                    <p>or you can sign in via social network</p>
                    <div class="login-social-link">
                        <a href="index.html" class="facebook">
                            <i class="icon-facebook"></i>
                            Facebook
                        </a>
                        <a href="index.html" class="twitter">
                            <i class="icon-twitter"></i>
                            Twitter
                        </a>
                    </div>
                    <div class="registration">
                        Don't have an account yet?
                        <a class="" href="register">
                            Create an account
                        </a>
                    </div>

                </div>

                <!-- Modal -->
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Forgot Password ?</h4>
                            </div>
                            <div class="modal-body">
                                <p>Enter your e-mail address below to reset your password.</p>
                                <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                <button class="btn btn-success" type="button">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal -->

            </form>

        </div>



        <!-- js placed at the end of the document so the pages load faster -->
        <script src="<?php echo base_url(); ?>js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#form-signin").submit(function(e) {
                        $.ajax({
                            url : $(this).attr("action"),
                            type: $(this).attr("method"),
                            data: $(this).serializeArray(),
                            dataType: "html",
                            success: function(data) {
                                //setTimeout(function() {  
                                console.log(data);
                                //alert(data);
                                window.location='search'; 
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
