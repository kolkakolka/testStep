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

<?php
		$host = '127.0.0.1';
		$db = 'step';
		$user = 'root';
		$pass = '';
		
		try {
			 $dbh = new PDO("mysql:host=$host;dbname=$db;charset=UTF8", $user, $pass);
			 $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			 $sql = "use $db";
			 $dbh->query($sql);
			 
			$DateToday=date("c");
			$DateToday = substr($DateToday, 0, 10);
			
			 $sql = "SELECT * FROM cities";
			 foreach ($dbh->query($sql) as $row) {		
				 $Id[] = $row ['id'];			 
				 $NameSity[] = $row ['name'];
				 $count=0;
				 $id=$row ['id'];
					$sql1 = "SELECT * FROM staff_cities where cities__id=$id";
					foreach ($dbh->query($sql1) as $row1) {
						 $id1= $row1['staff__id'];
							
						 $sql2 = "SELECT id, name, date_of_birth, status, TIMESTAMPDIFF(YEAR,date_of_birth,'$DateToday') AS age FROM staff where id=$id1 and status=0";
						 foreach ($dbh->query($sql2) as $row2) {		
						 $Staff_id[] = $row2['id'];
						 $Age[] = $row2['age'];
						 $Status[] = $row2['status'];
						}
					}
					$Age[] = "*";
			}
			
			echo "</a>";
		} catch (PDOException $ex) {
			echo "<p style='color: red'>" . $ex->getMessage() . "</p>";
			echo "<pre>";
			print_r($ex->getTrace());
			echo "</pre>";
		}
?>	

<head>
    <meta charset="utf-8">
    <title>Step Testing sql 4</title>
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
           
		   <!-- Main Content -->

		<?php 
		$idStart=0;
		$idEnd=0;
		$sum=0;
		for($i = $idStart; $i < count($Age); $i++) 
		{
			if($Age[$i] == "*")
			{
					for($i = $idStart; $i < $idEnd; $i++) 
					{
						$sum=$sum+$Age[$i];
					}
					if($idStart==0){
						$srAr=($idEnd-$idStart);
					}
					else{
						$srAr=($idEnd-$idStart)-1;
					}
					$a_Age[]=intval($sum/$srAr);
					$idStart=$idEnd;
					$sum=0;
			}
			else
			{
				$idEnd=$i+1;
			}
				
		}
			for($i = 0; $i < count($Id); $i++) 
				{ ?>
					<div>
						<h2>
							<?php echo $NameSity[$i] ?>
						</h2>
						<h3>
						average age -> 
							<?php 
								echo $a_Age[$i] 
							?>
						</h3>
					</div>
					<hr>
		<?php 	} ?>
   
	
    <!-- Footer -->
    <footer>
		<p>Developer Nicholas Yavtushenko 2017</p>
    </footer>

</body>
</html>
