#!/usr/bin/php
<?PHP
// test as ./magnifying_glass.php resources/page.html
// or test as ./magnifying_glass.php page.html > new_page.html
// you will see that come content will change to uppercase
/*
	<body>Hello World <a href=http://cyan.com title="UN LIEN">CECI EST UN LIEN</a>
	<br /><a href=http://www.riven.com> ET CA AUSSI <img src=wrong.image title="ET ENCORE CA"></a>
*/
function take_title($match)
{
	//print_r($match);		
	return ('title="'.strtoupper($match[1]).'"');
}
function modify_content($match)
{
		//print_r ($match);
		return (strtoupper($match[0]));
}
function select_content($match)
{
		//print_r ($match);
		return (preg_replace_callback('/>.*</siU', modify_content, $match[0]));
}
if ($argc == 1)
		return ;
// 1 open file and put everything at page_code
$page_code = file_get_contents($argv[1]);
// 2 call function take title to take the content that is inside the tag ">THIIS<"
$page_code = preg_replace_callback('/title="(.*?)"/', take_title, $page_code);
// 3 Put the content in uppercase.
$page_code = preg_replace_callback('/<a [^>]+.*<\/a>/siU', select_content, $page_code);
print $page_code;
?>
