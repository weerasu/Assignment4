
/*smooth scrolling Contact us*/
document.querySelectorAll('a[href^="#Contact-us"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});


/*smooth scrolling Skills*/
document.querySelectorAll('a[href^="#skills"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});



/*smooth scrolling Portfolio*/
document.querySelectorAll('a[href^="#portfolio"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});



/*smooth scrolling Home*/
document.querySelectorAll('a[href^="#Home"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior:'smooth'
        });
    });
});






// Wait for the document to load
document.addEventListener("DOMContentLoaded", function() {
  // Get references to the button and additional info container
  var toggleButton = document.getElementById("Button");
  var additionalInfoContainer = document.getElementById("moreinfo");

  // Add a click event listener to the button
  toggleButton.addEventListener("click", function() {
    // Toggle the visibility of the additional info container
    if (additionalInfoContainer.style.display === "none") {
      additionalInfoContainer.style.display = "block";
      toggleButton.innerHTML = "Hide Additional Information";
    } else {
      additionalInfoContainer.style.display = "none";
      toggleButton.innerHTML = "Show Additional Information";
    }
  });
});




//form validation

function validateEmail(email) {
 
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailPattern.test(email);
}

function validatePhone(name) {

  const namePattern = /^[A-Za-z\s]+$/;
  return namePattern.test(name);
}

function submitForm(event) {
  event.preventDefault(); 


  const emailInput = document.getElementById('email');
  const phoneInput = document.getElementById('name');


  if (!validateEmail(emailInput.value)) {
    alert('Please enter a valid email address.');
    emailInput.focus();
    return;
  }

 
  if (!validatename(nameInput.value)) {
    alert('Please enter a valid name (Only letters ans spaces are accepted).');
    nameInput.focus();
    return;
  }

  alert('Form submitted successfully!');
  


const contactForm = document.getElementById('contactForm');
contactForm.addEventListener('submit', submitForm);
}



//image slider 

window.addEventListener("load", function() {
  var slider = document.querySelector(".slider");
  var slides = slider.querySelectorAll(".slide");
  var totalSlides = slides.length;
  var currentIndex = 0;
  var interval = 8000; // Set the interval between slides (in milliseconds)

  // Position all slides on top of each other
  for (var i = 0; i < totalSlides; i++) {
    slides[i].style.position = "absolute";
    slides[i].style.top = "0";
    slides[i].style.left = "0";
    if (i !== currentIndex) {
      slides[i].style.opacity = "0";
    }
  }

  function showNextSlide() {
    // Hide the current slide
    slides[currentIndex].style.opacity = "0";
    
    // Pause the video if the current slide contains a video element
    var currentVideo = slides[currentIndex].querySelector("video");
    if (currentVideo) {
      currentVideo.pause();
    }

    // Move to the next slide
    currentIndex = (currentIndex + 1) % totalSlides;

    // Display the next slide
    slides[currentIndex].style.opacity = "1";
    
    // Play the video if the next slide contains a video element
    var nextVideo = slides[currentIndex].querySelector("video");
    if (nextVideo) {
      nextVideo.play();
    }
  }

  // Start the automatic slideshow
  setInterval(showNextSlide, interval);
});





/**********animation************/
function reveal() {
  var reveals = document.querySelectorAll(".reveal");

  for (var i = 0; i < reveals.length; i++) {
    var windowHeight = window.innerHeight;
    var elementTop = reveals[i].getBoundingClientRect().top;
    var elementVisible = 150;

    if (elementTop < windowHeight - elementVisible) {
      reveals[i].classList.add("active");
    } else {
      reveals[i].classList.remove("active");
    }
  }
}

window.addEventListener("scroll", reveal);

/*************** */


/******home para****/


function fadeIn(element) {
  element.classList.add("fade-in");
  element.style.opacity = 1;
}

// Get the paragraph element
const paragraph = document.getElementById("pasan");

// Apply fade-in effect when the page loads
window.addEventListener("load", function() {
  fadeIn(paragraph);
});
