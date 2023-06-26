<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coach Status</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Michroma&display=swap" rel="stylesheet">
</head>
<body style="background-color: #fff;margin: 0;display: flex;justify-content: center;align-items: center;">
    <table style="width: 100%;max-width: 700px; margin: 30px auto;background-color: #000;border-top: 5px solid #ff9b7b;border-radius: 4px;font-family: Arial, Helvetica, sans-serif;position: relative;box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td align="center"><a href="#" style="text-decoration: none;font-size: 26px; display: block;padding: 30px; text-transform: uppercase; font-weight: 400;background: #ff9a7a; color: #000; margin-bottom: 54px; font-family: 'Michroma', sans-serif; letter-spacing: 2px;">Zentia</a></td>
            </tr>
            <tr>
                <td align="center" style="text-decoration: none;line-height: 24px;font-size: 18px;padding: 0px 28px 0px 28px;color: #ffffff;">Hello {{ ucfirst($name) }},
                </td>
             </tr>

             @if($status=='1')
            <tr>
            <td style="display: block;text-align: center;padding: 28px 0 14px 0;color: #ffffff;max-width: 452px;margin: auto;font-size: 16px;line-height: 24px;">

                <strong>Yay!</strong>You're now an Advisor on Zentia. Congrats! 🥳 
                </br>
                You’ve got quite the track record and you’ve made some noteworthy accomplishments through your career - otherwise we wouldn’t be having this one-way, fully-automated email conversation right now 😉
                But to be frank with you, our emails are just about the only thing in the Zentia concept that isn’t unique and authentic.And although we’d love to be 100% personal in everything we do - we also recognize writing several hundred emails a day would quickly turn into a full time job…. for 147 people.

            </td>
             </tr>

             <tr>
            <td style="display: block;text-align: center;padding: 28px 0 14px 0;color: #ffffff;max-width: 452px;margin: auto;font-size: 16px;line-height: 24px;">

                So, what do we do with all of this extra time, we’re not spending on writing emails? Well, at Zentia we're connecting the brightest minds, where upcoming and ambitious professionals can get advice from tier 1 entrepreneurs and executives - yep, that’s you.😏
                So, we hope you’re up for the ride - ‘cause this is about to get fun!
                Check out your profile on Zentia <a href="{{ route('discover') }}"><span style="background: #cf9a44; color:black;">here</span></a>.
                Don’t be a stranger 👋
            </td>
             </tr>

             @else
             <tr>
                <td style="display: block;text-align: center;padding: 28px 0 14px 0;color: #ffffff;max-width: 452px;margin: auto;font-size: 16px;line-height: 24px;"><strong>Oops!  </strong>We were going through your advisor profile information and noticed a few things, which could be improved.
                 Because of this, we weren’t able to approve your profile as of now. 
                 Quality of information is an important factor on Zentia, so someone from our team will reach out to you ASAP and give some pointers to what information might currently be missing on your profile.

                </td>
             </tr>
             @endif

             
            <tr>
                <td align="center" style="text-decoration: none;line-height: 20px;padding-bottom: 26px;font-size: 18px;color: #ff9a7a;">
                  Talk soon!
                </td>
             </tr>
             <tr style="background-color: #ff9b7b;margin-top: 40px;display: block;">
                <td style="display: block; padding: 20px 14px;">
                  <span style="display: inline-block;width: 236px;font-size: 15px;">2022, Zentia, All rights reserved</span>
                  <span style="display: inline;text-align: center;font-size: 15px;">Experiencing any issues? Reach out to us at support@zentia.io</span>
                </td>
             </tr>
        </tbody>
    </table>
</body>
</html>