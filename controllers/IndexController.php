<?php
/**
 * Date: 11/12/18
 * Time: 10:05 PM
 * Author: lest4t
 */

class IndexController extends Controller
{
	public function indexAction() {
	}

	public function testingAction() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$modelTests = new Tests();

			$difficult_from = $_POST['difficult_from'];
			$difficult_to   = $_POST['difficult_to'];
			$person_iq      = $_POST['person_iq'];
			$questions      = static::generateQuestions($difficult_from, $difficult_to);
			$results        = array();
			$right_answers  = 0;

			foreach ($questions as $question) {
				$answer = (int)static::generateAnswer($person_iq, $question['difficult']);

				if ($answer) {
					$right_answers++;
				}

				$question['answer'] = $answer;
				$results[]          = $question;
			}

			$results['questions_count'] = count($questions);
			$results['right_answers']   = $right_answers;
			$modelTests->add(array(
				'difficult_from'  => $difficult_from,
				'difficult_to'    => $difficult_to,
				'person_iq'       => $person_iq,
				'right_answers'   => $right_answers,
				'questions_count' => count($questions)
			));

			echo json_encode($results);
		}
		exit;
	}

	public function resultsAction() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$modelTests = new Tests();

			echo json_encode($modelTests->get());
		}

		exit;
	}

	private static function generateQuestions($difficult_from = 0, $difficult_to = 100) {
		$modelQuestions       = new Questions();
		$modelQuestionHistory = new QuestionHistory();

		$avgUsed   = $modelQuestions->get(array(
			'select' => array(
				'AVG(used_count) as avg',
			),
		))[0]['avg'];
		$questions = $modelQuestions->getRandomQuestions(array(), $avgUsed, 10);

		foreach ($questions as $index => $v) {
			$difficult                       = rand($difficult_from, $difficult_to);
			$questions[$index]['difficult']  = $difficult;
			$questions[$index]['used_count'] += 1;

			$modelQuestions->update($questions[$index]['id'], array(
				'difficult'  => $difficult,
				'used_count' => $questions[$index]['used_count'],
			));
			$modelQuestionHistory->add(array(
				'id_question' => $questions[$index]['id'],
				'date'        => date('Y-m-d H:i:s'),
			));
		}

		return $questions;
	}

	private static function generateAnswer($person_iq, $difficult) {
		if ($difficult == 100) {
			return false;
		}
		if ($person_iq == 100) {
			return true;
		}
		if ($difficult == 0 && $person_iq > 0) {
			return true;
		}

		$chance = $person_iq * (100 / $difficult) / 100 * $person_iq / 15;

		return rand(0, $difficult) < $chance;
	}
}
