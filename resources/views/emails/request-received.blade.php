 <!DOCTYPE html>
  <html>
  <head>
      <style>
          body {
              font-family: Arial, sans-serif;
              line-height: 1.6;
              color: #333;
              padding: 20px;
          }
          h2 {
              color: #2c3e50;
              margin-bottom: 20px;
          }
          .details {
              background-color: #f8f9fa;
              padding: 15px;
              border-left: 4px solid #3498db;
              margin: 20px 0;
          }
          .label {
              font-weight: bold;
          }
          .footer {
              margin-top: 30px;
              padding-top: 20px;
              border-top: 1px solid #ddd;
              color: #666;
              font-size: 13px;
          }
      </style>
  </head>
  <body>
      <h2>Thank you for your request!</h2>

      <p>Hi,</p>

      <p>We've received your request and will get back to you soon.</p>

      <div class="details">
          <p><span class="label">Pickup City:</span> {{
  $requestSubmission->pickup_city }}</p>
          <p><span class="label">Request Details:</span><br>{{
  $requestSubmission->request_details }}</p>
      </div>

      <p>Best regards,<br>
      Shoppa Japan Team</p>

      <div class="footer">
          This is an automated confirmation email.
      </div>
  </body>
  </html>