<div id="Modal" class="modal">


                    <div class="modal-content">
                        <div class="modal-head">
                            <h3 style="color:white">Send Picture</h3>
                            <span id="close-modal"><i class="fas fa-times"></i>
                            </span>
                        </div>


                        <div class="form">



                            <form action="<?php echo MAINURL  ?>/pages/about" enctype="multipart/form-data" method="post">
                             <?php if(isset($_SESSION["user_id"])) : ?>
                                <input type="text" name="author" id="author" placeholder="Author" 
                                    value="<?php echo $_SESSION["user_email"] ?>" disabled style="color : rgb(55, 0, 60)">
                            <?php else : ?>
                                <input type="text" name="author" id="author" placeholder="Author" 
                                minlength="0"
                                    maxlength="25"
                                    value="" >
                            <?php endif; ?>

                                <input type="text" name="title" id="Title" placeholder="<?php echo (empty($data["title_err"])) ? "Title" : $data["title_err"] ?>"  minlength="0" class="<?php echo (!empty($data["title_err"])) ? "infoAbout" : "" ?>" 
                                    maxlength="25" >
                                <input type="text" name="watermark" id="watermark" placeholder="<?php echo (empty($data["watermark_err"])) ? "The watermark" : $data["watermark_err"] ?>"  minlength="0" class="<?php echo (!empty($data["watermark_err"])) ? "infoAbout" : "" ?>"  >
                                <input type="file" id="file" class="inputFile" name="file" />
                                <label for="file" >upload file</label>
                                <p class="<?php echo (!empty($data["image_err"])) ? "infoFile" : "none" ?>" ><?php echo $data["image_err"] ?>   </p>
                                <?php if(isset($_SESSION["user_id"])) : ?>
                                <div class="page">
                                    <div class="page__toggle">
                                        <label class="toggle">
                                        <input class="toggle__input" type="radio" name="type" value="public" checked >
                                        <span class="toggle__label">
                                            <span class="toggle__text">Public</span>
                                        </span>
                                        </label>
                                    </div>
                                    <div class="page__toggle">
                                        <label class="toggle">
                                        <input class="toggle__input" type="radio" name="type" value="private" >
                                        <span class="toggle__label">
                                            <span class="toggle__text">Private</span>
                                        </span>
                                        </label>
                                    </div>
                                </div>
                                <?php else : ?>
                            <?php endif; ?>
                            
                                <input type="submit" value="SEND MESSAGE" class="button-submit">
                                <input type="reset" value="Reset" class="button-submit">

                            </form>

                        </div>

                    </div>

                </div>