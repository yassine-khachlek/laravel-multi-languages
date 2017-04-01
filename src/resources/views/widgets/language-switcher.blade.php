<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
  	@if(Config::get('yk.laravel-multi-languages.languages.'.App::getLocale().'.'.'flag'))
  	<span class="flag-icon flag-icon-{{ Config::get('yk.laravel-multi-languages.languages')[App::getLocale()]['flag'] }}"></span>
  	@endif
    {{ Config::get('yk.laravel-multi-languages.languages.'.App::getLocale().'.'.'native_name') }}
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
	@foreach(
		Config::get('yk.laravel-multi-languages.languages')
        as $key => $language
    )
    	@if($key !== App::getLocale())
		<li>
			<a href="{{ Route::has($key.'.') ? route($key.'.') : '#' }}">
				@if(Config::get('yk.laravel-multi-languages.languages.'.$key.'.'.'flag'))
				<span class="flag-icon flag-icon-{{ $language['flag'] }}"></span>
				@endif
				{{ $language['native_name'] }}
			</a>
		</li>
		@endif
	@endforeach
  </ul>
</div>

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.8.0/css/flag-icon.min.css" />
@append