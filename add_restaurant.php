<!DOCTYPE html>
<html>
    <head>
        <title>Restaurants</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <div>
        <h1>Add Restaurant</h1>
        
		<?php
		if (isset($_POST["submit"])) {
			$mysqli = new mysqli("it354.com", "it354_chiggins", "ipconfig9", "it354_chiggins");
			if ($mysqli->connect_errno) {
				echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			} 
			
			$name = $mysqli->real_escape_string($_POST["name"]);
			$address = $mysqli->real_escape_string($_POST["address"]);
			$city = $mysqli->real_escape_string($_POST["city"]);
			$state = $mysqli->real_escape_string($_POST["state"]);
			$zip = $mysqli->real_escape_string($_POST["zip"]);
			
			$add_restaurant = $mysqli->query("INSERT INTO assign2_restaurants (restaurant_name, address, city, state, zip) VALUES
												('$name', '$address', '$city', '$state', '$zip')");
			
			if ($add_restaurant) {
				echo "<p style=\"color: green; font-weight: bold;\">Restaurant {$name} added successfully.</p>";
			} else {
				echo "<p style=\"color: red; font-weight: bold;\">Error adding restaurant: " . $mysqli->error . ".</p>";
			}
		}
		?>
		
        <form action="add_restaurant.php" method="POST">
          <label for="name">Restaurant Name:</label>
          <input type="text" name="name" />
          <label for="address">Address:</label>
          <input type="text" name="address" />
          <label for="city">City:</label>
          <input type="text" name="city" />
          <label for="state">State:</label>
          <input type="text" name="state" />
          <label for="zip">Zip:</label>
          <input type="text" name="zip" />
          <input type="submit" name="submit" value="Add Restaurant" />
        </form>

        </div>
    </body>
</html>
