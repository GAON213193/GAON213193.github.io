<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Calendar</title>
    <style>
        table {
            border-collapse: collapse;
            width: 500px;
            text-align: center;
        }
        th, td {
            border: 1px solid blue;
            height: 50px;
        }
        th {
            background-color: pink;
        }
    </style>
</head>
<body>

<form method="POST">
    년도: <input type="number" name="year" required>
    월: <input type="number" name="month" required>
    <input type="submit" value="달력 출력">
</form>

<?php
if (isset($_POST['year']) && isset($_POST['month'])) {
    $year = $_POST['year'];
    $month = $_POST['month'];

    // 달의 첫 번째 요일과 총 일수
    $firstDay = date('w', strtotime("$year-$month-01"));
    $daysInMonth = date('t', strtotime("$year-$month-01"));

    echo "<h3>{$year}년 {$month}월 달력</h3>";
    echo "<table>";
    echo "<tr>
            <th>일</th>
            <th>월</th>
            <th>화</th>
            <th>수</th>
            <th>목</th>
            <th>금</th>
            <th>토</th>
          </tr>";

    // 시작 전 빈 칸
    echo "<tr>";
    for ($i = 0; $i < $firstDay; $i++) {
        echo "<td></td>";
    }

    // 날짜 채우기
    for ($day = 1; $day <= $daysInMonth; $day++) {
        echo "<td>$day</td>";
        if (($day + $firstDay) % 7 == 0) {
            echo "</tr><tr>";
        }
    }

    // 끝나고 남은 빈 칸
    $remainingCells = (7 - ($daysInMonth + $firstDay) % 7) % 7;
    for ($i = 0; $i < $remainingCells; $i++) {
        echo "<td></td>";
    }

    echo "</tr>";
    echo "</table>";
}
?>

</body>
</html>
