<div class="container mainContainer">

<div class="row">
  <div class="col-md-8" style="padding-top:20px;">
  
	<h2>Tweets for you</h2>
	
	<?php displayTweets('isFollowing'); ?>
  
  </div>
  
  
  <div class="col-md-4" style="padding-top:70px;">
  
	<?php displaySearch(); ?>
	
	<hr>
	
	<?php displayTweetBox(); ?>
  
  </div>
</div>

</div>
