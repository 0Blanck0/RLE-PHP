<?PHP

function error_case (array $array, int $len)
{
	if ($len == 1)
	{
		if (!ctype_xdigit($array[1]))
			return (1);
	}
}

function decode_advanced_rle(string $input_path, string $output_path)
{
	if (!file_exists($input_path))
	{
		echo "KO\n";
		return (1);
	}
	$str = file_get_contents($input_path);
	$ret = '';
	$non_repeat_cpt = 0;
	$cpt = 0;
	$len = strlen($str);
	$array = unpack("C*",$str); 

	// echo "===== test avec \$array = unpack(\"C*\",$str); =====\n";

	// echo "len = $len\n";

	// echo "Array raw = \n";
	// print_r($array);
	if ($len == 0)
	{
		file_put_contents($output_path, $ret);
		echo "OK\n";
		return (1);
	}
	if (strcmp($str, "") == 0)
	{
		file_put_contents($output_path, $ret);
		echo "OK\n";
		return (0);
	}
	
	if (error_case($array, $len))
	{
		echo "KO\n";
		return (1);
	}
	$cpt = 1;
	while ($cpt <= $len) 
	{
		if (strcmp($array[$cpt], "0") == 0)
		{
			$target = intval($array[$cpt + 1]);
			$sum = $cpt + $target;
			$cpt += 2;

			if ($sum >= $len)
			{
				echo "KO\n";
				return (1);
			}
			while ($non_repeat_cpt < $target)
			{
				$ret .= chr($array[$cpt]);
				$cpt++;
				$non_repeat_cpt++;
			}
			$non_repeat_cpt = 0;
		}
		else
		{
			if ($cpt + 1 > $len)
			{
				echo "KO\n";
				return (1);
			}
			$target = intval($array[$cpt]);
			$ret .= str_repeat(chr($array[$cpt + 1]), $target);
			$cpt += 2;
		}
	}

	$ret = str_replace('0', chr(0), $ret);
	file_put_contents($output_path, $ret);
	echo "OK\n";
	return (0);
}

?>

