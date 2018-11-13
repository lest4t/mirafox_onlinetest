<?php
/**
 * Date: 11/12/18
 * Time: 11:57 PM
 * Author: lest4t
 */
?>

<div class="tab">
	<button class="tablinks" onclick="showTab(event, 'testing')">Тестирование</button>
	<button class="tablinks" onclick="showTab(event, 'results')">Результаты</button>
</div>

<div id="testing" class="tabcontent">
	<h4><b>Настройки тестирования</b></h4>
	<form id="form_testing">
		Сложность:
		<label for="difficult_from">от</label>
		<input type="number" min="0" max="100" name="difficult_from" id="difficult_from" value="0"/>
		<label for="difficult_to">до</label>
		<input type="number" min="0" max="100" name="difficult_to" id="difficult_to" value="100"/><br>
		<label for="person_iq">Интелект тестируемого:</label>
		<input type="number" min="0" max="100" name="person_iq" id="person_iq" value="50"/><br>
		<button type="button" id="generate_test">Запустить</button>
	</form>
	<br>
	<table class="results">
		<thead>
		<tr>
			<td>№</td>
			<td>ID вопроса по БД</td>
			<td>Использовался</td>
			<td>Сложность</td>
			<td>Верный ответ (Да/Нет)</td>
		</tr>
		</thead>
		<tbody id="test_result"></tbody>
	</table>
	<div id="test_result_count"></div>
</div>

<div id="results" class="tabcontent">
	<h4><b>Результаты</b></h4>
	<button type="button" id="refresh_results">Обновить</button>
	<table class="results">
		<thead>
		<tr>
			<td>№</td>
			<td>Интелект тестируемого</td>
			<td>Диапазон сложности вопросов</td>
			<td>Результат тестирования</td>
		</tr>
		</thead>
		<tbody id="tests_results"></tbody>
	</table>

</div>

<script type="text/javascript">
	$(document).ready(function () {
		$('#generate_test').click(function () {
			var $form = $('#form_testing');
			$('#test_result').empty();
			$('#test_result_count').empty();

			$.ajax({
				type: 'POST',
				url: 'index/testing',
				data: $form.serialize(),
				success: function (data) {
					var results = JSON.parse(data);
					var questions_count = 0;
					var right_answers = 0;

					$.each(results, function (index) {
						if (index == 'questions_count') {
							questions_count = results[index];
							return;
						}
						if (index == 'right_answers') {
							right_answers = results[index];
							return;
						}
						var row = '<tr><td>' + (index + 1) +
							'</td><td>' + results[index].id +
							'</td><td>' + results[index].used_count +
							'</td><td>' + results[index].difficult +
							'</td><td>' + ((results[index].answer) ? 'Да' : 'Нет') +
							'</td></tr>';
						$('#test_result').append(row);
					});

					$('#test_result_count').append('Верно ' + right_answers + ' из ' + questions_count);
				}
			});
		});

		$('#refresh_results').click(function () {
			$('#tests_results').empty();

			$.ajax({
				type: 'POST',
				url: 'index/results',
				success: function (data) {
					var results = JSON.parse(data);

					$.each(results, function (index) {
						var row = '<tr><td>' + results[index].id +
							'</td><td>' + results[index].person_iq +
							'</td><td>' + results[index].difficult_from + '-' + results[index].difficult_to +
							'</td><td>Верно ' + results[index].right_answers + ' из ' + results[index].questions_count +
							'</td></tr>';
						$('#tests_results').append(row);
					});
				}
			});
		});
	});
</script>