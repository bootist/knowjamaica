

<?php $title = 'Gallery';
 

      include_once ('includes/header.php'); ?>
<?php include_once ('includes/slideshowstyle.php'); 
$count = 6; 

?>

<h2>Gallery of Jamaica Land We Love </h2>
<p>Introduction TO Jamaica:</p>

<div class="slideshow-container " height="300" width = "450">

<div class="mySlides fade">
  <div class="numbertext">1 / <?php echo($count) ?></div>
  <img src="includes/Images/Coat_of_arms_of_Jamaica.png" style="width:100%">
  <div class="text">Coat of Arm</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / <?php echo($count) ?></div>
  <img src="includes/Images/dunns_river_falls.jpg" style="width:100%">
  <div class="text">Dunn's River Falls</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / <?php echo($count) ?></div>
  <img src="includes/Images/natioational_symbols.jpg" style="width:100%">
  <div class="text">National Symbols</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">4 / <?php echo($count) ?></div>
  <img src="includes/Images/national_symbols_of_jamaica.jpg" style="width:100%">
  <div class="text">National Symbols</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">5 / <?php echo($count) ?></div>
  <img src="includes/Images/negril-big-beach.jpg" style="width:100%">
  <div class="text">Beach in Negril</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">6 / <?php echo($count) ?></div>
  <img src="includes/Images/lisa-hanna-jamaica.png" style="width:100%">
  <div class="text">Lisa Hanna</div>
</div>

</div>';

<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
 </div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 3000); // Change image every 3 seconds
}
</script>   

<?php include_once ('includes/footer.php');?>