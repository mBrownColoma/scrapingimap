<?php

// include Imap_parser class
include_once('lib/Imap_parser.php');

// create Imap_parser Object
$email = new Imap_parser();

// data
$data = array(
	// email account
	'email' => array(
		'hostname' => '{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX',
		'username' => 'pruebas.mdai@gmail.com',
		'password' => 'rgcoottljndybhar'    
	),
	// inbox pagination
	'pagination' => array(
		'sort' => 'DESC', // or ASC
		'limit' => 10,
		'offset' => 0
	)
);

// get inbox. Array
$result = $email->inbox($data);

echo '<pre>';
$j = json_encode($result);

// var_dump($data);

$array_num = count($result);
//xecho($array_num);

for ($i = 0; $i < $array_num; ++$i){
    if($result["inbox"][$i]["subject"] == "contac2"){
		echo '<pre>';
        echo($result["inbox"][$i]["subject"]);
        echo($result["inbox"][$i]["message"]);
        } 
    }

// foreach($result as $elemento){
//     if($result["inbox"][0]["subject"] == "contac3"){
//         echo($result["inbox"][0]["subject"]);
//     }
//     // echo($result["inbox"][0]["message"]);
//     // echo($result["inbox"][0]["subject"]);
// }

// var_dump(json_encode($result, true));
// echo $result[1]->message;
// var_dump($result);
// echo($result["inbox"][0]["message"]);
echo '</pre>';