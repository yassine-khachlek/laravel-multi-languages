<select>
@foreach(Config::get('yk.laravel-multi-languages.languages') as $language)
	<option value="{{ $language['iso_code_639_1'] }}" {{ $language['iso_code_639_1']===App::getLocale() ? 'selected' : '' }}>{{ $language['native_name'] }}</option>
@endforeach
</select>