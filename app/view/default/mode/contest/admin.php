<script src="<?php echo jf::url()."/script/contest-admin.js"?>"></script>
<script src="<?php echo jf::url()."/script/moment.js"?>"></script>
<script src="<?php echo jf::url()."/script/bootstrap-datetimepicker.js"?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo jf::url().'/style/dashboard.css'?>">
<link rel="stylesheet" type="text/css" href="<?php echo jf::url().'/style/bootstrap-datetimepicker.css'?>">

<script type="text/javascript">
    $(function() {
        // Initialize the date time picker
        var startDate = $('#start-date-time');
        var endDate = $('#end-date-time');

        startDate.datetimepicker({language: 'en'});
        endDate.datetimepicker({language: 'en'});

        startDate.data("DateTimePicker").setMinDate(new Date());
        endDate.data("DateTimePicker").setMinDate(new Date());

        startDate.on("dp.change", function(e) {
            endDate.data("DateTimePicker").setMinDate(new Date(e.date));
        });
    });
</script>

<!--navbar
============-->
<div class="navbar navbar-inverse navbar-fixed-top">
    <a href="#" class="navbar-brand">Contest Mode</a>
    <div class="container">
        <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <div class="collapse navbar-collapse navHeaderCollapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo jf::url()?>">Home</a></li>
                <li><a href="<?php echo jf::url().'/about'?>">About</a></li>
                <li><a href="#">Documentation</a></li>
                <li><a href="#">Github</a></li>
                <li><a href="#contact" data-toggle="modal">Contact</a></li>
                <li><a href="<?php echo jf::url().'/user/logout'?>">Logout</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar" id="side-nav">
            <ul class="nav nav-sidebar">
                <li id="overview"><a href="#overview">Overview</a></li>
                <li id="reports"><a href="#reports">Reports</a></li>
                <li id="analytics"><a href="#analytics">Analytics</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li id="users"><a href="#users">Users</a></li>
                <li id="challenges"><a href="#challenges">Challenges</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li id="account-settings"><a href="#settings">Account Settings</a></li>
            </ul>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header" id="heading"></h1>
            <div id="main-content">
                <!-----------------OVERVIEW----------------->
                <div id="overview-content" class="hidden">
                    <?php if (isset($this->noActiveContest)):?>
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="alert alert-danger">
                                    There is no active contest. <strong>Start one!</strong>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-5">
                                <h4>Enter contest details</h4>
                            </div>
                        </div>
                        <br>
                        <form role="form" method="POST">
                            <div class="form-group">
                                <label for="contest-name">Contest Name</label>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="contest-name"
                                               placeholder="Enter name" name="contest_name" required="required">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="contest-admin">Contest admin</label>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="contest-admin"
                                               placeholder="Enter name" name="contest_admin" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="start-date-time">Start date</label>
                                        <div id="start-date-time" class="input-group date">
                                            <div class="input-group">
                                                <input data-format="DD/MM/YYYY hh:mm a" type="text"
                                                       class="form-control" name="start_date" required="required">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="end-date-time">End date</label>
                                        <div id="end-date-time" class="input-group date">
                                            <div class="input-group">
                                                <input data-format="DD/MM/YYYY hh:mm a" type="text"
                                                       class="form-control" name="end_date" required="required">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <input type="submit" class="btn btn-success btn-lg" name="contest_submit" value="Submit">
                        </form>

                    <?php else: ?>
                        <h3 class="text-warning">Contest details of '<?php echo $this->ContestName;?>'</h3>
                        <div class="row">
                            <div class="col-sm-4">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Start Time</th>
                                        <td><?php echo $this->ContestStart;?></td>
                                    </tr>
                                    <tr>
                                        <th>End Time</th>
                                        <td><?php echo $this->ContestEnd;?></td>
                                    </tr>
                                    <tr>
                                        <th>Total Users</th>
                                        <td><?php echo $this->UserCount;?></td>
                                    </tr>
                                    <tr>
                                        <th>Total Challenges</th>
                                        <td><?php echo $this->ChallengeCount;?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    <?php endif;?>
                </div><!---End overview--->

                <!--------------------ACCOUNT SETTINGS------------------>
                <div id="account-settings-content" class="hidden">
                    <h3>Change Password</h3>
                    <br>
                    <form role="form" method="POST" action="<?php echo CONTEST_MODE_DIR."user/update"?>"
                          id="reset-pass-form">
                        <div class="form-group">
                            <label for="old-password">Old Password</label>
                            <div class="row">
                                <div class="col-sm-3">
                                    <input type="password" id="old-password" class="form-control" name="old_password"
                                           placeholder="Enter your password" required="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="new-password">New Password</label>
                            <div class="row">
                                <div class="col-sm-3">
                                    <input type="password" id="new-password" class="form-control" name="new_password"
                                        placeholder="Enter new password" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cnew-password">New Password</label>
                            <div class="row">
                                <div class="col-sm-3">
                                    <input type="password" id="cnew-password" class="form-control" name="cnew_password"
                                           placeholder="Confirm password" required="">
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-default" name="password_reset_submit" value="Submit"
                            id="pass-reset-btn">
                    </form>
                </div><!----End account settings---->

            </div><!--End main-content-->

        </div>
    </div> <!--Row ends-->
</div>
