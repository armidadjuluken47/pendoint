<?php
// Initialize variables without default values
$name = "";
$position = "";
$email = "";
$phone = "";
$countryCode = "254"; // Default to Kenya
$phone_number = "";
$first_part = substr($phone_number, 0, 4);

// Extract the rest of the digits
$remaining_digits = substr($phone_number, 4);

// Use chunk_split to group the remaining digits into sets of 3, separated by spaces
$remaining_part = trim(chunk_split($remaining_digits, 3, " "));

// Combine the first part and the formatted remaining part
$formatted_phone_number = $first_part . " " . $remaining_part;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Fetch form data if POST request is made
    $name = isset($_POST["name"]) ? htmlspecialchars($_POST["name"]) : "";
    $position = isset($_POST["position"])
        ? htmlspecialchars($_POST["position"])
        : "";
    $email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : "";
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
    $countryCode = isset($_POST["countryCode"])
        ? htmlspecialchars($_POST["countryCode"])
        : "254"; // Default to Kenya
    $phone_number = $_REQUEST["phone_number"]["full"];
    $first_part = substr($phone_number, 0, 4);

    // Extract the rest of the digits
    $remaining_digits = substr($phone_number, 4);

    // Use chunk_split to group the remaining digits into sets of 3, separated by spaces
    $remaining_part = trim(chunk_split($remaining_digits, 3, " "));

    // Combine the first part and the formatted remaining part
    $formatted_phone_number = $first_part . " " . $remaining_part;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Signature Generator</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" rel="stylesheet"/>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>
      <style>
      body{
          height:700px;
      }
         h1, h2, h3 {
         font-family:Poppins;
         }
         p {
         font-family:Poppins;
         }
         .bold-text {
         font-family: Poppins;
         font-weight: 500; /* Semi-bold weight */
         }
         .wrapper {
         max-width:80%;
         margin: auto;
         background: #fff7f7;
         padding: 20px;
         border-radius: 8px;
         }
         .centered-content {
         text-align: center;
         margin-bottom: 20px;
         }
         .container {
         display: flex;
         justify-content: space-between;
         gap: 20px;
         margin-top:50px;
         width: 100%;
         position: relative;
         }
         form {
         width: 45%;
         }
         .vertical-line {
         width: 2px;
         background-color: #ccc;
         height: 100%;
         position: absolute;
         left: 50%;
         top: -30px;
         transform: translateX(-50%);
         }
         label {
         display: block;
         margin-bottom: 0px;
         font-weight: bold;
         }
         input[type="text"], input[type="email"], select {
         width: 320px;
         padding: 10px;
         margin-bottom: 9px;
         border: 1px solid #EAEBED;
         border-radius: 8px;
         }
         button {
         border: none;
         border-radius: 5px;
         background-color:#a875ad;
         color: #fff;
         cursor: pointer;
         width: 191px;
         margin-top: 27px;
         display: flex;
         justify-content: center; /* Horizontally center the text */
         align-items: center;     /* Vertically center the text */
         height: 50px;            /* Set height for better alignment */
         font-size: 13px;         /* Adjust font size as needed */
         }
         button:hover {
         background-color: #e17427;
         }
         .signature {
         width: 45%;
         padding: 10px;
         background-color: #fff7f7;
         }
         .copy-button {
         padding: 5px 5px 5px 5px;
         border: none;
         border-radius: 5px;
         background-color: #a875ad;
         color: #fff;
         cursor: pointer;
         width: 191px;
         height: 50px;
         margin-top: 27px;
         display: flex;
         justify-content: center; /* Horizontally center the text */
         align-items: center;     /* Vertically center the text */
         height: 50px;            /* Set height for better alignment */
         font-size: 13px;
         }
         .copy-button:hover {
         background-color: #e17427;
         }
         .hidden-iframe {
         position: absolute;
         left: -9999px;
         }
         .signature img {
         max-width: 100%;
         }
         /* Responsive Design */
         @media screen and (max-width: 768px) {
         .container {
         flex-direction: column;
         align-items: center;
         position: relative;
         }
         form, .signature {
         width: 100%;
         }
         .vertical-line {
         display: none;
         }
         input[type="text"], input[type="email"], select {
         width: 100%;
         }
         button {
         width: 100%;
         }
         }
         /* Container for the horizontal line */
.horizontal-line-container {
   position: absolute;
   width: 73%;
}
/* Full-width horizontal line */
.full-width-hr {
   position: absolute;

   width: 100%; /* Full width minus a little padding */
   border: 1px solid #ccc;
   margin: 0;
   padding: 0;
}
@media screen and (max-width: 768px) {
    .full-width-hr {
        display: none;
    }
}
.custom-alert {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);

    background-color: #fff;
    color: #333;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    z-index: 9999;
    display: none;
    opacity: 0;
    transition: opacity 0.5s ease, transform 0.5s ease;
    border: 1px solid #ddd;

    /* Fix the long height issue */
    max-width: 400px; /* Set a reasonable max width */
    width: auto; /* Adjust width based on content */
    max-height: 30px; /* Prevent excessive height */
    overflow-y: auto; /* Add scrolling if content overflows */
    text-align: center; /* Center the text inside */
}



.custom-alert.show {
    display: block;
    opacity: 1;
    bottom: 40px; /* Adjust to move up when showing */
}
      </style>
</head>

<body>
    <div class="wrapper">

        <!-- Centered heading and paragraph -->
        <div class="centered-content">

            <p style="color:#000;margin-top:-17px;font-family:Poppins;font-size:15px;">Please enter your details and generate your signature!</p>
        </div>

        <div class="horizontal-line-container">
      <hr class="full-width-hr">
   </div>
        <!-- Form and Signature container side-by-side -->
        <div class="container">
            <!-- The Form to collect input -->
            <form method="POST" onsubmit="return validateForm()">
    <label for="name" style="margin-bottom:-12px;margin-top:-5px"><p style="color:#000">Name</p></label>
    <input type="text" id="name" style="color:#000" name="name" value="<?php echo htmlspecialchars(
        $name,
    ); ?>" required><br>

    <label for="position" style="margin-bottom:-12px;margin-top:-5px"><p style="color:#000">Designation</p></label>
    <input type="text" id="position" style="color:#000" name="position" value="<?php echo htmlspecialchars(
        $position,
    ); ?>" required><br>

    <label for="email" style="margin-bottom:-12px;margin-top:-5px"><p style="color:#000">Email</p></label>
    <input type="email" id="email" style="color:#000" name="email" value="<?php echo htmlspecialchars(
        $email,
    ); ?>" required><br>

    <label for="phone" style="margin-bottom:-12px;margin-top:-5px"><p style="color:#000">Phone number</p></label>
    <input type="text" name="phone_number[main]" id="phone_number" style="color:#000;"  maxlength="17" oninput="limitInput(event)" required/>

    <button type="submit">GENERATE SIGNATURE</button>
</form>

              <!-- Vertical Line -->
              <div class="vertical-line"></div>

            <!-- Email Signature -->
            <div class="signature">
                <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
   <TABLE style='FONT-SIZE: small; HEIGHT: 188px; FONT-FAMILY: "Times New Roman"; WHITE-SPACE: normal; WORD-SPACING: 0px; BORDER-COLLAPSE: collapse; TEXT-TRANSFORM: none; FONT-WEIGHT: 400; COLOR: rgb(34,34,34); FONT-STYLE: normal; ORPHANS: 2; WIDOWS: 2; LETTER-SPACING: normal; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; font-variant-ligatures: normal; font-variant-caps: normal'>
<TBODY>
<TR style="HEIGHT: 200px">
<TD style="HEIGHT: 188px; WIDTH: 170px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px; PADDING-LEFT: 0px; MARGIN: 0px; PADDING-RIGHT: 0px"><IMG style="MARGIN-RIGHT: 0px" alt="company logo" src="https://lh3.googleusercontent.com/d/1yAxYgDXaprGBt8efTxQURuyl4QVvOtSf" width=226 height=84>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</TD>
<TD style="HEIGHT: 188px; WIDTH: 176px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px; PADDING-LEFT: 20px; MARGIN: 0px; PADDING-RIGHT: 0px">
<DIV style="FONT-SIZE: 12px; FONT-FAMILY: courier-std, monospace; COLOR: rgb(149,149,149); LINE-HEIGHT: 1.2">
<P style="FONT-SIZE: 14px; COLOR: rgb(32,18,77)"><STRONG><?php echo htmlspecialchars(
    $name,
); ?></STRONG></P>
<P style="FONT-SIZE: 13px; FONT-WEIGHT: 900; COLOR: rgb(32,18,77); MARGIN: 0px"><?php echo htmlspecialchars(
    $position,
); ?></P>
<P style="MARGIN: 0px"></P>
<P style="MARGIN: 0px"><A style="COLOR: rgb(149,149,149); text-decoration-line: none" href="mailto:<?php echo htmlspecialchars(
    $email,
); ?>"><?php echo htmlspecialchars($email); ?></A></P>
<P style="MARGIN: 0px"><A style="COLOR: rgb(149,149,149); text-decoration-line: none" href="tel:<?php echo $phone_number; ?>"><?php echo $formatted_phone_number; ?></A></P>
<P style="FONT-SIZE: 13px; FONT-WEIGHT: 900; COLOR: rgb(32,18,77); MARGIN: 0px">Dotcreative Limited</P>

<P style="MARGIN: 0px"><A style="COLOR: rgb(149,149,149); text-decoration-line: none"  rel=noopener target=_blank>Tigoni Road ,Kilimani,Nairobi</A></P>
<P style="MARGIN: 0px">&nbsp;</P><A style="TEXT-DECORATION: none; COLOR: rgb(149,149,149)"  rel=noopener target=_blank></A>
<P style="MARGIN: 0px"><A style="TEXT-DECORATION: none; COLOR: rgb(149,149,149)"  rel=noopener target=_blank></A><A style="TEXT-DECORATION: none; COLOR: rgb(149,149,149)" href="https://dotcreative.co.ke" rel="noopener noreferrer" target=_blank>www.dotcreative.co.ke</A></P></DIV></TD></TR></TBODY></TABLE>
<DIV style="FONT-SIZE: small; FONT-FAMILY: courier-std, monospace; WHITE-SPACE: normal; WORD-SPACING: 0px; MARGIN-TOP: 10px; TEXT-TRANSFORM: none; FONT-WEIGHT: 400; COLOR: rgb(0,0,0); FONT-STYLE: normal; ORPHANS: 2; WIDOWS: 2; LETTER-SPACING: normal; TEXT-INDENT: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; font-variant-ligatures: normal; font-variant-caps: normal">
<TABLE style="WIDTH: 394px; BORDER-COLLAPSE: collapse">
<TBODY>
<TR>
</TR></TBODY></TABLE></DIV>

    <button class="copy-button" onclick="copySignature()">COPY SIGNATURE</button>
<?php endif; ?>



            </div>
        </div>

        <!-- Hidden iframe to hold the HTML content -->
        <iframe id="hiddenIframe" class="hidden-iframe"></iframe>
    </div>
    <div id="custom-alert" class="custom-alert">
    Signature copied to clipboard!
</div>


    <script>
         function copySignature() {
                 const iframe = document.getElementById('hiddenIframe');
                 const content = `
                     <html>
   <TABLE style='FONT-SIZE: small; HEIGHT: 188px; FONT-FAMILY: "Times New Roman"; WHITE-SPACE: normal; WORD-SPACING: 0px; BORDER-COLLAPSE: collapse; TEXT-TRANSFORM: none; FONT-WEIGHT: 400; COLOR: rgb(34,34,34); FONT-STYLE: normal; ORPHANS: 2; WIDOWS: 2; LETTER-SPACING: normal; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; font-variant-ligatures: normal; font-variant-caps: normal'>
<TBODY>
<TR style="HEIGHT: 200px">
<TD style="HEIGHT: 188px; WIDTH: 170px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px; PADDING-LEFT: 0px; MARGIN: 0px; PADDING-RIGHT: 0px"><IMG style="MARGIN-RIGHT: 0px" alt="company logo" src="https://lh3.googleusercontent.com/d/1yAxYgDXaprGBt8efTxQURuyl4QVvOtSf" width=226 height=84>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</TD>
<TD style="HEIGHT: 188px; WIDTH: 176px; PADDING-BOTTOM: 0px; PADDING-TOP: 0px; PADDING-LEFT: 20px; MARGIN: 0px; PADDING-RIGHT: 0px">
<DIV style="FONT-SIZE: 12px; FONT-FAMILY: courier-std, monospace; COLOR: rgb(149,149,149); LINE-HEIGHT: 1.2">
<P style="FONT-SIZE: 14px; COLOR: rgb(32,18,77)"><STRONG><?php echo htmlspecialchars(
    $name,
); ?></STRONG></P>
<P style="FONT-SIZE: 13px; FONT-WEIGHT: 900; COLOR: rgb(32,18,77); MARGIN: 0px"><?php echo htmlspecialchars(
    $position,
); ?></P>
<P style="MARGIN: 0px"></P>
<P style="MARGIN: 0px"><A style="COLOR: rgb(149,149,149); text-decoration-line: none" href="mailto:<?php echo htmlspecialchars(
    $email,
); ?>"><?php echo htmlspecialchars($email); ?></A></P>
<P style="MARGIN: 0px"><A style="COLOR: rgb(149,149,149); text-decoration-line: none" href="tel:<?php echo $phone_number; ?>"><?php echo $formatted_phone_number; ?></A></P>
<P style="FONT-SIZE: 13px; FONT-WEIGHT: 900; COLOR: rgb(32,18,77); MARGIN: 0px">Dotcreative Limited</P>

<P style="MARGIN: 0px"><A style="COLOR: rgb(149,149,149); text-decoration-line: none"  rel=noopener target=_blank>Tigoni Road ,Kilimani,Nairobi</A></P>
<P style="MARGIN: 0px">&nbsp;</P><A style="TEXT-DECORATION: none; COLOR: rgb(149,149,149)"  rel=noopener target=_blank></A>
<P style="MARGIN: 0px"><A style="TEXT-DECORATION: none; COLOR: rgb(149,149,149)"  rel=noopener target=_blank></A><A style="TEXT-DECORATION: none; COLOR: rgb(149,149,149)" href="https://dotcreative.co.ke" rel="noopener noreferrer" target=_blank>www.dotcreative.co.ke</A></P></DIV></TD></TR></TBODY></TABLE>
<DIV style="FONT-SIZE: small; FONT-FAMILY: courier-std, monospace; WHITE-SPACE: normal; WORD-SPACING: 0px; MARGIN-TOP: 10px; TEXT-TRANSFORM: none; FONT-WEIGHT: 400; COLOR: rgb(0,0,0); FONT-STYLE: normal; ORPHANS: 2; WIDOWS: 2; LETTER-SPACING: normal; TEXT-INDENT: 0px; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; font-variant-ligatures: normal; font-variant-caps: normal">
<TABLE style="WIDTH: 394px; BORDER-COLLAPSE: collapse">
<TBODY>
<TR></TR></TBODY></TABLE></DIV></html>
                 `;

                 iframe.contentWindow.document.open();
                 iframe.contentWindow.document.write(content);
                 iframe.contentWindow.document.close();

                 iframe.contentWindow.focus();
                 iframe.contentWindow.document.execCommand('selectAll');
                 iframe.contentWindow.document.execCommand('copy');

                  // Show custom alert modal
        showCustomAlert();
    }

    // Function to show the custom alert and hide it after 3 seconds
    function showCustomAlert() {
        var alertBox = document.getElementById("custom-alert");
        alertBox.classList.add("show");

        setTimeout(function() {
            alertBox.classList.remove("show");
        }, 3000); // Hide after 3 seconds
    }
</script>
      <script>
         var phone_number = window.intlTelInput(document.querySelector("#phone_number"), {
         separateDialCode: true,
         preferredCountries:["ke","tz"],
         hiddenInput: "full",
         utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
         });

         $("form").submit(function() {
         var full_number = phone_number.getNumber(intlTelInputUtils.numberFormat.E164);
         $("input[name='phone_number[full]'").val(full_number);


         });

      </script>
      <script></script>
      <script>
         function limitInput(event) {
             const phoneInput = event.target;
             const phoneValue = phoneInput.value;

             // Allow only digits, plus sign, and spaces
             const cleanedValue = phoneValue.replace(/[^\d+ ]/g, '');

             // If the cleaned value exceeds 17 characters, truncate it
             if (cleanedValue.length > 17) {
                 phoneInput.value = cleanedValue.slice(0, 17);
             } else {
                 phoneInput.value = cleanedValue;
             }
         }
      </script>
      <script>
         document.getElementById('phone_number').addEventListener('input', function(e) {
             // Get the input value
             const inputValue = e.target.value;

             // If the first character is '0', remove it
             if (inputValue.length === 1 && inputValue === '0') {
                 e.target.value = '';
                 alert('The phone number cannot start with 0.');
             }
         });
      </script>
      <script>
      function validateForm() {
      const phoneInput = document.getElementById('phone');
      const phoneValue = phoneInput.value;
      // Remove any non-digit and non-plus characters
      const cleanedValue = phoneValue.replace(/[^\d+]/g, '');
      // Check if the cleaned value is in the correct format and within the max length
      const phoneRegex = /^\+\d{3} \d{9}$/;
      if (cleanedValue.length > 17) {
      alert('Phone number cannot exceed 17 characters.');
      return false;
      }
      return true;
      }
</body>
</html>
