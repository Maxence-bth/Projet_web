<!DOCTYPE html>
<html>

<head>
    <title>Jquery Fullcalandar Integration with PHP and Mysql</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.1.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script>
        $(document).ready(function() {
            var calendar = $('#calendar').fullCalendar({
                initialView: 'timeGridDay', //vue weekly
                events: 'dateJson.php',
                selectable: true,
                //selectMirror: true,
                allDaySlot: false,
                slotDuration: '01:00:00', //crénaux de 60 minutes
                aspectRatio: 2, //taille du calendrier dans la page
                //contentHeight: 400, //taille du calendrier dans la page
                expandRows: 10, //agrandit les cellules au max
                hiddenDays: [0, 6], //cache le dimanche et le samedi

                eventOverlap: false, //pas d'event qui se chevauchent
                editable: false, //pas possible de changer les events
                dayMaxEvents: true, // allow "more" link when too many events

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
                select: function(start, end, allDay) {
                    var title = prompt("Enter Event Title");

                    var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                    /*$.ajax({
                        url: 'addEvent.php',
                        type: "POST",
                        data: {
                            title: (_title ? _title : "occupied"),
                            start: start,
                            end: end
                        },
                        success: function() {
                            calendar.fullCalendar('refetchEvents');
                            alert("Added Successfully");
                        }
                    })*/

                },
                eventClick: function(event) {
                    if (confirm("Are you sure you want to remove it?")) {
                        event.event.remove();
                        /*var id = event.id;
                        $.ajax({
                            url: "delete.php",
                            type: "POST",
                            data: {
                                id: id
                            },
                            success: function() {
                                calendar.fullCalendar('refetchEvents');
                                alert("Event Removed");
                            }
                        })*/
                    }
                },
            });
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