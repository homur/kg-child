// Add your custom JS here.

console.log("Hi HI HI")
const animateOption = {
  duration: 300,
  easing: "ease",
}
jQuery(".dropdown-toggle.nav-link").on("click", function (event) {
  jQuery(this).parent().toggleClass("open")
  let ul = jQuery(this).siblings("ul")
  if (ul.hasClass("shows")) {
    ul.removeClass("shows")
    ul.slideUp()
  } else {
    ul.addClass("shows")
    ul.slideDown()
  }
})
jQuery("body").on("click", function (e) {
  if (!jQuery("#main-menu").is(e.target) && jQuery("#main-menu").has(e.target).length === 0 && jQuery(".open").has(e.target).length === 0) {
    jQuery(".dropdown").removeClass("open")
    jQuery(".dropdown-menu").removeClass("show")
  }
})

// console.log(`123`);

const myTimeout = setTimeout(function () {
  // menuApi.bind('open:finish', function () {
  //     alert('open');
  //  });

  //  menuApi.bind('init:finish', function () {
  //     alert('init:finish');
  //  });

  //  menuApi.bind('init', function () {
  //     alert('init');
  //  });
  jQuery(
    ".wpmm-header-image"
  ).after(`<div class="input-group search-input-group">   <input id="search-value" type="text" class="form-control" placeholder="Search Site" aria-label="Search Site" aria-describedby="basic-addon2">   <div class="input-group-append">     <button id="search-button" class="btn btn-outline-secondary" type="button">
     <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg></button>   </div> </div>`)
     jQuery('#search-button').on('click', function() {
         
         window.location.href = `${siteUrl}?s=${jQuery('#search-value').val()}`
     })
}, 2000)

// jQuery('.search-input-group').parent().addClass('search-input-group-parent')
// console.log(jQuery('.wpmm-header-image'))

// import "../../node_modules/mmenu-light/dist/mmenu-light"

{
  /* <div class="input-group search-input-group">   <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">   <div class="input-group-append">     <button class="btn btn-outline-secondary" type="button">Button</button>   </div> </div> */
}
