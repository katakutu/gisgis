<li @if($menu=='beranda')id="selected"@endif>{{HTML::link('/', 'Beranda')}}</li>
<li @if($menu=='profil')id="selected"@endif><a href="#">Profil</a>
	<ul>
		@foreach($profil as $key=>$value)
			<li>{{HTML::link('read/'.$value->slug, $value->judul)}}</li>
		@endforeach
	</ul>
</li>
<li @if($menu=='sig_perbatasan')id="selected"@endif>{{HTML::link('sig_perbatasan', 'SIG Perbatasan')}}</li>
<li @if($menu=='data_infrastruktur')id="selected"@endif>{{HTML::link('data_infrastruktur', 'Data Infrastruktur')}}
	<ul>
		<li><a href="">Kec. Jagoi Babang</a>
			<ul>
				<li>{{HTML::link('data_infrastruktur/1/ruas_jalan/1', 'Ruas Jalan')}}</li>
				<li>{{HTML::link('data_infrastruktur/1/jembatan/1', 'Jembatan')}}</li>
				<li>{{HTML::link('data_infrastruktur/1/gorong_gorong/1', 'Gorong-gorong')}}</li>
				<li>{{HTML::link('data_infrastruktur/1/infrastruktur/1', 'Infrastruktur')}}</li>
			</ul>
		</li>
		<li><a href="">Kec. Siding</a>
			<ul>
				<li>{{HTML::link('data_infrastruktur/2/ruas_jalan/1', 'Ruas Jalan')}}</li>
				<li>{{HTML::link('data_infrastruktur/2/jembatan/1', 'Jembatan')}}</li>
				<li>{{HTML::link('data_infrastruktur/2/gorong_gorong/1', 'Gorong-gorong')}}</li>
				<li>{{HTML::link('data_infrastruktur/2/infrastruktur/1', 'Infrastruktur')}}</li>
			</ul>
		</li>
	</ul>
</li>
<li @if($menu=='agenda')id="selected"@endif>{{HTML::link('agenda', 'Agenda')}}</li>
<li @if($menu=='berita')id="selected"@endif>{{HTML::link('berita', 'Berita')}}</li>
<li @if($menu=='download')id="selected"@endif>{{HTML::link('download', 'Download')}}</li>
<li @if($menu=='galeri')id="selected"@endif>{{HTML::link('galeri', 'Galeri')}}</li>
<li @if($menu=='hubungi_kami')id="selected"@endif>{{HTML::link('hubungi_kami', 'Hubungi kami')}}</li>