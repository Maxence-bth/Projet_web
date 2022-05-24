<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link href="../bibliotheque/fullcalendar-5.11.0/lib/main.css" rel="stylesheet" />
  <script src="../bibliotheque/fullcalendar-5.11.0/lib/main.js"></script>
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
        slotDuration: '01:00:00', //crénaux de 60 minutes
        aspectRatio: 2, //taille du calendrier dans la page
        //contentHeight: 400, //taille du calendrier dans la page
        expandRows: 10,

        //initialDate: "2022-05-24", TODAY's DATE
        initialDate: new Date(),
        navLinks: true, // can click day/week names to navigate views
        selectable: true,
        selectMirror: true,
        allDaySlot: false,
        businessHours: [ // specify an array instead
          {
            daysOfWeek: [1, 2, 3, 4, 5], // Monday, Tuesday, Wednesday
            startTime: '07:00', // 8am
            endTime: '20:00' // 6pm
          }
        ],

        select: function(arg) {
          var title = prompt("Event Title:");
          if (title) {
            calendar.addEvent({
              title: title,
              start: arg.start,
              end: arg.end,
              allDay: arg.allDay,
            });
          }
          calendar.unselect();
        },
        eventClick: function(arg) {
          if (confirm("Are you sure you want to delete this event?")) {
            arg.event.remove();
          }
        },
        editable: true,
        dayMaxEvents: true, // allow "more" link when too many events
        events: [{
            title: "All Day Event",
            start: "2022-05-25",
          },
          {
            title: "Long Event",
            start: "2022-05-24",
            end: "2022-05-27",
          },
          {
            groupId: 999,
            title: "Repeating Event",
            start: "2022-05-05T16:00:00",
          },
          {
            groupId: 999,
            title: "Repeating Event",
            start: "2022-05-16T16:00:00",
          },
          {
            title: "Conference",
            start: "2022-05-22",
            end: "2022-05-23",
          },
          {
            title: "Meeting",
            start: "2022-05-22T10:30:00",
            end: "2022-05-22T12:30:00",
          },
        ],
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