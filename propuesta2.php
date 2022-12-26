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
		'username' => 'contactos@correos.mdai.cl',
		'password' => 'smrwmuqdqqzybqfc'    
	),
	// inbox pagination
	'pagination' => array(
		'sort' => 'DESC', // or ASC
		'limit' => 25,
		'offset' => 0
	)
);


// get inbox. Array
$result = $email->inbox($data);

echo '<pre>';
$j = json_encode($result["count"]);
//var_dump($j);
//cambiar j a int

// var_dump($data);
for ($i = 0; $i < 25; ++$i){
	if($result["inbox"][$i]["subject"] == "Nuevo Contacto Enlace - Puerto Horizonte"){
		echo '<pre>';
        echo($result["inbox"][$i]["subject"]);
		echo '<pre>';
        echo($result["inbox"][$i]["message"]);
		//$casi = strip_tags($result["inbox"][$i]["message"]);
		//var_dump(explode(" ", $casi));
	}
}
// var_dump($result);

$array_num = count($result);
// echo($array_num);

// for ($i = 0; $i < $array_num; ++$i){
//     if($result["inbox"][$i]["subject"] == "Nuevo Contacto Enlace - Sendero del Monte"){
// 		echo '<pre>';
//         echo($result["inbox"][$i]["subject"]);
// 		echo '<pre>';
//         var_dump($result["inbox"][$i]["message"]);
// 		// var_dump(explode(':', $result["inbox"][$i]["message"]));
// 		// $casi = strip_tags($result["inbox"][$i]["message"]);
// 		// var_dump($casi);
// 		// var_dump(explode(" ", $casi));
//         } 
//     }

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
// var_dump($result["inbox"][0]["message"]);
echo '</pre>';