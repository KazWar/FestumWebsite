<?php 
$PageTitle = "Camping Site Selection";

function ScriptsAndStyles(){ ?>
    <script src="jquery.imagemapster.min.js" type="text/javascript"></script>
    <script src="campingsite.js"></script>    
    <link href="campingsite.css" rel="stylesheet" type="text/css"/>
<?php }

include_once('../components/header.php');?>
<!------------------------------------------------------------------------------------ -->
<div class="container">
  <div id="mapContainer" class="bg-faded p-4 my-4">
    <h2 class="text-center text-lg text-uppercase my-0 p-1">
        <strong>Camping Ground Selection</strong>
    </h2>
        <hr class="divider">
        <div>
        <img id="image" src="../../img/Campingsite.png" usemap="#image-map">
            <map name="image-map">
                <area target="" alt="1" title="1" href="" coords="218,247,246,238,236,209,208,218" shape="poly">
                <area target="" alt="2" title="2" href="" coords="218,248,246,240,260,288,230,298" shape="poly">
                <area target="" alt="3" title="3" href="" coords="240,336,271,327,260,290,231,297" shape="poly">
                <area target="" alt="4" title="4" href="" coords="756,236,815,239,815,214,756,213" shape="poly">
                <area target="" alt="5" title="5" href="" coords="759,188,815,189,817,213,759,213" shape="poly">
                <area target="" alt="6" title="6" href="" coords="759,159,814,160,817,188,761,186" shape="poly">
                <area target="" alt="7" title="7" href="" coords="759,127,815,131,815,159,761,159" shape="poly">
                <area target="" alt="8" title="8" href="" coords="246,238,274,230,266,199,237,207" shape="poly">
                <area target="" alt="9" title="9" href="" coords="247,238,273,230,293,281,260,289" shape="poly">
                <area target="" alt="12" title="12" href="" coords="272,325,305,316,290,281,262,289" shape="poly">
                <area target="" alt="12" title="12" href="" coords="268,198,295,190,306,221,277,231" shape="poly">
                <area target="" alt="12" title="12" href="" coords="320,269,306,224,275,231,293,279" shape="poly">
                <area target="" alt="13" title="13" href="" coords="306,315,333,305,321,269,293,279" shape="poly">
                <area target="" alt="60" title="60" href="" coords="555,232,620,214,603,178,542,199" shape="poly">
                <area target="" alt="61" title="61" href="" coords="532,169,588,145,603,176,541,199" shape="poly">
            </map>
        </div>
        <hr class="divider">
        <form action="../delivery/delivery.php" method="get">
            Your selected campingsite is : <input id="selectedSite" value="No campingsite selected">
            <hr>
            <div class="input_fields_wrap">
                Add other people to your campingsite reservation :<button class="btn-sm btn-info add_field_button">+</button>
                <div><input type="text" name="mytext[]"></div>
            </div>
            <hr>
            <button type="submit">Proceed to checkout</button>
        </form> 
    </div>
</div>
        

<!------------------------------------------------------------------------------------ -->
<?php include_once('../components/footer.php');?>
