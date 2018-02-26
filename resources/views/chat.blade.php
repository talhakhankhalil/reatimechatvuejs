<!DOCTYPE html>
<html>
<head>
	<title>Chat</title>
	<link rel="stylesheet" type="text/css" href="css/app.css">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="name" content="{{ Auth::user()->name }}">

</head>
<body>
	<div id="app">
    
	<h1>Chatroom <span class="badge">@{{ usersInRoom.length }}</span></h1>
	<chat-log :messages="messages"></chat-log>
	<chat-composer v-on:messagesent="addMessage"></chat-composer>
	</div>
<script type="text/javascript" src="js/app.js"></script>
</body>
</html>