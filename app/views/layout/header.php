<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul'] ?> Page</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
</head>

<body>


    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand " href="<?= BASEURL; ?>"><b>MVC</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>/home">Home</a>
                    <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>/about">About</a>
                    <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>/data">Data</a>
                </div>
            </div>
        </div>
    </nav>