<!DOCTYPE html>
<html lang="en" >
	<head>
		<meta charset="UTF-8">
		<title>Allen-chat</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="stylesheet" href="/css/app.css">
		<link rel="stylesheet" href="/css/chat.css">
	</head>
	<body>
		<section class="msger">
			<header class="msger-header">
				<div class="msger-header-title">
					<i class="fas fa-comment-alt"></i> 
					<span class="chat-with"></span> 
					<span class="typing" style="display: none;"> ...writing</span>
				</div>
				<div class="msger-header-options">
					<span class="chat-status offline">
						<i class="fa-regular fa-circle-dot"></i>
					</span>
				</div>
			</header>

			<div class="msger-chat"></div>

			<form class="msger-input-area">
				<input type="text" class="msger-input" oninput="sendTypingEvent()" placeholder="Enter your message...">
				<button type="submit" class="msger-send-btn">Send</button>
			</form>

			
		</section>
		<div class="btn">
			<a class="btn-home" href="{{ route('welcome.index')}}">Home</a>
		</div>

		<script src='https://kit.fontawesome.com/0b01b67c65.js'></script>
		<script  src="/js/app.js"></script>
		<script  src="/js/chat.js"></script>

	</body>
</html>
