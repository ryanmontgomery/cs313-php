<main>
    <h2 class="assignments-color">Student Information Form</h2>
    <form id="my-form" action="index.php" method="post">
        <h3 class="about-color">Name:</h3>
        <input id="form-name" type="text" name="name" required><br>

        <h3 class="about-color">Email:</h3>
        <input id="form-email" type="email" name="email" required><br>
        
        <!-- Stretch #1
        <?php
            $major_radio_id = "major-";
            $major_radio_abbr = array("cs", "wdd", "cit", "ce");
            $major_radio_fullname = array ("Computer Science", "Web Design and Development", "Computer Information Technology", "Computer Engineering");
        
            for($i = 0; $i < sizeof($major_radio_fullname); $i++) {
                echo "<input id=" . $major_radio_id . $major_radio_abbr[$i] . " type='radio' name='major' value='" . $major_radio_fullname[$i] . "' required>";
                echo "<label for=" . $major_radio_id . $major_radio_abbr[$i] . ">" . $major_radio_fullname[$i] . "</label>";
            }
        ?>
        -->

        <h3 class="about-color">Major:</h3>
        <div class="row">
            <div class="col-45">
                <input id="major-cs" type="radio" name="major" value="Computer Science" required>
                <label for="major-cs">Computer Science</label><br>

                <input id="major-wdd" type="radio" name="major" value="Web Design and Development">
                <label for="major-wdd">Web Design and Development</label>
            </div>

            <div class="col-45">
                <input id="major-cit" type="radio" name="major" value="Computer Information Technology">
                <label for="major-cit">Computer Information Technology</label><br>

                <input id="major-ce" type="radio" name="major" value="Computer Engineering">
                <label for="major-ce">Computer Engineering</label>
            </div>
        </div>

        <h3 class="about-color">Continents Visited:</h3>
        <div class="row">
            <div class="col-45">
                <input id="cont-na" type="checkbox" name="continent[]" value="na">
                <label for="cont-na">North America</label><br>

                <input id="cont-sa" type="checkbox" name="continent[]" value="sa">
                <label for="cont-sa">South America</label><br>

                <input id="cont-eu" type="checkbox" name="continent[]" value="eur">
                <label for="cont-eu">Europe</label><br>

                <input id="cont-asia" type="checkbox" name="continent[]" value="asia">
                <label for="cont-asia">Asia</label>
            </div>

            <div class="col-45">
                <input id="cont-aus" type="checkbox" name="continent[]" value="aus">
                <label for="cont-aus">Australia</label><br>

                <input id="cont-afr" type="checkbox" name="continent[]" value="afr">
                <label for="cont-afr">Africa</label><br>

                <input id="cont-ant" type="checkbox" name="continent[]" value="ant">
                <label for="cont-ant">Antarctica</label>
            </div>
        </div>

        <h3 class="about-color">Comments:</h3>
        <textarea id="form-comments" form="my-form" name="comments" placeholder="Enter additional comments here..."></textarea>

        <input id="form-submit" type="submit">
    </form>
</main>