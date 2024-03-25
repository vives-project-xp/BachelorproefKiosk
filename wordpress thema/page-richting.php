<html lang="en">
<?php
/*
Template Name: Page richting
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
    <div class="TopText">
        <h1>Kies een richting</h1>
        <p>Deze pagina bevat informatie over de richtingen van de opleiding Elektronica-ICT</p>
    </div>

    <!-- The sidebar -->
    <div class="leftbodydiv">
        <!-- The sidebar -->
        <div class="sidebar">
            <ul>
                <li><a href="../../Home">.Home</a></li>
                <li><a href="../Projecten">.Projecten</a></li>
                <li><a href="../Richtingen">.Richtingen</a></li>
                <li><a href="https://agar.io/">.Game</a></li>
            </ul>
            <img id="highkicks" src="../../wp-content/themes/ProefGeval/assets/images/highkicks.gif">
        </div>
    </div>

    <div class="content">

        <h3><a href="/home/richtingen/electronica">.Elektronica</a></h3>


        <h3><a href="/home/richtingen/ict">.ICT</a></h3>

    </div>
<?php wp_footer();?>
</body>

</html>