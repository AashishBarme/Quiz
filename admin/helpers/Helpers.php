<?php
declare(strict_types = 1);

class Helpers{

	public function homepageReload()
	{
		echo '<script>window.location.href="http://localhost/php/php_quiz/admin/pages/list.php"</script>';
	}

	public function SlugCreator(string $url)
	{
		$arranged_url = str_replace(" ","-",$url);
		return strtolower($arranged_url);
	}
}