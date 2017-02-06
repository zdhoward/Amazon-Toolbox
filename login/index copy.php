<?php
require_once('authenticate.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title>Creating a simple to-do application - Part 1</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		body {
			color: #000000;
			font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;			
		}
		
		form#add-new-task label{
			width: 80px;
			display: inline-block;
			margin-right: 10px;
		}
		form#add-new-task input{
			width: 150px;
			margin-right: 10px;
		}

		form#add-new-task :required {
			border-color: #11b8ff;
			-webkit-box-shadow: 0 0 5px rgba(17, 184, 255, .75);
			-moz-box-shadow: 0 0 5px rgba(17, 184, 255, .75);
			-o-box-shadow: 0 0 5px rgba(17, 184, 255, .75);
			-ms-box-shadow: 0 0 5px rgba(17, 184, 255, .75);
			box-shadow: 0 0 5px rgba(17, 184, 255, .75);
		}
		
		table {
            width: 100%;
        }
        
        table, tr, td, thead, tfoot, colgroup, col, caption {
            margin: 0px;
            border-spacing: 0px;
        }
        
        table {
            border: 1px solid #333333;
        }
        
        table thead tr {
            background-color: #d3edf8;
        }
        
        table tbody tr td:last-child, table thead tr th:last-child, table tfoot tr th:last-child {
            text-align: right;
        }
        
        table tfoot tr th:first-child {
            text-align: left;
            background-color: #ffffff;
            border-right: 1px solid #333333;
        }
        
        table tbody tr td, table tbody tr th, table thead tr th, table thead tr td {
            border-bottom: 1px solid #333333;
            border-top: 0px;
            border-left: 0px;
            border-right: 1px solid #333333;
        }
        
        table tbody tr td:last-child, table tbody tr th:last-child, table thead tr th:last-child {
            border-right: 0px;
        }
        
        table colgroup col:first-child {
            background-color: #e3edf8;
        }
    
        table thead tr th, table tbody tr td {
            padding: 4px 7px 2px;
        }
        
        table tbody tr:nth-child(even){
            background-color: #ececec;
        }
        
        table tbody tr:nth-child(od){
            background-color: #ffffff;
        }
	</style>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script type="text/javascript">	
		
		function ConvertFormToJSON(form){
			var array = jQuery(form).serializeArray();
			var json = {};
			
			jQuery.each(array, function() {
				json[this.name] = this.value || '';
			});
			
			return json;
		}
		
		jQuery(document).on('ready', function() {
			jQuery('form#add-new-task').bind('submit', function(event){
				event.preventDefault();
				
				var form = this;
				var json = ConvertFormToJSON(form);
				var tbody = jQuery('#to-do-list > tbody');

				$.ajax({
					type: "POST",
					url: "submit.php",
					data: json,
					dataType: "json"
				}).success(function(state) { 
					if(state.success === true) {
						tbody.append('<tr><th scope="row" style="background-color:' + state['color'] + 
							'"><input type="checkbox" /></th><td>' + state['date'] +
							'</td><td>' + state['priority'] + '</td><td>' + state['name'] + 
							'</td><td>' + state['desc'] + '</td><td>' + state['email'] + '</td></tr>');	
					} else {
						alert(state.error.join());
					}
				}).fail(function(state) { 
					alert("Failed to add to-do"); 
				});

				return true;
			});
		});
	</script>	
</head>
<body>
<div id="page">
	<!-- [banner] -->
	<header id="banner">
		<hgroup>
			<h1>Creating a simple to-do application - Part 1</h1>
		</hgroup>		
	</header>
	<!-- [content] -->
	<section id="content">
		<!-- [to-do] -->
		<article id="to-do">			
			<section class="new-to-do">			
				<header>
					<h2>Add a new task</h2>
				</header>
				<form id="add-new-task">
					<label for="new-task-name">Name:</label>
					<input id="new-task-name" name="new-task-name" type="text" required>
					<label for="new-task-date">Date:</label>
					<input id="new-task-date" name="new-task-date" type="datetime" required>					
					<br/>
					<label for="new-task-priority">Priority:</label>
					<input id="new-task-priority" name="new-task-priority" type="number" required min="1" max="5" step="1" value="2">
					<label for="new-task-color">Color:</label>
					<input id="new-task-color" name="new-task-color" type="color">
					<br/>
					<label for="new-task-desc">Description:</label>
					<input id="new-task-desc" name="new-task-desc" type="text">
					<br/>
					<label for="new-task-email">Invite:</label>
					<input id="new-task-email" name="new-task-email" type="email" multiple>
					<br />
					<input type="submit" value="Add new">
				</form>
			</section>
			<section>
				<header>
					<h2>To Do list</h2>
				</header>
				<table id="to-do-list">
					<caption>What's up next?</caption>
					<colgroup>
						<col />
						<col />
						<col />
						<col />
						<col />
						<col />
					</colgroup>
					<thead>
						<tr>
							<th scope="col"></th>
							<th scope="col">Date</th>
							<th scope="col">Priority</th>							
							<th scope="col">Name</th>
							<th scope="col">Description</th>
							<th scope="col">Invitees</th>
						</tr>
					</thead>
					<tbody>			
<?php
global $user_id;
$query = $connection->prepare("SELECT `task_id`, `task_name`, `task_priority`, `task_color`, `task_description`, `task_attendees`, `task_date` FROM `tasks` WHERE `user_id` = ?");
$query->bind_param("i", $user_id);
$query->execute();

$query->bind_result($id, $name, $priority, $color, $description, $attendees, $date);
while ($query->fetch()) {
	echo '<tr id="task-' . $id . '"><th scope="row" style="background-color:' . $color . '"><input type="checkbox" /></th><td>' . $date . '</td><td>' . $priority . '</td><td>' . $name . '</td><td>' . $description . '</td><td>' . $attendees . '</td></tr>';
}

$query->close();
?>					
					</tbody>
				</table>
			</section>
			<footer>
			</footer>
		</article>
		<!-- [/to-do] -->		
	</section>
	<!-- [/content] -->
	
	<footer id="footer">
		<details>
			<summary>Copyright 2013</summary>
			<p>Jonathan Schnittger. All Rights Reserved.</p>
		</details>
	</footer>
</div>
<!-- [/page] -->
</body>
</html>