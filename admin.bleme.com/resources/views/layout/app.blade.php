@include('layout._header')
@include('layout._left')
<div class="content">
	@include('layout._notice')

	@yield('contents')
</div>
@include('layout._foot')						   