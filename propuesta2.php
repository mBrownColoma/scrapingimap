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
for ($i = 0; $i < 10; ++$i){
	if($result["inbox"][$i]["subject"] == "Nuevo Contacto Enlace - Sendero del Monte"){
		echo '<pre>';
        echo($result["inbox"][$i]["subject"]);
		echo '<pre>';
        echo($result["inbox"][$i]["message"]);
		
		$content=$result["inbox"][$i]["message"];
		echo ("---------------------");
		$str_open  = "FijoFicha Completa";
		$str_close = "Ver Ficha";
		$pos_open  = strpos($content, $str_open);
		$pos_close = strpos($content, $str_close);
		if ($pos_open !== false && $pos_close !== false) { //existe el trozo de texto que buscas?
			//$subcontent = substr($content, $pos_open, ($pos_close - $pos_open)); 
			
			$subcontent = substr($content, ($pos_open+strlen($str_open)), ($pos_close - $pos_open)); 
			echo($subcontent);//subcontent: los datos que necesitas
			echo '<pre>';
			$rut = substr($subcontent, 0, strpos($subcontent, "-")+2);
			echo '<pre>';
			$subcontent2 = substr($subcontent, (1+strpos($subcontent, "-")+1), ($pos_close - strpos($subcontent, "-")+1));
			echo ($subcontent2);
			echo '<pre>';
			$datolimpio = [
				"rut" => $rut,
				"nombre" => "calmao",
				"mail" => "xxx@ss.cl",
				"fono" => "9999999"
			];

			echo json_encode($datolimpio);
		}
		echo ("---------------------");
		//$casi = strip_tags($result["inbox"][$i]["message"]);
		//var_dump(explode(" ", $casi));	
	}
}
// var_dump($result);

//$array_num = count($result);
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