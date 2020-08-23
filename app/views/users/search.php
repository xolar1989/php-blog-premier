<?php include(APP."/views/includes/header.php"); ?>


        <main>
        <div class="search-container">
        <form>
            Title: <input type="text" id="name-submit">
        </form>
        <p><span id="txtHint"></span></p>
        </div>
        </main>

        <?php include(APP."/views/includes/footer.php"); ?>
    </div>

    
    <script src="/JS/helper.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <script src="/JS/main.js"></script>

    <script>
    var root ="<?php echo MAINURL ?>"  ; 
  
        $(function () {
            $('#name-submit').keyup(function(){
                var name = $("#name-submit").val() ; 
                if($.trim(name) != ''){
                   
                    $.post(root+"/users/searchImages" ,{searchValue:name} , function(data){
                     
                        document.getElementById("txtHint").innerHTML = data;
                       
                        
                    } )
                   
                    
                    
                    
                }
            })
        });
    </script>
    
    <?php include(APP."/views/includes/script.php"); ?>
   

</body>

</html>