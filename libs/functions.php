<?php
/*-----------------------------------------------------------------------------------*/
//	Get real User IP
/*-----------------------------------------------------------------------------------*/
if (!function_exists('GetRealIp')) {
    function GetRealIp()
    {
        if (!empty($_SERVER[ 'HTTP_CLIENT_IP' ])) {
            $ip = $_SERVER[ 'HTTP_CLIENT_IP' ];
        } elseif (!empty($_SERVER[ 'HTTP_X_FORWARDED_FOR' ])) {
            $ip = $_SERVER[ 'HTTP_X_FORWARDED_FOR' ];
        } else {
            $ip = $_SERVER[ 'REMOTE_ADDR' ];
        }
        return $ip;
    }
}

/*-----------------------------------------------------------------------------------*/
//	Clean data in array
/*-----------------------------------------------------------------------------------*/
if (!function_exists('checkPostData')) {
    function checkPostData($post = [])
    {
        $result = [];

        if (!is_array($post)) {
            return $result;
        }

        foreach ($post as $k => $v) {
            $value = trim($v);
            $value = strip_tags($value);
            $value = htmlspecialchars($value);
            $result[ $k ] = $value;
        }
        return $result;
    }
}

/*-----------------------------------------------------------------------------------*/
//	Set Cookie for toast on page
/*-----------------------------------------------------------------------------------*/
if (!function_exists('setFlashCookie')) {
    function setFlashCookie($msg = '', $type = '')
    {
        if (!$msg) {
            return false;
        }

        if ($type) {
            setcookie('flash-type', $type, time() + 60, '/'); // 60 seconds
        }

        setcookie('flash-messages', $msg, time() + 60, '/'); // 60 seconds

        return true;
    }
}

/*-----------------------------------------------------------------------------------*/
//	Clear Cookie for toast on page
/*-----------------------------------------------------------------------------------*/
if (!function_exists('clearFlashCookie')) {
    function clearFlashCookie()
    {
        unset($_COOKIE[ 'flash-messages' ]);
        unset($_COOKIE[ 'flash-type' ]);
        setcookie('flash-messages', '', time() - 3600, '/');
        setcookie('flash-type', '', time() - 3600, '/');
    }
}

/*-----------------------------------------------------------------------------------*/
//	Redirect function
/*-----------------------------------------------------------------------------------*/
if (!function_exists('redirectTo')) {
    function redirectTo($url = '/')
    {
        header('Location: ' . $url);
    }
}

/**
 * SendMail Theme function
 *
 * @param array $to
 * @param string $subject
 * @param string $content
 * @param array $attachments
 * @param string $template
 * @param array $toCC
 * @param array $toBCC
 * @param string $preheader
 *
 * @return bool
 */
if ( !function_exists( 'mgmSendMail' ) ) {
    function mgmSendMail( $to = [], $subject = 'Subject', $content = '', $attachments = [], $toCC = [], $toBCC = [] )
    {
        $mailBody = $content;
        $subject = !empty( $subject ) ? $subject : 'Subject';
        $subject .= ' (MGM Website)';


        if ( !class_exists( 'PHPMailer' ) ) {
            require_once ROOT_PATH . 'libs/class.phpmailer.php';
            require_once ROOT_PATH . 'libs/class.smtp.php';
        }

        $phpMailer = new PHPMailer( true );
        $phpMailer->SMTPDebug = 0;
        $phpMailer->CharSet = 'utf-8';

        if ( SMTP_ON ) {
            $phpMailer->isSMTP();
        }

        try {
            if ( SMTP_ON ) {
                $phpMailer->SMTPDebug = 0;
                $phpMailer->SMTPAuth = SMTP_AUTH;
                $phpMailer->SMTPSecure = SMTP_SECURE;
                $phpMailer->Host = SMTP_HOST;
                $phpMailer->Port = SMTP_PORT;
                $phpMailer->SMTPKeepAlive = true;
                $phpMailer->Mailer = 'smtp';
                $phpMailer->Username = SMTP_USER;
                $phpMailer->Password = SMTP_PASSWORD;
            }

            $phpMailer->setFrom( 'noreply@rabota-germany.com', 'noreply MGM' );

            if ( !empty( $to ) ) {
                foreach ( $to as $toEmail ) {
                    if ( filter_var( $toEmail, FILTER_VALIDATE_EMAIL ) ) {
                        $phpMailer->addAddress( $toEmail );
                    }
                }
            }

            if (defined('CC_EMAIL') && !empty(CC_EMAIL)) {
                $cc_emails = explode('|', CC_EMAIL);

                if (!empty($cc_emails)) {
                    foreach ($cc_emails as $cc) {
                        if (filter_var($cc, FILTER_VALIDATE_EMAIL)) {
                            $phpMailer->addCC($cc);
                        }
                    }
                }
            }

            if ( !empty( $toCC ) ) {
                foreach ( $toCC as $toName => $toEmail ) {
                    if ( filter_var( $toEmail, FILTER_VALIDATE_EMAIL ) ) {
                        if ( !is_string( $toName ) ) {
                            $toName = '';
                        }
                        $phpMailer->addCC( $toEmail, $toName );
                    }
                }
            }

            if ( !empty( $toBCC ) ) {
                foreach ( $toBCC as $toName => $toEmail ) {
                    if ( filter_var( $toEmail, FILTER_VALIDATE_EMAIL ) ) {
                        if ( !is_string( $toName ) ) {
                            $toName = '';
                        }
                        $phpMailer->addBCC( $toEmail, $toName );
                    }
                }
            }

            if ( is_array( $attachments ) && !empty( $attachments ) ) {
                foreach ( $attachments as $attachment ) {
                    if ( file_exists( $attachment ) ) {
                        $phpMailer->addAttachment( $attachment );
                    }
                }
            }

            $phpMailer->Subject = $subject;
            $phpMailer->msgHTML( $mailBody );
            $phpMailer->send();
        } catch ( phpmailerException $e ) {
            echo $e->errorMessage();
            return false;
        } catch ( Exception $e ) {
            echo $e->getMessage();
            return false;
        }

        return true;
    }
}

