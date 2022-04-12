<?php 
    require_once("includes/header.php");
?>

<div class="textBoxContainer">
    <input type="text" class="searchInput" placeholder="Search for something">
</div>

<div class="results">

</div>

<script>
    $(function() {

        var userName = '<?php echo $userLoggedIn ?>';
        var timer;

        $(".searchInput").keyup(function() {
            clearTimeout(timer);

            timer = setTimeout(function() {
                var val = $(".searchInput").val();
                
                if (val != "") {
                    $.post("./ajax/getSearchResults.php", {term: val, userName: userName}, function(data) {
                        $(".results").html(data);  
                    })
                }

                else {
                    $(".results").html("");
                }
            }, 500);
        })
    })
</script>