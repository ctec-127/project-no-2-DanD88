<?php require 'inc/header.include.php'; ?>
    
        
    <div class="container-fluid mt-3">
            <div class="jumbotron p-3">
                <h2 class="bg-primary text-center"><b> This is a two page website that uses 7 different parameters and values to render different items.</b>
                    </h2>
                    <br />
                    <p><b>Page 2 will display 3 images of beaches each beach has a picture and info relating to it.
                    There are parameters to display the amount of beaches.</b> 
                    </p>
            </div>
    </div>

    <div class="container-fluid mt-3">
            <div class="jumbotron p-3">
        <h2 class="bg-primary text-center">Rules for Changing Values on Page 2 Using Parameters</h2>    
            <h3>Parameter 1:</h3>
                <p>Pick the number of beaches to display 1-3. To do this enter at the end of the URL beach=(the number of beaches).</p>
            <h3>Parameter 2:</h3>
                <p>Choose either you want pictures to display by setting the value to y or n. pictures=y or n.</p>
            <h3>Parameter 3:</h3>
                <p>To display the Info about a beach by setting the value to y or n info=y or n. </p>
            <h3>Parameter 4:</h3>
                <p>The pictures can be set to have a border by setting the border value to y or n border=y or n. </p>
            <h3>Parameter 5:</h3>
                <p>The background color of each picture div can be change from red, blue, or green. To change the background value enter the parameter bg_color=red blue or green.</p>
            <h3>Parameter 6:</h3>
                <p>You can change the color of the text to red, blue or green. To change the text color value enter the parameter text_color=red blue or green.</p>
            <h3>Parameter 7:</h3>
                <p>The font size can be changed by giving font a value of small, medium, or large. To change the font color value enter the parameter font_color= small medium or large. </p>       
            <h3>Example:</h3>  
                <p>?beach=3&pictures=y&info=y&border=y&font_size=large&text_color=red&bg_color=blue</p>  
            </div>

    </div>

    

    
<?php require 'inc/footer.include.php'; ?>