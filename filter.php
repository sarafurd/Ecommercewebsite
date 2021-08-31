<?php

//index.php

include_once('config/database.php');
include_once "objects/product.php";
include_once "objects/product_image.php";
include_once "objects/cart_item.php";


// get database connection
$database = new Database();
$db = $database->getConnection();

// set page title
$page_title="Products";

// page header html
include 'layout_head.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Products</title>


    <!-- Custom CSS -->
    <style>
#loading
{
	text-align:center;
	background: url('loader.gif') no-repeat center;
	height: 150px;
}
</style>
</head>

<body>
    <a href="top"></a>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
        	<br />
        	<h2 align="center"></h2>
        	<br />

          <div class="col-md-12">
            <div class="list-group">
                <h3>Scent</h3>
                            <div>
                                <div class="list-group-item radio">
                                    <label><input type="radio" name="smell" class="common_selector scent" value="Lavender">Lavender</label>
                                    <label><input type="radio" name="smell" class="common_selector scent" value="Tea Tree">Tea Tree</label>
                                    <label><input type="radio" name="smell" class="common_selector scent" value="Orange">Orange</label>
                                    <label><input type="radio" name="smell" class="common_selector scent" value="Sweet Orange">Sweet Orange</label>
                                    <label><input type="radio" name="smell" class="common_selector scent" value="Peppermint">Peppermint</label>
                                    <label><input type="radio" name="smell" class="common_selector scent" value="Oregano">Oregano</label>
                                    <label><input type="radio" name="smell" class="common_selector scent" value="Rosemary">Rosemary</label>
                                    <label><input type="radio" name="smell" class="common_selector scent" value="Spearmint">Spearmint</label>
                                    <label><input type="radio" name="smell" class="common_selector scent" value="Eucalyptus">Eucalyptus</label>
                                    <label><input type="radio" name="smell" class="common_selector scent" value="Basil">Basil</label>
                                    <label><input type="radio" name="smell" class="common_selector scent" value="Frankincense">Frankincense</label>
                                    <label><input type="radio" name="smell" class="common_selector scent" value="Lemongrass">Lemongrass</label>
                                    </div>
                            </div>
                        <br />
            </div><!--/.list-group-->
        </div>

                <br />

            <div class="">
            	<br />
                <div class="filter_data container">


                </div>
            </div>
            <!--<div class="col-md-12 output_area"></div>-->
        </div>

    </div>


<script>
$(document).ready(function(){

    //filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var scent = get_filter('scent');
        var scent_final = scent[0];
        console.log(scent);
        var brand = get_filter('brand');
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            //type:"POST",
            //dataType: "text/html",
            data:{action:action,scent:scent_final,brand:brand},
            success:function(result){
                console.log('success');
                $('.filter_data').html(result);
                $('.output_area').html(result);
               // alert('stop');
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

});
</script>

<?php include "layout_foot.php"; ?>
</body>

</html>
