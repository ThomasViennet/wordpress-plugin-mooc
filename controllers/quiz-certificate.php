<?php

namespace Mooc\Controllers;

require_once(dirname(__FILE__) . '/../models/quiz-answer.php');
require_once(dirname(__FILE__) . '/../models/quiz-option.php');
require_once(dirname(__FILE__) . '/../lib/fpdf/fpdf.php');
require_once(dirname(__FILE__) . '/../lib/mem_image/mem_image.php');

use Mooc\Models\Model_Answer;
use Mooc\Models\Model_Option;

class Controller_Certificate
{
    private $answerModel;
    private $optionModel;

    public function __construct()
    {
        $this->answerModel = new Model_Answer();
        $this->optionModel = new Model_Option();
    }

    public function evaluateUserAnswers($user_id, $form_id)
    {
        $userAnswersData = $this->answerModel->getUserFormAnswers($user_id, $form_id);
        if (!$userAnswersData || !isset($userAnswersData['answers'])) {
            return false;
        }

        $userAnswers = $userAnswersData['answers'];
        $correctAnswers = 0;

        foreach ($userAnswers as $questionId => $userAnswersArray) {
            $options = $this->optionModel->getOptions($questionId);
            foreach ($options as $option) {
                if (in_array($option->id, $userAnswersArray)) {
                    if ($option->is_correct) {
                        $correctAnswers++; 
                    } else {
                        $correctAnswers--;
                    }
                }
            }
        }

        $totalCorrectAnswers = $this->optionModel->countCorrectAnswersByFormId($form_id);
        $minimumScore = 80;
        $note = ($correctAnswers * 100) / $totalCorrectAnswers;
        if ($minimumScore <= $note) {
            // echo '
            // $totalCorrectAnswers : ' . $totalCorrectAnswers . '<br>
            // $correctAnswers : ' . $correctAnswers . '<br>
            // $minimumScore : ' . $minimumScore . '<br>
            // $note : ' . $note . '<br>
            // ';
            return true;
        } else {
            // echo '
            // $totalCorrectAnswers : ' . $totalCorrectAnswers . '<br>
            // $correctAnswers : ' . $correctAnswers . '<br>
            // $minimumScore : ' . $minimumScore . '<br>
            // $note : ' . $note . '<br>
            // ';
            return false;
        }
    }

    public function hasUserPassed($user_id, $form_id)
    {
        return $this->evaluateUserAnswers($user_id, $form_id);
    }


    public function generateCertificate($user_id, $form_id)
    {
        $user_id = intval($user_id);
        $form_id = intval($form_id);

        $userAnswersData = $this->answerModel->getUserFormAnswers($user_id, $form_id);
        if (!$userAnswersData) {
            echo "L'utilisateur n'a pas réussi le test pour le certificat.";
            return;
        }

        if ($this->evaluateUserAnswers($user_id, $form_id)) {
            $font = plugin_dir_path(__FILE__) . '../assets/font/Roboto/Roboto-Light.ttf';
            $fontBold = plugin_dir_path(__FILE__) . '../assets/font/Roboto/Roboto-Bold.ttf';

            $image = imagecreatefromjpeg(plugin_dir_path(__FILE__) . '../assets/img/certification-SEO-referencime.jpg');
            $color = imagecolorallocate($image, 34, 46, 90);

            $title1 = 'Certificat';
            $title2 = 'de réussite';

            $user_data = get_userdata($user_id);
            $first_name = $user_data->first_name;
            $last_name = $user_data->last_name;
            $name = $first_name . ' ' . $last_name;

            $description1 = 'a validé et obtenu le certificat : ';
            $description2 = 'Connaissances théoriques avancées en référencement naturel.';

            $numCertificate = $userAnswersData['certificate_number'];
            $dateObtention = date("d F Y", strtotime($userAnswersData['submitted']));

            imagettftext($image, 150, 0, 100, 600, $color, $font, $title1);
            imagettftext($image, 150, 0, 100, 800, $color, $font, $title2);
            imagettftext($image, 100, 0, 100, 1100, $color, $fontBold, $name);
            imagettftext($image, 70, 0, 100, 1300, $color, $font, $description1);
            imagettftext($image, 70, 0, 100, 1400, $color, $fontBold, $description2);
            imagettftext($image, 30, 0, 100, 1700, $color, $font, 'Certificate n° ' . $numCertificate);
            imagettftext($image, 30, 0, 100, 1750, $color, $font, 'Délivré le ' . $dateObtention);

            ob_start();
            imagejpeg($image);
            $image_data = ob_get_clean();
            imagedestroy($image);

            $pdf = new \PDF_MemImage();
            $pdf->AddPage('L', 'A5');
            $pdf->MemImage($image_data, 0, 0, 210, 148);

            ob_end_clean();
            $pdf->Output('I', 'certificate SEO referencime.pdf');
        } else {
            echo "L'utilisateur n'a pas réussi le test pour le certificat.";
        }
    }
}
