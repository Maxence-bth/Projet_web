<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link href="../bibliotheque/fullcalendar-5.11.0/lib/main.css" rel="stylesheet" />
  <script src="../bibliotheque/fullcalendar-5.11.0/lib/main.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var calendarEl = document.getElementById("calendar");

      var calendar = new FullCalendar.Calendar(calendarEl, {
        header: { //bouttons de navigation en haut
          left: 'prev,next',
          center: 'title',
          right: 'agendaDay',
        },
        initialView: 'timeGridWeek', //vue weekly
        events: 'dateJson.php',
        selectable: true,
        selectMirror: true,
        allDaySlot: false,
        slotDuration: '01:00:00', //crénaux de 60 minutes
        aspectRatio: 2, //taille du calendrier dans la page
        //contentHeight: 400, //taille du calendrier dans la page
        expandRows: 10, //agrandit les cellules au max
        hiddenDays: [0, 6], //cache le dimanche et le samedi
        dayMaxEvents: true, // allow "more" link when too many events

        eventOverlap: false, //pas d'event qui se chevauchent
        editable: false, //pas possible de changer les events

        initialDate: new Date(), //TODAY's DATE
        navLinks: true, // can click day/week names to navigate views
        selectConstraint: [ // specify an array instead
          {
            daysOfWeek: [1, 2, 3, 4, 5], // Monday, Tuesday, Wednesday
            startTime: '07:00', // 8am
            endTime: '12:00' // 6pm
          },
          {
            daysOfWeek: [1, 2, 3, 4, 5], // Monday, Tuesday, Wednesday
            startTime: '14:00', // 8am
            endTime: '20:00' // 6pm
          }
        ],
        businessHours: [ // specify an array instead
          {
            daysOfWeek: [1, 2, 3, 4, 5], // Monday, Tuesday, Wednesday
            startTime: '07:00', // 8am
            endTime: '12:00' // 6pm
          },
          {
            daysOfWeek: [1, 2, 3, 4, 5], // Monday, Tuesday, Wednesday
            startTime: '14:00', // 8am
            endTime: '20:00' // 6pm
          }
        ],

        /*selectAllow: function(selectInfo) {
          var duration = moment.duration(selectInfo.end.diff(selectInfo.start));
          //return duration.asHours() <= 2;
          return true;
        },*/
        select: function(arg) {
          var _title = prompt("Event Title:");
          calendar.addEvent({
            title: (_title ? _title : "occupied"),
            start: arg.start,
            end: arg.end,
            /*
            ajax({
                          url = 'http://localhost/ING3%20web/Projet/Projet_web/php/add_events.php',
                          data = 'title=' + title + '&start=' + start + '&end=' + end,
                          type = "POST",
                          success = function() {
                            calendar.fullCalendar('refetchEvents');
                            alert("Added Successfully");
                          }
                        })*/
          });
          calendar.unselect();
        },
        eventClick: function(arg) {
          if (confirm("Are you sure you want to delete this event?")) {
            arg.event.remove();
          }
        },
      });

      calendar.render();
    });
  </script>
  <style>
    body {
      margin: 40px 10px;
      padding: 0;
      font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
      font-size: 14px;
    }

    #calendar {
      max-width: 1100px;
      margin: 0 auto;
    }
  </style>
</head>

<body>
  <div id="calendar"></div>
</body>

</html>