<?php 

$today = date('l F dS'); 

echo $today; echo '<br>'; 
print $today;echo '<br>'; 

print '<input type="date" name="bday" min= "">';


//print '<input type="date" name="bday" value="$day">'

echo '<br>';
echo 'This Week ('.$dt_min->format('m/d/Y').'-'.$dt_max->format('m/d/Y').')';
?> 


<!Doctype html>
<html> 
<!-- <br>
<input type="date" name="bday" min="<?= date('Y-m-d'); ?>" max="<?= date('Y-m-d'); ?>">
<br>

<label for="time">Choose a time:</label>
<select name="time" id="time">
  <option value="8:00">8:00 AM</option>
  <option value="9:00">9:00 AM</option>
  <option value="10:00">10:00 AM</option>
  <option value="11:00">11:00 AM</option>
</select>

<br>

<label for="date">Choose a date:</label>
<select name="date" id="date">
  <option value="<?php  $today = date('l F dS'); echo $today; ?>">		
  		 <?php $today = date('l F dS'); echo $today; ?></option>  
</select> -->

</html>