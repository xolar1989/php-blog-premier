<?php include(APP."/views/includes/header.php"); ?>
        <main>

        <div class="profile-gallery" >
                    <?php if( isset($_SESSION["remember_images"])  && count($_SESSION["remember_images"]) > 0 ) : ?>
                    
                        <form class='images-gallery' action="<?php echo MAINURL  ?>/users/photos" method="post">
                        <?php
                        $url = MAINURL ;   
                             
                             foreach($_SESSION["remember_images"] as $photo){
                               
                                echo "
                                
                                    <div class='super-card'>
                                        <div class='card'>
                                        <a href='{$url}/pages/image/{$photo}'>
                                        <img src='/imagesServer/mini/{$photo}'> </a>
                                            <div class='card-container'>
                                                <input type='checkbox' name='{$photo}' value='{$photo}' >
                                                
                                            </div>
                                        </div> 
                                    </div>
                               
                               
                                "; 
                            }  
                            
                            ?>

                            <div class="gallery-buttons">
                            <input type="submit" value="DELETE SELECTED" class="button-submit">
                           
                            </div>
                        </form>




                        
                       

                       
                    <?php else : ?>
                        <p>No images picked yet</p>
                    <?php endif; ?>



                </div>
            
        </main>

        <?php include(APP."/views/includes/footer.php"); ?>
    </div>

    
    <script src="/JS/helper.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <script src="/JS/main.js"></script>
    <?php include(APP."/views/includes/script.php"); ?>
   

</body>

</html>