<html lang="en">
<?php
/*
Template Name: Project
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

<body onload="fill()" <?php body_class();?>>
<div class="topbar" type="navbar">
    <ul>
        <li><a href="../../../Home">.Home</a></li>
        <li><a href="../../Projecten">.Projecten</a></li>
        <li><a href="../../Richting">.Richtingen</a></li>
        <li><a href="../../Game">.Game</a></li>
    </ul>
    <img class="topbarimg" src="../recourses/images/shells.gif">
</div>

<div class="backnext">
    <button class="back">Back</button>
    <button class="next">Next</button>
</div>

<div class="projectwrapper">
    <div class="Red">

        <img src="../../recourses/images/Logo-VIVES-Hogeschool.png" alt="" background-color=green>
        <p id="studentName"></p>
        <p>Bacherlor Electronica-ICT</p>
        <p id="AfstudeerRichting"></p>

    </div>

    <div class="darkRed">

        <img id="StudentFace" src="" alt="">

        <i class="fa-brands fa-linkedin"><a class="Linkedin" href=""></a></i>

    </div>

    <div class="Gray">

    </div>

    <div class="proefTitel">

        <p><i class="fa-solid fa-window-minimize"></i> BACHELORPROEF</p>

        <p id="titel"></p>

    </div>

    <div class="proefInfo">

        <p id="info"></p>

    </div>


    <div class="left">

        <p>In opdracht van</p>
        <a id="opdrachtgever" href=""></a>
        <p id="opdrachtgeverText"></p>
        <p id="hashtag"></p>
    </div>
    <div class="right">

        <!--<a id="projectFoto" href=""></a>-->
        <img src="" alt="" id="projectFoto">
    </div>

</div>

<div class="backnext">
    <button class="back">Back</button>
    <button class="next">Next</button>
</div>

</div>
<?php wp_footer();?>
</body>

</html>

<script>
    function fill() {
        if (window.location.search.indexOf("?") != -1) {
            var ficheId = window.location.search.split("?")[1]
            fetch("http://" + backendAddr + "/backend").then(function (response) {
                if (response.ok) {
                    fetch("http://" + backendAddr + "/backend/getFiche/" + ficheId).then(async function (response) {
                        let data = await response.json();
                        data = data[0]
                        //console.log(data)
                        document.getElementById("studentName").textContent = data.studentNaam
                        document.getElementById("AfstudeerRichting").textContent = data.afstudeerRichting
                        document.getElementsByClassName("Linkedin")[0].href = "https://" + data.link
                        document.getElementById("titel").textContent = data.titel
                        document.getElementById("info").textContent = data.tekst
                        document.getElementById("opdrachtgeverText").textContent = data.bedrijf
                        document.getElementById("StudentFace").src = "http://" + backendAddr + "/backendIMG/" + data.afbeelding1
                        document.getElementById("projectFoto").src = "http://" + backendAddr + "/backendIMG/" + data.afbeelding2
                        document.getElementById("hashtag").textContent = data.hashtags
                    })
                }
            })
        }
    }
</script>