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
		<input type="number" min="0" max="100" name="difficult_from" id="difficult_from" value="0" />
		<label for="difficult_to">до</label>
		<input type="number" min="0" max="100" name="difficult_to" id="difficult_to" value="100" /><br>
		<label for="person_iq">Интелект тестируемого:</label>
		<input type="number" min="0" max="100" name="person_iq" id="person_iq" value="50" /><br>
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
	<table class="results">
		<thead>
		<tr>
			<td>№</td>
			<td>Интелект тестируемого</td>
			<td>Диапазон сложности вопросов</td>
			<td>Результат тестирования</td>
		</tr>
		</thead>
		<tbody></tbody>
	</table>
	<button type="button" id="refresh">Обновить</button>
</div>
