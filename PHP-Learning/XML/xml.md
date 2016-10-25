
http://stackoverflow.com/questions/486757/how-to-generate-xml-file-dynamically-using-php

	/* create a dom document with encoding utf8 */
	$domtree = new DOMDocument('1.0', 'UTF-8');
	
	/* create the root element of the xml tree */
	$xmlRoot = $domtree->createElement("xml");
	/* append it to the document created */
	$xmlRoot = $domtree->appendChild($xmlRoot);
	
	$currentTrack = $domtree->createElement("track");
	$currentTrack = $xmlRoot->appendChild($currentTrack);
	
	/* you should enclose the following two lines in a cicle */
	$currentTrack->appendChild($domtree->createElement('path','song1.mp3'));
	$currentTrack->appendChild($domtree->createElement('title','title of song1.mp3'));
	
	$currentTrack->appendChild($domtree->createElement('path','song2.mp3'));
	$currentTrack->appendChild($domtree->createElement('title','title of song2.mp3'));
	
	/* get the xml printed */
	echo $domtree->saveXML();
	
http://stackoverflow.com/questions/6226702/how-to-create-and-set-values-for-attribute-in-xml

	$v->setAttribute('id', 101);
	
http://stackoverflow.com/questions/10282057/php-dom-generated-xml-break-line

	$dom->formatOutput = true;
