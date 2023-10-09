<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <title>Laravel - Gatherer</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="//cdn.jsdelivr.net/npm/keyrune@latest/css/keyrune.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="container">
    <header>
        <div class="container mt-4">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                  <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid">
                      <a class="navbar-brand" href="#">Laravel Gatherer</a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                          <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/cards">Cards</a>
                          </li>
                          
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Cards by colour
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="/cards/green">Green cards</a></li>
                              <li><a class="dropdown-item" href="/cards/red">Red cards</a></li>
                              <li><a class="dropdown-item" href="/cards/blue">Blue cards</a></li>
                              <li><a class="dropdown-item" href="/cards/white">White cards</a></li>
                              <li><a class="dropdown-item" href="/cards/black">Black cards</a></li>
                            </ul>
                            
                          </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Cards by type
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="/cards/creature">Creature cards</a></li>
                              <li><a class="dropdown-item" href="/cards/instant">Instant cards</a></li>
                              <li><a class="dropdown-item" href="/cards/Sorcery">Sorcery cards</a></li>
                              <li><a class="dropdown-item" href="/cards/artifact">Artifacts cards</a></li>
                              <li><a class="dropdown-item" href="/cards/enchantment">Enchantment cards</a></li>
                              <li><a class="dropdown-item" href="/cards/planeswalker">Planeswalker cards</a></li>
                            </ul>
                          </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                             Guilds | Shards
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="/guilds">All Guilds</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item" href="/guilds/izzet">Izzet</a></li>
                              <li><a class="dropdown-item" href="/cards/blue">Blue cards</a></li>
                              <li><a class="dropdown-item" href="/cards/white">White cards</a></li>
                              <li><a class="dropdown-item" href="/cards/black">Black cards</a></li>
                            </ul>
                          </li>
                          {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Logout
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            </ul>
                          </li> --}}
                        </ul>
                        <form class="d-flex" role="search">
                          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                          <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                      </div>
                    </div>
                  </nav>
                    <p class="lead text-center">My personal Magic: The Gathering collection</p>
                </div>
            </div>
        </div>
    </header>
