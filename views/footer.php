
<footer class="footer">

<p>&copy; Danijel Vukoje learning site</p>

</footer>


<!-- jQuery first, then Tether, then Bootstrap JS. -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalTitle">Log in</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
		<div class="alert alert-danger collapse" role="alert" id="loginAlert"> </div>
		
		<form>
		
		  <input type="hidden" id="loginActive" name="loginActive" value="1">
		
		  <fieldset class="form-group">
			<label for="email">Email</label>
			<input type="email" class="form-control" id="email" placeholder="Email address">
		  </fieldset>
		  <fieldset class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" id="password" placeholder="Password">
		  </fieldset>
		</form>
		
      </div>
      <div class="modal-footer">
	    <button type="button" id="toggleLogin" class="btn btn-primary">Sign up</button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="loginSignupBtn"class="btn btn-primary">Log in</button>
      </div>
    </div>
  </div>
</div>

<script>

	$("#toggleLogin").click(function () {
		
		if ($("#loginActive").val() == 1){
			
			$("#loginActive").val("0");
			$("#loginModalTitle").html("Sign up");
			$("#loginSignupBtn").html("Sign up");
			$("#toggleLogin").html("Log in");
		}
		else
			{
				
			$("#loginActive").val("1");
			$("#loginModalTitle").html("Log in");
			$("#loginSignupBtn").html("Log in");
			$("#toggleLogin").html("Sign up");
				
			}
	})

	
	$("#loginSignupBtn").click(function () {
		
		$.ajax({
			type: "POST",
			url: "actions.php?action=loginSignup",
			data: "email=" + $("#email").val() + "&password=" + $("#password").val() + "&loginActive=" + $("#loginActive").val(),
			success: function(result){
				
				if (result == "1") {
					
					window.location.assign ("http://danijelvukoje-com.stackstaging.com/twitter/");
					
				} else {
					
					$("#loginAlert").html(result).show();
					
				}
				
			}
		})
		
	})
	
	$(".toggleFollow").click(function () {
		
		var id = $(this).attr("data-userId");
		
		$.ajax({
			type: "POST",
			url: "actions.php?action=toggleFollow",
			data: "userId=" + id,
			success: function(result){
				
				if (result == "1") {
					
					$("a[data-userId='" + id + "']").html('Follow');
					
				} else if (result == "2") {
					
					$("a[data-userId='" + id + "']").html('Unfollow');
					
				}
				
			}
		})
		
	})
	
	$("#postTweetBtn").click(function () {
		
		$.ajax({
			type: "POST",
			url: "actions.php?action=postTweet",
			data: "tweetContent=" + $("#tweetContent").val(),
			success: function(result){
				
				if (result == "1") {
					
					$("#tweetSuccess").show();
					$("#tweetFail").hide();
					
				} else if (result != "") {
					
					$("#tweetFail").html(result).show();
					$("#tweetSuccess").hide();
					
				}
				
			}
		})
		
	})
	
</script>

  </body>
</html>