<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Your OTP Code</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f4f4; font-family:Arial, sans-serif;">
  <table width="100%" bgcolor="#f4f4f4" cellpadding="0" cellspacing="0" style="padding: 40px 0;">
    <tr>
      <td align="center">
        <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
          <tr>
            <td align="center" style="padding: 40px 30px; background-color: #007BFF; color: #ffffff;">
              <h1 style="margin: 0; font-size: 24px;">Your OTP Code</h1>
            </td>
          </tr>
          <tr>
            <td style="padding: 30px;">
              <p style="font-size: 16px; color: #333333; margin-bottom: 20px;">
                Hello,
              </p>
              <p style="font-size: 16px; color: #555555; line-height: 1.5;">
                Use the following One-Time Password (OTP) to complete your action. This code is valid for the next 10 minutes.
              </p>
              <p style="text-align: center; margin: 30px 0;">
                <span style="display: inline-block; background-color: #f0f0f0; color: #000; font-size: 28px; padding: 15px 30px; border-radius: 8px; font-weight: bold; letter-spacing: 5px;">
                  {{ $token }}
                </span>
              </p>
              <p style="font-size: 14px; color: #777777;">
                If you did not request this, please ignore this email.
              </p>
              <p style="font-size: 14px; color: #777777; margin-top: 30px;">
                Regards,<br>
                <strong>LockMyTimes</strong>
              </p>
            </td>
          </tr>
          <tr>
            <td style="text-align: center; font-size: 12px; color: #aaaaaa; padding: 20px; background-color: #f9f9f9;">
              © 2025 LockMyTimes. All rights reserved.
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
