<?php
$userHTML = "<h3>Manage Users</h3>";
$userHTML .= "<table><form method=\"post\" action=\"\">";
$userHTML .= "<tr><td>Delete</td><td>Username</td><td>Email</td></tr>";
$userHTML .= "<input type=\"hidden\" name=\"delete\" value=\"\">";
while($entry = $userItems->fetchObject()) {
    $userHTML .= "<tr>";
    $userHTML .= "<td><input type=\"submit\" name=\"$entry->user_id\" value=\"Delete User\"></td>";
    $userHTML .= "<td> $entry->user_name </td>";
    $userHTML .= "<td> $entry->user_email </td>";
    $userHTML .= "</tr>";
}
    $userHTML .= "</form></table>";
return $userHTML;