<html lang="en">
<?php
/*
Template Name: Custom Template
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
                <li><a href="../index.html">.Home</a></li>
                <li><a href="./projecten.html">.Projecten</a></li>
                <li><a href="./richting.html">.Richtingen</a></li>
                <li><a href="./game.html">.Game</a></li>
            </ul>
            <img id="highkicks" src="../recourses/images/highkicks.gif">
        </div>
    </div>

    <div class="content">

        <h3><a href="./richtingtemp.html">.Elektronica</a></h3>


        <h3><a href="./richting/ict_network.html">.ICT</a></h3>

    </div>
<?php wp_footer();?>
</body>

</html>