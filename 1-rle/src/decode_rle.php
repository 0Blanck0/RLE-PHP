<?PHP

function check_str($len, $str)
{
	$i = 0;
	while ($i < $len)
	{
		if ($str[$i] < '0' || $str[$i] > '9')
			return (-1);
		while($str[$i] >= '0' && $str[$i] <= '9')
			$i++;
		if (($str[$i] < 'A' || $str[$i] > 'Z') && ($str[$i] < 'a' || $str[$i] > 'z'))
			return (-1);
		$i++;
	}
	return (1);
}

function decode_rle(string $str)
{
	$ret = '';
	$matches_cpt = 0;
	$len = strlen($str);
	$i = 0;

	if (check_str($len, $str) == -1)
		return ("$$$");

	preg_match_all('!\d+!', $str, $matches);
	while ($i < $len)
	{
		while($str[$i] >= '0' && $str[$i] <= '9')
			$i++;
		if ($str[$i] >= 'A' && $str[$i] <= 'Z' || $str[$i] >= 'a' && $str[$i] <= 'z')
		{
			$ret .= str_repeat($str[$i], intval($matches[0][$matches_cpt]));
			$matches_cpt++;
		}
		$i++;
	}
	return ($ret);
}

?>
