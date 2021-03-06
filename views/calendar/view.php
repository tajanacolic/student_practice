<?php include_once 'load_eventsview.php';?>
<head>
    <meta charset='utf-8' />
    <link href='/fullcalendar/main.css' rel='stylesheet' />
    <script src='/fullcalendar/main.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {  
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'timeGridWeek',
          initialDate: '2022-01-24',
          editable: false,
          headerToolbar:{
            left:'',
            center:'',
            right:''
          },
          weekends: false,
          dayHeaderFormat:{
            weekday: 'long'
          },
          eventInteractive: true,
          slotDuration: '00:30:00',
          slotLabelInterval:'00:30',
          slotLabelFormat:{
            hour: '2-digit',
            minute: '2-digit',
            hour12:false,
            omitZeroMinute: false,
            meridiem: 'short'
          },
          slotMinTime:'08:00:00',
          slotMaxTime:'16:30:00',
          selectable: false,
          expandRows: true,
          allDaySlot: false,
          events: <?php print json_encode($data); ?>,
          businessHours: {
            daysOfWeek: [ 1, 2, 3, 4, 5 ],
            startTime: '08:00',
            endTime: '16:30', 
          },
          eventConstraint: 'businessHours',
        });
        calendar.render();
      });
    </script>
  </head>
  <body>
    
  <h1 class="h1"><?php echo $practice['practice_name']; ?></h1>
    <div id='calendar'></div>
  </body>
</html>