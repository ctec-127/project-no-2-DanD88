

<?php require 'inc/header.include.php'; ?>
<?php include ("inc/inc-vars.php");?>

<body>


    <?php
    $errors_flag = FALSE;
    $errors_count = 0;
    $beach_count= 0;
    $errors = ""; 
    
    #check for beach params and to see if value is set
    
    if(isset($_GET["beach"])){
        if($_GET["beach"] > 0 && $_GET["beach"] <= 6){
            $beach_count = $_GET["beach"]; // looks for the correct number
        } else {
            $errors = "<p><b>Error:</b> Please include the number of beaches to display from 1-6.</p>";
            $errors_flag = TRUE;
            ++$errors_count;
        }
    } else {
        $errors = "<p><b>Error beaches parameter not found:</b> A parameter to display the number of beaches to display.</p>";
        $errors_flag = TRUE;
        ++$errors_count;
    }

    if(isset($_GET["pictures"])){
        if($_GET["pictures"] == strtolower("y") || $_GET["pictures"] == strtolower("n")){
            $pictures_display = $_GET["pictures"];
        } else {
            $errors .= "<p><b>Error with pictures parameter:</b> A value of \"y\" or \"n\" was expected.</p>";
            $errors_flag = TRUE;
            ++$errors_count;
        }
    } else {
        $errors .= "<p><b>Error pictures parameter not found:</b> A parameter to include or exclude pictures was not supplied. A value of \"y\" or \"n\" was expected.</p>";
        $errors_flag = TRUE;
        ++$errors_count;
    }
    
    if(isset($_GET["info"])){
        if($_GET["info"] == strtolower("y") || $_GET["info"] == strtolower("n")){
            $info_display = $_GET["info"];
        } else {
            $errors .= "<p><b>Error with info parameter:</b> A value of \"y\" or \"n\" was expected.</p>";
            $errors_flag = TRUE;
            ++$errors_count;
        }
    } else {
        $errors .= "<p><b>Error info parameter not found:</b> A parameter to include or exclude info was not supplied. A value of \"y\" or \"n\" was expected.</p>";
        $errors_flag = TRUE;
        ++$errors_count;
    }

    // Param classes errors

    if(isset($_GET["border"])){
        if($_GET["border"] == strtolower("y") || $_GET["border"] == strtolower("n")){
            $border_display = $_GET["border"];
        } else {
            $errors .= "<p><b>Error with border parameter:</b> A value of \"y\" or \"n\" was expected.</p>";
            $errors_flag = TRUE;
            ++$errors_count;
        }
    } else {
        $errors .= "<p><b>Error border parameter not found:</b> A parameter to include or exclude border was not supplied. A value of \"y\" or \"n\" was expected.</p>";
        $errors_flag = TRUE;
        ++$errors_count;
    }
//     so if !isset($_GET["param") {error} etc
// and then after you see if it's set you could do something like
// if ($_GET["param"] =! "red" or "green" or "blue") {other error}

    if (!isset($_GET["bg_color"])) {
        if ($_GET["bg_color"] =! ("red") && $_GET["bg_color"] =!("green") && $_GET["bg_color"] =! ("blue")) {
            $bg_color_display = $_GET["bg_color"];
        } else {
            $errors .= "<p><b>Error background color parameter not found:</b> Please select a background color of red, blue, or green.</p>";
            $error_flag = TRUE;
            ++$errors_count;
        }
    }

    if (!isset($_GET["text_color"])) {
        if ($_GET["text_color"] =! ("red") && $_GET["text_color"] =!("green") && $_GET["text_color"] =! ("blue")) {
            $text_color_display = $_GET["text_color"];
        } else {
            $errors .= "<p><b>Error text color parameter not found:</b> Please select a text color of red, blue, or green.</p>";
            $error_flag = TRUE;
            ++$errors_count;
        }
    }

    if (!isset($_GET["font_size"])) {
        if ($_GET["font_size"] =! ("small") && $_GET["font_size"] =!("medium") && $_GET["font_size"] =! ("large")) {
            $font_size_display = $_GET["font_size"];
        } else {
            $errors .= "<p><b>Error font size  parameter not found:</b> Please select a text color of small, medium, or large.</p>";
            $error_flag = TRUE;
            ++$errors_count;
        }
    }


    // Shows the errors of the parameters
    if($errors_flag){
        echo "<div class=\"jumbotron p-3 bg-danger mt-3\" id=\"errors\">";
        echo "<h2>There are $errors_count Errors please refer back to page 1 for more reference:</h2>";
        echo $errors . "</div>";
    }


    

        // Param Classes
        $font_size = "";
        $bg_color = "bg-primary";
        $border = "";
        $text_color = "";

    
    if (isset($_GET['border'])) {
        if ($_GET['border'] == "y"){
            $border = "border"; 
        }    
    }
    

    if (isset($_GET['bg_color'])) {
        if ($_GET['bg_color'] == "green"){
            $bg_color = "green_bg";
        }
        if ($_GET['bg_color'] == "red"){
            $bg_color = "red_bg";
        }
        if ($_GET['bg_color'] == "blue"){
            $bg_color = "blue_bg";
        }        
    }

    if (isset($_GET['font_size'])) {
        if ($_GET['font_size'] == "small"){
            $font_size = "small_font";
        }
        if ($_GET['font_size'] == "medium"){
            $font_size = "medium_font";
        }
        if ($_GET['font_size'] == "large"){
            $font_size = "large_font";
        }        
    }

    if (isset($_GET['text_color'])) {
        if ($_GET['text_color'] == "blue"){
            $text_color = "blue_text";
        }
        if ($_GET['text_color'] == "red"){
            $text_color = "red_text";
        }
        if ($_GET['text_color'] == "green"){
            $text_color = "green_text";
        }     
    }
    

    

?>

<div class="container-fluid text-center">
        <div class="beach container-fluid text-center">
            
            <?php
            if($beach_count > 0 && $errors_flag == 0){
                for ($i = 0;$i < $beach_count;++$i){
                    echo "<div class=\"row container-fluid\">";
                    echo "<div class=\"container $font_size $bg_color $text_color $border\">";
                    
                    if($pictures_display == 'y'){
                        echo "<img class=\"pictures $border \" src=\"$pictures[$i] \" alt=\"\" />";
                    }

                    echo "<br /><b>" . $beach[$i] . "</b>";
                    
                    if($info_display == "y"){
                        
                        $positiontitle = strpos($info[$i]," /");
                        $positiontitle = substr($info[$i],0, $positiontitle);
                        echo "<br />" . $positiontitle;

                        
                        $position = strrchr($info[$i],"/ ");
                        echo "<br />" . strchr($position," ");
                    }

                    echo "</div>";
                    echo "</div>";
                }

            }
            ?>
        </div><!-- end people div-->
    </div><!-- end wrapper div-->

<?php require 'inc/footer.include.php'; ?>

</body>
</html>