<?PHP

header('IP lookup');
$ip = $_SERVER['REMOTE_ADDR']; //get supposed IP
$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));

#If you want to log the visitor's data, the following can help:
$handle = fopen("data.txt", "a"); //open log file #
fwrite($handle, "IP: $ip \r\n"); 
if($query && $query['status'] == 'success') { 
$hh = $query['country'].', '.$query['city'].'!'; 
fwrite($handle, "Location: $hh \r\n \r\n"); 
} else {
  fwrite($handle, "Location: Unavailable \r\n \r\n");
}
fclose($handle);

#Write out the Visitor's IP to the browser
echo "<br><br>";
echo "<center><h2>Your ip address is $ip</h2>";
echo '<a href="https://ip.otvostibor.hu/">Refresh</a>';
exit;
?>
