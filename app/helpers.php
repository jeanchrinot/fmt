<?php 

function getPosition($function_id)
{
	$positions = ['Président','Vice-Président','Trésorier','Sécretaire Général','Conseiller Informatique'];

	$position = $positions[$function_id-1];

	return $position;
}
