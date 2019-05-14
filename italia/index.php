<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Italiensk restaurant</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600|Open+Sans:300,400,700" rel="stylesheet"> 
</head>

<body id="top">
    <div class="menu" id="menu">
        <div class="menu-left">
            <a href="#top">Italiensk restaurant</a>
        </div>
        <div class="menu-right">
            <a href="#lesmer">Info</a>
            <a href="bestill.php">Meny/bestill</a>
            <a href="admin" target="_blank">Admin</a>
        </div>
    </div>
    
    <div class="cover">
        <h1>Italiensk restaurant</h1>
        <div>
            <a href="#lesmer">Les mer</a>
            <a href="bestill.php">Bestill mat</a>
        </div>
    </div>
    
    <div class="content" id="lesmer">
        <div class="flex">
            <div class="col-3">
                <h3>Internasjonal uke</h3>
                <p>Det er tid for internasjonal uke på Oslofjorden VGS, og restaurant- og matfag skal servere mat for elever og ansatte med temaet italienske mattradisjoner. På denne nettsiden kan du lese mer om oss, se vår meny og forhåndsbestille mat fra oss.</p>
            </div>
            
            <div class="col-3">
                <h3>Vår mat</h3>
                <p>Vår restaurant bruker råvarer av beste kvalitet til våre matretter. Råvarene blir nøye undersøkt og kvalitetssjekket før maten lages. Maten blir tilberedt og servert av våre flinke elever. Vi har satt sammen en meny med klassiske italienske retter. Velg forrett, hovedrett og dessert og forhåndsbestill mat allerede nå!</p>
            </div>
            
            <div class="col-3">
                <h3>Om oss</h3>
                <p>Restaurant- og matfag på Oslofjorden VGS har til sammen 27 elever og 4 lærere fordelt på to årstrinn. Skal du snart søke VGS og er interessert i mer informasjon om restaurant- og matfag? Besøk <a href="http://restaurantogmatfag.no" target="_blank">restaurantogmatfag.no</a>.</p>
            </div>
        </div>
        
        <div class="flex flex-center">
            <video src="video/italienskmat.mp4" controls></video>
        </div>
    </div>
    
    <script>
        var menuShowing = false;
        
        window.onscroll = function() {
            var clientHeight = window.innerHeight;
            var scrollPosition = window.pageYOffset;
            
            if(scrollPosition >= clientHeight / 3 && !menuShowing) {
                var menu = document.getElementById("menu");
                menu.classList.add("menu-scrolled");
                menuShowing = true;
            } 
            
            else if(scrollPosition < clientHeight / 3 && menuShowing) {
                var menu = document.getElementById("menu");
                menu.classList.remove("menu-scrolled");
                menuShowing = false;
            }
        }
    </script>
</body>    

</html>