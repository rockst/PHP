<?php
	/**
	 * 自動產生 ./sitemap.xml
	 * @author rockst
	 * @since 2016-10-26
	 */
	date_default_timezone_set("Asia/Taipei");
	
	define('BASEPATH', '');
	define('ENVIRONMENT', '');
	
	$xml_file = dirname(__FILE__) . '/../../sitemap.xml';
	
	include dirname(__FILE__) . '/../config/database.php';
	include dirname(__FILE__) . '/../config/common.php';
	
	try {
		// connect mysql
		$db = new PDO ('mysql:host='.$db['default']['hostname'].';dbname='.$db['default']['database'].';charset=utf8', 
						$db['default']['username'], 
						$db['default']['password']);
	} catch (Exception $e) {
		exit($e->getMessage() . PHP_EOL);
	}
	
	$url_cnt = 0;
	
	// 產生 XML 開頭
	$Dom = new DOMDocument('1.0', 'UTF-8');
	$Dom->formatOutput = true; // 產生 new-line
	$xmlUrlset = $Dom->appendChild($Dom->createElement("urlset"));
	$xmlUrlset->setAttribute('xmlns', "http://www.sitemaps.org/schemas/sitemap/0.9");
	
	// 產生靜態 XML
	foreach($config['sitemap'] as $sitemap) {
		$xmlUrl = $Dom->createElement("url");
		$xmlUrl = $xmlUrlset->appendChild($xmlUrl);
		while(list($key, $value) = each($sitemap)) {
			$xmlUrl->appendChild($Dom->createElement($key, $value));
		}
		$url_cnt++;
	}
	
	// 產生最新消息文章的 XML
	$sql = "SELECT news_id, date_format(news_date, '%Y-%m-%d') as news_date FROM news ORDER BY news_id DESC";
	$rs = $db->prepare ($sql);
	$rs->execute ();
	while($row = $rs->fetch ( PDO::FETCH_ASSOC )){
		$xmlUrl = $Dom->createElement("url");
		$xmlUrl = $xmlUrlset->appendChild($xmlUrl);
		build_xml($xmlUrl, 'news/article/' . $row['news_id'], $row['news_date'], 'daily', '1.0');
		$url_cnt++;
	}
	
	// 產生服務說明的 XML
	$sql = "SELECT sec_id FROM service ORDER BY sec_id DESC";
	$rs = $db->prepare ($sql);
	$rs->execute();
	while($row = $rs->fetch ( PDO::FETCH_ASSOC )){
		$xmlUrl = $Dom->createElement("url");
		$xmlUrl = $xmlUrlset->appendChild($xmlUrl);
		build_xml($xmlUrl, 'service/page/' . $row['sec_id'], date('Y-m-d'), 'monthly', '0.5');
		$url_cnt++;
	}

	// 產生婚禮專案群組的 XML
	$sql = "SELECT group_id FROM dish_group WHERE group_display = :group_display ORDER BY group_id DESC";
	$rs = $db->prepare ($sql);
	$rs->execute(array('group_display'=>1));
	while($row = $rs->fetch ( PDO::FETCH_ASSOC )){
		$xmlUrl = $Dom->createElement("url");
		$xmlUrl = $xmlUrlset->appendChild($xmlUrl);
		build_xml($xmlUrl, 'wedding/index/' . $row['group_id'], date('Y-m-d'), 'monthly', '0.9');
		$url_cnt++;
	}
	
	try {
		if($url_cnt > 0) {
			
			// 寫入檔案
			$fp = fopen($xml_file, "w") or die("Unable to open file!" . PHP_EOL);
			fwrite($fp, $Dom->saveXML());
			fclose($fp);
			
			echo date('Y-m-d H:i:s') . ' build ' . $url_cnt . ' urls in sitemap.xml ' . ((file_exists($xml_file)) ? 'success' : 'fail');
		} else {
			echo 'no data found need to build sitemap.xml';
		}
		
	} catch (Exception $e) {
		exit($e->getMessage());
	}
	
	echo PHP_EOL;
	
	/**
	 * 產生 XML 資料
	 * 
	 * @param Object $xmlUrl
	 * @param String $uri
	 * @param String $date
	 * @param String $changefreq
	 * @param String $priority
	 */
	function build_xml(&$xmlUrl, $uri, $date, $changefreq, $priority)
	{
		global $Dom;
		
		$base_url = 'https://wshall.com.tw/';
		
		$xmlUrl->appendChild($Dom->createElement('loc', $base_url . $uri));
		$xmlUrl->appendChild($Dom->createElement('lastmod', $date));
		$xmlUrl->appendChild($Dom->createElement('changefreq', $changefreq));
		$xmlUrl->appendChild($Dom->createElement('priority', $priority));
	
	} // end of build_xml