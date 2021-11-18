document.getElementById('getToken').addEventListener('click', function() {
   let request = new XMLHttpRequest();
   request.open("GET", "api/get-token");
   request.onreadystatechange = function() {
       if(this.readyState === 4 && this.status === 200) {
           let response = JSON.parse(this.responseText);
           if(response.status == 'success'){
               document.getElementById('generatedToken').innerHTML = "Generated token: " + response.token;
           }
       }
   };
   request.send();
});