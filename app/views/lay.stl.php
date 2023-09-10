<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@addsection('title')</title>
	<link rel="stylesheet" type="text/css" href="{%css('bootstrap.css')%}">
</head>
<body>

<div class="container">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{%route_name('google_login')%}">GoogleLogin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
        	  <a class="nav-link active" aria-current="page" href="{%route_name('google_login')%}">Home</a>
        </li>
        <li class="nav-item">
          {%if session()->has('token')%}
           <a class="nav-link active" href="{%route_name('logout')%}" aria-current="page">logout</a>
          {%endif%}
        </li>
      </ul>
    </div>
  </div>
</nav>
   @addsection('content')
</div>


<script type="text/javascript" src="{%js('jquery.js')%}"></script>
<script type="text/javascript" src="{%js('bootstrap.js')%}"></script>
<script type="text/javascript" src="{%js('poper.js')%}"></script>
<script type="text/javascript" src="{%js('script.js')%}"></script>
@addsection('script')
</body>
</html> 