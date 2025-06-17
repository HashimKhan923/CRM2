<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Contact Us Submission</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f7fa;
      margin: 0;
      padding: 0;
    }
    .email-wrapper {
      max-width: 600px;
      margin: auto;
      background: #ffffff;
      border: 1px solid #e0e0e0;
      border-radius: 8px;
      overflow: hidden;
    }
    .email-header {
      background-color: #002c5f;
      padding: 20px;
      text-align: center;
    }
    .email-header img {
      max-height: 60px;
    }
    .email-body {
      padding: 30px;
      color: #333;
    }
    .email-body h2 {
      margin-top: 0;
      font-size: 20px;
      color: #002c5f;
    }
    .email-body p {
      margin: 8px 0;
      font-size: 16px;
    }
    .label {
      font-weight: bold;
    }
    .footer {
      background: #f0f0f0;
      padding: 15px;
      text-align: center;
      font-size: 12px;
      color: #777;
    }

    @media only screen and (max-width: 600px) {
      .email-body {
        padding: 20px;
      }
    }
  </style>
</head>
<body>
  <div class="email-wrapper">
    <div class="email-header">
      <img src="https://yourdomain.com/logo.png" alt="Company Logo">
    </div>
    <div class="email-body">
      <h2>New Contact Us Submission</h2>
      <p><span class="label">Name:</span> {{$first_name}} {{$last_name}}</p>
      <p><span class="label">Email:</span> {{$email}}</p>
      <p><span class="label">Phone Number:</span> {{$phone_number}}</p>
      <p><span class="label">Message:</span><br>
        {{$message1}}
      </p>
    </div>
    <div class="footer">
      &copy; 2025 LockMyTime. All rights reserved.
    </div>
  </div>
</body>
</html>
