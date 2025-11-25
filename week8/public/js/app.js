function validateEmail(email){
    
    fetch(encodeURI(`/students/validate/${email}`)) 
    .then(response => { //function called when request is completed
         // do whatever you want with the response received from the server
         if (!response.ok) {
 		    throw new Error("There was an error");
         }
         if(response.text == 'Is Not Valid') {
            document.getElementById('email').setAttribute('style',"border: 1px solid red");
         }
        //  document.getElementById("valid").innerHTML = response.json();
      })
      .catch(error => { console.error("Error:", error); }); //fun
}