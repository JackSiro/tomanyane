	 
	<script type="text/javascript" src="<?php echo as_siteUrl ?>as_apps/as_tinymce/tinymce.min.js"></script>
	<script type="text/javascript">
		tinymce.init({
			selector: "#full_post", height : 500,
			plugins: "image wordcount resize autolink imagetools contextmenu media table spellchecker textcolor emoticons", 
			image_advtab: true,
				imagetools_toolbar: "rotateleft rotateright | flipv fliph | editimage imageoptions",
				contextmenu: "link image inserttable | cell row column deletetable",
				tools: "inserttable spellchecker",
		});
	</script>
  </body>
</html>