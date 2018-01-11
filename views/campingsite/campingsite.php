<?php 
$PageTitle = "Camping Site Selection";

function ScriptsAndStyles(){ ?>
    <script src="jquery.imagemapster.min.js" type="text/javascript"></script>
    <script src="campingsite.js"></script>    
<?php }

include_once('../components/header.php');?>
<!------------------------------------------------------------------------------------ -->

        <img id="image" src="../../img/Campingsite.png" usemap="#image-map">
        <map name="image-map">
            <area target="" alt="1a" title="1a" href="" coords="218,247,246,238,236,209,208,218" shape="poly">
            <area target="" alt="1b" title="1b" href="" coords="218,248,246,240,260,288,230,298" shape="poly">
            <area target="" alt="1c" title="1c" href="" coords="240,336,271,327,260,290,231,297" shape="poly">
            <area target="" alt="2a" title="2a" href="" coords="756,236,815,239,815,214,756,213" shape="poly">
            <area target="" alt="2b" title="2b" href="" coords="759,188,815,189,817,213,759,213" shape="poly">
            <area target="" alt="2c" title="2c" href="" coords="759,159,814,160,817,188,761,186" shape="poly">
            <area target="" alt="2d" title="2d" href="" coords="759,127,815,131,815,159,761,159" shape="poly">
            <area target="" alt="2a" title="2a" href="" coords="246,238,274,230,266,199,237,207" shape="poly">
            <area target="" alt="2b" title="2b" href="" coords="247,238,273,230,293,281,260,289" shape="poly">
            <area target="" alt="2c" title="2c" href="" coords="272,325,305,316,290,281,262,289" shape="poly">
            <area target="" alt="3a" title="3a" href="" coords="268,198,295,190,306,221,277,231" shape="poly">
            <area target="" alt="3b" title="3b" href="" coords="320,269,306,224,275,231,293,279" shape="poly">
            <area target="" alt="3c" title="3c" href="" coords="306,315,333,305,321,269,293,279" shape="poly">
            <area target="" alt="1d" title="1d" href="" coords="555,232,620,214,603,178,542,199" shape="poly">
            <area target="" alt="2d" title="2d" href="" coords="532,169,588,145,603,176,541,199" shape="poly">
        </map>

<!------------------------------------------------------------------------------------ -->
<?php include_once('../components/footer.php');?>
