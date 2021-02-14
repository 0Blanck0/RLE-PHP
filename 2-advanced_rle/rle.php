<?PHP

include 'src/decode_rle.php';
include 'src/encode_rle.php';

function rle($argc, $argv)
{
	if ($argc != 4)
		return (-1);
	if (strcmp($argv[1], "decode") == 0)
	{
		decode_advanced_rle($argv[2], $argv[3]);
		return (0);
	}
	if (strcmp($argv[1], "encode") == 0)
	{
		encode_advanced_rle($argv[2], $argv[3]);
		return (0);
	}
}

rle($argc, $argv);
?>
