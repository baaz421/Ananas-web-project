
<?php
include "includes/header.php";
?>

<main class="main">
	<div class="error-content text-center" style="background-image: url(../assets/images/backgrounds/error-bg.jpg)">
    	<div class="container">
    		<h1 class="error-title"><?php echo $_404['error_404']; ?></h1><!-- End .error-title -->
    		<p><?php echo $_404['errortext']; ?></p>
    		<a href="../index.php" class="btn btn-outline-primary-2 btn-minwidth-lg">
    			<span><?php echo $_404['btohg']; ?></span>
    			<i class="icon-long-arrow-right"></i>
    		</a>
    	</div><!-- End .container -->
	</div><!-- End .error-content text-center -->
</main><!-- End .main -->

<?php 
include "includes/footer.php";
?> 