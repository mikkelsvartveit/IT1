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
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure vero quam earum qui delectus, quia alias eligendi, quasi! A reprehenderit, perspiciatis beatae sint tempora voluptas? Fugiat sed ullam voluptas accusantium quas ratione facilis, ducimus quod nisi sunt, odio doloremque nesciunt perferendis, sit porro, nulla vero consequuntur! Dolore ratione, officia molestiae.</p>
            </div>
            
            <div class="col-3">
                <h3>Vår mat</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure vero quam earum qui delectus, quia alias eligendi, quasi! A reprehenderit, perspiciatis beatae sint tempora voluptas? Fugiat sed ullam voluptas accusantium quas ratione facilis, ducimus quod nisi sunt, odio doloremque nesciunt perferendis, sit porro, nulla vero consequuntur! Dolore ratione, officia molestiae.</p>
            </div>
            
            <div class="col-3">
                <h3>Om oss</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure vero quam earum qui delectus, quia alias eligendi, quasi! A reprehenderit, perspiciatis beatae sint tempora voluptas? Fugiat sed ullam voluptas accusantium quas ratione facilis, ducimus quod nisi sunt, odio doloremque nesciunt perferendis, sit porro, nulla vero consequuntur! Dolore ratione, officia molestiae.</p>
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