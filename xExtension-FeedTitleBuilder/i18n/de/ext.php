<?php

return array(
	'FeedTitleBuilder' => array(
		'label4Template' => 'Vorlage',
		'helping' => 'Es gibt einige spezielle Bereiche, mit denen Sie Ihren persönlichen Feed-Titel gestalten können.',
		'help4origtitle' => 'Verwenden Sie diesen Code, um festzulegen, wo der Originaltitel dieses Feeds angezeigt werden soll',
		'help4date' => 'Mit diesem Code können Sie das Tagesdatum in Ihrem bevorzugten Format hinzufügen. Verwenden Sie Ihre bevorzugte Websuchmaschine, um herauszufinden, welche Parameter in der Datumsfunktion in PHP verfügbar sind.<br />Details finden Sie hier: <a href="https://www.php.net/manual/de/function.date.php" target="_blank" rel="noopener nofollow">https://www.php.net/manual/de/function.date.php</a><br />Beispiel: {date}ymd{/date} => 20190401',
		'help4phpparseurl' => 'Die URL wird mit der PHP-Funktion <code>parse_url</code> geteilt und Sie können die spezifischen Werte des Ergebnisses abrufen.<br />Details finden Sie hier: <a href="https://www.php.net/manual/de/function.parse-url.php" target="_blank" rel="noopener nofollow">https://www.php.net/manual/de/function.parse-url.php</a>',
		'help4phpparseurlvalues' => 'Die folgenden speziellen Wörter sind verfügbar:',
		'help4phpparseurlschema' => 'Sie erhalten \'http\', \'https\', \'ftp\' ect. Beispiel: \'https\'',
		'help4phpparseurlhost' => 'In Betracht des unten angeführten Beispiels erhalten Sie damit \'github.com\'.',
		'help4phpparseurlport' => 'Damit erhalten sie die Nummer des Ports, welcher in der URL angegeben sein kann.',
		'help4phpparseurluser' => 'Damit erhalten sie den User, welcher in der URL angegeben sein kann.',
		'help4phpparseurlpass' => 'Damit erhalten sie das ev. in der URL angegebene Passwort.',
		'help4phpparseurlpath' => 'In Betrag auf das unten angeführte Beispiel erhalten Sie \'/FreshRSS/FreshRSS\'.',
		'help4phpparseurlquery' => 'Sie erhalten damit den Text zwischen dem \'?\' und der \'#\'.',
		'help4phpparseurlfragment' => 'Hiermit erhalten Sie den gesamten Text nach der \'#\'.',
		'help4phpparseurlhostspecial' => 'Da bei dem Wort \'host\' die gesamte Basis-URL geliefert wird, gibt es dazu ein paar spezielle Wörter extra. Die Basis-URL wird dazu mittels \'.\' (Punkt) aufgeteilt.',
		'help4phpparseurlhostsub' => 'Sie erhalten den gesamten Text vor dem vorletzten Punkt.',
		'help4phpparseurlhostname' => 'Sie erhalten den Text zwischen dem vorletzten und letzten Punkt.',
		'help4phpparseurlhosttld' => 'Sie erhalten den Text nach dem letzten Punkt.',
		'example' => 'Beispiel',
		'example_template_code' => 'Vorlage:',
		'example_url' => 'URL:',
		'example_title' => 'Erzeugter Feed Titel:',
		'info' => 'Information:',
		'infodesc' => 'Wenn die Vorlage leer ist, erhalten Sie den Originaltitel des hinzugefügten Feeds!',
	),
);