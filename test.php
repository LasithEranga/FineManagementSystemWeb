<html>
<script src="https://smtpjs.com/v3/smtp.js"></script>
<input type="file" id="fileupload" onchange="uploadFileToServer()" />
SELECT * FROM `traffic_police_officer` WHERE police_id = '34276' AND email ='lasitheranga1@gmail.com'<br />
<font size='1'><table class='xdebug-error xe-notice' dir='ltr' border='1' cellspacing='0' cellpadding='1'>
<tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> Notice: Undefined variable: result_array in C:\wamp64\www\FMS\FMSMobileWebApp\login_verify.php on line <i>36</i></th></tr>
<tr><th align='left' bgcolor='#e9b96e' colspan='5'>Call Stack</th></tr>
<tr><th align='center' bgcolor='#eeeeec'>#</th><th align='left' bgcolor='#eeeeec'>Time</th><th align='left' bgcolor='#eeeeec'>Memory</th><th align='left' bgcolor='#eeeeec'>Function</th><th align='left' bgcolor='#eeeeec'>Location</th></tr>
<tr><td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec' align='center'>0.0025</td><td bgcolor='#eeeeec' align='right'>410624</td><td bgcolor='#eeeeec'>{main}(  )</td><td title='C:\wamp64\www\FMS\FMSMobileWebApp\login_verify.php' bgcolor='#eeeeec'>...\login_verify.php<b>:</b>0</td></tr>
</table></font>
logged

<div id='print' class='m-1'>
                          <div class='d-flex flex-row  col-12'>
                            <div class='col-1 '></div>
                            <div class='col-1 mt-3 pt-1'> <img src='https://finemanagementsystem.000webhostapp.com/images/glogo.png' alt=''height='75px'></div>
                            <div class='col-8 text-center mt-4 '>
                              <span class='fw-bold fs-2 '>  SRI LANKA POLICE </span><br> ` + listName + `<p></p>
                            </div>
                            <div class='col-1  mt-3'><img src='https://finemanagementsystem.000webhostapp.com/images/policeLogo.png' alt=''></div>
                          </div>
                          <div class="table-responsive mx-4">
                            <table class="table table-striped table-light table-hover">
                              <thead>
                                <tr>
                                  <th scope="col">ID</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Address</th>
                                  <th scope="col">NIC</th>
                                  <th scope="col">Date</th>
                                  <th scope="col">Rules</th>
                                  <th scope="col">Penalty</th>
                                </tr>
                              </thead>
                              <tbody id="table_contents">
<script>
function uploadFileToServer()
{
  var file = event.srcElement.files[0];
   var reader = new FileReader();
   reader.readAsBinaryString(file);
   reader.onload = function () {
       var dataUri = "data:" + file.type + ";base64," + btoa(reader.result);
       Email.send({
        Host: "smtp.gmail.com",
		Username: "finexpayment@gmail.com",
		Password: "cxbmyrkpzqunokzk",
		To: 'lasitheranga1@gmail.com',
		From: "finexpayment@gmail.com",
           Subject : "Send with base64 attachment",
           Body : "Sending file:" + file.name,
           Attachments : [
          	{
          		name : file.name,
          		data : dataUri
          	}]
       }).then(
         message => alert(message)
       );
   };
   reader.onerror = function() {
       console.log('there are some problems');
   };
}
</script>
</html>