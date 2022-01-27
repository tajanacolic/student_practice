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
          selectable: true,
          selectMirror: true,
          selectOverlap: false,
          expandRows: true,
          eventOverlap: false,
          allDaySlot: false,
          events: '/load_events.php',
          businessHours: {
            daysOfWeek: [ 1, 2, 3, 4, 5 ],
            startTime: '08:00',
            endTime: '16:30', 
          },
          eventConstraint: 'businessHours',
          eventClick: function(info){
            var id = info.event.id;
            $.ajax({
              url: '/delete_event.php',
              data: 'id='+ id,
              type: "POST",
              success: function() {
                calendar.refetchEvents('/load_events.php');
              }
            });
          },
          select: function(info) {
            var start = info.startStr;
            var end = info.endStr;
            $.ajax({
              url: '/add_events.php',
              data: 'start='+ start+'&end='+ end,
              type: "POST",
              success: function(ret) {
                if(ret>10)
                {
                  $(".modal").css("display", "block");
                  $(".backdrop").css("display", "block"); 
                }
                calendar.refetchEvents('/load_events.php');
              }
            });
          },
          eventResize:function(info)
          {
            var start = info.event.startStr;
            var end = info.event.endStr;
            var id = info.event.id;
            $.ajax({
              url:"/update_events.php",
              type:"POST",
              data:'start='+ start+'&end='+ end+'&id='+id,
              success:function(ret) {
                if(ret>10)
                {
                  $(".modal").css("display", "block");
                  $(".backdrop").css("display", "block"); 
                }
                calendar.refetchEvents('/load_events.php');
              }
            })
          },
          eventDrop:function(info)
          {
            var start = info.event.startStr;
            var end = info.event.endStr;
            var id = info.event.id;
            $.ajax({
              url:"/update_events.php",
              type:"POST",
              data:'start='+ start+'&end='+ end+'&id='+id,
              success:function(ret) {
                if(ret>10)
                {
                  $(".modal").css("display", "block");
                  $(".backdrop").css("display", "block"); 
                }
                calendar.refetchEvents('/load_events.php');
              }
            })
          }
        });
        calendar.render();
      });
    </script>
  </head>
  <body>
  <div class="backdrop" style="display: none;"></div>
<div class="modal" style="display: none;" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">We're sorry</h5>
        <a class="btn-close" data-bs-dismiss="modal" aria-label="Close" href="/calendar/insert"></a>
      </div>
      <div class="modal-body">
        <p>We're full at the chosen time!</p>
        <p>Please select another time that suits you. </p>
    </div>
      <div class="modal-footer">
        <a class="btn btn-secondary button-details" id="modalbtn" data-bs-dismiss="modal" href="/calendar/insert">Close</a>
      </div>
    </div>
  </div>
</div>
  <h1 class="h1">Choose The Time That Suits You</h1>
    <div id='calendar'></div>
    <form action="" method="post">
      <div class="row">
          <button class="details" type="submit">Submit</button>
      </div>
    </form>
  </body>
</html>