<?php
include_once "app/models/model_admin.php";
class Controller_AdMail extends Controller
{
	public function __construct(){
        parent::__construct();
        $this->model = new Model_Admin;
    }
	
	public function action_index(){
		$this->view->generate("admail_view.php", "adtemp_view.php",
            array(
                'title' => 'Рассылка писем',
                'form' => true
            )
        );
	}

	public function action_send($array){
		$emails = $this->model->get_emails($array['name']);
		foreach ($emails as $email) {
		$mail = new PHPMailer();

        $mail->CharSet = 'utf-8';

        $mail->IsSendmail();

        $mail->SetFrom('comb@mail.ru', 'Admin');

        $mail->AddAddress($email['email'], $email['name'] . " " . $email['lastname']);

        $mail->Subject = $array['topic'];

        $mail->MsgHTML($array['text']);

        $mail->Send();
		}

		$this->view->generate("admail_view.php", "adtemp_view.php",
            array(
                'title' => 'Рассылка писем',
                'sent' => true
            )
        );
	}
}