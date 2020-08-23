<?php include(APP."/views/includes/header.php"); ?>
       

        <main>
            <div class="main-profile">
            
            <div class="profile">
            <div class="profile-head" >
                <div class="left-profile" >
                <div class="normal-foto" >
                    <img src="/images/Avatar(1).svg" alt="">

                </div>
                <div class="profile-info">
                    <p> Nazwa : <?php echo $data["user_name"] ?></p>
                    <p>Poczta : <?php echo $data["user_email"] ?></p>
                  
                </div>
               
            </div>


                <div class=right-profile>
                    <div class="main-button">
                        <button id="Btn-modal" style="text-transform:capitalize">

                        <a class="logout"  href="<?php echo MAINURL ?>/users/logout">
                        <i class="fas fa-sign-out-alt" style="margin-right:5px"></i> Log Out
                            </a>
                        </button>
                    </div>
                        <div class="main-button">
                            <button id="Btn-modal" style="text-transform:capitalize">

                            <a class="logout" id="profile-button" href="<?php echo MAINURL ?>/users/photos">
                            <i class="fas fa-images" style="margin-right:5px"></i> Photos
                                </a>
                            </button>
                        </div>
                        <div class="main-button">
                            <button id="Btn-modal" style="text-transform:capitalize" >

                            <a class="logout" id="profile-button" href="<?php echo MAINURL ?>/users/search" >
                            <i class="fas fa-search" style="margin-right:5px"></i> Search
                                </a>
                            </button>
                        </div>
                    </div>

                </div>

                <div class="profile-gallery" >
                    <?php if(count($data["photos"]) > 0 ) : ?>
                    
                        <form class='images-gallery' action="<?php echo MAINURL  ?>/users/remember" method="post">
                        <?php
                        $url = MAINURL ;   
                             
                             foreach($data["photos"] as $photo){
                                $checked="" ; 
                                if(isset($_SESSION["remember_images"])){
                                    if(in_array($photo->image ,$_SESSION["remember_images"])){
                                        $checked = "checked" ;
                                    }
                                }
                                echo "
                                
                                    <div class='super-card'>
                                        <div class='card'>
                                        <a href='{$url}/pages/image/{$photo->image}'>
                                        <img src='/imagesServer/mini/{$photo->image}'> </a>
                                            <div class='card-container'>
                                                <h2 class='title-card'>{$photo->title}</h2>
                                                <p><span>{$photo->author}</span> <span>{$photo->type}</span></p>
                                                <input type='checkbox' name='{$photo->image}' value='{$photo->image}' {$checked}>
                                                
                                            </div>
                                        </div> 
                                    </div>
                               
                               
                                "; 
                            }  
                            
                            ?>

                            <div class="gallery-buttons">
                            <input type="submit" value="REMEMBER SELECTED" class="button-submit">
                           
                            </div>
                        </form>



                        <?php if($data["amount_pages"] > 1 ) : ?>
                        
                        <div class="padding-gallery" >
                        <?php
                            $url = MAINURL ; 
                            
                        for ($i = 1; $i <= $data["amount_pages"]; $i++){
                            $class = "" ; 
                            if($i == $data["page"]){
                                $class = "active-page" ;
                            }

                            echo "<a class='{$class}' href='{$url}/users/profile/{$i}'>{$i}</a>";
                            
                            }
                            ?>
                        </div> 
                        <?php else : ?>
                        <?php endif; ?>

                       
                    <?php else : ?>
                        <p>No images uploaded</p>
                    <?php endif; ?>



                </div>




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