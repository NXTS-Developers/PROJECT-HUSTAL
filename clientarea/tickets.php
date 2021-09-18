<?php
$title="Tickets";
$desc="";
include "includes/header.php";
?>
<div class="container"><br>
<div class="card shadow-sm rounded">
<div class="card-body">
<h5 class="text-dark pull-left"><b>Tickets</b></h5>
<a href="createticket.php" class="btn btn-info text-white btn-sm pull-right">Create Ticket</a><div class="clearfix"></div><hr>
<div class="table-responsive">
<table class="table table-striped table-hover">
<thead>
<tr>
<th>TID</th>
<th>Ticket Date</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$sql=mysqli_query($connect,"select * from vhost_ticket where client_id='".$user['client_id']."' order by ticket_id desc");
if(mysqli_num_rows($sql)>0){
while($app=mysqli_fetch_assoc($sql)){
$id=$app['ticket_id'];
$date=$app['ticket_date'];
if($app['ticket_status']==0){
$status="Open";
}
else{
if($app['ticket_status']==1){
$status="Replied";
}
else{
$status="Closed";
}
}
echo "<tr>
<td>#$id</td>
<td class='text-truncate'>$date</td>
<td>$status</td>
<td><a href='ticket.php?tid=$id' class='btn btn-success btn-sm'>Manage</a></td>
</tr>";
}
}
else{
echo '<tr><td colspan="4" class="text-center">No Tickets Yet</td></tr>';
}
?>
</tbody>
</table>
</div>
<small class="text-muted"><?php echo mysqli_num_rows($sql);?> tickets found</small>
</div>
</div> 
</div>
