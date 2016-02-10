<?php

// This is a template for a PHP scraper on morph.io (https://morph.io)
// including some code snippets below that you should find helpful

 require 'scraperwiki.php';
 require 'scraperwiki/simple_html_dom.php';
//
 // Read in a page
 $html = scraperwiki::scrape("http://nodecounter.com/");
//
// // Find something on the page using css selectors
// $dom = new simple_html_dom();
// $dom->load($html);
// print_r($dom->find("table.list"));
//

// bitcoin_classic_node_count: 594,
if (preg_match('!bitcoin_classic_node_count:\s+(\d+),!', $html, $matches)) {
  // Write out to the sqlite database using scraperwiki library
  scraperwiki::save_sqlite(array('name'), array('name' => 'classic', 'count' => intval($matches[1])));
}


//
// // An arbitrary query against the database
// scraperwiki::select("* from data where 'name'='peter'")

// You don't have to do things with the ScraperWiki library.
// You can use whatever libraries you want: https://morph.io/documentation/php
// All that matters is that your final data is written to an SQLite database
// called "data.sqlite" in the current working directory which has at least a table
// called "data".
