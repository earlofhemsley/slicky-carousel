<?php 
    echo "num of inputs: $num_of_inputs<br />";
    echo "images: "; print_r($images); echo '<br />';
    //you're in a form already.
    //print the hidden input for num of inputs
    //put a button that opens the media uploader and that increases the count on selection of image
    //make the front end dynamic with javascript

?>
<button id="upload_image_button" type="button"><?php _e('Add an image'); ?></button>   
<div id="carousel_image_preview_bin">
<?php 
    foreach($images as $image){
        echo "<img id='slick-carousel_image-{$image['id']}' class='slick-carousel-image' src='{$image['src'][0]}' style='width: {$image['src'][1]}px;'  />";
    }
?>    
</div>
