// Nav toggle
const hamburger = document.querySelector('.hamburger');
const mobileLinks = document.querySelector('.-links')
const body = document.querySelector('body')

hamburger.addEventListener('click', function() {
  hamburger.classList.toggle('is-active');
  mobileLinks.classList.toggle('-open');
  body.classList.toggle('nav-open')
})

// Tabbed Content
const $tabs = $('.menu-tab');
const $contentAreas = $('.tabbed-content-view');

$tabs.on('click', function(e) {
  e.preventDefault();

  $tabs.removeClass('active');
  $contentAreas.removeClass('show');

  let clickedTab = $(this);
  let clickedTabId = $(this).attr('id').charAt(0);
  let activeContent = $('#' + clickedTabId);
  
  clickedTab.addClass('active');
  activeContent.addClass('show');
})
