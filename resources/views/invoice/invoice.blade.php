<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Invoice #0001 • AutoBoli Pvt Ltd</title>
  <style>
    body {
      font-family: 'DejaVu Sans', sans-serif;
      background: #e8ecf2;
      margin: 0;
      padding: 0;
      color: #333;
    }

    .invoice-wrapper {
      max-width: 750px;
      margin: 40px auto;
      background: #fff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

.invoice-header {
  background: #0a1930;
  color: #fff;
  padding: 25px 30px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.company-info {
  display: flex;
  align-items: center;
  gap: 15px;
}

.company-info .logo {
  width: 60px;
  height: auto;
}

.company-info h2 {
  margin: 0;
  font-size: 20px;
}

.company-info p {
  margin: 3px 0 0;
  font-size: 12px;
  color: #aab6d1;
}

.invoice-label {
  text-align: right;
}

.invoice-label span {
  background: #0080ff;
  padding: 5px 12px;
  border-radius: 6px;
  color: #fff;
  font-weight: bold;
}

.invoice-label p {
  margin: 6px 0 0;
  color: #aab6d1;
  font-size: 12px;
}


    /* Customer Info */
    .customer-info {
      padding: 20px 30px;
      background: #f8f9fc;
      border-bottom: 1px solid #e0e6ef;
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
    }

    .customer-info div {
      width: 48%;
    }

    .customer-info h4 {
      margin: 0 0 8px;
      color: #0080ff;
      font-size: 14px;
    }

    .customer-info p {
      margin: 3px 0;
      font-size: 13px;
      color: #333;
    }

    /* Table */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 25px;
    }

    th, td {
      padding: 10px;
      border: 1px solid #ddd;
      text-align: right;
    }

    th {
      background: #f6f8fb;
      text-align: left;
    }

    /* Totals */
    .totals {
      margin-top: 15px;
      width: 100%;
    }

    .totals td {
      border: none;
      padding: 6px 0;
    }

    .totals tr:last-child td {
      border-top: 1px dashed #ccc;
      padding-top: 10px;
    }

    .totals strong {
      color: #0080ff;
    }

    /* Button (for web only) */
    .download-btn {
      text-align: right;
      margin-top: 25px;
    }

    .btn {
      background: #0080ff;
      color: #fff;
      text-decoration: none;
      padding: 8px 16px;
      border-radius: 6px;
      font-size: 13px;
    }

    @media print {
      .btn { display: none; }
    }

    /* Footer */
    .invoice-footer {
      position: relative;
      text-align: center;
      color: #fff;
      background: #0a1930;
      padding-top: 60px;
      padding-bottom: 30px;
    }

    .invoice-footer::before {
      content: "";
        position: absolute;
        top: 51px;
        left: -2px;
        width: 204%;
        height: 157px;
        background: url('{{ asset("public/theme/invoice/footer-wave.png") }}') no-repeat center;

    }

    .invoice-footer p {
      margin: 5px 0;
      font-size: 12px;
      color: #aab6d1;
    }
.customer-info-table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 25px;
  border: 1px solid #e0e6ef;
  background: #f9fbfe;
  border-radius: 6px;
}

.customer-info-table td {
  width: 50%;
  padding: 15px 20px;
  vertical-align: top;
  border-right: 1px solid #e0e6ef;
}

.customer-info-table td:last-child {
  border-right: none;
}

.customer-info-table h4 {
  margin: 0 0 8px 0;
  font-size: 15px;
  color: #0080ff;
  border-bottom: 1px solid #e0e6ef;
  padding-bottom: 4px;
}

.customer-info-table p {
  margin: 4px 0;
  font-size: 13px;
  color: #333;
}

.status {
  display: inline-block;
  padding: 3px 8px;
  border-radius: 5px;
  font-size: 12px;
  font-weight: bold;
  text-transform: uppercase;
}

.status.paid {
  background: #e6f8ec;
  color: #1a8f3d;
  border: 1px solid #a8e0b5;
}

.status.unpaid {
  background: #ffeaea;
  color: #cc0000;
  border: 1px solid #ffb3b3;
}


  </style>
</head>

<body>
  <div class="invoice-wrapper">

    <!-- Header -->
    <div class="invoice-header">
    <div class="company-info">
        <img src="{{ asset('public/theme/assets/nave-icon.png') }}" alt="AutoBoli Logo" class="logo">
        <div>
        <h2>AutoBoli Pvt Ltd</h2>
        <p>Karachi, Pakistan<br>info@autoboli.com</p>
        </div>
    </div>

    <div class="invoice-label">
        <span>INVOICE</span>
        <p>#0001<br>2025-10-10</p>
    </div>
    </div>


    <!-- Customer Info -->
<table class="customer-info-table">
  <tr>
    <td class="info-box">
      <h4>Billed To</h4>
      <p><strong>Customer Name:</strong> John Doe</p>
      <p><strong>Email:</strong> john@example.com</p>
      <p><strong>Phone:</strong> +92 300 1234567</p>
    </td>

    <td class="info-box">
      <h4>Billing Details</h4>
      <p><strong>Address:</strong> 123 Clifton Block 5, Karachi</p>
      <p><strong>Payment Method:</strong> Bank Transfer</p>
      <p><strong>Status:</strong> <span class="status paid">Paid</span></p>
    </td>
  </tr>
</table>


    <!-- Body -->
    <div style="padding: 30px;">
     <table class="invoice-items">
  <thead>
    <tr>
      <th>ID</th>
      <th>Date</th>
      <th>Plan Name</th>
      <th>Start</th>
      <th>Expiry</th>
      <th>Amount</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>001</td>
      <td>2025-10-01</td>
      <td>Premium Dealer Package</td>
      <td>2025-10-01</td>
      <td>2025-11-01</td>
      <td>15,000</td>
      <td><span class="status paid">Active</span></td>
    </tr>
    <tr>
      <td>002</td>
      <td>2025-10-05</td>
      <td>Vehicle Listing Boost (30 days)</td>
      <td>2025-10-05</td>
      <td>2025-11-05</td>
      <td>5,000</td>
      <td><span class="status expired">Expired</span></td>
    </tr>
  </tbody>
</table>


      <p style="margin-top:25px;">Thank you for your business!</p>

      <div class="download-btn">
        <a href="{{ route('invoice.pdf') }}" class="btn">Download PDF</a>
      </div>
    </div>

    <!-- Footer -->
    <div class="invoice-footer">
      <p>AutoBoli Pvt Ltd © 2025 — All rights reserved</p>
      <p>www.autoboli.com</p>
    </div>
  </div>
</body>
</html>
