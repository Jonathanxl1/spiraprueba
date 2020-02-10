<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title', 'Spira Prueba')</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="/">Spira</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
			<div class="collapse navbar-collapse" id="navbarNav">
			    <ul class="navbar-nav mr-auto">
			      <li class="nav-item active">
			        <a class="nav-link" href="/agregar">Agregar Estudiantes <span class="sr-only">(current)</span></a>
			      </li>
			      
			      </ul>
			     <span class="navbar-text">
      Prueba de Desarrollo con Vuejs & Laravel & RestApi
   				 </span>
			</div>
		  
	</nav>
	<div id="app">
		@yield('content')
	</div>
 <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>