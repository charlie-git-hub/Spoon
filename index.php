<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <div id="calendar"></div>

    <script>
    for (let i = 0; i < 7; i++) {
    const date = new Date(current_date.setDate(first_day_of_week + i));
    dates.push(date);
}
        // function get_day_in_month(month, year) {
        //     return new Date(year, month, 0).getDate();
        // }

        // function create_calendar(month, year) {
        //     const calendar = document.querySelector('#calendar');
        //     calendar.innerHTML = '';

        //     const table = document.createElement('table');
        //     calendar.appendChild(table);
            
        //     let date = 1;
        //     const day_in_month = get_day_in_month(month + 1, year);   
            
            for (let i = 0; i < 6; i++) {
                let week = document.createElement('tr');
                for (let j = 0; j < 7; j++) {
                    let day = document.createElement('td');
                    if (i == 0 && j < new Date(year, month, 1).getDay() || date > day_in_month) {
                        week.appendChild(day);
                    } else {
                        day.innerText = date;
                        week.appendChild(day);
                        date++;
                    }
                }
                table.appendChild(week);
            }
        }
        function get_current_week_dates() {
            const current_date = new Date();
            const first_day_of_week = current_date.getDate() - current_date.getDay();
            const dates = [];


    </script>
</body>
</html> 
