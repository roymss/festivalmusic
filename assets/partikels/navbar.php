<?php

if(isset($_POST["cari"])){
    $performers = cari($_POST["keyword"]);
}

?>

<nav class="navbar bg-body-tertiary fixed-top">
    <div class="container d-flex">
        <a class="navbar-brand" href="#">Harmoni Fest</a>
        <ul class="navbar-nav d-flex justify-content-center align-items-center flex-row gap-5">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Disabled</a>
            </li>
        </ul>
        <form class="d-flex" role="search" method="POST">
            <input class="form-control me-2" name="keyword" type="text" placeholder="Search">
            <button class="btn btn-danger" type="submit" name="cari">Search</button>
        </form>
    </div>
</nav>