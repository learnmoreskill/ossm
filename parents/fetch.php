<?php
//fetch.php;
if(isset($_POST["view"]))
{
 include("session.php");
 if($_POST["view"] != '')
 {
  $update_query = "UPDATE broadcast SET status=1 WHERE status=0";
  mysqli_query($db, $update_query);
 }
 $query = "SELECT * FROM broadcast ORDER BY message DESC LIMIT 5";
 $result = mysqli_query($db, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
   <li>
    <a href="#">
     <strong>'.$row["t_role"].'</strong><br />
     <small><em>'.$row["message"].'</em></small>
    </a>
   </li>
   <li class="divider"></li>
   ';
  }
 }
 else
 {
  $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
 }
 
 $query_1 = "SELECT * FROM broadcast WHERE status=0";
 $result_1 = mysqli_query($db, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>