<html lang="en">
<?php
/*
Template Name: Admin
*/
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Kenrie Vandekerckhove">
    <meta name="author" content="Domien Verstraete">
    <meta name="author" content="Seraphin Sampers">
    <title>Bachelor Kiosk</title>
<?php wp_head();?>
</head>

<body <?php body_class();?>>
    <h1>admin page</h1>
    <h2>Je hebt een juist wachtwoord ingevoerd.</h2>
    <h2>Dit wil zeggen dat je een admin bent.</h2>
    <h2>Veel Plezier met dingen aanpassen</h2>

    <div class="sidebar">
        <ul>
            <li><a href="../../Home">.Home</a></li>
            <li><a href="../Projecten">.Projecten</a></li>
            <li><a href="../Richtingen">.Richtingen</a></li>
            <li><a href="../Game">.Game</a></li>
        </ul>
        <img src="../recourses/images/asemgou-of-aventura-arcade.gif" class="kong">
    </div>

    <div class="content">
    <div id="proefenlijst">
        <p>Lijst met alle proeven:</p>
    <ul>
        <li id="proefid">05659</li>
        <li id="proeftitel">Cloud systemen ontwikkelen</li>
        <li id="edit"><button id="edit">Edit</button></li>
        <li id="delete"><button id="delete">Delete</button></li><br>
    </ul>
        <button id="new">Nieuw project</button>
    </div>

    <div id="projectinvul" >
        <form action="">
            <label for="titel">Titel:</label><br>
            <input type="text" id="titel" name="titel"><br>
            <label for="name">Naam Student:</label><br>
            <input type="text" id="name" name="name"><br>
            <label for="richting">Richting:</label><br>
            <select id="richting" name="richting">
                <option value="Electronica">Electronica</option>
                <option value="Network & System Admin">Network & System Admin</option>
                <option value="Software Engineer & AI">Software Engineer & AI</option>
            </select><br>
            <label for="linkedin">Linkedin Link:</label><br>
            <input type="url" id="linkedin" name="linkedin"><br>
            <label for="beschrijving">Beschrijving:</label><br>
            <input type="text" id="beschrijving" name="beschrijving"><br>
            <label for="afbeelding1">Afbeelding leerling:</label><br>
            <input type="file" id="afbeelding1" name="afbeelding1"><br>
            <label for="afbeelding2">Afbeelding project:</label><br>
            <input type="file" id="afbeelding2" name="afbeelding2"><br>
            <label for="hashtag">3 Hashtags:</label><br>
            <input type="text" id="hashtag" name="hashtag"><br>
            <input type="submit" value="Submit">
        </form>
    </div>
    
    <div id="richtinglijst">
        <p>Lijst met Richtingen</p>
        <ul>
            <li id="richting">Electronica</li>
            <li><button id="Removerichting">Remove</button></li><br>
        </ul>
        <button id="newrichting">Nieuwe richting</button>
    </div>
    <div id="richtinginvul">
        <form action="">
            <label for="richting">Nieuwe richting:</label><br>
            <input type="text" id="richting" name="richting"><br>
            <input type="submit" value="Submit">
        </form>
    </div>
    </div>
<?php wp_footer();?>
</body>

</html>