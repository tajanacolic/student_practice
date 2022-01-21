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
            { 
              title: 'Monday', 
              start: '2022-01-17 08:00', 
              end: '2022-01-17 16:30'  
            },
            { 
              title: 'Tuesday', 
              start: '2022-01-18 08:00', 
              end: '2022-01-18 16:30',  
            },
            { 
              title: 'Wednesday', 
              start: '2022-01-19 08:00', 
              end: '2022-01-19 16:30',  
            },
            { 
              title: 'Thursday', 
              start: '2022-01-20 08:00', 
              end: '2022-01-20 16:30', 
            },
            { 
              title: 'Friday', 
              start: '2022-01-21 08:00', 
              end: '2022-01-21 16:30',
            }
          ],
          businessHours: {
            daysOfWeek: [ 1, 2, 3, 4, 5 ],
            startTime: '08:00',
            endTime: '16:30', 
          },
          eventConstraint: 'businessHours',
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