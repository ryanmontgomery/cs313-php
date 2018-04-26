<?php 
    $ptitle="CS 313 - About Me";
    include ("shared/_header.php");
?>

<main>
    <h2 class="page-header about-color">About Me</h2>
    <div class="row">
        <div class="col-40">
            <img src="img/Self.jpg" alt="Picture of Ryan">
        </div>
        <div class="col col-40">
            <p class="picture-caption">Hello! My name is Ryan. I'm studying web development at Brigham Young University - Idaho.</p>
        </div>
    </div>

    <h2 class="page-header about-color">A Hobby</h2>
    <p>One thing I've enjoyed since I was little is video games. Nowadays, I don't have much time to play (Life, huh?), but I still enjoy it.  I've recently started going back to a lot of the retro games I enjoyed as a kid.</p>
    <p>To go along with retro gaming, I've taken an interest in FPGA hardware, which is hardware that simulates the exact functionality of the old hardware. It's different than software emulation, which is commonly used for retro gaming (like the NES Classic). I recently preordered an <a class="about-color" href="https://www.analogue.co">Anologue Super Nt</a>, which simulates a Super Nintendo. I'm going to use it to go back and play some of those classic games from my youth. I still have my old cartridges. A Link to the Past and Super Metroid, here I come!</p>

    <div class="col-80">
        <img src="img/SuperNT-Tower.jpg" alt="Super Nt Tower">
    </div>
</main>

<?php include ("shared/_footer.php"); ?>