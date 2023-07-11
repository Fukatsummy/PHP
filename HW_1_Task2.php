function printCalendar($month) {
    // Проверяем корректность значения month
    if ($month < 1 || $month > 12) {
        echo "Неправильное значение month! Пожалуйста, используйте число от 1 до 12.";
        return;
    }

    // Получаем текущий год
    $currentYear = date('Y');

    // Получаем количество дней в указанном месяце
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $currentYear);

    // Получаем первый день месяца
    $startDate = new DateTime("$currentYear-$month-01");
    $startDayOfWeek = $startDate->format('N');

    // Создаем таблицу календаря
    echo '<table>';

    // Заголовок таблицы
    echo '<tr>';
    echo '<th>Пн</th>';
    echo '<th>Вт</th>';
    echo '<th>Ср</th>';
    echo '<th>Чт</th>';
    echo '<th>Пт</th>';
    echo '<th>Сб</th>';
    echo '<th>Вс</th>';
    echo '</tr>';

    // Заполняем таблицу календаря
    for ($day = 1; $day <= $daysInMonth; $day++) {
        // Если первый день недели, то создаем новую строку в таблице
        if ($day == 1 || $startDayOfWeek == 1) {
            echo '<tr>';
        }

        // Если текущий день выходной (суббота или воскресенье), применяем соответствующий CSS стиль
        if ($startDayOfWeek == 6 || $startDayOfWeek == 7) {
            echo '<td class="weekend">' . $day . '</td>';
        } else {
            echo '<td>' . $day . '</td>';
        }

        // Если последний день недели, то закрываем строку в таблице
        if ($day == $daysInMonth || $startDayOfWeek == 7) {
            echo '</tr>';
        }

        // Увеличиваем счетчики дня и дня недели
        $day++;
        $startDayOfWeek++;
    }

    echo '</table>';
}

// Пример использования функции
printCalendar(6);