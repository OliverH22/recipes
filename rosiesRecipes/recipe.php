<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Rosie's Recipes</title>
    <link rel="stylesheet" href="styles/default-styles.css" type="text/css">
    <script src="src/loader.js" type="module"></script>
</head>
<body>
    <nav>
        <div class="dropdown">
            <button class="navbtn">...</button>
            <h1>Rosie's Recipes</h1>
            <div class="nav-content">
                <a href="index.php">Home</a>
                <a href="allrecipes.php">Recipes</a>
            </div>
        </div>
        <p class="search"><input id="searchBar"><button id="searchButton">Search</button></p>
    </nav>
    <section id="recipeWrapper">
		<?php 
			include "database.php";
			$name;
			$recipe = "Nothing here!";
			if(array_key_exists('recipe', $_GET)){
				$name = $_GET['recipe'];
				for($i = 0; $i < count($all); $i++) {
					if ($all[$i]['name'] == $name) {
						$recipe = $all[$i];
						break;
					}
				}
			}
			
			if ($recipe != "Nothing here!") {
				echo "<h2>".$recipe["name"]."</h2>";
				deChunk($recipe["intro"], "p");
				echo "<img src='".$recipe["img"]."' alt='".$recipe["name"]."'>";
				echo "<h3>What You'll Need:</h3><ul>";
				deChunk($recipe["ingredients"], "li");
				echo "</ul><h3>How to Make It:</h3><ol>";
				deChunk($recipe["procedure"], "li");
				echo "</ol>";
			} else {
				echo "<h2>".$recipe."</h2>";
			}
			
		?>
    </section>
</body>
</html>