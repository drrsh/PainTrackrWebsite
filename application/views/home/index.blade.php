@section('scripts')

@endsection

@section('styles')
<link  rel="stylesheet" type="text/css" href="/css/home.css">
@endsection

@section('content')
<h1>PainTrackr</h1>
<h3>A mobile monitor for physical pain.</h3>
<section class="thirds cf">
	<article class="f cf">
		<div class="img_cont">
			<img src="/img/recordimage.png" alt="">
		</div>
		<div class="info">
			<h2>Record</h2>
			<p>Indicate the location and severity of your pain.</p>
		</div>
	</article>
	<article class="f cf">
		<div class="img_cont">
			<img src="/img/trackimage.png" alt="">
		</div>
		<div class="info">
			<h2>Track</h2>
			<p>Save your entries and browse through them by day and time.</p>
		</div>
	</article>
	<article class="f cf">
		<div class="img_cont">
			<img src="/img/sendimage.png" alt="">
		</div>
		<div class="info">
			<h2>Send</h2>
			<p>Share your data with clinicians or family members or download information from another device.</p>
		</div>
	</article>
</section>
<article class="appstore">
	<a href="http://itunes.apple.com/us/app/paintrackr/id566170561?mt=8" title=""><img src="/img/appstoreicon.png" alt=""></a>
</article>
@endsection
