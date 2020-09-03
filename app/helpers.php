<?php 

function getPosition($function_id)
{
	$positions = ['Président','Vice-Président','Trésorier','Sécretaire Général','Conseiller Informatique'];

	$position = $positions[$function_id-1];

	return $position;
}

function getMemberType($type)
{
	$typeArray = ['Simple','Editeur','Administrateur'];

	$member = $typeArray[$type];

	return $member;
}

function getUserImage($path)
{
	return $path && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('assets/img/user-nophoto.jpg');
}

function getImage($path)
{
	return $path && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('assets/img/image-not-found.png');
}

function province($id)
{
	$provinceArray = ['Adana','Adıyaman','Afyonkarahisar','Ağrı','Amasya','Ankara','Antalya','Artvin','Aydın',
					 'Balıkesir','Bilecik','Bingöl','Bitlis','Bolu','Burdur','Bursa',
					 'Çanakkale','Çankırı','Çorum','Denizli','Diyarbakır','Edirne','Elazığ','Erzincan','Erzurum','Eskişehir',
					 'Gaziantep','Giresun','Gümüşhane','Hakkâri','Hatay','Isparta','Mersin','İstanbul','İzmir',
					 'Kars','Kastamonu','Kayseri','Kırklareli','Kırşehir','Kocaeli','Konya','Kütahya',
					 'Malatya','Manisa','Kahramanmaraş','Mardin','Muğla','Muş','Nevşehir','Niğde','Ordu','Rize',
					 'Sakarya','Samsun','Siirt','Sinop','Sivas','Tekirdağ','Tokat','Trabzon','Tunceli','Şanlıurfa',
					 'Uşak','Van','Yozgat','Zonguldak','Aksaray','Bayburt','Karaman','Kırıkkale','Batman','Şırnak','Bartın',
					 'Ardahan','Iğdır','Yalova','Karabük','Kilis','Osmaniye','Düzce'
					];
					
	if(is_numeric($id)){
		if($id>0){
			$province = $provinceArray[$id-1];
		}
	}
	elseif ($id=='all') {
		$province = $provinceArray;
	}
	else{
		$province = '';
	}
	

	return $province;
}

function gender($gender)
{
	if ($gender==1) {
		return 'Homme';
	}
	elseif ($gender==2) {
		return 'Femme';
	}
	
	return '';
}

function createSlug($string) {

    $table = array(
            'Ş'=>'S','ş'=>'s','Ğ'=>'G','ğ'=>'g','İ'=>'I','Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
            'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
            'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
            'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
            'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i','ı'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
            'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u','ü'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
            'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r', '/' => '-','\''=>'-', ' ' => '-'
    );

    // -- Remove duplicated spaces
    $stripped = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $string);

    // -- Returns the slug
    return strtolower(strtr($string, $table));
}

function subString($string,$value)
{
	$substring = substr($string,0,$value-1); 
	if (strlen($string)>$value) {
		$substring = $substring.'...';
	}

	return $substring;
}

function formatDate($date)
{
	return date_format(date_create($date),"d/m/Y");
}

function formatDateTime($date)
{
	return date_format(date_create($date),"d/m/Y H:i");
}

function formatDateTimeLocal($date)
{
	$date_string = date_format(date_create($date),"Y-m-d");
	$time_string = date_format(date_create($date),"H:i");
	$date_string = $date_string.'T'.$time_string;
	return $date_string;
}

function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

function generateRandomStringLC($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyz', ceil($length/strlen($x)) )),1,$length);
}

// Convertit une date ou un timestamp en français
function dateToFrench($date, $format) 
{
	// how to use : dateToFrench("now" ,"l j F Y");
    $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
    $french_days = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');
    $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $french_months = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'aout', 'septembre', 'octobre', 'novembre', 'décembre');
    return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date) ) ) );
}