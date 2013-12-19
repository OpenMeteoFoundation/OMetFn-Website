<!-- %TITLE%: "" -->
   
      <div id="intro">
      
	<h2>
	  <b>Wetter ist der Schlüssel</b> zu einer sicheren and nachhaltigeren Welt.<br>
	  <b>Offenheit ist der Weg...</b>
	</h2>
	<h3>
	  Wir fördern freie Daten, freie Wissenschaft, freie Technologie und freies Wissen, um
	  die Meteorologie in der Gesellschaft zu etablieren und Innovationen anzustoßen.
	</h3>
	
	<ul class="buttons">
	  <li>
	    <a href="/about-us">Lern uns kennen</a>
	  </li>
	  <li>
	    <a href="/projects">Durchstöber unsere Projekte</a>
	  </li>
	  <li>
	    <a href="/get-involved">Mach mit!</a>
	  </li>
	  <li>
	    <a href="/contact">Kontaktiere uns</a>
	  </li>
	</ul>
	
      </div>

      <div id="news">
      	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
	<script src="/js/jquery.vticker.min.js" type="text/javascript"></script>
	<em>Aktuelles aus <a href="http://blog.openmeteofoundation.org" target="_blank">unserem Blog</a>:</em>
	<div id="news-slider">
	  <ul>
<?php
$blog_cache='../cache/blog-entries.html';
if (filemtime($blog_cache)+3600 > time()) {
  readfile($blog_cache);
} else {
  $html = '';
  $rss = new DOMDocument();
  $rss->load('http://blog.openmeteofoundation.org/feeds/posts/default');
  $feed = array();
  foreach ($rss->getElementsByTagName('entry') as $node) {
    $title = $node->getElementsByTagName('title')->item(0)->nodeValue;
    $node = $node->getElementsByTagName('link');
    for($i = 0; $i<$node->length; $i++){
      $item = $node->item($i);
      if ($item->getAttribute('rel') == 'alternate') {
	  $link=$item->getAttribute('href');
	  break;
      }
    }
    $html .="<li><a href=\"$link\" target=\"_blank\">".htmlentities($title)."</a></li>\n";
  }
  file_put_contents($blog_cache, $html);
  
  echo $html;
}
?>	  </ul>
	</div>
	<div id="news-slider-btn">
	  <a href="javascript:void(0);" onclick="$('#news-slider').vTicker('prev', {animate:true});" >&lt;</a>
	  <a href="javascript:void(0);" onclick="$('#news-slider').vTicker('next', {animate:true});" >&gt;</a>
	</div>
	

	<script type="text/javascript">
	    $(function() {
	      $('#news-slider').vTicker({pause:3000});
	    });
	</script>
	
      </div>
      
      <div id="footer">
	<h4>Mehr:</h4>
	<ul>
	  <li><a href="/partners">Partner</a></li>
	  <li><a href="/governance">Projektstruktur</a></li>
	  <!--<li><a href="/advisory-board">Advisory Board</a></li>-->
	  <!--<li><a href="/legal-informations">Legal Informations</a></li>-->
	  <li><a href="/terms-of-use">Nutzungsbestimmungen</a></li>
	  <li><a href="/privacy-policy">Datenschutzrichtlinie</a></li>
	  <li><a href="/ip-policy">Urheberrechtsrichtlinie</a></li>
	</ul>
      </div>
