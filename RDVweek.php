<html>
  <?php
  $activity = $_GET['activity'];
  if ($activity == 'Cardio'){
  echo "<form action='CardioCalender.php' method='POST'>";
  }
  ?>
  
    choisis la semaine que tu veux consulter <input type="week" name="date1" />
    <br />
    <button type="createDate" name="createDate 1 week" value="Submit"/> <br />
  </form>
</html>
