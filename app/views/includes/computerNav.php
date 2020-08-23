<nav class="menu">
            <div class="menu-logo">
                <img src="../../../public/images/premier-league-logo-header.png" alt="" />
                <div class="burger">
                    <i class="fas fa-bars "></i>
                    <i class="fas fa-times close"></i>
                </div>
            </div>

            <div class="menu-list">
                <ul>
                    <li class="normalbtn">
                        <a href="<?php echo MAINURL ;?>/pages/index" ><i class="fas fa-home"></i><span>Home</span>
                        </a>
                    </li>
                    <li class="normalbtn">
                        <a href="<?php echo MAINURL ;?>/pages/about"><i class="fas fa-book"></i> <span>About</span>
                        </a>
                    </li>
                    <?php if(isset($_SESSION["user_id"])) : ?>

                        <?php if(isset($data["page"])) : ?>
                            <li class="normalbtn">
                                <a href="<?php echo MAINURL ;?>/users/profile/<?php echo $data["page"] ;?>" ><i class="fas fa-users"></i><span>Profile</span>
                                    
                                </a>
                            </li>
                        <?php else : ?>
                            <li class="normalbtn">
                                <a href="<?php echo MAINURL ;?>/users/profile/1" ><i class="fas fa-users"></i><span>Profile</span>
                                    
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php else : ?>
                        <li class="normalbtn">
                            <a href="<?php echo MAINURL ;?>/users/login" ><i class="fas fa-users"></i><span>Profile</span>
                                
                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
                <div class="menu-button">
                    <a href="https://www.premierleague.com/" target="_blank">Official Website</a>
                </div>
            </div>
        </nav>