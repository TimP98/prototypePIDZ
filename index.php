<?php
require_once 'config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../PIDZforum/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title></title>
</head>

<body>
    <div class="phone">
  <div class="phone-speaker"></div>
  <div class="phone-screen">
    <div class="phone-header">
        <div class="pidz-logo"></div>
      <div class="phone-menu"></div>
    </div>
<div class="content-container">
 <p class="title">Forum.</p>     
    <h1>Deel kennis met elkaar via vragen of plan een meeting in voor een antwoord op jouw vraag.</h1>
    <div class="search-container">
    <input id="filter" type="text" placeholder="Zoek in Forum..." />
<i id="filtersubmit" class="fa fa-search"></i>
        </div>
        <button class="vraag-button" data-toggle="modal" data-target="#add_post">Stel een vraag</button>
    <div class="post-container">
                <?php
                $sql = mysqli_query($conn, "select * from post_main order by post_id desc");
                if (mysqli_num_rows($sql) > 0) {
                    $i = 1;
                    while ($row = mysqli_fetch_array($sql)) {
                        ?>
                        <div class="col-sm-3 col-md-3 grid-column-box">
                            <?php
                            $antwoord = explode(' ', trim($row['post_antwoord']));
                            if (implode($antwoord) == 'chat') { 
                                    echo "<div class='balk'><img class='faq' src='faq-icon.svg' alt=''></div>";
                                } else if(implode($antwoord) == 'meeting'){ 
                                echo "<div class='balkmeeting'><img class='faq' src='faq-icon2.svg' alt=''></div>";
                                }
                            ?>
                            <span class="item-title"><?= $row['post_title']; ?></span>
                            <span class="item-date"><?= $row['post_tijd']; ?></span>
                            <br>
                            <p class="item-description"><?= $row['post_vraag']; ?></p>
                            <div class="u-info">
                                <?php
                                $full_name = explode(' ', trim($row['post_cat']));
                                ?>
                                <?php
                                if (implode($full_name) == 'functie') { 
                                    echo "<span class='u-name'>"."$full_name[0]"."</span>";
                                    echo "<a class='btn' href='#'><img class='arrow' src='arrow.svg' alt=''></a>";
                                } 
                                else if(implode($full_name) == 'programmas'){ 
                                    echo "<span class='u-name-prog'>"."$full_name[0]"."</span>";
                                    echo "<a class='btn' href='#'><img class='arrow' src='arrow.svg' alt=''></a>";
                                }
                                else if(implode($full_name) == 'boekhouding')
                                {
                                    echo "<span class='u-name-boek'>"."$full_name[0]"."</span>";
                                    echo "<a class='btn' href='#'><img class='arrow' src='arrow.svg' alt=''></a>";
                                }
                                else if(implode($full_name) == 'opdrachtgever')
                                {
                                    echo "<span class='u-name-opdracht'>"."$full_name[0]"."</span>";
                                    echo "<a class='btn' href='#'><img class='arrow' src='arrow.svg' alt=''></a>";
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                        if ($i == 4) {
                            $i = 0;
                        }
                        $i++;
                    }
                }
                ?>
    </div>
     <div class="modal" id="add_post" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Sluiten</span></button> 
                        <h4 class="modal-title" id="defModalHead">STEL EEN VRAAG.&nbsp;</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <form method="post" action="post.php">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="col-8">
                                            <label for="title" class="col-4 col-form-label">Titel</label> 
                                            <input id="title" name="title" pattern="[A-Za-z.0-9\s]+" class="form-control" type="text" maxlength="30" value="<?= !empty($post) ? $post['title'] : ""; ?>" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-8">
                                            <label for="description" class="col-4 col-form-label">Categorieën</label> 
                                            <select name="categorie" id="categorie" class="veldinput">
                                                <option value="programmas">Programmas</option>
                                                <option value="boekhouding">Boekhouding</option>
                                                <option value="opdrachtgever">Opdrachtgever</option>
                                                <option value="functie">Functie</option>
                                            </select>  <?= !empty($post) ? $post['categorie'] : ""; ?> </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-8">
                                            <label for="title" class="col-4 col-form-label">Vraag</label> 
                                            <input id="vraag" name="vraag" pattern="[A-Za-z.0-9,?'\s]+" placeholder="" class="form-control" type="text" maxlength="250" value="<?= !empty($post) ? $post['vraag'] : ""; ?>" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-8">
                                            <label for="description" class="col-4 col-form-label">Antwoord via</label> 
                                            <input id="chat" type="checkbox" name="post_antwoord" value="chat">&nbsp;
                                                <label for="vehicle1" class="optioneel">Chat</label><br>
                                                <input id="meeting" type="checkbox" class="boxje2" name="post_antwoord" value="meeting">&nbsp;
                                                <label for="vehicle2" class="optioneel">Meeting</label><br>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-8">
                                                <label for="description" class="col-4 col-form-label">Selecteer app</label> 
                                                <input id="skype" type="checkbox" name="post_app" value="skype">&nbsp;
                                                <label for="skype" class="optioneel">Skype</label><br>
                                                <input id="teams" type="checkbox" class="boxje2" name="post_app" value="teams">&nbsp;
                                                <label for="teams" class="optioneel">Microsoft Teams</label><br>
                                            <input id="zoom" type="checkbox" class="boxje2" name="post_app" value="zoom">&nbsp;
                                                <label for="zoom" class="optioneel">Zoom</label><br>
                                            <input id="whereby" type="checkbox" class="boxje2" name="post_app" value="whereby">&nbsp;
                                                <label for="whereby" class="optioneel">Whereby</label><br>
                                            <input id="anders" type="checkbox" class="boxje2" name="post_app" value="anders">&nbsp;
                                                <label for="anders" class="optioneel">Iets anders namelijk</label><br>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-8">
                                            <p class="time">Tijd</p> 
                                            <input id="tijd" name="tijd" class="form-control" type="date" value="<?= !empty($post) ? $post['tijd'] : ""; ?>" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-8">
                                            <label for="title" class="col-4 col-form-label">Link naar meeting</label> 
                                            <input id="link" name="link" pattern="[A-Za-z.0-9\s]+" placeholder="" class="form-control" type="text" maxlength="30" value="<?= !empty($post) ? $post['link'] : ""; ?>" required/>
                                        </div>
                                    </div>
                                    <input type="submit" name="submit" pattern="[A-Za-z.]+" class="verstuur-button" value="Plaats aanbod" />
                                </div>
                            </form>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
             <?php $_SESSION['show_post']="get_post"; ?>

</div>
  
</div> <!-- Phone Screen-->
  <div class="phone-button"></div>
</div><!--Phone -->
</body>
</html>