<!DOCTYPE html>
<html lang="hu-HU">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helységnév katalógus</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.bundle.js"></script>
</head>

<body>
    <div class="container-fluid bg-dark">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="./">Főoldal</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown">Helységnévtár</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="./?p=all">Összes település</a></li>
                                <li><a class="dropdown-item" href="./?p=abc">Összes település ABC-ben</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./?p=kozseg">Község</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./?p=nagykozseg">Nagyközség</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./?p=varos">Város</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>

    

    