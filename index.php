<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .current-day {
            background-color: grey;
            color: white;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            border: 1px solid black;
            text-align: center;
            padding: 10px;
            cursor: pointer; /* Ajoute un curseur pointer pour indiquer que c'est cliquable */
        }
    </style>
</head>
<body>
    <div id="calendar"></div>

    <script>
    function get_current_week_dates() {
        const current_date = new Date();
        const dayOfWeek = current_date.getDay(); // 0 (dimanche) à 6 (samedi)
        const daysToMonday = (dayOfWeek + 6) % 7; // Nombre de jours à soustraire pour obtenir le lundi
        
        const first_day_of_week = new Date(current_date);
        first_day_of_week.setDate(current_date.getDate() - daysToMonday);

        const dates = [];
        for (let i = 0; i < 7; i++) {
            const date = new Date(first_day_of_week);
            date.setDate(first_day_of_week.getDate() + i);
            dates.push(date);
        }
        return dates;
    }

    function create_calendar(week_dates) {
        const calendar = document.querySelector('#calendar');
        calendar.innerHTML = '';

        const table = document.createElement('table');
        calendar.appendChild(table);

        const week = document.createElement('tr');

        const arrow_before = document.createElement('td');
        arrow_before.innerText = '<<';
        arrow_before.classList.add('arrow'); // Ajoutez une classe pour une gestion facile
        week.appendChild(arrow_before);

        week_dates.forEach(date => {
            const day = document.createElement('td');
            day.innerText = date.getDate();
            day.dataset.date = date.toDateString(); 
            week.appendChild(day);
        });

        const arrow_after = document.createElement('td');
        arrow_after.innerText = '>>';
        arrow_after.classList.add('arrow'); // Ajoutez une classe pour une gestion facile
        week.appendChild(arrow_after);

        table.appendChild(week);

        highlight_current_day(); 
    }

    function highlight_current_day() {
        const today = new Date().toDateString(); 
        const days = document.querySelectorAll('#calendar td');

        days.forEach(day => {
            if (day.dataset.date === today) { 
                day.classList.add('current-day'); 
            }
        });
    }

    function handleCellClick(event) {
        if (event.target.tagName === 'TD') {
            alert(`Clic détecté sur ${event.target.innerText}`);
        }
    }

    const current_week_dates = get_current_week_dates();
    create_calendar(current_week_dates);

    document.querySelector('#calendar').addEventListener('click', handleCellClick);
    </script>
</body>
</html>
