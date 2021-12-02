<html>
<script src="https://smtpjs.com/v3/smtp.js"></script>
<input type="file" id="fileupload" onchange="uploadFileToServer()" />
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