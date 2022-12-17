<?php
    require_once(__DIR__.'../vendor/autoload.php');
    use \Mailjet\Resources;

    define('API_USER', 'f3108d76f1fa09692b19f062e79c84a0');
    define('API_LOGIN', 'c90f23b95e1166eedf504d4c0afb60a2');
    $mj = new \Mailjet\Client(API_USER,API_LOGIN,true,['version' => 'v3.1']);

  if(!empty($_POST['send'])){
      $name = htmlspecialchars($_POST['name']);
      $email = htmlspecialchars($_POST['email']);
      $subject = htmlspecialchars($_POST['subject']);
      $message = htmlspecialchars($_POST['message']);

      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $body = [
          'Messages' => [
            [
              'From' => [
                'Email' => "arnoldpeydhom276@gmail.com",
                'Name' => "arnold"
              ],
              'To' => [
                [
                  'Email' => "arnoldpeydhom276@gmail.com",
                  'Name' => "arnold"
                ]
              ],
              'Subject' => "Greetings from Mailjet.",
              'TextPart' => "$name,$email,$subject,$message",
            ]
          ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success();
        echo("Email envoyer avec succes !");
        header('Location:../contact.html');

        
      }else{
        echo('email non disponible');
      }
  }
  else{
    header('Location:../contact.html');
    die();
  }
?>
