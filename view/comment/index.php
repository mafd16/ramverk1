<?php
// Start session
//$app->session->name("commentsystem");
//$app->session->start();
//$comments = $app->session->get("comments")
//print_r($app->session->get("commentsystem"));
// remove all session variables
//session_unset();
//print_r($_SESSION);
//print_r($data);
// Get existing comments from controller
//$comments = $app->comController->getComments("comPage");
//print_r($data["templateData"]);// = $data["comments"];

//var_dump(get_defined_functions());
//echo showEnvironment(get_defined_vars());

//print_r($app->session->get("comPage"));

?>

<section class="section">
  <div class="container">
    <h1 class="title">
      Kommentarssystem
    </h1>
    <p class="subtitle">
        Eller åtminstone en prototyp
    </p>
    <br>
    <p>
        I denna uppgiften ska vi skapa ett kommentarssystem. Systemet ska vara
        byggt enligt MVC - Model, View, Controller. Till att börja med så blir
        det ett enklare system. Kommentarerna sparas i sessionen!
    </p>
    <br>
    <p class="subtitle">Kommentarer:</p>
    <hr>
<!--
<article class="media">
  <figure class="media-left">
    <p class="image is-64x64">
      <img src="http://bulma.io/images/placeholders/128x128.png">
    </p>
  </figure>
  <div class="media-content">
    <div class="content">
      <p>
        <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
        <br>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna
        eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam
        finibus odio quis feugiat facilisis.
      </p>
    </div>
    <nav class="level is-mobile">
      <div class="level-left">
        <a class="level-item">
          <span class="icon is-small"><i class="fa fa-reply"></i></span>
        </a>
        <a class="level-item">
          <span class="icon is-small"><i class="fa fa-retweet"></i></span>
        </a>
        <a class="level-item">
          <span class="icon is-small"><i class="fa fa-heart"></i></span>
        </a>
      </div>
    </nav>
  </div>
  <div class="media-right">
    <button class="delete"></button>
  </div>
</article>


<hr>
-->
<?php

//print_r($comments);
//var_dump($comments);

if (!$comments) {
    echo "<p>Inga kommentarer hittills!</p>";
} else {
    foreach ($comments as $comment) {
        // Code for the Gravatar:
        $gravatarhash = md5(strtolower(trim($comment["email"])));
        //var_dump($comment);

        echo '<article class="media">';
        echo   '<figure class="media-left">';
        echo     '<p class="image is-64x64">';
        //echo       '<img src="http://bulma.io/images/placeholders/128x128.png">';
        echo        '<img src="https://www.gravatar.com/avatar/' . $gravatarhash . '?s=64" />';
        echo    '</p>';
        echo   '</figure>';
        echo   '<div class="media-content">';
        echo     '<div class="content">';
        echo       '<p>';
        //echo        ' <strong>' . $comment["name"] . '</strong> <small>' . $comment["email"] . '</small> <small>31m</small>';
        //echo         '<br>';
        echo         ' <strong> <a href="mailto:' . $comment["email"] . '">' . $comment["name"] . '</a> </strong>';
        echo         '<br>';
        echo         $comment["comment"];
        echo       '</p>';
        echo     '</div>';
        echo   '<nav class="level is-mobile">';
        echo   '  <div class="level-left">';
        //echo   '    <a class="level-item">';
        //echo   '      <span class="icon is-small"><i class="fa fa-reply"></i></span>';
        //echo   '    </a>';
        echo   '    <a class="level-item" href="' . $app->url->create("comment/edit") . '?key=comPage&id=' . $comment["id"] . '">';
        echo   '      <span class="icon is-small"><i class="fa fa-pencil"></i></span>';
        echo   '    </a>';
        //echo   '    <a class="level-item">';
        //echo   '      <span class="icon is-small"><i class="fa fa-heart"></i></span>';
        //echo   '    </a>';
        echo   '    <a class="level-item" href="' . $app->url->create("comment/delete") . '?key=comPage&id=' . $comment["id"] . '">';
        echo   '      <span class="icon is-small"><i class="fa fa-times-circle"></i></span>';
        echo   '    </a>';
        echo   '  </div>';
        echo   '</nav>';
        echo   '</div>';
        //echo    '<div class="media-right">';
        //echo        '<button class="delete"></button>';
        //echo    '</div>';
        echo '</article>';
    };
}

?>
<hr>
<!--

<div class="field">
  <label class="label">Namn</label>
  <div class="control">
    <input class="input" type="text" placeholder="Namn">
  </div>
</div>

<div class="field">
  <label class="label">Epost</label>
  <div class="control">
    <input class="input" type="text" placeholder="Epost">
  </div>
</div>


<div class="field">
  <label class="label">Kommentar</label>
  <div class="control">
    <textarea class="textarea" placeholder="Kommentar"></textarea>
  </div>
</div>

<div class="field">
  <div class="control">
    <label class="checkbox">
      <input type="checkbox">
      Jag är inte en robot!
    </label>
  </div>
</div>

<div class="field is-grouped">
  <div class="control">
    <button class="button is-primary">Skicka</button>
  </div>
</div>

-->
<div class="columns is-mobile">
  <div class="column is-two-third-tablet is-half-desktop">
      <form action=<?= $app->url->create("comment/add"); ?> method="post">
          <input type="hidden" name="article" value="comPage">
          Namn: <input class="input" type="text" name="name"><br>
          Epost: <input class="input" type="text" name="email"><br>
          <!--Kommentar: <input class="textarea" type="text" name="comment"><br>-->
          Kommentar: <textarea class="textarea" name="comment"></textarea><br>
          <input type="submit" value="Posta" class="button is-primary">
      </form>
  </div>
</div>

<!--
<form action= //$app->url->create("comment"); ?> method="post">
    Namn: <input type="text" name="name"><br>
    Epost: <input type="text" name="email"><br>
    Kommentar: <input type="text" name="comment"><br>
    <input type="submit" value="Submit">
</form>
-->

<?php
/** Get the dataset or parts of it. */
//$app->router->get("api/test", [$app->remController, "getDataset"]);

//$data = $app->response->getBody();

//print_r($data);

?>




  </div>
</section>
