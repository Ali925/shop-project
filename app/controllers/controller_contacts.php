<?php

class Controller_Contacts extends Controller
{
    function action_index()
    {
        $this->view->generate('contacts_view.php', 'template_view.php',
            array(
                'title' => 'Наши контакты',
                'is_photo_slider' => false,
                'is_slider' => false,
                'is_right_sidebar' => false,
                'is_left_navbar' => true
            )
        );
    }

    function action_mail() {

        $secret = "6LcInw0TAAAAAIDTEjO_6DVOK-NTp_aXdzjpaKx0";
        $response = null;
        $recaptcha = new \ReCaptcha\ReCaptcha($secret);

        if ($_POST["g-recaptcha-response"]) {
         $response = $recaptcha->verify($_POST["g-recaptcha-response"], $_SERVER["REMOTE_ADDR"]);

        if ($response->isSuccess()) {
        
        $mail = new PHPMailer();

        $mail->CharSet = 'utf-8';

        $mail->IsSendmail();

        $mail->SetFrom($_POST['email'], $_POST['name']);

        $mail->AddAddress("alitural.mehdi@gmail.com", "Tural Mehdi");

        $mail->Subject = "Новый отзыв";

        $mail->MsgHTML($_POST['text']);

        $mail->Send();

        $this->view->generate("mailsent_view.php", 'template_view.php',
            array(
                'title' => 'Наши контакты',
                'is_photo_slider' => false,
                'is_slider' => false,
                'is_right_sidebar' => false,
                'is_left_navbar' => true
            )
        );

        } 

        else {
            $errors = $response->getErrorCodes();

            $this->view->generate("captchaerr_view.php", 'template_view.php',
            array(
                'title' => 'Наши контакты',
                'is_photo_slider' => false,
                'is_slider' => false,
                'is_right_sidebar' => false,
                'is_left_navbar' => true
            )
        );
        }

    }

    }
}