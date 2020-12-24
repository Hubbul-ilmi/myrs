<?php
require_once('../_config/config.php');

unset($_SESSION['user']);
?>
	<script type="text/javascript">window.location='<?=base_url("auth/login.php")?>'</script>
<?php