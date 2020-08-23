<?php include(APP."/views/includes/header.php"); ?>
       

        <main>
          
           <div class="register">
           <!-- <div class="alert">
  
  This is an alert box.<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>  -->
           <h2>Login</h2>
          
           <form action="<?php echo MAINURL  ?>/users/login" method="post" style="border-bottom:3px solid rgba(55, 0, 60, 0.4)">
              
                

           <div class="input-container <?php echo (!empty($data["email_err"])) ? "invalid" : "" ?>">
                  <i class="fa fa-user icon"></i>
                    <input class="input-field" type="text" placeholder="Email" name="email">
              </div>

              <div class="input-container <?php echo (!empty($data["password_err"])) ? "invalid" : "" ?>">
                <i class="fa fa-key icon"></i>
                <input class="input-field" type="password" placeholder="Password" name="password">
              </div>

              <p class="<?php echo (!empty($data["email_err"])) ? "invalid-feedback" : "none" ?>" ><?php echo $data["email_err"] ?>   </p>
           
           <p class="<?php echo (!empty($data["password_err"])) ? "invalid-feedback" : "none" ?>" ><?php echo $data["password_err"] ?>   </p>
          

             
            <div class="login">   <input type="submit"  class="btn button-submit" value="Log In"></input>
            <div class="signin">
                <p>No account?<a href="<?php echo MAINURL ;?>/users/register">Register</a>.</p>
            
            </div>
        
        </div>
            

         
              
  
            </form > 
            

        
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