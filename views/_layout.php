<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@200;300;400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/x.x.x/jquery.min.js"></script>
    <script src="jquery.bpopup-x.x.x.min.js"></script>

    <link href="/app.css" rel="stylesheet"/>

    <title>Practice</title>
</head>
<body>
    <div class="header">
    </div>
    <div id="col-1">
        <ul class="nav flex-column">
            <?php if($_SESSION['applied'] === false): ?>
            <li class="nav-item">
                <a class="menu" href="/practice">Apply for practice</a>
            </li>
            <?php endif; ?>
            <?php if($_SESSION['applied'] === true): ?>
            <li class="nav-item">
                <a class="menu" href="/practice/application">Your application</a>
            </li>
            <?php endif; ?>
            <?php if($_SESSION['name']==='admin'): ?>
            <li class="nav-item">
                <a class="menu" href="/practice/signout">Sign out</a>
            </li>
            <?php endif; if($_SESSION['name']==='practice'): ?>
            <li class="nav-item">
                <a class="menu" href="/practice/signin">Sign in</a>
            </li>
            <?php endif; ?>
        </ul>
    </div>
    <div class="body" id="col-2">
        <?php echo $content ?>
    </div>
</body>
</html>
