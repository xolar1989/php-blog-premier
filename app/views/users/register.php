<?php include(APP."/views/includes/header.php"); ?>
       

        <main>
         
           <div class="register">
           <h2>Create Profile</h2>
          
           <form action="<?php echo MAINURL  ?>/users/register" method="post">
          
                <div class="input-container <?php echo (!empty($data["login_err"])) ? "invalid" : "" ?>">
                  <i class="fa fa-user icon"></i>
                    <input class="input-field" type="text" placeholder="Login" name="login">
                    
              </div>
              
             
              <div class="input-container <?php echo (!empty($data["email_err"])) ? "invalid" : "" ?>">
                <i class="fa fa-envelope icon"></i>
                <input class="input-field" type="text" placeholder="Email" name="email">
              </div>
            
              <div class="input-container <?php echo (!empty($data["password_err"])) ? "invalid" : "" ?>">
                <i class="fa fa-key icon"></i>
                <input class="input-field" type="password" placeholder="Password" name="password">
              </div>

              <div class="input-container <?php echo (!empty($data["confirmed_password_err"])) ? "invalid" : "" ?>">
              <i class="fas fa-lock"></i>
                <input class="input-field" type="password" placeholder="Confirm password" name="confirmed_password">
              </div>


              <p class="<?php echo (!empty($data["login_err"])) ? "invalid-feedback" : "none" ?>" ><span class="text"> <?php echo $data["login_err"] ?> </span><span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>  </p>
           <p class="<?php echo (!empty($data["email_err"])) ? "invalid-feedback" : "none" ?>" > <span class="text"><?php echo $data["email_err"] ?> </span>  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>  </p>
           <p class="<?php echo (!empty($data["password_err"])) ? "invalid-feedback" : "none" ?>" > <span class="text"><?php echo $data["password_err"] ?> </span> <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>   </p>
           <p class="<?php echo (!empty($data["confirmed_password_err"])) ? "invalid-feedback" : "none" ?>" ><span class="text">  <?php echo $data["confirmed_password_err"] ?></span>  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>    </p>

              <input type="submit" class="btn button-submit"  value="Register"></input>

              
              
  
            </form> 
             <div class="signin">
                <p>Already have an account? <a href="<?php echo MAINURL ;?>/users/login">Sign in</a>.</p>
            
            </div>

        
           </div>
           
           
        </main>

        <?php include(APP."/views/includes/footer.php"); ?>

    </div>
   
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="/JS/helper.js"></script>
    <script src="/JS/main.js"></script>
    <?php include(APP."/views/includes/script.php"); ?>
  
   
</body>

</html>