<html>
    <head>
        <?= $head_view; ?>
    </head>
    <body>
        <nav class="navbar navbar-inverse no-margin-bottom">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Project name</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <?= $header_view; ?>
            </div>
            <div class="row">
                <?= $content_view; ?>
            </div>
            <div class="row">
                <?= $side_view; ?>
            </div>
            <div class="row">
                <?= $footer_view; ?>
            </div>
            <div class="row">
                <?= $foot_view; ?>
            </div>
        </div>
    </body>
</html>