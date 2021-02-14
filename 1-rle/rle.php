<?PHP

include 'src/decode_rle.php';
include 'src/encode_rle.php';

function rle($argc, $argv)
{
	if ($argc != 3)
		return (-1);
	if (strcmp($argv[1], "decode") == 0)
	{
		print(decode_rle($argv[2]));
		echo "\n";
		return (0);
	}
	if (strcmp($argv[1], "encode") == 0)
	{
		print(encode_rle($argv[2]));
		echo "\n";
		return (0);
	}
}

rle($argc, $argv);
?>
