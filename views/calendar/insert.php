<head>
    <meta charset='utf-8' />
    <link href='/fullcalendar/main.css' rel='stylesheet' />
    <script src='/fullcalendar/main.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'timeGridWeek',
          editable: true,
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
          selectable:true,
          selectMirror: true,
          selectOverlap: false,
          expandRows: true,
          events: [
            { // this object will be "parsed" into an Event Object
              title: 'The Title', // a property!
              start: '2022-01-19', // a property!
              end: '2022-01-21' // a property! ** see important note below about 'end' **
            }
          ],
           select: function (start, end, allDay) {
                 var title = prompt('Event Title:');
                 if (title) {
                 calendar.fullCalendar('renderEvent', {
                 title: title,
                 start: start,
                 end: end,
               }, true);
             }
             calendar.fullCalendar('unselect');
           },
        });
        calendar.render();
      });

    </script>
  </head>
  <body>
    <div id='calendar'></div>
  </body>
</html>