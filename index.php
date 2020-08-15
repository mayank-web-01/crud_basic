<?php include 'server.php';?>

    <title>HTML CSS Form Validation</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>

  <body>
    <!---Name, Email Id, Mobile No., Date of Birth, Pin Code-->
    <form action="index.php" method="POST" enctype="multipart/form-data">
      <div>
        <input type="text" name="name" id="name" placeholder=" " required />
        <label for="name">Name</label>
      </div>
      <div>
        <input type="email" name="email" id="email" placeholder="Email Address" required />
        <div class="requirements">Must be a valid email addres!</div>
      </div>
      <div>
        <input
          type="tel"
          name="tel"
          id="tel"
          placeholder="Phone No"
          pattern="^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$"
          required
        />
        <div class="requirements">Must be a valid Phone Number!</div>
      </div>
      <div>
        <input
          type="tel"
          name="dob"
          id="tel"
          placeholder="Date Of Birth (dd/mm/yyyy)"
          pattern="[0-9]{1,2}/[0-9]{1,2}/[0-9]{4}"
          required
        />
        <div class="requirements">Must be a valid Date of birth!</div>
      </div>
      <div>
        <input
          type="tel"
          name="pincode"
          id="tel"
          placeholder="Pincode"
          pattern="[0-9]{6}"
          maxlength="6"
          required
        />
        <div class="requirements">Must be a valid pincode!</div>
      </div>

      <input type="submit" name="submit" value="Submit Data" />
    </form>
  </body>
</html>

