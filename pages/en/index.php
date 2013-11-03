<!-- %TITLE%: "" -->
   
      <div id="intro">
      
	<h2>
	  <b>Weather is the key</b> to a safer and more sustainable world.<br>
	  <b>Openness is the way...</b>
	</h2>
	<h3>
	  We promote open data, open science, open technology and open knowledge for 
	  pushing meteorology forward in the society and give rise to innovation.
	</h3>
	
	<ul class="buttons">
	  <li>
	    <a href="/about-us">Learn about us</a>
	  </li>
	  <li>
	    <a href="/projects">Discover our projects</a>
	  </li>
	  <li>
	    <a href="/get-involved">Bring your ideas !</a>
	  </li>
	  <li>
	    <a href="/contact">Get in touch</a>
	  </li>
	</ul>
	
      </div>

      <div id="news">
      	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
	<script src="/js/jquery.vticker.min.js" type="text/javascript"></script>
	<em>The Latest from <a href="http://blog.openmeteofoundation.org" target="_blank">our Blog</a>:</em>
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
	  <li><a href="/partners">Partners</a></li>
	  <li><a href="/governance">Governance</a></li>
	  <!--<li><a href="/advisory-board">Advisory Board</a></li>-->
	  <!--<li><a href="/legal-informations">Legal Informations</a></li>-->
	  <li><a href="/terms-of-use">Terms of Use</a></li>
	  <li><a href="/privacy-policy">Privacy Policy</a></li>
	  <li><a href="/ip-policy">IP Policy</a></li>
	</ul>
      </div>
