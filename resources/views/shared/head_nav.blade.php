<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Laravel</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Static Page <span class="caret"></span></a>
                <ul class="dropdown-menu">
                	<li>{{ link_to('/profil', $title = "Profil", $attributes = array(), $secure = null) }}</li>
                	<li>{{ link_to('/contact', $title = "Contact", $attributes = array(), $secure = null) }}</li>
                	<li>{{ link_to('/about', $title = "About", $attributes = array(), $secure = null) }}</li>
                    </ul>
           </li>
          <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Modul <span class="caret"></span></a>
                <ul class="dropdown-menu">
                	<li>{{ link_to('/articles_page', $title = "Masonry + LightGallery", $attributes = array(), $secure = null) }}</li>
                	<li>{{ link_to('/articles', $title = "CRUD Images", $attributes = array(), $secure = null) }}</li>
                	<li>{{ link_to('/articles/pagination', $title = "Ajax Pagination", $attributes = array(), $secure = null) }}</li>
                	<li>{{ link_to('/articles/searching', $title = "Ajax Searching", $attributes = array(), $secure = null) }}</li>
                	<li>{{ link_to('/articles/sorting', $title = "Ajax Sorting", $attributes = array(), $secure = null) }}</li>
            	
                </ul>
           </li>
        </ul>
	    <ul class="nav navbar-nav navbar-right">
           @if (Auth::check())
		    <li>{!! link_to('signout', 'Sign Out') !!}</li>		
		  @else		
		    <li>{!! link_to('signin', 'Sign in') !!}</li>		
		  @endif
          <li>{!! link_to('signup', 'Signup') !!}</li>
	    </ul>
      </div>
    </div>
  </nav>
  