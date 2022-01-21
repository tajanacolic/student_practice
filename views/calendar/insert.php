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
          eventOverlap: false,
          allDaySlot: false,
          events: [
            { 
              id: 1,
              title: 'Monday', 
              start: '2022-01-24 08:00', 
              end: '2022-01-24 16:30',
              constraint:
              {
                start: '2022-01-24T08:00:00',
                end: '2022-01-24T16:30:00'
              } 
            },
            { 
              id: 2,
              title: 'Tuesday', 
              start: '2022-01-25 08:00', 
              end: '2022-01-25 16:30', 
              constraint:
              {
                start: '2022-01-25T08:00:00',
                end: '2022-01-25T16:30:00'
              }  
            },
            { 
              id: 3,
              title: 'Wednesday', 
              start: '2022-01-26 08:00', 
              end: '2022-01-26 16:30', 
              constraint:
              {
                start: '2022-01-26T08:00:00',
                end: '2022-01-26T16:30:00'
              }  
            },
            { 
              id: 4,
              title: 'Thursday', 
              start: '2022-01-27 08:00', 
              end: '2022-01-27 16:30',
              constraint:
              {
                start: '2022-01-27T08:00:00',
                end: '2022-01-27T16:30:00'
              }  
            },
            { 
              id: 5,
              title: 'Friday', 
              start: '2022-01-28 08:00', 
              end: '2022-01-28 16:30',
              constraint:
              {
                start: '2022-01-28T08:00:00',
                end: '2022-01-28T16:30:00'
              }  
            }
          ],
          businessHours: {
            daysOfWeek: [ 1, 2, 3, 4, 5 ],
            startTime: '08:00',
            endTime: '16:30', 
          },
          eventConstraint: 'businessHours',
          customButtons: {
            SaveButton: {
              text: 'Confirm Choice',
              click: function() {
                var monday = calendar.getEventById(1);
                var tuesday = calendar.getEventById(2);
                var wednesday = calendar.getEventById(3);
                var thursday = calendar.getEventById(4);
                var friday = calendar.getEventById(5);
                $.ajax ({
                  type: 'POST',
                  url:'',
                  data:{
                    mondaystart:  monday.start,
                    mondayend: monday.end,

                    tuesdaystart:  monday.start,
                    tuesdayend: monday.end,

                    wednesdaystart:  monday.start,
                    wednesdayend: monday.end,

                    thursdaystart:  monday.start,
                    thursdayend: monday.end,

                    fridaystart:  monday.start,
                    fridayend: monday.end,
                  },
                  success: function() {
                    alert(monday.start);
                    location.reload();
                  }
                });
              }
            }
          },
          footerToolbar: {
            left: '',
            center: '',
            right: 'SaveButton'
          }
        });
        calendar.render();
      });

    </script>
  </head>
  <body>
  <h1 class="h1">Choose The Time That Suits You</h1>
    <div id='calendar'></div>
  </body>
</html>