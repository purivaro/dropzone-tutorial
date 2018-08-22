<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Dropzone Tutorial</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
	<link rel="stylesheet" href="/lib/plugins/dropzone/min/dropzone.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<nav class="navbar navbar-dark bg-dark">
		<a href="#" class="navbar-brand">Dropzone Tutorial</a>
	</nav>
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">New Post</h4>
						<form action="json/json_post_save.php" id="form-post" method="post">
							<div class="form-group">
								<label>Message</label>
								<input type="text" name="post" class="form-control">
							</div>
							<div class="form-group">
								<div class="dropzone" id="drop"></div>
							</div>
							<button type="submit" class="btn btn-success">Save</button>
						</form>
					</div>
				</div>
				<div id="app">
					<div class="card mt-3" v-for="post in posts" v-cloak >
						<div class="card-body">
							<h5 class="card-title">{{ post.cPost }}</h5>
							<p class="card-text text-muted"><small>{{ moment(post.dCreated).fromNow() }}</small></p>
							<div>
								<img :src="img.cImg_path" :class="imgClass(post.img_count)" v-for="img in post.img">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
	<script src="/lib/plugins/dropzone/min/dropzone.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	<script src="/lib/plugins/node_modules/moment/moment.js"></script>
	<script src="/lib/plugins/node_modules/moment/locale/th.js"></script>
	<script src="js/script.js"></script>
</body>
</html>