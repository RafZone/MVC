<?php
  include_once '../fragments/header.php';
  include '../extras/getComments.php';
  date_default_timezone_set('Europe/Stockholm');
?>

<div class="page">
  <img id ="picture" src = "../images/meatballs.jpg" alt = "not available" />
  <p class="style"> What you need </p>
	<ul class = "ingredients">
		<li>1 pound lean ground beef.</li>
		<li>&frac12; cup Italian breadcrumbs.</li>
		<li>&frac14; cup fresh grated Parmesan cheese.</li>
		<li>2 garlic cloves, pressed (or minced).</li>
		<li>&frac12; small onion, grated (or minced).</li>
		<li>2 tablespoons marinara.</li>
		<li>1 tablespoon fresh rosemary, chopped.</li>
		<li>1 tablespoon fresh parsley, chopped.</li>
		<li>1 tablespoon fresh basil, chopped.</li>
		<li>&frac12; teaspoon kosher salt.</li>
		<li>&frac14; teaspoon fresh cracked black pepper.</li>
		<li>1 large egg, lightly beaten.</li>
	</ul>
</div><br>
<div class="page">
  <p class = "style"> Preparation</p>
	<p> Preheat oven to 375&deg; . Prepare a baking sheet by lining with parchment paper.
	In a large mixing bowl, combine all ingredients. Mix well, do not over mix or you will have tough meatballs.
	Using a 2 tablespoon scoop, portion out meat and place on baking sheet. After all meatballs have been scooped onto
	tray, roll into balls. <br><br>
	COOK'S NOTE:  If you lightly wet your hands the meatballs will form better and crack less.<br><br>
	Bake for 20-22 minutes. Remove and transfer to sauce or serve immediately.</p>
</div><br>

<div class = "page">
  <p class = "style">Comments</p>

  <?php
    if(isset($_SESSION['u_id']))
    {
      echo "<form method = 'POST' action ='../extras/setComment.php'>
              <input type = 'hidden' name = 'uid' value = '".$_SESSION['u_uid']."'>
              <input type = 'hidden' name = 'date' value = '".date('Y-m-d H:i:s')."'>
              <textarea name = 'message'></textarea><br>
              <button class = 'btn' type = 'submit' name = 'meatballsSubmit'>Comment</button>
            </form>";
    }
    else
    {
      echo "<p>Please log in to comment</p>";
    }

    //getcomments();
  ?>

</div><br>


<div class = "page">
  <p style="text-align: center;">
    Here is another recipe for you <br> <br>
    <a href = "pancakes.php" ><img class = "chef" src = "../images/pancakes.jpg" alt = "image not available"></a>
  </p>

</div>


<?php
  include_once '../fragments/footer.php'
?>
