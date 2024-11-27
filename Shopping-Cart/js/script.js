// jQuery script starts here
$(document).ready(function () {
	$('.navigation__menu').click(function () {
		if ($(".navigation__item").css("display") == ("none")) {
			$(".navigation__item").css("display", "block");
		}
		else {
			$(".navigation__item").css("display", "none");
		}
	});


	$(function () {
		$("navigation__link").click(function () {   // When a navigation link is clicked...

			$("navigation__link").removeClass("active");     // Remove the active class from all navigation links...

			$(this).addClass("active");     // Add the active class to the clicked navigation link...
		});
	});
});

// Validation function
function validateForm() {
	var firstName = document.getElementById('first_name').value;
	var lastName = document.getElementById('last_name').value;
	var username = document.getElementById('username').value;
	var mobile = document.getElementById('mobile').value;
	var email = document.getElementById('email').value;
	var photo = document.getElementById('photo').value;
	var password = document.getElementById('password').value;
	var confirmPassword = document.getElementById('confirm_password').value;

	// Validation for first name
	if (firstName == "") {
		alert("First name must be filled out");
		return false;
	} else if (firstName.length < 3) {
		alert("First name must be minimum 3 aplhabets");
		return false;
	}

	// Validation for last name
	if (lastName == "") {
		alert("last name must be filled out");
		return false;
	} else if (lastName.length < 3) {
		alert("last name must be minimum 3 aplhabets");
		return false;
	}

	// Validation for username
	if (username == "") {
		alert("username must be filled out");
		return false;
	} else if (username.length < 4) {
		alert("username must be minimum 4 aplhabets");
		return false;
	}

	// Validation for mobile number
	if (!(/^\d{10}$/.test(mobile))) {
		// document.getElementById('mobileError').innerHTML = 'Invalid mobile number';
		alert("invalid mobile number");
		return false;
	}


	// Validation for email
	var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
	if (email == "") {
		alert("Email must be filled out");
		return false;
	} else if (!emailPattern.test(email)) {
		alert("Enter Valid Email !");
	}

	// Validation for photo
	if (photo == "") {
		alert("User photo must be uploaded");
		return false;
	}

	// Validation for password
	if (password.length < 8) {
		alert("minimum Password must be 8 digit");
		return false;
	}

	// Validation for confirm password
	if (confirmPassword == "") {
		alert("Confirm password must be filled out");
		return false;
	}

	// Validation for matching passwords
	if (password != confirmPassword) {
		alert("Passwords do not match");
		return false;
	}

	return true;
}


// side pannel styles
function openNav() {
	document.getElementById("mySidepanel").style.width = "250px";
}

function closeNav() {
	document.getElementById("mySidepanel").style.width = "0";
}
