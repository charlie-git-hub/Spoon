<!DOCTYPE html>
<html lang="fr">
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
                const month = document.createElement('tr');

   function Month() {

const monthCell = document.createElement('td');
const date = new Date(); // Crée un nouvel objet Date avec la date actuelle
const month = date.getMonth() + 1; // Obtient le mois actuel (0-11), ajout de 1 pour obtenir 1-12

monthCell.innerText = month; // Affiche le mois dans la cellule
monthCell.dataset.date = date.toDateString(); // Ajoute une propriété 'data-date' avec la date complète
month.appendChild(monthCell);
}

    let currentWeekStart = getStartOfCurrentWeek(); // Date de début de la semaine courante

    function getStartOfCurrentWeek() {
        const currentDate = new Date();
        const dayOfWeek = currentDate.getDay(); // 0 (dimanche) à 6 (samedi)
        const daysToMonday = (dayOfWeek + 6) % 7; // Nombre de jours à soustraire pour obtenir le lundi
        
        const firstDayOfWeek = new Date(currentDate);
        firstDayOfWeek.setDate(currentDate.getDate() - daysToMonday);

        return firstDayOfWeek;
    }

    function getWeekDates(startDate) {
        const dates = [];
        for (let i = 0; i < 7; i++) {
            const date = new Date(startDate);
            date.setDate(startDate.getDate() + i);
            dates.push(date);
        }
        return dates;
    }

    function createCalendar(weekStartDate) {
        const calendar = document.querySelector('#calendar');
        calendar.innerHTML = '';

        const table = document.createElement('table');
        calendar.appendChild(table);

        const week = document.createElement('tr');

        
        
        const arrowBefore = document.createElement('td');
        arrowBefore.innerText = '<<';
        arrowBefore.classList.add('arrow');
        week.appendChild(arrowBefore);

        const weekDates = getWeekDates(weekStartDate);
        weekDates.forEach(date => {
            const day = document.createElement('td');
            day.innerText = date.getDate();
            day.dataset.date = date.toDateString(); 
            week.appendChild(day);
        });

        const arrowAfter = document.createElement('td');
        arrowAfter.innerText = '>>';
        arrowAfter.classList.add('arrow');
        week.appendChild(arrowAfter);

        table.appendChild(week);

        highlightCurrentDay(); 

        arrowBefore.addEventListener('click', () => {
            currentWeekStart.setDate(currentWeekStart.getDate() - 7);
            createCalendar(currentWeekStart);
        });

        arrowAfter.addEventListener('click', () => {
            currentWeekStart.setDate(currentWeekStart.getDate() + 7);
            createCalendar(currentWeekStart);
        });

    }

    function highlightCurrentDay() {
        const today = new Date().toDateString(); 
        const days = document.querySelectorAll('#calendar td');

        days.forEach(day => {
            if (day.dataset.date === today) { 
                day.classList.add('current-day'); 
            }
        });
    }

    createCalendar(currentWeekStart);
    </script>
</body>
</html>