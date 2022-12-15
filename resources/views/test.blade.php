<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.0/index.global.min.js" integrity="sha256-qhVoe2CgVKC9i6bmWEMbE2erRC7/aclX8n7Aaw6Y+uY=" crossorigin="anonymous"></script>
    <script>

        document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
  
    var calendar = new FullCalendar.Calendar(calendarEl, {
      timeZone: 'UTC',
      initialView: 'dayGridMonth',
      editable: true,
      selectable: true
    });
  
    calendar.render();
  });
  
      </script>
</head>
<body>
    <div id='calendar'></div>
    
</body>
</html>