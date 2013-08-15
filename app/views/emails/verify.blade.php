<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Email confirmation</h2>
		<div>
			To very your account, please go here: 
			<a href = <?php "register/verify/" . $token ?> >
				{{ "register/verify/" . $token }}
			</a>
		</div>
	</body>
</html>