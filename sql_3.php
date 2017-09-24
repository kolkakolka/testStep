<!--
Задание :
Используя приложенную БД, не изменяя структуру таблиц Вам необходимо создать модели с методами, которые позволят извлечь следующую информацию:

1. Выбрать название города и количество сотрудников, проживающих в нём, возраст которых старше 30 лет и они созданы более 1 месяца назад.
2. Показать имена сотрудников, их возраст, номера телефонов и e-mail. А также возраст сотрудников, которые проживают в городе "Rhayader".
^3. Показать всех сотрудников и название города, у которых более одного номера телефона и e-mail заканчивается на .com
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
			 
		
			 $sql = "SELECT staff__id, count(*) as howmatch FROM staff_phones group by staff__id";
			 foreach ($dbh->query($sql) as $row) {
				$IdP[] = $row ['staff__id'];
				$count[] = $row ['howmatch'];	
			}
			$dbh->query("SELECT * FROM `staff_emails` ORDER BY `staff_emails`.`staff__id` ASC");
			$sql = "SELECT * FROM emails WHERE name LIKE '%.com'";
			 foreach ($dbh->query($sql) as $row) {
				$IdE[] = $row ['id'];
				$Email[] = $row ['name'];	
				$id2=$row ['id'];
			
					$sql1 = "SELECT * FROM staff_emails where emails__id=$id2";
					foreach ($dbh->query($sql1) as $row1) {
						$Staff_id_email[]=$row1['staff__id'];	
					}
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
    <title>Step Testing sql 3</title>
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
				for($i=0;$i<count($IdP);$i++)
				{
					if($count[$i]>1)
					{
						$id1=$IdP[$i];
							$sql = "SELECT * FROM staff where id=$id1";
								foreach ($dbh->query($sql) as $row) {
										$Name = $row ['name'];	
										$Staff_id = $row ['id'];
									}
							$sql = "SELECT * FROM staff_cities where staff__id=$id1";
								foreach ($dbh->query($sql) as $row) {
									$citi_id=$row ['cities__id'];	
										$sql1 = "SELECT * FROM cities where id=$citi_id";
											foreach ($dbh->query($sql1) as $row1) {
													$City = $row1 ['name'];	
												}
									}
									foreach($Staff_id_email as $y)
									{
										if($y==$Staff_id)
										{
											$exit=true;
										}
										
									}
						if($exit==true)
						{
							?>
								<h3>
							<?php
									echo $Name;
							?>
								</h3>
								<h4>
									City:
							<?php
									echo $City;
							?>
							<hr>
								</h4>
								
							<?php
							$exit=false;
						}
					}
				}?>
			<?php 	
		?>
	
    <!-- Footer -->
    <footer>
		<p>Developer Nicholas Yavtushenko 2017</p>
    </footer>
</body>
</html>
