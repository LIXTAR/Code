<?php
	//Проверка данных пользователя
	function validate_new_user($id, $login){
		$errorcode=1;
		//Подключение к базе данных
		$mysql_host	="xoxoxox";
		$mysql_user	="xoxoxox";
		$mysql_passw="xoxoxox";
		$mysql_conn=mysql_connect($mysql_host,$mysql_user,$mysql_passw) or die(mysql_error());
		mysql_query("SET NAMES 'utf8'"); 
		mysql_query("SET CHARACTER SET 'utf8'");
		mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");

		//Проверка не зарегистрирован ли уже этот пользователь
		$sql_for_id="SELECT xoxoxox FROM xoxoxox WHERE id='$id'";
		$sql_for_login="SELECT xoxoxox FROM xoxoxox WHERE login='db_".$login."'";
		$result_for_id=mysql_query($sql_for_id,$mysql_conn);
		$result_for_login=mysql_query($sql_for_login,$mysql_conn);
		$num_rows_for_id=mysql_num_rows($result_for_id);
		$num_rows_for_login=mysql_num_rows($result_for_login);

		if($num_rows_for_id>0) $errorcode=-1;//Код -1 - в базе уже есть пользователь с введенным ИНН
		else if($num_rows_for_login>0) $errorcode=-2;//Код -2 - в базе уже есть пользователь с таким логином
		mysql_close($mysql_conn);
		return $errorcode;
	}

	//Получение данных о пользователе по введенному идентификационному номеру
	function finding_user_by_id($id){
		$ib_base	="xoxoxox";
		$ib_table	="xoxoxox";
		$ib_user	="xoxoxox";
		$ib_passw	="xoxoxox";
		$ib_conn=ibase_connect($ib_base, $ib_user, $ib_passw) or die(ibase_errmsg());
		$stud_query="SELECT xoxoxox FROM xoxoxox WHERE xoxoxox='$id'"; 
		$tutor_query="SELECT xoxoxox FROM xoxoxox WHERE xoxoxox='$id'";
		$stud_query_result=ibase_query($ib_conn,$stud_query) or die(ibase_errmsg()); 
		$tutor_query_result=ibase_query($ib_conn,$tutor_query) or die(ibase_errmsg()); 
		$result=ibase_fetch_assoc($stud_query_result);
		if(empty($result)) $result=ibase_fetch_assoc($tutor_query_result);
		ibase_close($ib_conn);
		return $result;
	}

	//Регистрация пользователя
	function register_user($user){
		//Подключение к базе данных
		$mysql_host	="xoxoxox";
		$mysql_user	="xoxoxox";
		$mysql_passw="xoxoxox";
		$mysql_conn=mysql_connect($mysql_host,$mysql_user,$mysql_passw) or die(mysql_error());
		mysql_query("SET NAMES 'utf8'"); 
		mysql_query("SET CHARACTER SET 'utf8'");
		mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");

		if($user['xoxoxox']==9){
			$query="INSERT INTO xoxoxox VALUES('".$user['xoxoxox']."','".$user['xoxoxox']." ".$user['xoxoxox']."','"."db_".$user['xoxoxox']."','".$user['xoxoxox']."','".$user['xoxoxox']."','".$user['xoxoxox']."','".$user['xoxoxox']."','".$user['xoxoxox']."','".$user['xoxoxox']."');";
		}else{
			$query="INSERT INTO xoxoxox VALUES('".$user['xoxoxox']."','".$user['xoxoxox']."','"."db_".$user['xoxoxox']."','".$user['xoxoxox']."','".$user['xoxoxox']."','".$user['xoxoxox']."','".$user['xoxoxox']."','".$user['xoxoxox']."','".$user['xoxoxox']."');";
		}
		mysql_query($query);
		mysql_close($mysql_conn);
	}
	
	//Транслитерирование
	function transliterate($string) {
		$converter = array(
			'єє' => 'eye',
		
			'а' => 'a',		'б' => 'b',		'в' => 'v',
			'г' => 'g',		'д' => 'd',		'е' => 'e',
			'ё' => 'e',		'ж' => 'zh',	'з' => 'z',
			'и' => 'y',		'й' => 'y',		'к' => 'k',
			'л' => 'l',		'м' => 'm',		'н' => 'n',
			'о' => 'o',		'п' => 'p',		'р' => 'r',
			'с' => 's',		'т' => 't',		'у' => 'u',
			'ф' => 'f',		'х' => 'h',		'ц' => 'ts',
			'ч' => 'ch',	'ш' => 'sh',	'щ' => 'sch',
			'ь' => '',		'ы' => 'y',		'ъ' => '',
			'э' => 'e',		'ю' => 'yu',	'я' => 'ya',
			'і' => 'i',		'є' => 'ye',	'ї' => 'yi',
			' ' => '',		'`' => '',		'\''=> '',
        
			'А' => 'A',		'Б' => 'B',		'В' => 'V',
			'Г' => 'G',		'Д' => 'D',		'Е' => 'E',
			'Ё' => 'E',		'Ж' => 'Zh',	'З' => 'Z',
			'И' => 'Y',		'Й' => 'Y',		'К' => 'K',
			'Л' => 'L',		'М' => 'M',		'Н' => 'N',
			'О' => 'O',		'П' => 'P',		'Р' => 'R',
			'С' => 'S',		'Т' => 'T',		'У' => 'U',
			'Ф' => 'F',		'Х' => 'H',		'Ц' => 'Ts',
			'Ч' => 'Ch',	'Ш' => 'Sh',	'Щ' => 'Sch',
			'Ь' => '',		'Ы' => 'Y',		'Ъ' => '',
			'Э' => 'E',		'Ю' => 'Yu',	'Я' => 'Ya',
			'І' => 'I',		'Є' => 'Ye',	'Ї' => 'Yi'
		);
		return strtr($string, $converter);
	}
?>