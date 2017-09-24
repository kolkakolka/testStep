<!--
Задание :
Используя приложенную БД, не изменяя структуру таблиц Вам необходимо создать модели с методами, которые позволят извлечь следующую информацию:

1. Выбрать название города и количество сотрудников, проживающих в нём, возраст которых старше 30 лет и они созданы более 1 месяца назад.
2. Показать имена сотрудников, их возраст, номера телефонов и e-mail. А также возраст сотрудников, которые проживают в городе "Rhayader".
3. Показать всех сотрудников и название города, у которых более одного номера телефона и e-mail заканчивается на .com
4. Показать средний возраст текущих сотрудников (статус - 0) по каждому городу.
5. Показать телефоны всех сотрудников, добавленных с апреля по сентябрь текущего года включительно.
6. Показать всех сотрудников, у кого мобильный телефон ни разу не редактировался (см. дату создания и дату обновления записи).

Технические требования
• Для серверной стороны нужно использовать PHP 5.6 и выше, фреймворк Yii2
• Нежелательно использовать автоматическую генерацию классов (gii) кроме моделей
• При написании запросов предпочтительнее использовать агрегатные функции группировки и операции соединения.
-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Step Testing</title>
</head>

<body>
    <!-- Navigation -->
                <ul>
					<li>
                        <a href="index.php">index</a>
                    </li>
					<li>
                        <a href="sql_1.php">SQL 1</a>
                    </li>
					<li>
                        <a href="sql_2.php">SQL 2</a>
                    </li>
					<ul>
							<li>
								<a href="sql_2.2_open.php">SQL 2.2</a>
							</li>
						</ul>
                    <li>
                       <a href="sql_3.php">SQL 3</a>
                    </li>
					<li>
                        <a href="sql_4.php">SQL 4</a>
                    </li>
					<li>
                        <a href="sql_5.php">SQL 5</a>
                    </li>
					<li>
                        <a href="sql_6.php">SQL 6</a>
                    </li>
                </ul>
           
		   
    <!-- Footer -->
    <footer>
		<p>Developer Nicholas Yavtushenko 2017</p>
    </footer>

</body>
</html>