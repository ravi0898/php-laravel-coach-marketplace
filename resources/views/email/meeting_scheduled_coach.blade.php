<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yay! Booking confirmed</title>
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
                <td align="center" style="text-decoration: none;line-height: 24px;font-size: 18px;padding: 0px 28px 0px 28px;color: #ffffff;">Hi {{ ucfirst($name) }}!
                </td>
             </tr>
             <tr>
                <td style="display: block;text-align: center;padding: 28px 0 14px 0;color: #ffffff;max-width: 452px;margin: auto;font-size: 16px;line-height: 24px;">Exciting times ahead! 🚀 Your meeting with {{ ucfirst($username) }} is now confirmed, paid and scheduled.</td>
             </tr>
             <tr>
                <td style="display: block;text-align: center;padding: 28px 0 5px 0;color: #ffffff;max-width: 452px;margin: auto;font-size: 16px;line-height: 24px;">1. Click this <a rel="noopener" target="_blank" href="https://calendar.google.com/calendar/render?action=TEMPLATE&ctz=Europe/Brussels&dates=@php echo $gm_start_date; @endphp%2F@php echo $gm_end_date; @endphp&details=To%20join%20the%20meeting%20room,%20please%20login%20to%20your%20Zentia%20account%20and%20paste%20this%20link%20into%20your%20browser:%20https%3A%2F%2Fzentia.io%2Fcallbackurl%2F@php echo $link; @endphp%0A%0AConnecting%20the%20brightest%20minds.%20Book%20digital%20one-to-one%20sessions%20with%20tier%201%20entrepreneurs%20and%20executives.&location=Zentia&text=Zentia%20Meeting" class="cta btn-yellow" ><span style="background: #cf9a44; color:black;">link</span></a>, to create a Google calendar reminder for yourself about the upcoming meeting time and date</td>
             </tr>

             <tr>
                <td style="display: block;text-align: center;padding: 5px 0 5px 0;color: #ffffff;max-width: 452px;margin: auto;font-size: 16px;line-height: 24px;"><span style="background: #cf9a44; color:black;">2. The <strong>meeting will take place on Zentia.io</strong> - we recommend</span> logging in a few minutes early</td>
             </tr>
             <tr>
                <td style="display: block;text-align: center;padding: 5px 0 5px 0;color: #ffffff;max-width: 452px;margin: auto;font-size: 16px;line-height: 24px;">3. To join the meeting: Go to your Dashboard overview, click the <strong>Join Meeting</strong> section, in the dashboard panel</td>
             </tr>
             <tr>
                <td style="display: block;text-align: center;padding: 5px 0 14px 0;color: #ffffff;max-width: 452px;margin: auto;font-size: 16px;line-height: 24px;">4. If you or the other person wish to, you have the option to extend the session 20 min., 40 min. or 60 min., during the meeting. (The user will be charged immediately for the extra time and you will receive the payment asap after the session).</td>
             </tr>
             <tr>
                <td style="display: block;text-align: center;padding: 28px 0 14px 0;color: #ffffff;max-width: 452px;margin: auto;font-size: 16px;line-height: 24px;">We recommend you <strong>do the meeting from your laptop</strong>.  It's just the best experience when both parties can see each other's smiling faces properly, you know. </td>
             </tr>
             <tr>
                <td style="display: block;text-align: center;padding: 28px 0 14px 0;color: #ffffff;max-width: 452px;margin: auto;font-size: 16px;line-height: 24px;">Have a great time!</td>
             </tr>
             <tr>
                <td align="center" style="text-decoration: none;line-height: 20px;padding-bottom: 26px;font-size: 18px;color: #ff9a7a;">
                  Talk soon 👋
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