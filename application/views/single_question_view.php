<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Mosaddek">
        <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>img/favicon.png">

        <title>Q&A_IT - Questions</title>

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
                            <li class="active" ><a href="<?php echo base_url(); ?>questions">Question</a></li>                     
                            <li><a href="<?php echo base_url(); ?>questions/ask">Ask Question</a></li>
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
                                <li><a href="<?php echo base_url() ?>questions/">Questions</a></li>
                                <li><a href="<?php echo base_url() ?>questions/title/<?php echo urlencode($question['title']) ?>"><?php echo $question['title'] ?>?</a></li>
                            </ul>
                            <!--breadcrumbs end -->
                        </div>
                    </div>
                    <section class="panel">
                        <header class="panel-heading">
                            <a id="question-title" href="<?php echo base_url() ?>questions/title/<?php echo urlencode($question['title']) ?>"><?php echo $question['title'] ?>?</a> 
                            <a id="edit-question" class="pull-right" href=""><i class="icon-edit"></i> Edit Question</a>
                        </header>
                        <div class="panel-body">
                            <div class="col-lg-12 col-sm-12 search-results">
                                <div class="vote pull-left" style="display: inline-block;;margin-right: 10px;">
                                    <a href="" style="display: block;" id="<?php echo urlencode($question['questionid']) ?>" title="This question shows research effort; it is useful and clear" class="question-vote-up">
                                        <i style="font-size: 3em;" class="icon-double-angle-up"></i>
                                    </a>                                    
                                    <h3 id="vote-count-<?php echo urlencode($question['questionid']) ?>" style="margin-bottom: 0px; margin-top: 0px;text-align:center;" class="count"><?php echo $question['rating'] == '' ? 0 : $question['rating'] ?></h1>
                                        <a href="" style="display: block;" id="<?php echo urlencode($question['questionid']) ?>" title="This question does not show any research effort; it is unclear or not useful" class="question-vote-down">
                                            <i style="font-size: 3em;" class="icon-double-angle-down"></i>
                                        </a>
                                </div>
                                <?php
                                $tags = explode(',', $question['tags']);
                                echo '<div class="classic-search">';
                                //echo '<h4><a href=' . base_url() . 'questions/title/' . urlencode($question['title']) . '>' . $question['title'] . '</a></h4>';
                                //echo '<a href=' . base_url() . 'questions/title/' . urlencode($question['title']) . '>' . base_url() . 'questions/title/' . urlencode($question['title']) . '</a>';
                                echo '<p id="question-body" style="text-align:justify;">' . $question['content'] . '</p>';
                                //echo '</div>';
                                foreach ($tags as $tag) {
                                    echo '<a href="#" class="btn btn-xs btn-success">' . $tag . '</a>&nbsp;';
                                }
                                echo '<p class="text-right"><img style="vertical-align:text-bottom;" src="http://localhost/qait/img/avatar1_small.jpg" alt=""><a href="#"> ' . $question['firstname'] . '</a> ' . date("jS F, Y", strtotime($question['posteddate'])) . '</p>';
                                echo '</div>';
                                ?>                                
                            </div>                              
                        </div>    
                    </section>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title"></h4>
                                </div>
                                <div class="modal-body">

                                </div>
                                <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-default" type="button">Ok</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- modal -->
                    <!-- Modal -->
                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-question-modal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                    <h4 class="modal-title">Edit Question</h4>
                                </div>
                                <div class="modal-body">
                                    <form id="edit-question-form" class="form-horizontal" role="form" method="POST" action="<?php echo base_url(); ?>questions/update">
                                        <div class="form-group ">
                                            <label for="ctitle" class="control-label col-lg-2">Title (required)</label>
                                            <div class="col-lg-10">
                                                <input type="hidden" name="question_id" value="<?php echo $question['questionid'] ?>" />
                                                <input class=" form-control" id="ctitle" value="<?php echo $question['title'] ?>" name="title" minlength="2" type="text" required />
                                            </div>
                                        </div>                                          
                                        <div class="form-group">
                                            <label for="cbody" class="control-label col-lg-2">Body (required)</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control wysihtml5" id="cbody" rows="10" name="body" required><?php echo $question['content'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="keywords" class="control-label col-lg-2">Tag(s) (required)</label>
                                            <div class="col-lg-10">
                                                <input name="keywords" id="keywords" class="keywords form-control" value="<?php echo $question['tags'] ?>" required/>
                                            </div>
                                        </div>  
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button type="submit" class="btn btn-info">Update</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- modal -->
                    <section class="panel">
                        <header class="panel-heading">
                            <a href="#">Answers</a>
                        </header>
                        <?php foreach ($answers as $answer) { ?>                        
                            <div style="border-bottom: 1px solid #eff2f7;" class="panel-body">
                                <div class="col-lg-12">
                                    <div class="vote pull-left" style="display: inline-block;;margin-right: 10px;">
                                        <a href="" style="display: block;" id="<?php echo urlencode($answer['answerid']) ?>" title="This question shows research effort; it is useful and clear" class="answer-vote-up">
                                            <i style="font-size: 3em;" class="icon-double-angle-up"></i>
                                        </a>
                                        <h3 id="answer-vote-count-<?php echo $answer['answerid'] ?>"style="margin-bottom: 0px; margin-top: 0px;text-align:center;" class="count"><?php echo $answer['rating'] == '' ? 0 : $answer['rating'] ?></h1>
                                            <a href="" style="display: block;" id="<?php echo urlencode($answer['answerid']) ?>" title="This question does not show any research effort; it is unclear or not useful" class="answer-vote-down">
                                                <i style="font-size: 3em;" class="icon-double-angle-down"></i>
                                            </a>
                                    </div>
                                    <p style="text-align:justify;"><?php echo $answer['content'] ?></p>
                                    <p class="text-right"><img style="vertical-align:text-bottom;" src="http://localhost/qait/img/avatar1_small.jpg" alt=""><a href="#"> <?php echo $answer['firstname'] ?></a> <?php echo date("jS F, Y", strtotime($answer['postdate'])) ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </section>
                    <section class="panel">
                        <header class="panel-heading">
                            <a href="#answer-question">Answer Question</a>
                            <span class="tools pull-right">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
                        </header>
                        <div class="panel-body">                            
                            <div class=" form">
                                <form class="cmxform form-horizontal tasi-form" id="post-answer-form" method="POST" action="<?php echo base_url(); ?>answers/post">
                                    <div class="form-group ">
                                        <label for="canswer" class="control-label col-lg-1">Share your answer.</label>                                            
                                        <div class="col-md-11">                                            
                                            <input type="hidden" name="questionid" value="<?php echo $question['questionid'] ?>" />
                                            <textarea class="form-control wysihtml5" id="canswer" rows="10" name="answer" required></textarea>
                                        </div>                                         
                                    </div>  
                                    <div class="form-group">
                                        <div class="col-lg-offset-1 col-lg-10">
                                            <button class="btn btn-danger" type="submit">Answer Question</button>
                                            <button class="btn btn-default" type="button">Clear</button>
                                        </div>
                                    </div>                                     
                                </form>
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
        <script src="<?php echo base_url(); ?>js/jquery.js"></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>js/jquery-ui-1.9.2.custom.min.js'></script>
        <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="<?php echo base_url(); ?>js/jquery.dcjqaccordion.2.7.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/hover-dropdown.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery.scrollTo.min.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/respond.min.js" ></script>

        <!--common script for all pages-->
        <script src="<?php echo base_url(); ?>js/common-scripts.js"></script>
        <!--custom tagsinput-->
        <script src="<?php echo base_url(); ?>js/jquery.tagsinput.js"></script>

        <!--this page plugins-->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
        <script type="text/javascript">
            var keywords = <?php
                        $array = array();
                        foreach ($keywords as $keyword) {
                            $array[] .= $keyword['name'];
                        } echo json_encode($array);
                        ?>;
            // Tags Input 
            $('#keywords').tagsInput({
                autocomplete_url: 'http://localhost/qait/api/tag',
                autocomplete: {
                    source: keywords
                }
            });
        </script>  
        <script type="text/javascript">
            //wysihtml5 start
            $('.wysihtml5').wysihtml5();
            //wysihtml5 end 
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.question-vote-up').click(function(e) {
                    var questionid = $(this).attr('id');
                    //alert(questionid);
                    voteQuestionUp(questionid);
                    //return false;
                    e.preventDefault();
                });

                $('.question-vote-down').click(function(e) {
                    var questionid = $(this).attr('id');
                    //alert(questionid);
                    voteQuestionDown(questionid);
                    //return false;
                    e.preventDefault();
                });

                $('.answer-vote-up').click(function(e) {
                    var answerid = $(this).attr('id');
                    //alert(questionid);
                    voteAnswerUp(answerid);
                    //return false;
                    e.preventDefault();
                });

                $('.answer-vote-down').click(function(e) {
                    var answerid = $(this).attr('id');
                    //alert(questionid);
                    voteAnswerDown(answerid);
                    //return false;
                    e.preventDefault();
                });

                $('#edit-question').click(function(e) {
                    $('#edit-question-modal').modal('show');
                    e.preventDefault();
                });
                
                $("#edit-question-form").submit(function(e) {
                    $.ajax({
                        url: $(this).attr("action"),
                        type: $(this).attr("method"),
                        data: $(this).serializeArray(),
                        dataType: "html",
                        success: function(data) {
                            console.log(data);                           
                            var title = $("#ctitle").val().replace(/\ /g, '+');;
                            window.location='questions/title/'+ title; 
                        },
                        error: function() {
                            alert("Ooops! Something went wrong!");
                        }
                    });
                    e.preventDefault();
                });

                $("#post-answer-form").submit(function(e) {
                    $.ajax({
                        url: $(this).attr("action"),
                        type: $(this).attr("method"),
                        data: $(this).serializeArray(),
                        dataType: "html",
                        success: function(data) {
                            console.log(data);

                        },
                        error: function() {
                            alert("Ooops! Something went wrong!");
                        }
                    });
                    e.preventDefault();
                });
            });

            function voteQuestionUp(questionid) {
                $.ajax({
                    url: '<?php echo base_url(); ?>rate/question',
                    data: {questionid: questionid, rateamount: 1},
                    type: 'post',
                    success: function(data) {
                        var obj = jQuery.parseJSON(data);
                        console.log(data);
                        if (obj.status === 1) {
                            var votecount = parseInt($('#vote-count-' + questionid).text());
                            $('#vote-count-' + questionid).text(votecount + 1);
                        }
                        $('.modal-title').text(obj.title);
                        $('.modal-body').text(obj.msg);
                        $('#myModal3').modal('show');
                    },
                    error: function() {
                        alert("Ooops! Something went wrong!");
                    }
                });
            }

            function voteQuestionDown(questionid) {
                $.ajax({
                    url: '<?php echo base_url(); ?>rate/question',
                    data: {questionid: questionid, rateamount: -1},
                    type: 'post',
                    success: function(data) {
                        var obj = jQuery.parseJSON(data);
                        console.log(data);
                        if (obj.status === 1) {
                            var votecount = parseInt($('#vote-count-' + questionid).text());
                            $('#vote-count-' + questionid).text(votecount - 1);
                        }
                        $('.modal-title').text(obj.title);
                        $('.modal-body').text(obj.msg);
                        $('#myModal3').modal('show');
                    },
                    error: function() {
                        alert("Ooops! Something went wrong!");
                    }
                });
            }

            function voteAnswerUp(answerid) {
                $.ajax({
                    url: '<?php echo base_url(); ?>rate/answer',
                    data: {answerid: answerid, rateamount: 1},
                    type: 'post',
                    success: function(data) {
                        console.log(data);
                        var obj = jQuery.parseJSON(data);
                        if (obj.status === 1) {
                            var votecount = parseInt($('#answer-vote-count-' + answerid).text());
                            $('#answer-vote-count-' + answerid).text(votecount + 1);
                        }
                        $('.modal-title').text(obj.title);
                        $('.modal-body').text(obj.msg);
                        $('#myModal3').modal('show');
                    },
                    error: function() {
                        alert("Ooops! Something went wrong!");
                    }
                });
            }

            function voteAnswerDown(answerid) {
                $.ajax({
                    url: '<?php echo base_url(); ?>rate/answer',
                    data: {answerid: answerid, rateamount: -1},
                    type: 'post',
                    success: function(data) {
                        var obj = jQuery.parseJSON(data);
                        console.log(data);
                        if (obj.status === 1) {
                            var votecount = parseInt($('#answer-vote-count-' + answerid).text());
                            $('#answer-vote-count-' + answerid).text(votecount - 1);
                        }
                        $('.modal-title').text(obj.title);
                        $('.modal-body').text(obj.msg);
                        $('#myModal3').modal('show');
                    },
                    error: function() {
                        alert("Ooops! Something went wrong!");
                    }
                });
            }
        </script>
    </body>
</html>
