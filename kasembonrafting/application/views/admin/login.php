<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Login Admin</title>
    <link rel="icon" href="<?=base_url();?>assets/img/core-img/canoe.png">
    <!-- Bootstrap -->
    <link href="<?=base_url();?>assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=base_url();?>assets/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=base_url();?>assets/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?=base_url();?>assets/admin/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?=base_url();?>assets/admin/build/css/custom.min.css" rel="stylesheet">
    <!-- style css -->
    <link href="<?=base_url();?>assets/admin/style.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="<?= base_url()?>kasembon/signin" method="post">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control input-login" placeholder="Username" name="username" required="" />
              </div>
              <div>
                <input type="password" class="form-control input-login" placeholder="Password" name="password" required="" />
              </div>
              <?php if ($this->session->flashdata('notif')!=null): ?>
									    <div class="alert alert-danger"><?= $this->session->flashdata('notif');?></div>
								    <?php endif?>
              <div id="center-button">
                <input type="submit" class="btn btn-default submit button-login" value="Log In">
              </div>

              <div class="clearfix"></div>
                  <h1>Kasembon Rafting</h1>
                  <p>©2020 All Rights Reserved. Kasembon Rafting!</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>