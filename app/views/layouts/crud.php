<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <!-- Bootstrap -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->

</head>

<body>
<nav class="navbar navbar-static-top navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="books">Test Crud</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="publish">Publish house</a></li>
            <li><a href="authors">Authors</a></li>
        </ul>
    </div>
</nav>

<?=$content; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
</script><script src="public/js/bootstrap.min.js"></script>
<script src="public/js/ajaxRequests.js"></script>
</body>

</html>