<?php
	include('./php/GuestClass.php');
	$guest = new Guest('./data.xml');
	$messages = $guest->getMessages();	
?>
<html>
	<head>
	<title>Гостевая книга</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link href="style.css" rel="stylesheet" media="all" />
	</head>
	<body>
	<h1>Гостевая книга</h1>	
	<!--<div class="messages" id="messages">-->
		<div class="message_block">
			<div class="add_new_message"><a href="javascript:;">добавить запись</a></div>
		</div>

		<?php include('./php/template.php') ?>

		<!--<div class="author" id="author">Василий Тёркин 14.10.2015 20:30<a href="javascript:;">редактировать</a><a href="javascript:;">ответить</a></div> 
		
		<div class="message">Internet Explorer до версии 6.0 требует, чтобы <!DOCTYPE> стоял обязательно в первой строке кода. В противном случае браузер переходит в режим совместимости (quirk mode).

		Хотя значение URL является не обязательным, браузеры при его отсутствии могут перейти в режим совместимости, поэтому всегда указывайте полный путь к DTD-файлу, как показано в табл. 1.</div>


		<div class="message-answer"> 
			<div class="author" id="author">Иван Васильевич 14.10.2015 20:30<a href="javascript:;">редактировать</a><a href="javascript:;">ответить</a></div> 
			<div class="message">Так точно.</div>
		</div>

		<div class="answer-answer">
			<div class="author" id="author">Пётр Ильич 14.10.2015 20:30<a href="javascript:;">редактировать</a></div> 
			<div class="message">Так точно.</div>
		</div>



		<div class="author" id="author">Василий Тёркин 14.10.2015 20:30<a href="javascript:;">редактировать</a><a href="javascript:;">ответить</a></div> 
		<div class="message">Internet Explorer до версии 6.0 требует, чтобы <!DOCTYPE> стоял обязательно в первой строке кода. В противном случае браузер переходит в режим совместимости (quirk mode).

		Хотя значение URL является не обязательным, браузеры при его отсутствии могут перейти в режим совместимости, поэтому всегда указывайте полный путь к DTD-файлу, как показано в табл. 1.</div>
		



		<div class="author" id="author">Василий Тёркин 14.10.2015 20:30<a href="javascript:;">редактировать</a><a href="javascript:;">ответить</a></div> 
		<div class="message">Internet Explorer до версии 6.0 требует, чтобы <!DOCTYPE> стоял обязательно в первой строке кода. В противном случае браузер переходит в режим совместимости (quirk mode).

		Хотя значение URL является не обязательным, браузеры при его отсутствии могут перейти в режим совместимости, поэтому всегда указывайте полный путь к DTD-файлу, как показано в табл. 1.</div>-->
	<!--</div>-->
	</body> 
</html>