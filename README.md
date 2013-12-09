Karamel Laravel 4 Package
====================

Laravel 4 karamel package based on karamel wrapper

------------

add this line to your composer.json

    "totox777/karamel": "dev-master"
    
and then, Run :

`composer update` to pull down the latest version.

add this line to your app.php provider array:

    'Totox777\Karamel\KaramelServiceProvider',
    
and add this line to app.php aliases array:

    'Karamel' => 'Totox777\Karamel\Facades\Profiler',
    
config: don't forget to chage the api-key and memberID / Email you got from dev.karamel.co.id in vendor/totox777/karamel/src/config/config.php


Sample Usage (Form):

    Karamel::GetCaptcha();
    
Sample Usage (Validation):

    $responseValue  = $_POST["gotcha_val"];
    $status = Karamel::ValidateCaptcha($responseValue);
    if ($status)
    {
    	// Corrent answer, continue with your submission process
    } else {
    	// Wrong answer, you may display a new AdsCaptcha and add an error message
    }
