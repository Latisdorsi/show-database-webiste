<?php
$entryHTML = "<table><form method=\"post\" action=\"\">";
$entryHTML .= "<input type=\"hidden\" name=\"add\" value=\"\">";
while($entry = $allEntries->fetchObject()){
    $entryHTML .= "<tr>";
    $entryHTML .= "<td><input type=\"submit\" name=\"$entry->show_id\" value=\"X\"></td>";
    $entryHTML .= "<td> $entry->show_name </td>";
    $entryHTML .= "<td> $entry->show_year </td>";
    $entryHTML .= "<td> $entry->show_studio </td>";
    $entryHTML .= "</tr>";
}
return $entryHTML;