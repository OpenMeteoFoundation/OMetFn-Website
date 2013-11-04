<!-- %TITLE%: "" -->
   
      <div id="intro">
      
	<h2>
	  La météo est la clé d'une société plus sure et plus durable.<br>
	  La route est ouverte...
	</h2>
	<h3>
	  Nous faisons la promotion de l'open data, l'open science, l'open technology et l'open knowledge 
	  pour mettre en avant la météo dans la société et stimuler l'innovation.
	</h3>
	
	<ul class="buttons">
	  <li>
	    <a href="/about-us">Qui sommes nous ?</a>
	  </li>
	  <li>
	    <a href="/projects">Découvrez nos projets</a>
	  </li>
	  <li>
	    <a href="/get-involved">Apportez vos idées</a>
	  </li>
	  <li>
	    <a href="/contact">Contactez nous</a>
	  </li>
	</ul>
	
      </div>

      <div id="news">
      	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
	<script src="/js/jquery.vticker.min.js" type="text/javascript"></script>
	<em>En direct de <a href="http://blog.openmeteofoundation.org" target="_blank">notre Blog</a>:</em>
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
	<h4>More :</h4>
	<ul>
	  <li><a href="/partners">Partenaires</a></li>
	  <li><a href="/governance">Gestion</a></li>
	  <!--<li><a href="/advisory-board">Advisory Board</a></li>-->
	  <!--<li><a href="/legal-informations">Legal Informations</a></li>-->
	  <li><a href="/terms-of-use">Conditions d'utilisation</a></li>
	  <li><a href="/privacy-policy">Vie privée</a></li>
	  <li><a href="/ip-policy">Propriété intellectuelle</a></li>
	</ul>
      </div>
