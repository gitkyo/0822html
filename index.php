<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Exemple html css js - 0822</title>
  
    <?php 
        $prenom = "pierre";
    ?>
  <!-- 
  	pas encore utilisé, on a mis pour l'instant le css dans le fichier html au travers d'une balise style
  	<link rel="stylesheet" href="style.css"> -->
  
  <!-- appeler le script jquery -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"
	integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
	crossorigin="anonymous"></script>
</head>
<body>

<?php 


// le classic en php c'est par exemple : 
// test si tu es connecté en php avec les variables $session
// et si tu es connecté, on fait des requettes SQL sur une base de donnée afin 
// de récupérer les données qui te concerne et les stocker dans des variables afin de les afiiches aux utilisateurs
// lors de la réponse du serveur en html, css, js

   

    $mysqli = new mysqli("localhost", "root", "", "mydb");
    if ($mysqli->connect_errno) {
        echo "Échec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    

    $mysqli->real_query("SELECT prenom, nom, age FROM users ORDER BY id ASC");
    $res = $mysqli->use_result();

    echo "test affichage de donnée via une bdd<br/>";
    while ($row = $res->fetch_assoc()) {
        echo " Qui suis-je ? ".$row['prenom']." - ".$row['nom']." ".$row['age']. "\n";
    }



    // Exemple de fonctions et usage des boulces, for etc
    
    function _getDate(){

        // on appelle la fonction getDate de php : https://www.php.net/manual/fr/function.getdate.php
        $today = getdate();

        // on affiche tout le tableau
        print_r($today) ;

        echo "------<br/>";

        // on affiche un element du tableau
        print_r($today['mday']) ;

        echo "<br/><br/>";

        // on parcour le tableau avec une boucle foreach
        foreach ($today as &$value) {
            echo "la valeur du tableau dans le foreach : ".$value." <br/>";
        }

        // je créer un tableau php
        $monTableau = ['pierre','35','st-Pierre'];

        // on parcour le tableau avec une boucle for
        for ($i=0; $i < sizeof($monTableau); $i++) { 

            if($i == 1) $monTableau[$i] = '55 ans';          
           
            
            echo "<br/>".$monTableau[$i]."<br/>";
            
        }

        
    }

    
    

    


?>


	<!-- des balises classiques : briques -->
<p> une brique de html de type <strong>paragraphe</strong></p>

<div class="section1">

	<a href="https://www.free-css.com/template-categories/portfolio" alt="" title="text au survol">un example de lien</a>

	<p class="special"> es ce que tu as le doit de boire ? <?php echo $prenom ; ?> et la date  : <pre><?php _getDate(); ?></pre></p>	

	<!-- balise qui va recevoir le calc du javascript -->
	Jour :<div id="reponse_age"></div>

	nb de premiers entiers :<div id="reponse_entier"></div>



    
	
	<!-- saut de ligne	 -->
	<br/>
	<br/>
	<br/>
	
	<button id="calcEntiersBtn">Calcul entiers</button>
	
	<br/>
	<br/>
	<br/>

	<!-- des balises auto fermantes -->
	<img id="imgMoi" src="https://avatars.githubusercontent.com/u/1768831?v=4">




</div>



<!-- la peinture -->
<style type="text/css">

	.section1{
		text-align: center;
	}
	
	p.special{
		background-color: teal;
	}

	img{		
		width: 10%;
	}

</style>



<!-- plus bas mon script custom -->


<!-- l'animation, ça bouge, manipuler les balises -->
<script type="text/javascript">
	
	// $(document).ready - > fonction de jquery pour démarrer un script js dans une page
	$(document).ready(function(){
		
		// on definit une fonction 
		function calcDate(parametre){
			
			var currentDate = new Date();

			if(parametre == true){
				
				var currentDay = currentDate.getDate();

			} else{

				var currentDay = "pas de date";
			}
				
		 	$('#reponse_age').append( currentDay );
		}



		// une fonction pour calculer et utiliser la boucle for
		function claclNPremierEntier(nb){

			var nb;

			var cpt = 0;
			

			for (var i = 0 ; i <= nb  ; i++ ) {

				console.log("cpt : "+cpt);
				
				cpt = cpt + i;
			}

			// on ajouter dans le html la réponse du calcul
			$('#reponse_entier').append( cpt );
		}	

		

				

		// quand on clic sur le bouton avec l'id calcDateBtn
		$('#calcDateBtn').click(function() {

			// ici on appelle une fonction avec un parametre 
			calcDate( true );


			$('#imgMoi').hide( "slow", function() {
				//instruction quand l'animation est terminé
				console.log( "Animation complete." );
				
			});
			


		});

		// on attend un evenement de clic sur la balise avec l'id : calcEntiersBtn
		$('#calcEntiersBtn').click(function(){

			//on demande à l'utilisateur qqch pour l'inserer dans une variable
			var chiffre = prompt("Donne moi un chiffre");

			// on appel la fonction avec un parametre
			claclNPremierEntier(chiffre);

		});

		
	});



</script>
</body>
</html>

