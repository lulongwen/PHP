<?php
	require_once('a.php');
	require_once('b.php');
	require_once('c.php'); // 全局类

	use a\b\c\Person;
	use d\e\f\Person as PersonB; // as 别名，避免冲突
	use \Person; // 顶层的命名空间


	$aInfo = new a\b\c\Person();  // 命名空间冗余，使用 use
	$aInfo-> info();

	$bInfo = new PersonB();
	$bInfo-> info();


	$topInfo = \Person();
	$topInfo-> info();



?>