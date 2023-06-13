// window.addEventListener('scroll', function() {
//   var navbar = document.getElementById('navbar');
//   var scrollPosition = window.scrollY;

//   if (scrollPosition > 0 || document.getElementById('menu-toggle').checked) {
//     navbar.classList.add('navbar-solid');
//     document.querySelector('.logoText').style.fontSize = '36px';
//     document.querySelector('.logoText').style.lineHeight = '1.2';
//   } else {
//     navbar.classList.remove('navbar-solid');
//     document.querySelector('.logoText').style.fontSize = '48px';
//     document.querySelector('.logoText').style.lineHeight = '1';
//   }
// });

window.addEventListener('scroll', function() {
  var navbar = document.getElementById('navbar');
  var scrollPosition = window.scrollY;

  if (scrollPosition > 0) {
    navbar.classList.add('navbar-solid');
    document.querySelector('.logoText').style.fontSize = '36px';
    document.querySelector('.logoText').style.lineHeight = '1.2';
  } else {
    navbar.classList.remove('navbar-solid');
    document.querySelector('.logoText').style.fontSize = '48px';
    document.querySelector('.logoText').style.lineHeight = '1';
  }
});



// document.getElementById('menu-toggle').addEventListener('change', function() {
//   var mobileMenu = document.querySelector('.mobile-menu');
//   var menuButton = document.querySelector('.mobile-menu-button');
//   var navbar = document.getElementById('navbar');

//   if (this.checked) {
//     mobileMenu.classList.add('menu-open');
//     menuButton.innerHTML = '<i class="fa-solid fa-xmark fa-xl"></i>';
//     navbar.classList.add('navbar-solid');
//   } else {
//     mobileMenu.classList.remove('menu-open');
//     menuButton.innerHTML = '<i class="fa-solid fa-bars fa-xl"></i>';
//     if (window.scrollY <= 0) {
//       navbar.classList.remove('navbar-solid');
//     }
//   }
// });


// dropdown

const dropdowns = document.querySelectorAll('.dropdown');
  
dropdowns.forEach((dropdown) => {
  const dropdownItems = dropdown.querySelectorAll('.dropdown-menu li');
  const dropdownToggle = dropdown.querySelector('.dropdown-toggle');

  dropdownItems.forEach((item) => {
    item.addEventListener('click', (event) => {
      event.preventDefault();
      const selectedItem = event.currentTarget.getAttribute('data-item');
      dropdownToggle.innerText = selectedItem;
    });
  });
});

// increment and decrement

  function handleCount(element, increment) {
    const countElement = element.parentNode.querySelector('.num') || element.parentNode.querySelector('.no');
    let count = parseInt(countElement.innerText);
    count += increment ? 1 : -1;

    count = Math.max(1, Math.min(99, count));

    countElement.innerText = count.toString().padStart(2, '0');
  }

  const increaseButtons = document.querySelectorAll('.increase-count');
  increaseButtons.forEach((button) => {
    button.addEventListener('click', () => handleCount(button, true));
  });

  const decreaseButtons = document.querySelectorAll('.decrease-count');
  decreaseButtons.forEach((button) => {
    button.addEventListener('click', () => handleCount(button, false));
  });

// button

function shortArrow(){
  const iconsShortArrow = document.querySelectorAll('#shortArrow');

  iconsShortArrow.forEach(iconshortArrow => {
    const pathshortArrow = iconshortArrow.querySelector('svg path#shortArrowPath');
    const shortArrowRect = iconshortArrow.querySelector('svg rect#shortArrowRect');
    
    iconshortArrow.addEventListener('mouseover', () => {
     pathshortArrow.style.transition = 'all 0.3s ease-out';
      pathshortArrow.style.transform = 'translateX(5px)';
      pathshortArrow.style.opacity = '1';
      shortArrowRect.setAttribute('width', '20');
      shortArrowRect.style.transform = 'translateX(-6px)';
      shortArrowRect.style.transition = 'all 0.3s ease-out';
    });
    
    iconshortArrow.addEventListener('mouseout', () => {
      pathshortArrow.style.transition = 'all 0.3s ease-out';  
      pathshortArrow.style.transform = 'translateX(0px)';
      shortArrowRect.setAttribute('width', '8');
      shortArrowRect.style.transform = 'translateX(0px)';
      shortArrowRect.style.transition = 'all 0.3s ease-out';
    });
  });
}

shortArrow();


// // dropdown
// document.getElementById('dropdownToggle1').addEventListener('click', function() {
//   var dropdownMenu = document.getElementById('dropdownMenu1');
//   dropdownMenu.classList.toggle('hidden');
// });

// document.getElementById('dropdownToggle2').addEventListener('click', function() {
//   var dropdownMenu = document.getElementById('dropdownMenu2');
//   dropdownMenu.classList.toggle('hidden');
// });

// function decreaseCount(countId) {
//   var countElement = document.getElementById(countId);
//   var count = parseInt(countElement.innerText);
//   if (count > 0) {
//     countElement.innerText = count - 1;
//     updateTotalCount();
//   }
// }

// function increaseCount(countId) {
//   var countElement = document.getElementById(countId);
//   var count = parseInt(countElement.innerText);
//   countElement.innerText = count + 1;
//   updateTotalCount();
// }

// function updateTotalCount() {
//   var adultCount1 = parseInt(document.getElementById('adultCount1').innerText);
//   var childCount1 = parseInt(document.getElementById('childCount1').innerText);
//   var totalCount1 = adultCount1 + childCount1;
//   document.getElementById('totalCount1').innerText = totalCount1;

//   var adultCount2 = parseInt(document.getElementById('adultCount2').innerText);
//   var childCount2 = parseInt(document.getElementById('childCount2').innerText);
//   var totalCount2 = adultCount2 + childCount2;
//   document.getElementById('totalCount2').innerText = totalCount2;
// }


// document.addEventListener('click', function(event) {
//   var dropdownMenu1 = document.getElementById('dropdownMenu1');
//   var dropdownToggle1 = document.getElementById('dropdownToggle1');
//   var dropdownMenu2 = document.getElementById('dropdownMenu2');
//   var dropdownToggle2 = document.getElementById('dropdownToggle2');

//   if (!dropdownToggle1.contains(event.target) && !dropdownMenu1.contains(event.target)) {
//     dropdownMenu1.classList.add('hidden');
//   }

//   if (!dropdownToggle2.contains(event.target) && !dropdownMenu2.contains(event.target)) {
//     dropdownMenu2.classList.add('hidden');
//   }
// });