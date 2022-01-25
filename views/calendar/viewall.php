<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script>
    document.addEventListener('DOMContentLoaded', function() {  
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        eventLimit: true, // for all non-TimeGrid views
        views: {
          timeGrid: {
            eventLimit: 2 // adjust to 6 only for timeGridWeek/timeGridDay
          }
        },
        eventMaxStack: 2,
        initialDate: '2022-01-24',
        eventDidMount: function(info) {
          var tooltip = new Tooltip(info.el, {
            title: info.event.extendedProps.description,
            placement: 'top',
            trigger: 'hover',
            container: 'body'
          });
        },  
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
        selectable: true,
        expandRows: true,
        allDaySlot: false,
        displayEventTime: false,  
        events: '/load_eventsviewall.php',
        eventMouseEnter: function(info) {
          
        },
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
  <style>
    html, body {
      margin: 0;
      padding: 0;
      font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
      font-size: 14px;
    }

    #calendar {
      max-width: 1100px;
      margin: 40px auto;
    }

    /*
    i wish this required CSS was better documented :(
    https://github.com/FezVrasta/popper.js/issues/674
    derived from this CSS on this page: https://popper.js.org/tooltip-examples.html
    */

    .popper,
    .tooltip {
      position: absolute;
      z-index: 9999;
      background: black;
      color: white;
      width: 150px;
      border-radius: 3px;
      box-shadow: 0 0 2px rgba(0,0,0,0.5);
      padding: 10px;
      text-align: center;
      opacity: 0.8;
    }
    .style5 .tooltip {
      background: #1E252B;
      color: #FFFFFF;
      max-width: 200px;
      width: auto;
      font-size: .8rem;
      padding: .5em 1em;
    }
    .popper .popper__arrow,
    .tooltip .tooltip-arrow {
      width: 0;
      height: 0;
      border-style: solid;
      position: absolute;
      margin: 5px;
    }

    .tooltip .tooltip-arrow,
    .popper .popper__arrow {
      border-color: black;
    }
    .style5 .tooltip .tooltip-arrow {
      border-color: black;
    }
    .popper[x-placement^="top"],
    .tooltip[x-placement^="top"] {
      margin-bottom: 5px;
    }
    .popper[x-placement^="top"] .popper__arrow,
    .tooltip[x-placement^="top"] .tooltip-arrow {
      border-width: 5px 5px 0 5px;
      border-left-color: transparent;
      border-right-color: transparent;
      border-bottom-color: transparent;
      bottom: -5px;
      left: calc(50% - 5px);
      margin-top: 0;
      margin-bottom: 0;
    }
    .popper[x-placement^="bottom"],
    .tooltip[x-placement^="bottom"] {
      margin-top: 5px;
    }
    .tooltip[x-placement^="bottom"] .tooltip-arrow,
    .popper[x-placement^="bottom"] .popper__arrow {
      border-width: 0 5px 5px 5px;
      border-left-color: transparent;
      border-right-color: transparent;
      border-top-color: transparent;
      top: -5px;
      left: calc(50% - 5px);
      margin-top: 0;
      margin-bottom: 0;
    }
    .tooltip[x-placement^="right"],
    .popper[x-placement^="right"] {
      margin-left: 5px;
    }
    .popper[x-placement^="right"] .popper__arrow,
    .tooltip[x-placement^="right"] .tooltip-arrow {
      border-width: 5px 5px 5px 0;
      border-left-color: transparent;
      border-top-color: transparent;
      border-bottom-color: transparent;
      left: -5px;
      top: calc(50% - 5px);
      margin-left: 0;
      margin-right: 0;
    }
    .popper[x-placement^="left"],
    .tooltip[x-placement^="left"] {
      margin-right: 5px;
    }
    .popper[x-placement^="left"] .popper__arrow,
    .tooltip[x-placement^="left"] .tooltip-arrow {
      border-width: 5px 0 5px 5px;
      border-top-color: transparent;
      border-right-color: transparent;
      border-bottom-color: transparent;
      right: -5px;
      top: calc(50% - 5px);
      margin-left: 0;
      margin-right: 0;
    }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" rel="stylesheet"/>
</head>
<body>
  <div id='calendar'></div>
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
  <script src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script>
  <script src="https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js"></script>
</body>
</html>