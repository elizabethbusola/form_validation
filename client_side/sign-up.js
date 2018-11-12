function verifyForm(){

			var fname = document.signUpForm.fname;
			           if (fname.value == "") {
			               alert("Please input your first name");
			               fname.focus();
			               return false;
			           }

			var lname = document.signUpForm.lname;
			           if (lname.value == "") {
			               alert("Please input your last name");
			               lname.focus();
			               return false;
			           }
			var email = document.signUpForm.email;
			           if (email.value == "") {
			               alert("Please input your email address");
			               email.focus();
			               return false;
			           }
			var pwd = document.signUpForm.pwd;
			           if (pwd.value == "") {
			               alert("Please input your password");
			               pwd.focus();
			               return false;
			           }  
			var cpwd = document.signUpForm.cpwd;
			           if (cpwd.value == "") {
			               alert("Please input your password again");
			               cpwd.focus();
			               return false;
			           }
			 var number = document.signUpForm.number;
			           if (number.value == "" || isNaN(number.value)) {
			               alert("Phone number should be numeric.");
			               number.focus();
			               return false;
           				}

			           if (number.value.length != 11) {
			                alert( "Phone number should be exactly 11 digits.");
			              	number.focus();
			               return false;
			           }
			var gender = document.signUpForm.gender;
			           if(gender.value == "-1"){
			               alert("Please select a gender");
			               gender.focus();
			               return false;
			           }
			var country = document.signUpForm.country;
			           if (country.value == "-1") {
			               alert("Please select a country");
			               country.focus();
			               return false;
			           }

					return true;

				}