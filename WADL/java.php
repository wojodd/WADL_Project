
<!DOCTYPE HTML> 
<html> 
    <head> 
        <title> 
            Get the ID of the clicked button
            in JavaScript
        </title>
    </head> 
      
    <body style = "text-align:center;"> 
      
        <h1 style = "color:green;" > 
            GeeksForGeeks 
        </h1>
  
        <p id = "GFG_UP" style =
            "font-size: 15px; font-weight: bold;">
        </p>
        <?php 
        for($i=1; $i<6; $i++)
        {?>
          <button id="<?php echo $i ?>">Button <?php echo $i ?></button>
        
       

        
  
        <p id = "GFG_DOWN" style = 
            "color:green; font-size: 20px; font-weight: bold;">
        </p>
          
        <script>
            var el_up = document.getElementById("GFG_UP");
            var el_down = document.getElementById("GFG_DOWN");
            el_up.innerHTML = "Click on button to get ID";
              
            document.getElementById('<?php echo $i ?>').onclick = GFG_click;
       
            function GFG_click(clicked) {
                el_down.innerHTML = "Button clicked, id = " 
                    +  this.id ;
            }         
        </script>
        <?php }
        ?> 
    </body> 
</html> 