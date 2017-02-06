<?php
require_once('authenticate.php');

$name = null;
$date = date('c');
$desc = '';
$email = '';
$priority = 2;
$color = '#ffffff';

$result = array();
$result['error'] = array();

if (!empty($_POST["new-task-name"]))
    $name = $_POST["new-task-name"];
else 
    array_push($result['error'], 'Please specify a name for your task');

if (!empty($_POST["new-task-date"]))
    $date = new DateTime($_POST["new-task-date"]);
else 
    array_push($result['error'], 'Please specify a date for your task');

if (!empty($_POST["new-task-desc"]))
    $desc = $_POST["new-task-desc"];

if (!empty($_POST["new-task-email"]))
    $email = explode(',', $_POST["new-task-email"]);

if (!empty($_POST["new-task-priority"]))
    $priority = intval($_POST["new-task-priority"]);
else 
    array_push($result['error'], 'Please specify a valid priority for your task');

if (!empty($_POST["new-task-color"]))
    $color = $_POST["new-task-color"];

if(isset($result['error']) && count($result['error']) > 0){
    $result['success'] = false;
} else {
	if(!empty($email)){
		$email = implode(',', $email);
	}
	$date = $date->format('c');
	
	$query = $connection->prepare("INSERT INTO `tasks` ( `user_id`, `task_name`, `task_priority`, `task_color`, `task_description`, `task_attendees`, `task_date` ) VALUES ( ?, ?, ?, ?, ?, ?, ? );");
	$query->bind_param("isissss", $user_id, $name, $priority, $color, $desc, $email, $date );
	$query->execute();
	$result['id'] = $query->insert_id;
	$query->close();

    $result['success'] = true;
    $result['name'] = $name;
    $result['date'] = $date;
    $result['desc'] = $desc;
	$result['email'] = $email;
	$result['priority'] = $priority;
    $result['color'] = $color;
}

echo json_encode($result);
?>