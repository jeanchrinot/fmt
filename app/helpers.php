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