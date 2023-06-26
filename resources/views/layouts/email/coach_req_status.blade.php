<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Approval</title>
</head>
<body style="background-image: linear-gradient(164deg, #000000 46%, #3e3e3e 40%);margin: 0;display: flex;justify-content: center;align-items: center;">
    <table style="width: 100%;max-width: 620px;margin: 30px auto;background-color: #ffffff;border-top: 5px solid #ff9b7b;border-radius: 4px;font-family: Arial, Helvetica, sans-serif;position: relative;box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td align="center"><a href="#" style="text-decoration: none;font-size: 36px;display: block;padding: 30px;text-transform: uppercase;font-weight: 700;background: #ff9b7b1f;color: #ff9b7b;margin-bottom: 30px;">Zentia</a></td>
            </tr>
            <tr>
                <td align="center" style="text-decoration: none;line-height: 24px;font-size: 24px;padding: 0px 28px 0px 28px;color: #ff9b7b;font-weight: bold;">Hello {{ $name }}!
                </td>
             </tr>
             <tr>
                  @if($status=='1')
                <td style="
                    display: block;
                    text-align: center;
                    padding: 28px 0 6px 0;
                    font-weight: 700;
                    color: #099b43;
                "><strong>Congratulation!  </strong>Your Account is approved now.</td>
               
                @else

                <td style="
                    display: block;
                    text-align: center;
                    padding: 28px 0 6px 0;
                    font-weight: 700;
                    color: #099b43;
                "><strong>Oops!  </strong>Your Account is Rejected now.</td>

                @endif
               
             </tr>
            
             <tr>
               <td align="center" valign="top" height="25" width="100" style="
                  font-family: 'Open Sans', Arial, Helvetica,
                  sans-serif;
                  
                  word-break: break-word;
                  line-height: 120%;
                  cursor: text;
                  " panel-color="color_table" editor="content" class="relative_index2">
                  <span style="
                     display: inline-block;
                     line-height: 20px;
                     font-size: 16px;
                     color: #243c8f;
                     font-weight: 300;
                     margin-bottom: 36px;
                     padding: 0 32px;
                     ">Your account has been 
                     @if($status=='1')
                     approved 
                     @else
                     rejected
                     @endif
                     !
                     </span>
               </td>
            </tr>
            <tr>
                <td align="center">
                   <a href="{{url('/coach/dashboard')}}" target="_blank" style="background: #ff9b7b;padding: 12px 30px;display: inline-block;border-radius: 4px;color: #fff;margin-bottom: 26px;font-weight: 700;text-decoration: none;font-size: 16px;font-family: arial;">Go To Website</a>
                </td>
             </tr>
             <tr>
                <td align="center" style=" text-decoration: none; line-height: 20px; font-size: 17px; padding-bottom: 10px;color: #000; font-weight: 300; ">If you experience any issues logging into your account, reach out to us at
                </td>
             </tr><tr>
                <td align="center" style="text-decoration: none;line-height: 20px;padding-bottom: 26px;font-size: 17px;color: #676767;font-weight: 600;border-bottom: 1px solid #ccc;">
                   <a href="mailto:support@housekeepers.com" style=" text-decoration: none; color: #444; ">support@zentia.com</a>
                </td>
             </tr>
             <tr>
               <td align="left" style="text-decoration: none;line-height: 20px;font-size: 17px;padding: 24px 20px 30px 20px;color: #f78b77;font-weight: 600;font-size: 20px;">Team Zentia
               </td>
            </tr>
             <tr style="background-color: #ff9b7b;">
                <td align="center" style="text-decoration: none; line-height: 24px; padding: 12px 28px; font-size: 16px; color: #fff; font-weight: 600;"> © 2022- 2023 Zentia All Rights Reserved.
                </td>
             </tr>
        </tbody>
    </table>


</body>
</html>