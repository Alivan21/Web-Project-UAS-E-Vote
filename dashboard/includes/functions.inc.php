<?php
function countRow($query)
{
  $row = mysqli_num_rows($query);
  return $row;
}
