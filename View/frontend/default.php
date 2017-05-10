<?php
use \Framework\Application\Application;
use \Framework\Config\Config;

?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo Config::get('siteName')?></title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>
<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="/"><?=Config::get('site_name')?></a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li <?php if( Application::getRouter()->getController() == 'page' ) {
                        ?>class="active"<?php
                    } ?>><a href="/page/">Pages</a></li>
                    <li><a <?php if( Application::getRouter()->getController() == 'contact' ) {
                        ?>class="active"<?php
                    } ?> href="/contact/">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <div class="starter-template">
            <br>
            <br>
            <?php echo $data['content']?>
        </div>

    </div>

</body>
</html>