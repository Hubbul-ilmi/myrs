<?php
require_once('_config/config.php');
if(isset($_SESSION['user'])){
    ?>
    <script type="text/javascript">window.location='<?=base_url("dashboard")?>'</script>
    <?php
}else{
	?>
	<script type="text/javascript">window.location='<?=base_url("auth/login.php")?>'</script>
	<?php 
}
?>