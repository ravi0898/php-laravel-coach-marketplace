<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Activation </title>
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
                <td align="center" style="text-decoration: none;line-height: 24px;font-size: 18px;padding: 0px 28px 0px 28px;color: #ffffff;">Hi {{ $name }}!
                </td>
             </tr>
             <tr>
                <td style="display: block;text-align: center;padding: 28px 0 14px 0;color: #ffffff;max-width: 452px;margin: auto;font-size: 16px;line-height: 24px;">Coach rejected your request</td>
             </tr>
             <tr>
               <td align="center" style="font-size: 18px;color: #ffffff;padding: 20px 28px;font-weight: 700;">Next steps: </td>
            </tr>
            <tr>
               <td align="center" style="font-size: 16px;color: #ffffff;line-height: 24px;padding: 14px 28px 24px 28px;width: 450px;display: block;margin: auto;"> Please go to<span style="color: #ff9a7a;"> Zentia</span> dashboard to review the reason and also can re-request.</td>
            </tr>
            <tr>
                <td align="center">
                   <a href="{{url('/user/booking')}}" target="_blank" style="background: #ff9b7b;padding: 12px 30px;display: inline-block;border-radius: 4px;color: #fff;margin-bottom: 26px;font-weight: 700;text-decoration: none;font-size: 16px;font-family: arial;">Go To Website</a>
                </td>
             </tr>
             <tr>
                <td align="center" style=" text-decoration: none; line-height: 20px; font-size: 17px; padding-bottom: 10px;color: #000; font-weight: 300; ">If you experience any issues logging into your account, reach out to us at
                </td>
             </tr><tr>
                <td align="center" style="text-decoration: none;line-height: 20px;padding-bottom: 26px;font-size: 18px;color: #ff9a7a;">
                  Thanks!
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