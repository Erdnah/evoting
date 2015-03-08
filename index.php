<?php

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>E-hääletus</title>
        <meta charset="utf-8">

        
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>
         <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '1554949304755420',
          xfbml      : true,
          version    : 'v2.1'
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>

        <header>
        	<h1> E-Valimised</h1>
            <nav>
	<ul>
		<li><a href="kandidaadid.php">Kandidaadid</a></li>
        <li><a href="tulemused.php">Tulemused</a></li>
        <li><a href="statistika.php">Statistika</a></li>
        <li><a href="andmed.php">Minu andmed</a></li>
		<li>
			<a href="login.html">Logi sisse <span class="caret"></span></a>
			<div>
				<ul>
					<li><a href="login.html">Google+</a></li>
				</ul>
			</div>
		</li>
	</ul>
</nav>
           
               
        </header>
		<hr>
        <section>

            <h2>Tere tulemast e-hääletuse leheküljele!</h2>

            <article>
                
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam dictum, lacus vitae sollicitudin varius, tellus neque pharetra diam, posuere pharetra sapien sapien non tellus. Fusce nec laoreet neque, non ullamcorper mi. Fusce ac sem nulla. Sed quis ante at felis elementum ornare faucibus sed mauris. Mauris sodales tempus nisl, quis convallis massa aliquam vitae. Cras finibus erat feugiat, consequat lacus eu, posuere ligula. Suspendisse lectus libero, consectetur vel tellus ac, tristique egestas ex.
                </p>
            </article>

        </section>

        <footer>
           
        </footer>

    </body>
</html>