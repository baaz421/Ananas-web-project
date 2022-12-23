<?php 

function EmailTemplateVerification($code){
  $title = "Verification code";
  $HtmlCode = '
  <!DOCTYPE html>
  <html>

  <head>
      <title></title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <style type="text/css">
          @media screen {
              @font-face {
                  font-family: Lato";
                  font-style: normal;
                  font-weight: 400;
                  src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
              }

              @font-face {
                  font-family: "Lato";
                  font-style: normal;
                  font-weight: 700;
                  src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
              }

              @font-face {
                  font-family: "Lato";
                  font-style: italic;
                  font-weight: 400;
                  src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
              }

              @font-face {
                  font-family: "Lato";
                  font-style: italic;
                  font-weight: 700;
                  src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
              }
          }

          /* CLIENT-SPECIFIC STYLES */
          body,
          table,
          td,
          a {
              -webkit-text-size-adjust: 100%;
              -ms-text-size-adjust: 100%;
          }

          table,
          td {
              mso-table-lspace: 0pt;
              mso-table-rspace: 0pt;
          }

          img {
              -ms-interpolation-mode: bicubic;
          }

          /* RESET STYLES */
          img {
              border: 0;
              height: auto;
              line-height: 100%;
              outline: none;
              text-decoration: none;
          }

          table {
              border-collapse: collapse !important;
          }

          body {
              height: 100% !important;
              margin: 0 !important;
              padding: 0 !important;
              width: 100% !important;
          }

          /* iOS BLUE LINKS */
          a[x-apple-data-detectors] {
              color: inherit !important;
              text-decoration: none !important;
              font-size: inherit !important;
              font-family: inherit !important;
              font-weight: inherit !important;
              line-height: inherit !important;
          }

          /* MOBILE STYLES */
          @media screen and (max-width:600px) {
              h1 {
                  font-size: 32px !important;
                  line-height: 32px !important;
              }
          }

          /* ANDROID CENTER FIX */
          div[style*="margin: 16px 0;"] {
              margin: 0 !important;
          }
      </style>
  </head>

  <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
      <!-- HIDDEN PREHEADER TEXT -->
      <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: "Lato", Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"> Were thrilled to have you here! Get ready to dive into your new account. </div>
      <table border="0" cellpadding="0" cellspacing="0" width="100%">
          <!-- LOGO -->
          <tr>
              <td bgcolor="#FFA73B" align="center">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                      <tr>
                          <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                      </tr>
                  </table>
              </td>
          </tr>
          <tr>
              <td bgcolor="#FFA73B" align="center" style="padding: 0px 10px 0px 10px;">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                      <tr>
                          <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                            <img src="https://ananas.com.co/main-app/assets/images/demos/demo-14/logo-main.png" width="90" style="display: block; border: 0px;" />
                            <p style="font-size: 11pt; padding: 0; margin: 0;">The first social shopping website</p>
                            <h1 style="font-size: 44px; font-weight: 400; margin: 2px 0 2px 0; padding: 0;">'.$title.'</h1>
                          </td>
                      </tr>
                  </table>
              </td>
          </tr>
          <tr>
              <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                      <tr>
                          <td bgcolor="#ffffff" align="left" style="padding: 0 30px 20px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                              <p style="margin: 0;">Were excited to have you get started. First, you need to confirm your account. Here is the verification code</p>
                          </td>
                      </tr>
                      <tr>
                          <td bgcolor="#ffffff" align="left">
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                      <td bgcolor="#ffffff" align="center" style="padding: 0px 30px 0px 30px;">
                                          <table border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                  <td align="center" style="border-radius: 10px;" bgcolor="#ffffff">
                                                  	<p style="font-size: 22px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #000; padding: 15px 25px; border-radius: 10px; border: 1px solid #FFA73B; display: inline-block;" id="v-code">
                                                  	'.$code.'
                                                  	<p>
                                                  </td>
                                              </tr>
                                          </table>
                                      </td>
                                  </tr>
                              </table>
                          </td>
                      </tr> <!-- COPY -->
                      <tr>
                          <td bgcolor="#ffffff" align="center" style="padding: 0px 30px 0px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                              <p style="margin: 0;">copy and paste the following Code.</p>
                          </td>
                      </tr> <!-- COPY -->
                  </table>
              </td>
          </tr>
          <tr>
              <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                      <tr>
                          <td bgcolor="#FFECD1" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                              <h2 style="font-size: 20px; font-weight: 400; color: #111111; margin: 0;">Need more help?</h2>
                              <p style="margin: 0;"><a href="#" target="_blank" style="color: #FFA73B;">We&rsquo;re here to help you out</a></p>
                          </td>
                      </tr>
                  </table>
              </td>
          </tr>
      </table>
  </body>

  </html>
  ';
return $HtmlCode;
}

function WelcomeEmail($user_name){
  $HtmlCode = '
  <!DOCTYPE html>
  <html>
  <head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
      @media screen {
        @font-face {
          font-family: Lato;
          font-style: normal;
          font-weight: 400;
          src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
        }
        @font-face {
          font-family: "Lato";
          font-style: normal;
          font-weight: 700;
          src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
        }
        @font-face {
          font-family: "Lato";
          font-style: italic;
          font-weight: 400;
          src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
        }
        @font-face {
          font-family: "Lato";
          font-style: italic;
          font-weight: 700;
          src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
        }
      }
      /* CLIENT-SPECIFIC STYLES */
      body,
      table,
      td,
      a {
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
      }
      table,
      td {
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
      }
      img {
        -ms-interpolation-mode: bicubic;
      }
      /* RESET STYLES */
      img {
        border: 0;
        height: auto;
        line-height: 100%;
        outline: none;
        text-decoration: none;
      }
      table {
        border-collapse: collapse !important;
      }
      body {
        height: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
        width: 100% !important;
      }
      /* iOS BLUE LINKS */
      a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
      }
      /* MOBILE STYLES */
      @media screen and (max-width:600px) {
        h1 {
          font-size: 32px !important;
          line-height: 32px !important;
        }
      }
      /* ANDROID CENTER FIX */
      div[style*="margin: 16px 0;"] {
        margin: 0 !important;
      }
    </style>
  </head>

  <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
    <!-- HIDDEN PREHEADER TEXT -->
    <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family:Lato, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"> Were thrilled to have you here! Get ready to dive into your new account. </div>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <!-- LOGO -->
      <tr>
        <td bgcolor="#FFA73B" align="center">
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
            <tr>
              <td align="center" valign="top" style="padding: 20px 10px 20px 10px;"></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td bgcolor="#FFA73B" align="center" style="padding: 0px 10px 0px 10px;">
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
            <tr>
              <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 0px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                <img src="https://ananas.com.co/main-app/assets/images/demos/demo-14/logo-main.png" width="90" style="display: block; border: 0px;" />
                <p style="font-size: 11pt; padding: 0; margin: 0;">The first social shopping website</p>
                <h1 style="font-size: 44px; font-weight: 400; margin: 0; padding: 0;">Welcome on board!</h1>
                <h5 style="font-size: 20px; font-weight: 400; margin: 0; padding:0;">Hi, <u>'.$user_name.'</u></h5>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
            <tr>
              <td bgcolor="#ffffff" align="center" style="padding: 10px 30px 10px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                  <p style="margin: 0;">It&rsquo;s our pleasure to find you here and Were excited to have you get started with us. </p>
              </td>
            </tr>
            <tr>
              <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 0px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                <p>Here is some fast tips:</p>
                <ul>
                  <li>You can join any deal, but you can&rsquo;t cancel your joining, however seller can cancel the deal at red zone only, which if he did, you will be refunded without any extra fees.</li>
                  <li>Deals consist of units, so you can join for one unit or more, the more units you add, the more chance to win.</li>
                  <li>once you won a deal, you will receive a notification email, so keep your email monitored, the way of how you can get your winning product is based on you and the seller.</li>
                  <li>We will not bother you for a bulk of emails, so keep visiting Ananas frequently.</li>
                </ul>
              </td>
            </tr> <!-- COPY -->
            <tr>
              <td bgcolor="#ffffff" align="center" style="padding: 0px 30px 10px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 800; line-height: 25px;">
                Wish you a good luck.
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
            <tr>
              <td bgcolor="#FFECD1" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                  <h2 style="font-size: 20px; font-weight: 400; color: #111111; margin: 0;">Need more help?</h2>
                  <p style="margin: 0;"><a href="https://ananas.com.co/main-app/contact.php" target="_blank" style="color: #FFA73B;">We&rsquo;re here to help you out</a></p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
  </html>
  ';
return $HtmlCode;
}

function ForgotPasswordEmail($code){
  $title = "Forgot password verification code";
  $HtmlCode = '
  <!DOCTYPE html>
  <html>

  <head>
      <title></title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <style type="text/css">
          @media screen {
              @font-face {
                  font-family: Lato";
                  font-style: normal;
                  font-weight: 400;
                  src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
              }

              @font-face {
                  font-family: "Lato";
                  font-style: normal;
                  font-weight: 700;
                  src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
              }

              @font-face {
                  font-family: "Lato";
                  font-style: italic;
                  font-weight: 400;
                  src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
              }

              @font-face {
                  font-family: "Lato";
                  font-style: italic;
                  font-weight: 700;
                  src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
              }
          }

          /* CLIENT-SPECIFIC STYLES */
          body,
          table,
          td,
          a {
              -webkit-text-size-adjust: 100%;
              -ms-text-size-adjust: 100%;
          }

          table,
          td {
              mso-table-lspace: 0pt;
              mso-table-rspace: 0pt;
          }

          img {
              -ms-interpolation-mode: bicubic;
          }

          /* RESET STYLES */
          img {
              border: 0;
              height: auto;
              line-height: 100%;
              outline: none;
              text-decoration: none;
          }

          table {
              border-collapse: collapse !important;
          }

          body {
              height: 100% !important;
              margin: 0 !important;
              padding: 0 !important;
              width: 100% !important;
          }

          /* iOS BLUE LINKS */
          a[x-apple-data-detectors] {
              color: inherit !important;
              text-decoration: none !important;
              font-size: inherit !important;
              font-family: inherit !important;
              font-weight: inherit !important;
              line-height: inherit !important;
          }

          /* MOBILE STYLES */
          @media screen and (max-width:600px) {
              h1 {
                  font-size: 32px !important;
                  line-height: 32px !important;
              }
          }

          /* ANDROID CENTER FIX */
          div[style*="margin: 16px 0;"] {
              margin: 0 !important;
          }
      </style>
  </head>

  <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
      <!-- HIDDEN PREHEADER TEXT -->
      <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: "Lato", Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"> Were thrilled to have you here! Get ready to dive into your new account. </div>
      <table border="0" cellpadding="0" cellspacing="0" width="100%">
          <!-- LOGO -->
          <tr>
              <td bgcolor="#FFA73B" align="center">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                      <tr>
                          <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                      </tr>
                  </table>
              </td>
          </tr>
          <tr>
              <td bgcolor="#FFA73B" align="center" style="padding: 0px 10px 0px 10px;">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                      <tr>
                          <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 10px 20px 10px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                            <img src="https://ananas.com.co/main-app/assets/images/demos/demo-14/logo-main.png" width="90" style="display: block; border: 0px;" />
                            <p style="font-size: 11pt; padding: 0; margin: 0;">The first social shopping website</p>
                            <h1 style="font-size: 36px; font-weight: 400; margin: 2px 0 2px 0; padding: 0; letter-spacing: 0;">'.$title.'</h1>
                          </td>
                      </tr>
                  </table>
              </td>
          </tr>
          <tr>
              <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                      <tr>
                          <td bgcolor="#ffffff" align="left" style="padding: 0 30px 20px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                              <p style="margin: 0;">You received this email because you requested a password recovery, if it is not you then ignore this email: </p>
                          </td>
                      </tr>
                      <tr>
                          <td bgcolor="#ffffff" align="left">
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                      <td bgcolor="#ffffff" align="center" style="padding: 0px 30px 0px 30px;">
                                          <table border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                  <td align="center" style="border-radius: 10px;" bgcolor="#ffffff">
                                                    <p style="font-size: 22px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #000; padding: 15px 25px; border-radius: 10px; border: 1px solid #FFA73B; display: inline-block;" id="v-code">
                                                    '.$code.'
                                                    <p>
                                                  </td>
                                              </tr>
                                          </table>
                                      </td>
                                  </tr>
                              </table>
                          </td>
                      </tr> <!-- COPY -->
                      <tr>
                          <td bgcolor="#ffffff" align="center" style="padding: 0px 30px 0px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                              <p style="margin: 0;">Copy and paste this code to recover your password.</p>
                          </td>
                      </tr> <!-- COPY -->
                  </table>
              </td>
          </tr>
          <tr>
              <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                      <tr>
                          <td bgcolor="#FFECD1" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                              <h2 style="font-size: 20px; font-weight: 400; color: #111111; margin: 0;">Need more help?</h2>
                              <p style="margin: 0;"><a href="#" target="_blank" style="color: #FFA73B;">We&rsquo;re here to help you out</a></p>
                          </td>
                      </tr>
                  </table>
              </td>
          </tr>
      </table>
  </body>

  </html>
  ';
return $HtmlCode;
}

function DealCancelledEmail($user_name, $deal_id, $unit_price){
  $HtmlCode = '
  <!DOCTYPE html>
  <html>
  <head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
      @media screen {
        @font-face {
          font-family: Lato;
          font-style: normal;
          font-weight: 400;
          src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
        }
        @font-face {
          font-family: "Lato";
          font-style: normal;
          font-weight: 700;
          src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
        }
        @font-face {
          font-family: "Lato";
          font-style: italic;
          font-weight: 400;
          src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
        }
        @font-face {
          font-family: "Lato";
          font-style: italic;
          font-weight: 700;
          src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
        }
      }
      /* CLIENT-SPECIFIC STYLES */
      body,
      table,
      td,
      a {
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
      }
      table,
      td {
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
      }
      img {
        -ms-interpolation-mode: bicubic;
      }
      /* RESET STYLES */
      img {
        border: 0;
        height: auto;
        line-height: 100%;
        outline: none;
        text-decoration: none;
      }
      table {
        border-collapse: collapse !important;
      }
      body {
        height: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
        width: 100% !important;
      }
      /* iOS BLUE LINKS */
      a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
      }
      /* MOBILE STYLES */
      @media screen and (max-width:600px) {
        h1 {
          font-size: 32px !important;
          line-height: 32px !important;
        }
      }
      /* ANDROID CENTER FIX */
      div[style*="margin: 16px 0;"] {
        margin: 0 !important;
      }
    </style>
  </head>

  <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
    <!-- HIDDEN PREHEADER TEXT -->
    <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family:Lato, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"> Were thrilled to have you here! Get ready to dive into your new account. </div>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <!-- LOGO -->
      <tr>
        <td bgcolor="#FFA73B" align="center">
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
            <tr>
              <td align="center" valign="top" style="padding: 20px 10px 20px 10px;"></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td bgcolor="#FFA73B" align="center" style="padding: 0px 10px 0px 10px;">
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
            <tr>
              <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 0px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                <img src="https://ananas.com.co/main-app/assets/images/demos/demo-14/logo-main.png" width="90" style="display: block; border: 0px;" />
                <p style="font-size: 11pt; padding: 0; margin: 0;">The first social shopping website</p>
                <h1 style="font-size: 44px; font-weight: 400; margin: 0; padding: 0;">Deal Cancelled!</h1>
                <h5 style="font-size: 20px; font-weight: 400; margin: 0; padding:0;">Hi, <u>'.$user_name.'</u></h5>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
            <tr>
              <td bgcolor="#ffffff" align="left" style="padding: 10px 30px 10px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                  <p style="margin: 0;">Sorry to inform you that deal <u style="color: #A6292F;"> '.$deal_id.' </u> has been cancelled.</p>
              </td>
            </tr>
            <tr>
              <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 0px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                <p style="margin: 0;">You have been refunded for unit amount <u style="color: #3AC222;"> '.$unit_price.' </u> added to your ananas wallet.</p>
              </td>
            </tr> <!-- COPY -->
            <tr>
              <td bgcolor="#ffffff" align="center" style="padding: 0px 30px 10px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 800; line-height: 25px;">
                Good luck for the next deals.
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
            <tr>
              <td bgcolor="#FFECD1" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                  <h2 style="font-size: 20px; font-weight: 400; color: #111111; margin: 0;">Need more help?</h2>
                  <p style="margin: 0;"><a href="https://ananas.com.co/main-app/contact.php" target="_blank" style="color: #FFA73B;">We&rsquo;re here to help you out</a></p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
  </html>
  ';
return $HtmlCode;
}

function DealConfirmEmail(array $user_detail,$conn,$product_image_path = "https://ananas.com.co/All-Products-images/", $checkout_id,$date){
  $user_id = $user_detail['id'];
  $user_name = $user_detail['name'];
  $get_checkout_data = "SELECT * FROM checkout WHERE ID = $checkout_id";
  $run_checkout_data = mysqli_query($conn,$get_checkout_data);
  $fetch_checkout_data = mysqli_fetch_assoc($run_checkout_data);
  $percentage    = $fetch_checkout_data['coupon_per'];
  $total_amount  = $fetch_checkout_data['total'];
  $sub_total     = $fetch_checkout_data['sub_total'];
  $deal_ids      = $fetch_checkout_data['deal_ids'];
  $av_bal        = $fetch_checkout_data['available_bal'];
  $created_date  = $fetch_checkout_data['created_date'];

  // coverting date and display join date
  if($created_date == ""){
    $join_date = date("jS F Y h:i A",strtotime($date));
  }else{
    $join_date = date("jS F Y h:i A",strtotime($created_date));
  }

  // discounted amount to show
  $dis_amt       = $sub_total / 100 * $percentage;

  $HtmlCode ='
  <!DOCTYPE html>
  <html>
  <head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
      @media screen {
        @font-face {
          font-family: Lato;
          font-style: normal;
          font-weight: 400;
          src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
        }
        @font-face {
          font-family: "Lato";
          font-style: normal;
          font-weight: 700;
          src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
        }
        @font-face {
          font-family: "Lato";
          font-style: italic;
          font-weight: 400;
          src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
        }
        @font-face {
          font-family: "Lato";
          font-style: italic;
          font-weight: 700;
          src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
        }
      }
      /* CLIENT-SPECIFIC STYLES */
      body,
      table,
      td,
      a {
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
      }
      table,
      td {
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
      }
      img {
        -ms-interpolation-mode: bicubic;
      }
      /* RESET STYLES */
      img {
        border: 0;
        height: auto;
        line-height: 100%;
        outline: none;
        text-decoration: none;
      }
      table {
        border-collapse: collapse !important;
      }
      body {
        height: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
        width: 100% !important;
      }
      /* iOS BLUE LINKS */
      a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
      }
      /* MOBILE STYLES */
      @media screen and (max-width:600px) {
        h1 {
          font-size: 32px !important;
          line-height: 32px !important;
        }
      }
      /* ANDROID CENTER FIX */
      div[style*="margin: 16px 0;"] {
        margin: 0 !important;
      }

      
      .card {
      border: none;
      padding: 0 10px 0 10px;
      }
      .product-qty span {
      font-size: 12px;
      color: #dedbdb
      }
    </style>
  </head>

  <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
    <!-- HIDDEN PREHEADER TEXT -->
    <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family:Lato, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"> Were thrilled to have you here! Get ready to dive into your new account. </div>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
      <tr>
        <td bgcolor="#FFA73B" align="center">
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
            <tr>
              <td align="center" valign="top" style="padding: 20px 10px 20px 10px;"></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td bgcolor="#FFA73B" align="center" style="padding: 0px 10px 0px 10px;">
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
            <tr>
              <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 0px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                <img src="https://ananas.com.co/main-app/assets/images/demos/demo-14/logo-main.png" width="90" style="display: block; border: 0px;" />
                <p style="font-size: 11pt; padding: 0; margin: 0;">The first social shopping website</p>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 0px 10px 0px 10px;">
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
            <tr>
              <td>
                <div class="card">
                  <h5 style="margin-top: 4px; font-family: Arial, Helvetica, sans-serif; font-size: 22px; font-weight: 200; padding-left: 5px; color: #111111;">
                    Your Deal confirmed!
                  </h5>
                  <span style="font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 16px; letter-spacing: 1px; padding-left: 5px; color: #111111;">
                    Hello, '.$user_name.'
                  </span><br>
                  <span style="margin-top: 4px; font-family: Arial, Helvetica, sans-serif; font-size: 16px; padding-left: 5px; color: #111111;">
                    Greetings from Ananas, and to inform that you have successfully joined the deal.
                  </span>
                  <hr style="height: 1px; background-color: #BABABAFF; border: none; margin-top: 15px; margin-bottom: 15px;">
                    <table width="100%" height="60px">
                      <tbody>
                        <tr>
                          <td width="70%" style="font-family: Arial, Helvetica, sans-serif; padding:5px; padding-left: 15px;">
                            <span style="color: #666666;">Deal Join Date:</span><br>
                            <span style="font-size: 15px;">'.$join_date.'</span>
                          </td>
                          <td width="30%" style="font-family: Arial, Helvetica, sans-serif; padding:5px; text-align: left;">
                            <span style="color: #666666;">Deal Join No:</span><br>
                            <span style="font-size: 15px;">2022CID'.$checkout_id.'</span>
                          </td>
                        </tr>
                       </tbody>
                    </table>
                  <hr style="height: 1px; background-color: #BABABAFF; border: none; margin-bottom: 15px; margin-top: 15px;">

                  <table align="center" width="96%" style="font-family: Arial, Helvetica, sans-serif;">
                    <tbody>';
                    $get_Cartlist = "SELECT * FROM cart WHERE user_id = $user_id";
                    $run_get_Cartlist = mysqli_query($conn, $get_Cartlist);
                    if(mysqli_num_rows($run_get_Cartlist) > 0){
                      while($row = mysqli_fetch_assoc($run_get_Cartlist)){
                        
                        $pro_id = $row['product_id'];
                        $c_qty  = $row['qty'];
                        $c_id   = $row['ID'];
                        $u_price  = $row['unit_price'];
                        $to_price  = $row['total'];
                        $deal_id  =$row['deal_id'];
                        $p_s = 1;

                        $get_pro_detail = "SELECT * FROM products WHERE ID = '{$pro_id}' AND p_status = '$p_s'";
                        $run_get_pro_details = mysqli_query($conn, $get_pro_detail);

                        if(mysqli_num_rows($run_get_pro_details) > 0){
                          $fetch_pro = mysqli_fetch_assoc($run_get_pro_details);
                          $p_id = $fetch_pro['ID'];
                          $p_name =$fetch_pro['product_name'];
                          $link = "https://ananas.com.co/main-app/product-view.php?p_id=".$p_id;
                          $product_image = $product_image_path.$fetch_pro['image_0'];

                    $HtmlCode .='
                      <tr style="height: 100px">
                        <td width="20%" align="center">
                          <a href="'.$link.'" target="_blank"> <img src="'.$product_image.'" width="90" style=" vertical-align: middle;"> </a>
                        </td>
                        <td width="45%" style="vertical-align: top; font-weight: bold; padding-top: 13px;"><a href="'.$link.'" target="_blank" style="text-decoration: none; color: black"><span>'.$p_name.'</span></a>

                          <div class="product-qty"><span style="color: #666666; font-weight: lighter;">Deal ID : 2022'.$deal_id.'</span></div>
                        </td>
                        <td width="15%" style="text-align: right; vertical-align: top; padding-top: 13px; font-style: italic; color: #111111;">
                          <span>'.$u_price.' X '.$c_qty.'</span>
                        </td>
                        <td width="20%" style="text-align: right; vertical-align: top; font-weight: bold; padding-top: 13px; color: #111111;">
                          <span>'.$to_price.'.00</span>
                        </td>
                      </tr>';
                        }// inside while loop if condition
    
                      }//while loop end
                    }
                      
                   $HtmlCode .=' 
                    </tbody>
                  </table>
                  <hr style="height: 1px; background-color: #BABABAFF; border: none; margin-bottom: 15px;">
                      <table width="100%" style="font-family: Arial, Helvetica, sans-serif; font-size: 13px">
                        <tbody>
                          <tr style="height: 40px;">
                            <td width="60%"> </td>
                            <td width="20%" style="color: #666666;">Subtotal</td>
                            <td width="20%" align="right" style="padding: 0 10px 0 0; color: #111111;">'.$sub_total.'.00</td>
                          </tr>
                          <tr style="height: 40px;">
                            <td> </td>
                            <td style="color: #666666;">Discount('.$percentage.'%)</td>
                            <td align="right" style="padding: 0 10px 0 0; color: green;">-'.$dis_amt.'.00</td>
                          </tr>
                          <tr style="height: 40px;">
                            <td> </td>
                            <td style="font-weight: bold; border-top: 1px solid #BABABAFF; border-bottom: 1px solid #BABABAFF; color: #111111;">Total</td>
                            <td align="right" style="padding: 0 10px 0 0; font-weight: bold; border-top: 1px solid #BABABAFF; border-bottom: 1px solid #BABABAFF; color: #111111;">'.$total_amount.'.00</td>
                          </tr>
                        </tbody>
                      </table>
                      <hr style="height: 1px; background-color: #BABABAFF; border: none; margin-bottom: 15px;">

                  <p style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #111111;">From your wallet<u style="color: red; font-weight: bold;">'.$total_amount.'.00</u> Amount have been deducted.</p>
                  <p style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #111111;">You’r current available wallet balance : <u style="color: green; font-weight: bold;">'.$av_bal.'.00</u> Amount.</p>
                  <p style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; font-weight: bold; color: #111111;">Thanks for Dealing with us And Ananas wish you a good luck!</p>
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 30px 10px 0px 10px;">
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
            <tr>
              <td bgcolor="#FFECD1" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                  <h2 style="font-size: 20px; font-weight: 400; color: #111111; margin: 0;">Need more help?</h2>
                  <p style="margin: 0;"><a href="https://ananas.com.co/main-app/contact.php" target="_blank" style="color: #FFA73B;">We&rsquo;re here to help you out</a></p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
  </html>
  '; 

  return $HtmlCode;
}

function DealConfirmEmail2(){
  $HtmlCode = '
  <!DOCTYPE html>
  <html>
  <head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <style type="text/css">
      @import url("https://fonts.googleapis.com/css2?family=Montserrat&display=swap");
      @media screen {
        @font-face {
          font-family: Lato;
          font-style: normal;
          font-weight: 400;
          src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
        }
        @font-face {
          font-family: "Lato";
          font-style: normal;
          font-weight: 700;
          src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
        }
        @font-face {
          font-family: "Lato";
          font-style: italic;
          font-weight: 400;
          src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
        }
        @font-face {
          font-family: "Lato";
          font-style: italic;
          font-weight: 700;
          src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
        }
      }
      /* CLIENT-SPECIFIC STYLES */
      body,
      table,
      td,
      a {
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
      }
      table,
      td {
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
      }
      img {
        -ms-interpolation-mode: bicubic;
      }
      /* RESET STYLES */
      img {
        border: 0;
        height: auto;
        line-height: 100%;
        outline: none;
        text-decoration: none;
      }
      table {
        border-collapse: collapse !important;
      }
      body {
        height: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
        width: 100% !important;
      }
      /* iOS BLUE LINKS */
      a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
      }
      /* MOBILE STYLES */
      @media screen and (max-width:600px) {
        h1 {
          font-size: 32px !important;
          line-height: 32px !important;
        }
      }
      /* ANDROID CENTER FIX */
      div[style*="margin: 16px 0;"] {
        margin: 0 !important;
      }

      
      .card {
      border: none;
      padding: 0 10px 0 10px;
      }
      .totals tr td {
      font-size: 13px
      }
      .footer {
      background-color: #eeeeeea8
      }
      .footer span {
      font-size: 12px
      }
      .product-qty span {
      font-size: 12px;
      color: #dedbdb
      }
    </style>
  </head>

  <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
    <!-- HIDDEN PREHEADER TEXT -->
    <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family:Lato, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"> Were thrilled to have you here! Get ready to dive into your new account. </div>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <!-- LOGO -->
      <tr>
        <td bgcolor="#FFA73B" align="center">
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
            <tr>
              <td align="center" valign="top" style="padding: 20px 10px 20px 10px;"></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td bgcolor="#FFA73B" align="center" style="padding: 0px 10px 0px 10px;">
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
            <tr>
              <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 0px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                <img src="https://ananas.com.co/main-app/assets/images/demos/demo-14/logo-main.png" width="90" style="display: block; border: 0px;" />
                <p style="font-size: 11pt; padding: 0; margin: 0;">The first social shopping website</p>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
            <tr>
              <td>
                <div class="card">
                  <h5>Your Deal confirmed!</h5> <span class="font-weight-bold d-block mt-4">Hello, Shahbaaz</span> <span>Greetings from Ananas, and to inform that you have successfully joined the deal.</span>
                  <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                    <table class="table table-borderless">
                      <tbody>
                        <tr>
                          <td>
                            <div class="py-2"> <span class="d-block text-muted">Deal Date</span> <span>12 Jan,2018</span> </div>
                          </td>
                          <td>
                            <div class="py-2"> <span class="d-block text-muted">Deal No</span> <span>MT12332345</span> </div>
                          </td>
                        </tr>
                       </tbody>
                    </table>
                  </div>
                  <div class="product border-bottom table-responsive">
                    <table class="table table-borderless">
                      <tbody>
                        <tr>
                          <td width="20%"> <img src="https://i.imgur.com/u11K1qd.jpg" width="90"> </td>
                          <td width="60%"> <span class="font-weight-bold">Men&rsquo;s Sports cap</span>
                            <div class="product-qty"> <span class="d-block">Quantity:1</span> <span>Color:Dark</span> </div>
                          </td>
                          <td width="20%">
                            <div class="text-right"> <span class="font-weight-bold">$67.50</span> </div>
                          </td>
                        </tr>
                        <tr>
                          <td width="20%"> <img src="https://i.imgur.com/SmBOua9.jpg" width="70"> </td>
                          <td width="60%"> <span class="font-weight-bold">Men&rsquo;s Collar T-shirt</span>
                            <div class="product-qty"> <span class="d-block">Quantity:1</span> <span>Color:Orange</span> </div>
                          </td>
                          <td width="20%">
                            <div class="text-right"> <span class="font-weight-bold">$77.50</span> </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="row d-flex justify-content-end">
                    <div class="col-md-5">
                      <table class="table table-borderless">
                        <tbody class="totals">
                          <tr>
                            <td>
                              <div class="text-left"> <span class="text-muted">Subtotal</span> </div>
                            </td>
                            <td>
                              <div class="text-right"> <span>$168.50</span> </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="text-left"> <span class="text-muted">Discount</span> </div>
                            </td>
                            <td>
                              <div class="text-right"> <span class="text-success">$168.50</span> </div>
                            </td>
                          </tr>
                          <tr class="border-top border-bottom">
                            <td>
                              <div class="text-left"> <span class="font-weight-bold">Total</span> </div>
                            </td>
                            <td>
                              <div class="text-right"> <span class="font-weight-bold">$238.50</span> </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <p>From your wallet have been deducted <u style="color: #A6292F; font-weight: bold;">238.00QR</u> Amount.</p>
                  <p class="font-weight-bold mb-0">Thanks for Dealing with us And Ananas wish you a good luck!</p>
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
            <tr>
              <td bgcolor="#FFECD1" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                  <h2 style="font-size: 20px; font-weight: 400; color: #111111; margin: 0;">Need more help?</h2>
                  <p style="margin: 0;"><a href="https://ananas.com.co/main-app/contact.php" target="_blank" style="color: #FFA73B;">We&rsquo;re here to help you out</a></p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
  </html>
  ';

  return $HtmlCode;
}

// $a = 344566;
// echo EmailTemplateVerification($a);
// echo WelcomeEmail("Shahbaaz Hussain");
// echo ForgotPasswordEmail(223456);
// echo DealCancelledEmail("Hussain",100023455,"100.00QR");
// echo DealConfirmEmail2();

?>



