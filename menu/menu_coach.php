<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="navbar-brand">
    <a href="#!/" >Archery Followed</a>
  </div>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <div class="navbar-nav mr-auto">

    </div>
    <div class="navbar-nav my-2 my-lg-0">
      <li class="nav-item active">
        <form class="nav-link"  method="post" action="php/recherche.php">
          <input id="rechin" type="text" name="recherche" placeholder="Rechercher"/>
          <input id="rechbut" type="submit" value="Recherche"/>
        </form>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#!/main" data-target="#navbarSupportedContent">Accueil</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#!/performance" data-target="#navbarSupportedContent">Mes performances</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown">Paramètres</a>
        <ul class="dropdown-menu">
          <li class="nav-item active">
            <a class="nav-link" href="#!/moncompte" data-target="#navbarSupportedContent">Mon compte</a>
          </li>
          <li>
            <div class="navbar-nav my-2 my-lg-0">
              <a id="deco_but" href="php/deconnexion.php">Déconnexion</a>
            </div>
          </li>
        </ul>
      </li>
    </div>


  </div>
</nav>
