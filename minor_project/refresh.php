<?php
//$currtime= 555;
//$starttime = 6666;
//$numOfSeconds = $starttime - $currtime;
//header( "refresh:$numOfSeconds;urltoanywhere.php" );


ob_start();
date_default_timezone_set('Europe/London');
$currentPage = $_SERVER['PHP_SELF'];
$currentTimestamp = strtotime(date('Y-m-d H:i:s'));
//Define your startTime here in {Year-Month-Day Hour:Minute:Second} format
echo $currentTimestamp;
$startTime = '2016-12-05 18:06:58';
//Define your endTime here in {Year-Month-Day Hour:Minute:Second} format.
$endTime = '2016-12-05 18:07:00';
$startTimestamp = strtotime($startTime);
$endTimestamp = strtotime($endTime);
$numOfSecondsToReload = $startTimestamp - $currentTimestamp;
echo $numOfSecondsToReload;
if($currentTimestamp >= $startTimestamp && $currentTimestamp <= $endTimestamp):
?>
<a href="*broadcastlink*">LIVE NOW</a>
<?php else: ?>
<p>Live at <?php echo date('H:i', $startTimestamp); ?></p>
<?php header( "refresh:$numOfSecondsToReload;index.php"); ?>
<?php endif; ?>