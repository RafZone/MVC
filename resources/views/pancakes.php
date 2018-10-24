<?php
  include_once '../fragments/header.php';
  include '../extras/getComments.php';
?>

<div class="page">
  <img id ="picture" src = "../images/pancakes.jpg" alt = "not available" />
  <p class="style"> What you need </p>
	<ul class = "ingredients">
    <li>2 cups of white whole wheat flour.</li>
		<li>1 tablespoon baking powder.</li>
		<li>1 tablespoon sugar.</li>
		<li>&frac12; teaspoon salt.</li>
		<li>1 tablespoon wheat germ.</li>
		<li>1 large egg.</li>
		<li>2 cups milk.</li>
		<li>1 teaspoon vanilla extract.</li>
		<li>1 stick butter (approximately 120ml or &frac12; cup).</li>
		<li>&frac12; cup unsweetened applesauce.</li>
	</ul>
</div><br>
<div class="page">
  <p class = "style"> Preparation</p>
  <p>
    Combine the flour through the wheat germ in a large bowl. In a separate large bowl,
		whisk the egg and then combine with the milk through applesauce and whisk well. Fold the ‘wet’ mixture
		into the flour mixture, stirring just until moist. STOP, I know you want to keep mixing but don’t. Walk away from the bowl.
		Now you may go ahead and spray the big ole’ nonstick skillet with some cooking spray for good measure
		and heat the skillet over medium heat. Pour &frac14; cup amounts in the pan in 3 or 4 places and stop again.
		Just watch the batter and once you see all the bubbles start popping up, it is time to flip the pancake.
		Cook the pancakes a minute or so longer, set aside and repeat. Top with some fruit and a bit of real maple syrup.
  </p>
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
              <button class = 'btn' type = 'submit' name = 'pancakesSubmit'>Comment</button>
            </form>";
    }
    else
    {
      echo "<p>Please log in to comment</p>";
    }

    //getcomments(2);
  ?>

</div><br>

<div class = "page">
  <p style="text-align: center;">
    Here is another recipe for you <br> <br>
    <a href = "meatballs.php" ><img class = "chef" src = "../images/meatballs.jpg" alt = "image not available"></a>
  </p>

</div>

<?php
  include_once '../fragments/footer.php'
?>
