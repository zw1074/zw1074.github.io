<?

session_start();
$max_len = 8;
$CounterFile = "counter.dat";
if(!file_exists($CounterFile))
{
$Counter = 0;
$cf= fopen($CounterFile,"w");
flock($cf,3);
fputs($cf,"0");
fclose($cf);
}
else
{
$cf = fopen($CounterFile,"r");
flock($cf,3);
$Counter = trim(fgets($cf,$max_len));
fclose($cf);
}
if (session_is_registered("in")==false){
$Counter++;
$cf = fopen($CounterFile,"w");
flock($cf,3);
fputs($cf,$Counter);
fclose($cf);
session_register("in");
}

$strCount = strval($Counter);  
echo "document.write(\"".$strCount."\");";
?>