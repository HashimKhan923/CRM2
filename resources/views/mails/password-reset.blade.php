<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification - Lockmytimes</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}
.email-container {
    max-width: 600px;
    margin: 0 auto;
    background-color: #ffffff;
    border: 1px solid #dddddd;
}
.header {
    background-color: #4d4d4d;
    height: 60px;
    padding: 15px;
}
.header .logo img {
    max-width: 210px;
    height: 80px;
}
.header .text {
    font-size: 18px;
    color: #ffffff;
    font-weight: normal;
}
.banner img {
    width: 100%;
    height: auto;
}
.content {
    padding: 22px;
    text-align: left;
    font-size: 14px;
}
.content h1 {
    font-size: 22px;
    color: #333333;
    margin-bottom: 10px;
    line-height: 1.2;
    font-weight: normal;
}
.content p {
    font-size: 14px;
    color: #666666;
}
.reset-button {
    display: block;
    width: 200px;
    text-align: center;
    background-color: #6a95fe;
    color: #ffffff;
    padding: 10px;
    font-size: 16px;
    font-weight: bold;
    margin: 20px auto;
    text-decoration: none;
    border-radius: 5px;
}
.footer {
    text-align: left;
    padding: 20px;
    font-size: 14px;
    color: #ffffff;
    background-color: #4d4d4d;
    border-top: 1px solid #dddddd;
}
.footer .copyright {
    text-align: center;
    font-size: 12px;
    color: #ffffff;
}

    </style>
</head>
<body>
    <table class="email-container" width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
        <!-- Header -->
        <tr>
            <td bgcolor="#e7f1fb" style="padding:15px;">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td align="left">
                            <img src="https://skartistic.com/wp-content/uploads/2025/08/Screenshot_2025-08-27_002258-removebg-preview.png" alt="Company Logo" width="240" height="70" style="display:block;">
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <!-- Banner -->
        <tr>
            <td>
                <img src="https://skartistic.com/wp-content/uploads/2025/09/LMT-GIF-EMAIL-TEMPLATE.gif" alt="Welcome Banner" width="100%" style="display:block;">
            </td>
        </tr>

        <!-- Password Reset Content -->
<tr>
    <td class="content">
        <h1>Admin Verification Code</h1>
        <p>Hello {{ $name }},</p>
        <p>Your admin verification code is:</p>
        <p style="text-align: center; margin: 30px 0;">
            <span style="display: inline-block; background-color: #f0f0f0; color: #000; font-size: 28px; padding: 15px 30px; border-radius: 8px; font-weight: bold; letter-spacing: 5px;">
                {{ $token }}
            </span>
        </p>
        <p>Please enter this code to verify your admin login.</p>
        <p>Do not share this code with anyone. It will expire shortly.</p>
        <p>If you did not attempt to log in, please contact support immediately.</p>
        <p>Regards,<br>Lockmytimes Team</p>
    </td>
</tr>


        <!-- Footer -->
        <tr>
            <td bgcolor="#e7f1fb" style="padding:20px; font-size:14px; color:#000000;">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <!-- Logo -->
                        <td align="left" valign="top">
                            <img src="https://skartistic.com/wp-content/uploads/2025/08/Screenshot_2025-08-27_002258-removebg-preview.png" alt="Company Logo" width="150" style="display:block;">
                        </td>

                        <!-- Social Icons -->
                        <td align="right" valign="top">
                            <table cellpadding="0" cellspacing="0">
                                <tr>
                                    <td colspan="5" align="right" style="font-size:14px; color:#000000; padding-bottom:10px;">
                                        Find us on social media platforms
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" style="padding-right:10px;">
                                        <a href="https://www.facebook.com/profile.php?id=61574441738061&rdid=lSPvNTH0V8PZtD2A&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F17hobPgyAf%2F#" target="_blank">
                                            <img src="https://skartistic.com/wp-content/uploads/2025/08/3.png" alt="Facebook" width="20" height="20" style="display:block;">
                                        </a>
                                    </td>
                                    <td align="center" style="padding-right:10px;">
                                        <a href="https://www.instagram.com/lockmytimes" target="_blank">
                                            <img src="https://skartistic.com/wp-content/uploads/2025/08/4.png" alt="Instagram" width="20" height="20" style="display:block;">
                                        </a>
                                    </td>
                                    <td align="center" style="padding-right:10px;">
                                        <a href="https://Youtube.com" target="_blank">
                                            <img src="https://skartistic.com/wp-content/uploads/2025/08/5.png" alt="YouTube" width="20" height="20" style="display:block;">
                                        </a>
                                    </td>
                                    <td align="center" style="padding-right:10px;">
                                        <a href="https://Linkedin.com" target="_blank">
                                            <img src="https://skartistic.com/wp-content/uploads/2025/08/6.png" alt="LinkedIn" width="20" height="20" style="display:block;">
                                        </a>
                                    </td>
                                    <td align="center">
                                        <a href="https://Twitter.com" target="_blank">
                                            <img src="https://skartistic.com/wp-content/uploads/2025/08/7.png" alt="Twitter" width="20" height="20" style="display:block;">
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td align="center" style="border-top:1px solid #dddddd; padding-top:15px; font-size:12px; color:#000000;">
                            © 2025 Lockmytimes, All Rights Reserved.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>