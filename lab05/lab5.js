/* Lab 5 JavaScript File 
   Place variables and functions in this file */

function validate(formObj) {
   // put your validation code here
   // it will be a series of if statements

   if (formObj.firstName.value == "") {
     alert("You must enter a first name");
     formObj.firstName.focus();
     return false;
   }

   if(formObj.lastName.value == ""){
     alert("You must enter a last name");
     formObj.lastName.focus();
     return false;
   }

   if(formObj.title.value == ""){
     alert("You must enter a title");
     formObj.title.focus();
     return false;
   }

   if(formObj.org.value == ""){
     alert("You must enter an organization");
     formObj.org.focus();
     return false;
   }

   if(formObj.pseudonym.value == ""){
     alert("You must enter a pseudonym");
     formObj.pseudonym.focus();
     return false;
   }

   if(formObj.comments.value == "" || formObj.comments.value == "Please enter your comments"){
     alert("You must enter a comment");
     formObj.comments.focus();
     return false;
   }

   alert("Form submitted successfully")
   return true;
}

function clearComments(){
  var commentsBox = document.getElementById("comments");
  if(commentsBox.value == "Please enter your comments"){
    commentsBox.value = ""; //clear the placeholder text when cleared 
  }

  //Handle if user leaves text area blank after clicking
  commentsBox.onblur = function() {
  if (commentsBox.value.trim() === ""){
    commentsBox.value = "Please enter your comments"; //restore placeholder if nothing is entered
  }
  };
}

function showAlert(){
  //Get the values from the form
  var firstName = document.getElementById("firstName").value;
  var lastName= document.getElementById("lastName").value;
  var nickname= document.getElementById("pseudonym").value;
  // Show alert in the required format
  alert(firstName + " " + lastName + " is " + nickname);
}

// Focus on the first form element when the page loads
window.onload = function() {
  document.getElementById("firstName").focus();
};
