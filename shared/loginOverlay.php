<div class="overlay" id="loginOverlay">
  <div class="overlay-body">
    <a href="#" id='closeButton' onclick="closeOverlay(loginOverlay)"></a>

    <div class="login-page-item login-form">
      <p class="heading-1">Please Login</p>

      <form id="login-form" action="returning-member.php" method="post">
        <div class="form-group">
          <label for="email-input" class="form-label"> Email </label>
          <input type="text" name="email-input" id="email-input" class="text-box" placeholder="you@example.com"required>
          <label for="password-input" class="form-label"> Password </label>
          <a class="form-reveal" href="#"> Forgot Password? </a>
          <input type="password" name="password-input" id="password-input" class="text-box" placeholder="Enter your password" required>
          <input type="checkbox" id="signed-in" name="signed-in" value="true">
          <label for="signed-in" class="link-default"> Keep me signed in </label>

          <div class="form-submit">
            <input type="submit" name="form-submit" id="form-submit" value="Log in" class="button-default">
          </div>
        </div>
      </form>

      <p class="body-text">Don't have an account? <a class="link-default" href="sign-up.php"> Signed up</a></p>
    </div>

  </div>
</div>


<script type="text/javascript">
  function closeOverlay(inputId) {
    event.preventDefault();

    document.getElementById(inputId.id).style.zIndex = "-100";
    document.getElementById(inputId.id).style.opacity = "0";

    return false;
  }
</script>
