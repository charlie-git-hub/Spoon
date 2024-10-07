<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <script src='fullcalendar-6.1.15\fullcalendar-6.1.15\dist\index.global.min.js'></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 

<script>
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    selectable: true,
    locale: 'fr',
    events: [
      {
        title: 'All Day Event',
        start: '2024-09-04T07:00:00'
      }],
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'timeGridDay,timeGridWeek,dayGridMonth'
    },
    dateClick: function(info) {
      alert('clicked ' + info.dateStr);
    },
    select: function(info) {

      $.ajax({
        url: 'autretest.php', 
        type: 'POST',
        data: {
          start: info.startStr,
          end: info.endStr
        },
        success: function(response) {
          alert('Données envoyées: ' + response); 
        },
        error: function(xhr, status, error) {
          alert('Erreur lors de l\'envoi: ' + error);
        }
      });
    }
  });

  calendar.render();
});
</script>

  </head>
  <body>
    <div id='calendar'></div>
    <FORM id="form1" method="POST" action="form.php">
      <input type="text"/>
      <input type="submit" value="Valider"/>
   </FORM>
   <input type="button" value="Afficher/Cacher" onclick="hideThis('form1')" />
  </body>
</html>