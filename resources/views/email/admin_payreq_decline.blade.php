<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Approval </title>
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
                <td align="center" style="text-decoration: none;line-height: 24px;font-size: 18px;padding: 0px 28px 0px 28px;color: #ffffff;">Hi {{ $name }},
                </td>
             </tr>
             <tr>
                <td style="display: block;text-align: center;padding: 28px 0 14px 0;color: #ffffff;max-width: 452px;margin: auto;font-size: 16px;line-height: 24px;">
                      Unfortunately your withdrawal request has been declined for some reason. </br>

                        This might be based on one of the following reasons:
                        - Your bank account information is incorrect
                        - You don’t have enough money in your account 
                        - The requested amount of money is less than US $100 (the minimum transaction size for a withdrawal is US $100)


                    
                    
                </td>
             </tr>
            



            
            
            
            <tr>
               <td align="center" style="font-size: 16px;color: #ffffff;line-height: 24px;padding: 14px 28px 24px 28px;width: 450px;display: block;margin: auto;">Note - {{ $note }}</td>
            </tr>
            
             <tr>
                <td align="center" style=" text-decoration: none; line-height: 20px; font-size: 17px; padding-bottom: 10px;color: #fff; font-weight: 300; ">Please check the above criteria to see if one of these reasons might be true in your case. If not, please contact info@zentia.io and we will help you.</td>
             </tr><tr>
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