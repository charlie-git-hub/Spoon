
<form action="traitement/gestion.php" method="POST" id="form_task">
 <div class="duration">
    <label for="duration">duration<span class="asterix">*</span></label>
    <input type="text" name="duration" id="duration" required="required"/>
</div>
    <label for="task">your task<span class="asterix">*</span></label>
    <input type="text"name="task" name="task" id="task" required="required"/>

<fieldset>
  <legend>difficulty:</legend>
<div id="form_contact_2">
  <div id="red">
  <label for="red">hard</label>
  <input type="radio" id="red" name="radio" value="red">
</div>
  <div id="contact_devis">
  <label for="orange">bof</label>
  <input type="radio" id="orange" name="radio" value="orange">
</div>
  <div id="contact_reclam">
  <label for="green">easy</label>
  <input type="radio" id="green" name="radio" value="green">
</div>
</div>
</fieldset>

<input type="submit" value="submit" id="submit" required="required" />
<br>
<?php
// $fmt=$_GET['fmt'];
// echo $fmt;
?>
</form>
<?php
