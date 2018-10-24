<?php
  include_once '../fragments/header.php';
?>

<section class="main-container">
  <div class="main-wrapper">


    <div class = "for-texts">
      <h1 align="middle"> Welcome! </h1>
      <img id = "ramsy" src = "../images/ramsy.jpg" alt = "float">
			<p>Hello and welcome to website! Here you will find some of the most delicious
			recipes from around the world that will provide your body with the energy and nutrients needed for the day.<br><br>
			Is your family tired of having the same dishes over and over again? Are you wasting valuable time trying
			to come up with a new dish? <span style="font-family:courier; color:Maroon;">LOOK NOMORE!</span> Here is a <a href = "../views/calendar2017.php">calendar</a> containing
			a dish every day for a whole month that your family will definitely enjoy.</p>
    </div>
    <br>
    <div class="for-texts">
      <img class = "chef" src = "../images/chef2.jpg" alt = "Here a picture of a Chef">
      <img class = "chef" src = "../images/chef3.jpg" alt = "Here a picture of a Chef">
      <img class = "chef" src = "../images/chef4.jpg" alt = "Here a picture of a Chef">
      <img class = "chef" src = "../images/chef5.jpg" alt = "Here a picture of a Chef">
    </div>
    <br>
    <div class = "for-texts">
      <p>Here are some of our recomendations</p>
      <div class = "recbox"><pre>1. Italian Herb Baked Meatballs</pre><p style="font-size:.8em;">This special dish combines the
        swedish traditional meatballs with the Italian herbs to add an extrodinary flavour to your meal.</p>
        <a href = "meatballs.php"><img class = "chef" src = "../images/meatballs.jpg" alt = "image not available"></a>
      </div>
      <div class = "recbox"><pre>2. Pancakes</pre><p style="font-size:.8em;"> Because who doesn't love panckaes? This is one of best recipes that everyone loves.</p>
        <a href = "pancakes.php" ><img class = "chef" src = "../images/pancakes.jpg" alt = "image not available"></a>
      </div>
    </div>


  </div>
</section>

<?php
  include_once '../fragments/footer.php';
?>
