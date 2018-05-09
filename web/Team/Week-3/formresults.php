<main>
    <h2 class="assignments-color">Student Information Form</h2>
    
    <h3 class="about-color">Name:</h3>
    <p><?php echo htmlspecialchars($name); ?></p>
    
    <h3 class="about-color">Email:</h3>
    <a href="mailto:<?php echo htmlspecialchars($email); ?>"><?php echo $email; ?></a>
    
    <h3 class="about-color">Major:</h3>
    <p><?php echo htmlspecialchars($major); ?></p>
    
    <h3 class="about-color">Continents Visited:</h3>
    <?php
        // Stretch #2
        $continent_codes = array("na" => "North America", "sa" => "South America", "eur" => "Europe", "asia" => "Asia", "aus" => "Australia", "afr" => "Africa", "ant" => "Antarctica", "none" => "You've been on an island your whole life!");
        foreach($continents as $continent)
            echo "<p>" . $continent_codes[$continent] . "</p>";
    ?>
    
    <h3 class="about-color">Comments:</h3>
    <p><?php echo htmlspecialchars($comments); ?></p>
</main>
